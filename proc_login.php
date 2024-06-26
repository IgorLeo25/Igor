<?php
session_start(); //iniciando sessão
include_once ("conexao.php");
$email = (filter_input (INPUT_POST, 'email', FILTER_SANITIZE_STRING));
$senha = MD5 (filter_input (INPUT_POST, 'senha', FILTER_SANITIZE_STRING));


$sql = "SELECT * FROM usuario WHERE email = '$email' and senha = '$senha' limit 1";
$comando = mysqli_query($conn, $sql);
$row_usuarios = mysqli_fetch_array($comando);

if (!empty ($row_usuarios['nome'])) //se achou alguma informação
{
	$_SESSION['msg'] = "<p style='color:green;'> Bem vindo ao Sistema, " 
	. $row_usuarios['nome']."!</p>";
	header("Location: principal.php"); 
}
else 
{
	$_SESSION['msg'] = "<p style='color:red;'> Email ou Senha incorretos!</p>";
	
	header ("Location: index.php");
	
}
?>

