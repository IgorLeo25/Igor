<?php 
	session_start();
	include_once ("conexao.php");
	$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
	$sql = "SELECT * FROM usuario WHERE id = '$id'";
	$comando = mysqli_query($conn, $sql);
	$row_usuarios = mysqli_fetch_assoc($comando);
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset = "utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
		<title>Editar Usuários</title>
		</head>
		<style>
	body {
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
	form {
		display: flex;
		flex-direction: column;
		align-items: center;
		padding: 20px;
		margin-top: 50px;
	}
	label {
		font-size: 20px;
		margin-bottom: 10px;
	}
	input[type="text"],
	input[type="email"] {
		padding: 10px;
		border: 1px solid blue;
		border-radius: 5px;
		margin-bottom: 20px;
		width: 100%;
		max-width: 400px;
	}
	input[type="submit"] {
		background-color: blue;
		color: white;
		border: none;
		border-radius: 5px;
		padding: 10px;
		font-size: 20px;
		cursor: pointer;
	}

	div{
            position: absolute;
            top: 35%;
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
		
	</ul>
	<div style="background-color: white;">

	<center><h1>Editar Usuario</h1>
<?php
		if(isset($_SESSION['msg']))
		{
		echo $_SESSION['msg'];
		unset($_SESSION['msg']);
		}
?>
<form method="POST" action="proc_edit_usuario.php">

<input type="hidden" name="id" value="<?php echo $row_usuarios['id']; ?>">
<label>Nome:</label>
<input type="text" name="nome" placeholder="Digite o seu nome completo" value="<?php echo $row_usuarios['nome']; ?>">
<label>E-mail:</label>
<input type="email" name="email" placeholder="Digite o seu melhor e-mail" value="<?php echo $row_usuarios['email']; ?>">

<input type="submit" value="Editar">
</form>
<div>
</body>
</html>