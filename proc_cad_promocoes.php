<?php
// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Verifica se a imagem foi enviada corretamente
  if (isset($_FILES["imagem"]) && $_FILES["imagem"]["error"] == 0) {
    // Define o diretório onde a imagem será salva
    $diretorio = "imagens/";
    // Obtém o nome da imagem
    $nome_imagem = $_FILES["imagem"]["name"];
    // Move a imagem para o diretório especificado
    move_uploaded_file($_FILES["imagem"]["tmp_name"], $diretorio . $nome_imagem);
    // Obtém o texto digitado pelo usuário
    $texto = $_POST["texto"];
    // Conecta ao banco de dados
    $conexao = mysqli_connect("localhost", "root", "", "pet_shop");
    // Insere os dados na tabela do banco de dados
    $query = "INSERT INTO promocao (imagem, texto) VALUES ('$diretorio$nome_imagem', '$texto')";
    mysqli_query($conexao, $query);
    // Fecha a conexão com o banco de dados
    mysqli_close($conexao);
    // Redireciona o usuário para uma página de sucesso
    header("Location: index_promocao.php");
    exit;
  } else {
    // Se a imagem não foi enviada corretamente, exibe uma mensagem de erro
    echo "Erro ao enviar a imagem.";
  }
}
?>
