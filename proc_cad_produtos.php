<?php 
	session_start();
	include_once("conexao.php");
	    
	    $codp = filter_input(INPUT_POST, 'cod_p', FILTER_SANITIZE_STRING);
		$nome = filter_input(INPUT_POST, 'nome_p', FILTER_SANITIZE_STRING);
		$descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
		
				//Salvando a senha criptografada no banco 
		$sql = "INSERT INTO produto(nome_p,descricao) VALUES
		( '$nome','$descricao')";
		$comando = mysqli_query ($conn, $sql) or die(mysqli_error($conn));
		
	if ($comando)
	{
		$_SESSION['msg'] = "<p style='color=green;'>Produto cadastrado com sucesso</p>";
		header ("Location: index_produtos.php");
		
	}
	else
	{
		$_SESSION['msg'] = "<p style='color=red;'>Não foi possivel cadastrar o produto</p>";
		header ("Location: cad_produtos.php"); 
	}
?>	