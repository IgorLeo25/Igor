<?php 
session_start();
include_once("conexao.php");

$codigo = filter_input(INPUT_POST,'cod_an', FILTER_SANITIZE_STRING);
$nome = filter_input(INPUT_POST, 'nome_an', FILTER_SANITIZE_STRING);

$sql = "DELETE FROM animal WHERE cod_an= $codigo";
$comando = mysqli_query($conn, $sql);

if($conn->query($sql) === true)
{
	$_SESSION ['msg'] = "<p style='color:green;'>animal $nome excluido com sucesso!</p>";
	header("Location: index_animal.php");
	
}
else
{
	$_SESSION ['msg'] = "<p style='color:red;'>animal $nome não foi excluido!!!</p>";
	header("Location: index_animal.php");
}
?>
