<?php 
session_start();
include_once("conexao.php");

$codigo = filter_input(INPUT_POST,'cod_for', FILTER_SANITIZE_STRING);
$nome = filter_input(INPUT_POST, 'nome_for', FILTER_SANITIZE_STRING);

$sql = "DELETE FROM fornecedor WHERE cod_for = $codigo";
$comando = mysqli_query($conn, $sql);

if($comando)
{
	$_SESSION ['msg'] = "<p style='color:green;'>Fornecedor $nome excluido com sucesso!</p>";
	header("Location: index_fornecedor.php");
	
}
else
{
	$_SESSION ['msg'] = "<p style='color:red;'>Fornecedor $nome não foi excluido!!!</p>";
	header("Location: index_fornecedor.php");
}
?>
