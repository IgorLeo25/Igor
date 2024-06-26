<?php 
	session_start();
	include_once("conexao.php");
	
		$nome = filter_input(INPUT_POST, 'nome_s', FILTER_SANITIZE_STRING);
		$codus = filter_input(INPUT_POST, 'cod_us', FILTER_SANITIZE_STRING);
		$descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
		
				//Salvando a senha criptografada no banco 
		$sql = "INSERT INTO servico(nome_s,cod_us,descricao) VALUES
		('$nome', '$codus','$descricao')";
		$comando = mysqli_query ($conn, $sql) or die(mysqli_error($conn));
		
	if ($comando)
	{
		$_SESSION['msg'] = "<p style='color=green;'>Usuario cadastrado com sucesso</p>";
		header ("Location: index_servico.php");
		
	}
	else
	{
		$_SESSION['msg'] = "<p style='color=red;'>Usuario não foi cadastrado com sucesso</p>";
		header ("Location: cad_servico.php"); 
	}
?>	