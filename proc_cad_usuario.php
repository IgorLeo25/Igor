<?php 
	session_start();
	include_once("conexao.php");
	
		$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
		$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
		$senha = md5 (filter_input (INPUT_POST, 'senha', FILTER_SANITIZE_STRING));
				//Salvando a senha criptografada no banco 
		$sql = "INSERT INTO usuario (nome, email,senha) VALUES
		('$nome', '$email', '$senha')";
		$comando = mysqli_query ($conn, $sql);
		
	if (mysqli_insert_id($conn))
	{
		$_SESSION['msg'] = "<p style='color=green;'>Usuario cadastrado com sucesso</p>";
		header ("Location: index_usuario.php");
		
	}
	else
	{
		$_SESSION['msg'] = "<p style='color=red;'>Usuario não foi cadastrado com sucesso</p>";
		header ("Location: cad_usuario.php"); 
	}
?>	