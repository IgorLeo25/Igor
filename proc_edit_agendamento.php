<?php
session_start();
include_once("conexao.php");

$cod_age = filter_input(INPUT_POST, 'cod_age', FILTER_SANITIZE_NUMBER_INT);
$nome_age = filter_input(INPUT_POST, 'nome_age', FILTER_SANITIZE_STRING);
$data_age = filter_input(INPUT_POST, 'data_age', FILTER_SANITIZE_STRING);
$hora_age = filter_input(INPUT_POST, 'hora_age', FILTER_SANITIZE_STRING);
$servico_age = filter_input(INPUT_POST, 'servico_age', FILTER_SANITIZE_STRING);

// Atualizando os dados do agendamento no banco de dados
$sql = "UPDATE agendamento SET nome_age = '$nome_age', data_age = '$data_age', hora_age = '$hora_age', servico_age = '$servico_age' WHERE cod_age = '$cod_age'";
$comando = mysqli_query($conn, $sql);

if ($comando) {
    $_SESSION['msg'] = "<p style='color: green;'>Agendamento atualizado com sucesso</p>";
    header("Location: index_agendamento.php");
    exit();
} else {
    $_SESSION['msg'] = "<p style='color: red;'>Falha ao atualizar o agendamento</p>";
    header("Location: edit_agendamento.php?codigo=" . $cod_age);
    exit();
}
?>
