<?php 
	session_start();
	include_once ("conexao.php");
	$codigo = filter_input(INPUT_GET, 'codigo', FILTER_SANITIZE_NUMBER_INT);
	$sql = "SELECT * FROM animal WHERE cod_an = '$codigo'";
	$comando = mysqli_query($conn, $sql);
	$row_animal = mysqli_fetch_assoc($comando);
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
		<title>	Editar Animal</title>
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
	input[type="number"] {
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
	input[type="submit"]:hover {
		background-color: darkblue;
	}
</style>

<body>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	<a class="btn btn-light" href="cad_animal.php" role="button">CADASTRAR</a>
	<a class="btn btn-light" href="index_animal.php" role="button">LISTAR</a>
	<a class="btn btn-light" href="sair.php" role="button">SAIR DO SISTEMA</a>
	<a class="btn btn-light" href="principal.php" role="button">VOLTAR AO INÍCIO</a>
		<center><h1>Editar Animais </h1>
<?php
		if(isset($_SESSION['msg']))
		{
		echo $_SESSION['msg'];
		unset($_SESSION['msg']);
		}
?>

<form method="POST" action="proc_edit_animal.php">
    <input type="hidden" name="cod_an" value="<?php echo $row_animal['cod_an']; ?>">
    
    <label>Nome:</label>
    <input type="text" name="nome_an" placeholder="Digite o nome da materia " value="<?php echo $row_animal['nome_an']; ?>">
	<label>Raça:</label>
    <input type="text" name="raca_an" placeholder="Digite o nome da Raça" value="<?php echo $row_animal['raca_an']; ?>">
	<label>Idade:</label>
    <input type="text" name="idade_an" placeholder="Digite a idade" value="<?php echo $row_animal['idade_an']; ?>">
	<label>Sexo:</label>
    <input type="text" name="sexo_an" placeholder="Digite o Sexo  " value="<?php echo $row_animal['sexo_an']; ?>">

    
    <input type="submit" value="Editar">
</form>
</body>
</html>
