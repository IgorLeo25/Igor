
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
		
  <title>Promoções</title>
  <style>
	body {
    font-family: Arial, Helvetica, sans-serif;
    background-color: #E6D432;
    text-align: center;
    color: black;
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

  .container {
    display: flex;
    flex-direction: column;
    justify-content: center;
    max-width: 500px; 
    
  }

  .promocao {
    border-radius:8px;
    text-align: center;
    border: 2px solid black;
    background-color: white;
    padding: 20px;
    margin: 0 auto;
    margin-bottom: 20px;
  }

  .promocao img {
    max-width: 400px;
    border: 2px solid black;
    height: auto;
    border-radius:8px;
    margin-bottom: 10px;
  }
  input[type="texto"],input[type="file"] {
    padding: 15px;
    border: 1px solid black;
    border-radius: 20px;
    color:black;
    font-size: 15px;
}
.input-like {
  padding: 15px;
    border: 1px solid black;
    border-radius: 20px;
    color:black;
    font-size: 15px;
  }
  </style>
</head>
<body>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	<a class="btn btn-light" href="cad_promocao.php" role="button">CADASTRAR</a>
	<a class="btn btn-light" href="index_promocao.php" role="button">LISTAR</a>
	<a class="btn btn-light" href="sair.php" role="button">SAIR DO SISTEMA</a>
	<a class="btn btn-light" href="principal.php" role="button">VOLTAR AO INÍCIO</a><form method="POST" action="proc_cad_promocoes.php" enctype="multipart/form-data">
  <br>
  <h1>Cadastrar Promoções</h1>
  <form method="POST" action="proc_edit_promocao.php?id=1" enctype="multipart/form-data">
  <label for="imagem">Imagem:</label>
  <br>
  <input type="file" name="imagem" id="imagem">
  <br>
  <label for="texto">Texto da Promoção:</label>
  <br>
  <textarea class="input-like" name="texto" id="texto" cols="30" rows="10"></textarea>
  <br>
  <input type="submit" value="Enviar" class="btn btn-primary">
</form>
</body>
</html>