<?php
 session_start();
 include_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
		<title>Deletar Usuário</title>
	</head>
	<style>
	body{
            font-family: Arial, Helvetica, sans-serif;
			background-color:pink;
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
		text-decoration: none;
	}

	li a:hover {
  background-color: #111;
	}
    table {
        border: 1px solid black;
        border-collapse: collapse;
        background-color: black;
        border-radius: 10px;
    }
    
    th, td {
        border: 1px solid white;
        padding: 8px;
        text-align: left;
        color: white;
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
div{
            position: absolute;
            top: 30%;
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
	<a class="btn btn-light" href="index_usuarios.php" role="button">LISTAR</a>
	<a class="btn btn-light" href="sair.php" role="button">SAIR DO SISTEMA</a>
	<a class="btn btn-light" href="principal.php" role="button">VOLTAR AO INÍCIO</a>
	<div style="background-color: white;">

		<center><h1>Deletar Usuários</h1>
		<?php
			if(isset($_SESSION['msg']))
			{
				echo $_SESSION['msg'];
				unset ($_SESSION['msg']);
			}
		?>
		<?php
		if (isset($_GET['id']))
		{
		$codigo = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
		$sql = "SELECT * FROM usuario WHERE id = '$codigo'";
		$comando = mysqli_query($conn, $sql);
		$row_usuarios	= mysqli_fetch_assoc($comando);
		?>
		<form method="POST" action="proc_delete_usuario.php">
		<input type="hidden" name="id" value="<?php echo 
		$row_usuarios['id'];?>">
		<input type="hidden" name="nome" value="<?php echo 
		$row_usuarios['nome'];?>">
		<style>
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
</style>
		<table>
	<tr>
		<th>Código</th>
		<th>Nome</th>
	</tr>
	<tr>
		<td><?php echo $row_usuarios['id']; ?></td>
		<td><?php echo $row_usuarios['nome']; ?></td>
	</tr>
</table>
<h3> Essa operação é irreversivel - Deseja realmente excluir este Usuario?</h3>
<button type="submit" class="btn btn-primary">Sim</button>
<a href='index_usuario.php?pagina=1'><button type= "button" class="btn btn-primary">Não</button></a>


		</form>
	<?php
		}
			else
		{
			echo "<p>Requisição invalida! = Erro ao deletar</p>";
		}
	?>
	</div>
	</body>
	</html>