<?php 
session_start();
include_once("conexao.php");

$codigo = filter_input(INPUT_POST,'cod_p', FILTER_SANITIZE_STRING);
$nome = filter_input(INPUT_POST, 'nome_p', FILTER_SANITIZE_STRING);

$sql = "DELETE FROM produto WHERE cod_p = $codigo";
$comando = mysqli_query($conn, $sql);

if($comando)
{
	$_SESSION ['msg'] = "<p style='color:green;'>Produto $nome excluido com sucesso!</p>";
	header("Location: index_produtos.php");
	
}
else
{
	$_SESSION ['msg'] = "<p style='color:red;'>Produto $nome não foi excluido!!!</p>";
	header("Location: index_produtos.php");
}
?>
