<?php
// Verifique se foi passado um ID de promoção válido através da URL
if (isset($_GET['codigo']) && !empty($_GET['codigo'])) {
  $id = $_GET['codigo'];

  // Conecte ao banco de dados
  $conexao = mysqli_connect("localhost", "root", "", "pet_shop");

  // Verifica se a conexão foi estabelecida corretamente
  if (mysqli_connect_errno()) {
    echo "Falha na conexão com o banco de dados: " . mysqli_connect_error();
    exit;
  }

  // Verifique se a imagem foi enviada e não ocorreu nenhum erro durante o upload
  if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === 0) {
    $imagem = $_FILES['imagem']['tmp_name'];

    // Processar e salvar a nova imagem no servidor
    $nome_imagem = $_FILES['imagem']['name'];
    $caminhoImagem = "imagens/" . $nome_imagem; // Especifique o diretório onde deseja salvar a imagem
    move_uploaded_file($imagem, $caminhoImagem);

    // Atualizar a coluna "imagem" no banco de dados com o novo caminho da imagem
    $queryAtualizacaoImagem = "UPDATE promocao SET imagem = '$caminhoImagem' WHERE cod_prom = $id";
    mysqli_query($conexao, $queryAtualizacaoImagem);
  }

  // Verifique se o texto foi enviado
  if (isset($_POST['texto'])) {
    $novoTexto = $_POST['texto'];

    // Atualizar a coluna "texto" no banco de dados com o novo texto
    $queryAtualizacaoTexto = "UPDATE promocao SET texto = '$novoTexto' WHERE cod_prom = $id";
    mysqli_query($conexao, $queryAtualizacaoTexto);
  }

  // Redirecionar de volta para a página de listagem de promoções
  header("Location: index_promocao.php");
  exit();

  // Feche a conexão com o banco de dados
  mysqli_close($conexao);
} else {
  echo "ID de promoção inválido.";
}
?>
