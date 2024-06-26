<?php
session_start();
include_once("conexao.php");
    $cod = filter_input(INPUT_POST, 'cod_an', FILTER_SANITIZE_STRING);
    $nome = filter_input(INPUT_POST, 'nome_an', FILTER_SANITIZE_STRING);
    $raca = filter_input(INPUT_POST, 'raca_an', FILTER_SANITIZE_STRING);
    $idade = filter_input(INPUT_POST, 'idade_an', FILTER_SANITIZE_STRING);
    $sexo = filter_input(INPUT_POST, 'sexo_an', FILTER_SANITIZE_STRING);
    

    $sql = "UPDATE animal SET nome_an = '$nome',idade_an='$idade',raca_an='$raca',sexo_an='$sexo' WHERE cod_an = '$cod'";
    $resultado = mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn))
     {
        $_SESSION['msg'] = "<p style='color:green;'>Animal atualizado com sucesso!</p>";
        header("Location: index_animal.php");
    } else {
        $_SESSION['msg'] = "<p style='color:red;'>Erro ao atualizar o Animal!</p>";
        header("Location: edit_animal.php");
    }



