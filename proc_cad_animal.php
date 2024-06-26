<?php 
	session_start();
	include_once("conexao.php");
	
		$nome = filter_input(INPUT_POST, 'nome_an', FILTER_SANITIZE_STRING);
		$raca = filter_input(INPUT_POST, 'raca_an', FILTER_SANITIZE_STRING);
		$idade = filter_input(INPUT_POST, 'idade_an', FILTER_SANITIZE_STRING);
		$sexo= filter_input(INPUT_POST, 'sexo_an', FILTER_SANITIZE_STRING);

	
				//Salvando a senha criptografada no banco 
		$sql = "INSERT INTO animal (nome_an, raca_an,idade_an,sexo_an) VALUES
		('$nome', '$raca','$idade','$sexo')";
		$comando = mysqli_query ($conn, $sql) or die(mysqli_error($conn));
		
	if ($comando)
	{
		$_SESSION['msg'] = "<p style='color=green;'>Usuario cadastrado com sucesso</p>";
		header ("Location: index_animal.php");
		
	}
	else
	{
		$_SESSION['msg'] = "<p style='color=red;'>Usuario não foi cadastrado com sucesso</p>";
		header ("Location: cad_animal.php"); 
	}
?>	