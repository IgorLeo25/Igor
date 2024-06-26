<?php 
	session_start();
	include_once("conexao.php");
	
	$id = filter_input (INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
	$nome = filter_input (INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
	$email = filter_input (INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
	
	$sql = "UPDATE usuario SET nome='$nome', email='$email' WHERE id='$id'";
    $comando = mysqli_query ($conn, $sql);

if (mysqli_affected_rows($conn))
{
	$_SESSION['msg'] = "<p style='color:green;'>Usuario $nome editado com sucesso!</p>";
	header ("Location: index_usuario.php");
}	
else
{
	$_SESSION ['msg'] = "<p style='color:red;'>Usuario não foi editado com sucesso!</p>";
	header ("Location: edit_usuario.php?id=$id");
}