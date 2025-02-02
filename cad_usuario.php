<?php
   session_start();
?>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <title>Cadastrar Usuário</title>
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
	input[type="text"],input[type="email"], input[type="password"] {
    padding: 15px;
            border-radius: 20px;
            color:gray;
            font-size: 15px;
}

div{
            position: absolute;
            top: 35%;
            left: 50%;
            transform: translate(-50%,-50%);
            padding: 80px;
            border-radius: 15px;
            color: black;
        }

</style>
</head>

	<body>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	<a class="btn btn-light" href="cad_usuario.php" role="button">CADASTRAR</a>
	<a class="btn btn-light" href="index_usuario.php" role="button">LISTAR</a>
	<a class="btn btn-light" href="sair.php" role="button">SAIR DO SISTEMA</a>
	<a class="btn btn-light" href="principal.php" role="button">VOLTAR AO INÍCIO</a>
  <div style="background-color: white; border-radius: 15px; padding: 70px; position: absolute; top: 60%; left: 50%; transform: translate(-50%,-50%);">
	
		<center><h1>Cadastrar Usuário</h1>
		<?php
		if(isset ($_SESSION['msg']))
		{
		echo $_SESSION['msg'];
		unset ($_SESSION['msg']);
		
		}
		?>
		
			<?php
			if(isset ($_SESSION['msg'])) 
		{
			echo $_SESSION['msg'];
			unset ($_SESSION['msg']);
		
		}
		?>
<form method="POST" action="proc_cad_usuario.php">
  <label>Nome:</label>
  <input type="text" name="nome" required placeholder="Digite o nome completo" class="form-control rounded input-spacing"><br>
  
  <label>E-mail:</label>
  <input type="email" name="email" required placeholder="Digite o seu email" class="form-control rounded input-spacing"><br>
  
  <label>Senha:</label>
  <input type="password" name="senha" required placeholder="Digite a sua senha" class="form-control rounded input-spacing"><br>
  
  <input type="submit" value="Cadastrar" class="btn btn-primary">
</form>
  </div>

	
	</body>
			</html>