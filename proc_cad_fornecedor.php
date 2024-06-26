<?php 
	session_start();
	include_once("conexao.php");
	    
	    $codf = filter_input(INPUT_POST, 'cod_for', FILTER_SANITIZE_STRING);
		$nome = filter_input(INPUT_POST, 'nome_for', FILTER_SANITIZE_STRING);
		$cep = filter_input(INPUT_POST, 'cep_for', FILTER_SANITIZE_STRING);
		$cnpj = filter_input(INPUT_POST, 'cnpj_for', FILTER_SANITIZE_STRING);
		
				//Salvando a senha criptografada no banco 
		$sql = "INSERT INTO fornecedor(nome_for,cep_for,cnpj_for) VALUES
		( '$nome','$cep','$cnpj')";
		$comando = mysqli_query ($conn, $sql) or die(mysqli_error($conn));
		
	if ($comando)
	{
		$_SESSION['msg'] = "<p style='color=green;'>Fornecedor cadastrado com sucesso</p>";
		header ("Location: index_fornecedor.php");
		
	}
	else
	{
		$_SESSION['msg'] = "<p style='color=red;'>Não foi possivel cadastrar o fornecedor</p>";
		header ("Location: cad_fornecedor.php"); 
	}
?>	