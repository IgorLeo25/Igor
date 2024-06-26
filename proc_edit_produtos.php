<?php
session_start();
include_once("conexao.php");
    $cod = filter_input(INPUT_POST, 'cod_p', FILTER_SANITIZE_STRING);
    $nome = filter_input(INPUT_POST, 'nome_p', FILTER_SANITIZE_STRING);
    $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
 
    

    $sql = "UPDATE produto SET nome_p = '$nome',  descricao = '$descricao' WHERE cod_p = '$cod'";
    $conn = mysqli_query($conn, $sql);

    if ($conn)
     {
        $_SESSION['msg'] = "<p style='color:green;'>Produto atualizado com sucesso!</p>";
        header("Location: index_produtos.php");
    } else {
        $_SESSION['msg'] = "<p style='color:red;'>Erro ao atualizar o produto!</p>";
        header("Location: edit_produtos.php");
    }



