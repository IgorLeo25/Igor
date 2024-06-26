<?php
if (isset($_POST['codigo'])) {
  $id = $_POST['codigo'];

  // Conecte ao banco de dados
  $conexao = mysqli_connect("localhost", "root", "", "pet_shop");

  // Verifica se a conexão foi estabelecida corretamente
  if (mysqli_connect_errno()) {
    echo "Falha na conexão com o banco de dados: " . mysqli_connect_error();
    exit;
  }

  // Recupere o nome do arquivo da promoção com base no ID fornecido
  $query = "SELECT imagem FROM promocao WHERE cod_prom = $id";
  $resultado = mysqli_query($conexao, $query);

  if (mysqli_num_rows($resultado) > 0) {
    $promocao = mysqli_fetch_assoc($resultado);
    $nomeImagem = $promocao['imagem'];

    // Caminho completo para a imagem
    $caminhoImagem =  $nomeImagem;

    // Exclua a imagem do sistema de arquivos
    if (unlink($caminhoImagem)) {
      echo "Imagem excluída com sucesso.";

      // Excluir a promoção do banco de dados
      $query = "DELETE FROM promocao WHERE cod_prom = $id";
      mysqli_query($conexao, $query);

      // Redirecionar de volta para a página de listagem de promoções
      header("Location: index_promocao.php");
      exit();
    } else {
      echo "Falha ao excluir a imagem.";
    }
  } else {
    echo "Promoção não encontrada.";
  }

  // Feche a conexão com o banco de dados
  mysqli_close($conexao);
} else {
  echo "ID de promoção inválido.";
}
?>
