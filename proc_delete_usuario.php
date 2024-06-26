<?php 
session_start();
include_once("conexao.php");

$id = filter_input(INPUT_POST,'id', FILTER_SANITIZE_STRING);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);

$sql = "DELETE FROM usuario WHERE id = $id";
$comando = mysqli_query($conn, $sql);

if($conn->query($sql) === true)
{
	$_SESSION ['msg'] = "<p style='color:green;'>Usuario $nome excluido com sucesso!</p>";
	header("Location: index_usuario.php");
	
}
else
	{
		$_SESSION ['msg'] = "<p style='color:red;'>Usuario $nome não foi excluido!!!</p>";
	header("Location: index_usuario.php");
	}
?>