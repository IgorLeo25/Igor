<?php
session_start();
include_once("conexao.php");
    $cod = filter_input(INPUT_POST, 'cod_s', FILTER_SANITIZE_STRING);
    $nome = filter_input(INPUT_POST, 'nome_s', FILTER_SANITIZE_STRING);
    $codus = filter_input(INPUT_POST, 'cod_us', FILTER_SANITIZE_STRING);
    $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
 
    

    $sql = "UPDATE servico SET nome_s = '$nome', cod_us = '$codus', descricao = '$descricao' WHERE cod_s = '$cod'";
    $conn = mysqli_query($conn, $sql);

    if ($conn)
     {
        $_SESSION['msg'] = "<p style='color:green;'>Materia atualizado com sucesso!</p>";
        header("Location: index_servico.php");
    } else {
        $_SESSION['msg'] = "<p style='color:red;'>Erro ao atualizar o curso!</p>";
        header("Location: edit_servico.php");
    }



