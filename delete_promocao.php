<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
		
  <title>Promoções</title>
  <style>
    body{
            font-family: Arial, Helvetica, sans-serif;
			background-color:pink;
			text-align: center;
			 color: white;

        }
	ul {
		list-style-type: none;
		margin: 0;
		padding: 0;
		overflow: hidden;
		background-color: #F5FFFA;
	}

		li {
		float: left;
	}

		li a {
		display: block;
		color: white;
		text-align: center;
		padding: 14px 16px;
		text-decoration: none;
	}

	li a:hover {
  background-color: #111;
	}
    table {
        border: 1px solid black;
        border-collapse: collapse;
        background-color: black;
        border-radius: 10px;
    }
    
    th, td {
        border: 1px solid white;
        padding: 8px;
        text-align: left;
        color: white;
    }
	.button {
  background-color: #4CAF50; /* cor verde */
  border: none;
  color: white;
  padding: 12px 30px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 5px;
}
  </style>
</head>
<body>
  <a class="btn btn-light" href="cad_promocao.php" role="button">CADASTRAR</a>
  <a class="btn btn-light" href="index_promocao.php" role="button">LISTAR</a>
  <a class="btn btn-light" href="sair.php" role="button">SAIR DO SISTEMA</a>
  <a class="btn btn-light" href="principal.php" role="button">VOLTAR AO INÍCIO</a>
  <br>
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

      // Recupere os dados da promoção com base no ID fornecido
      $query = "SELECT texto FROM promocao WHERE cod_prom = $id";
      $resultado = mysqli_query($conexao, $query);

      if (mysqli_num_rows($resultado) > 0) {
        $promocao = mysqli_fetch_assoc($resultado);
        $textoPromocao = $promocao['texto'];

        // Exiba a tela de confirmação
  ?>
  <br>
        <div style="display: flex; justify-content: center; align-items: center;">
          <table>
            <tr>
              <th>Código</th>
              <th>Promoção</th>
            </tr>
            <tr>
              <td><?php echo $id; ?></td>
              <td><?php echo $textoPromocao; ?></td>
            </tr>
          </table>
        </div>
        <h1>Deseja excluir esta Promoção?</h1>
        <form action="proc_delete_promocao.php" method="POST">
          <input type="hidden" name="codigo" value="<?php echo $id; ?>">
          <input type="submit" value="Sim" class="btn btn-primary">
          <a href="index_promocao.php" class="btn btn-danger">Não </a> 
</form>

  <?php }
   else
    { echo "Promoção não encontrada."; } 
    // Fecha a conexão com o banco de dados
     mysqli_close($conexao); } else { echo "ID de promoção inválido."; } ?> 
</body> 
</html> ``
