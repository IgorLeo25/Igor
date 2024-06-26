<?php 
session_start();
include_once("conexao.php");

$codigo = filter_input(INPUT_POST,'cod_s', FILTER_SANITIZE_STRING);
$nome = filter_input(INPUT_POST, 'nome_s', FILTER_SANITIZE_STRING);

$sql = "DELETE FROM servico WHERE cod_s = $codigo";
$comando = mysqli_query($conn, $sql);

if($comando)
{
	$_SESSION ['msg'] = "<p style='color:green;'>serviço $nome excluido com sucesso!</p>";
	header("Location: index_servico.php");
	
}
else
{
	$_SESSION ['msg'] = "<p style='color:red;'>serviço $nome não foi excluido!!!</p>";
	header("Location: index_servico.php");
}
?>
