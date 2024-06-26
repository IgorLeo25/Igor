<?php
session_start();
include_once("conexao.php");
    $codf = filter_input(INPUT_POST, 'cod_for', FILTER_SANITIZE_STRING);
    $nome = filter_input(INPUT_POST, 'nome_for', FILTER_SANITIZE_STRING);
    $cep = filter_input(INPUT_POST, 'cep_for', FILTER_SANITIZE_STRING);
    $cnpj = filter_input(INPUT_POST, 'cnpj_for', FILTER_SANITIZE_STRING);


    $sql = "UPDATE fornecedor SET nome_for = '$nome',cep_for='$cep',cnpj_for='$cnpj' WHERE cod_for= '$codf'";
    $resultado = mysqli_query($conn, $sql);

    if (($conn))
     {
        $_SESSION['msg'] = "<p style='color:green;'>Fornecedor atualizado com sucesso!</p>";
        header("Location: index_fornecedor.php");
    } else {
        $_SESSION['msg'] = "<p style='color:red;'>Erro ao atualizar o Fornecedor!</p>";
        header("Location: edit_Fornecedor.php");
    }



