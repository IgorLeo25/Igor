  <?php
session_start(); 
include_once ("conexao.php");

?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
		<title>Usuários</title>
	</head>
	<style>
	body{
            font-family: Arial, Helvetica, sans-serif;
			background-color: pink;
			text-align: center;
			 color: white;

        }
	ul {
		list-style-type: none;
		margin: 0;
		padding: 0;
		overflow: hidden;
		background-color: #F5FFFA;
	}

		li {
		float: left;
	}

		li a {
		display: block;
		color: white;
		text-align: center;
		padding: 14px 16px;
		text-decoration: none;<style>
		}
table {
  border-collapse: collapse;
  background-color: black;
  border-radius: 10px;
  overflow: hidden;
}

td {
  border: 1px solid white;
  padding: 10px;
  color: white;
}

th {
  border: 1px solid white;
  padding: 10px;
  color: white;
  background-color: #333;
}

a {
  color: white;
  text-decoration: none;
}

	li a:hover {
  background-color: #111;
	}
.button {
  background-color: #4CAF50; /* cor verde */
  border: none;
  color: white;
  padding: 12px 30px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 5px;
}

.button-blue {
  background-color: #4287f5; /* cor azul */
}

.button-blue:hover {
  background-color: #3b73d3; /* cor azul mais escura quando hover */
}

.button-disabled {
  background-color: #cccccc; /* cor cinza */
  cursor: default;
}

.button-disabled:hover {
  background-color: #cccccc; /* manter a cor cinza quando hover */
}
div{
	background-color: white;
            position: absolute;
            top: 45%;
            left: 50%;
            transform: translate(-50%,-50%);
            padding: 80px;
            border-radius: 15px;
            color: black;
        }
    

	</style>
	<body>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	<a class="btn btn-light" href="cad_usuario.php" role="button">CADASTRAR</a>
	<a class="btn btn-light" href="index_usuario.php" role="button">LISTAR</a>
	<a class="btn btn-light" href="sair.php" role="button">SAIR DO SISTEMA</a>
	<a class="btn btn-light" href="principal.php" role="button">VOLTAR AO INÍCIO</a>
	<br>

	<div>

    <center> <h1> Usuarios Cadastrados</h1> </center>
	<?php
	if (isset($_SESSION['msg'])) 
	{
		echo $_SESSION['msg'];
		unset($_SESSION['msg']);
		
	}
	
	$pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);
	$pagina = (!empty($pagina_atual)) ?$pagina_atual : 1;
	

	$qnt_result_pg = 4;
	
	
	$inicio = ($qnt_result_pg *$pagina) - $qnt_result_pg;
	
	$sql = "SELECT * FROM usuario LIMIT $inicio, $qnt_result_pg";
	$comando = mysqli_query($conn, $sql);
  

	echo "<table>";
	while($row_usuarios = mysqli_fetch_assoc($comando) )
		
    {
        echo "<tr>";
        $ic = 1;
        while ($ic <= 5)
        {
            if ($ic === 1)
                echo "<td> ID: " . $row_usuarios['id'] . "<br> </td>";
            if ($ic === 2)
                echo "<td> Nome: " . $row_usuarios['nome'] . "<br> </td> ";
            if ($ic === 3)    
                   echo "<td> E-mail: " . $row_usuarios['email'] . "<br> </td> ";
            if ($ic === 4)
                echo "<td> <a href='edit_usuario.php?id=" . $row_usuarios['id'] . "'>Editar</a> </td> ";                
            if ($ic === 5)
                echo "<td> <a href='delete_usuario.php?id=" . $row_usuarios['id'] . "'>Excluir</a><br> </td> ";
            $ic = $ic + 1;
        }
         echo "</tr>";
    }
    echo "</table>";
	$sql = "SELECT COUNT(id) AS num_result FROM usuario";
	$resultado_pg = mysqli_query ($conn, $sql);
	$row_pg = mysqli_fetch_assoc($resultado_pg);
	
	$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);
	
	$max_links = 2;
	echo "<a href='index_usuario.php?pagina=1' class='btn btn-primary'>Primeira</a> ";
	
	for ($pag_ant = $pagina = $max_links; $pag_ant <= $pagina = 1; $pag_ant++)
	{
		if ($pag_ant>=1)
		{
			echo "<a href ='index_usuario.php?pagina=$pag_ant' class='btn btn-primary'>$pag_ant</a>";
		}
	
	}
	
	echo "$pagina ";
	
	for($pag_dep = $pagina + 1; $pag_dep <= $pagina = $max_links; $pag_dep++)
	{
		if($pag_dep <= $quantidade_pg)
		{
			echo "<a href='index_usuario.php?pagina=$pag_dep' class='btn btn-primary'>$pag_dep</a>";
		}
	}
	
	echo "<a href='index_usuario.php?pagina=$quantidade_pg' class='btn btn-primary'>Ultima</a>";
	


	
	?>
	</div>
	</body>
	</html>
	

	
	
	