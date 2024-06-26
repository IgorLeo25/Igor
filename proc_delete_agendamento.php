<?php 
session_start();
include_once("conexao.php");

$codigo = filter_input(INPUT_POST,'cod_age', FILTER_SANITIZE_STRING);
$nome = filter_input(INPUT_POST, 'nome_age', FILTER_SANITIZE_STRING);

$sql = "DELETE FROM agendamento WHERE cod_age= $codigo";
$comando = mysqli_query($conn, $sql);

if($conn->query($sql) === true)
{
	$_SESSION ['msg'] = "<p style='color:green;'>agendamento $nome excluido com sucesso!</p>";
	header("Location: index_agendamento.php");
	
}
else
{
	$_SESSION ['msg'] = "<p style='color:red;'>agendamento $nome não foi excluido!!!</p>";
	header("Location: index_agendamento.php");
}
?>
