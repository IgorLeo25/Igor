<?php
session_start(); //iniciando sessão
include_once ("conexao.php");
//garantindo a quebra da sessão 
?>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
		<title>Relatórios</title>
	</head>
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
	</style>
	<body>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	
	<a class="btn btn-light" href="sair.php" role="button">SAIR DO SISTEMA</a>
	<a class="btn btn-light" href="principal.php" role="button">VOLTAR AO INÍCIO</a>
	<center><h1> Relatórios</h1>
            
<br>
	<body>
	<div style="background-color: white; border-radius: 15px; padding: 70px; position: absolute; top: 50%; left: 50%; transform: translate(-50%,-50%); display: flex; flex-direction: column; align-items: center;">
	<ul style="margin-bottom: 20px;">
		<button style="margin-bottom: 10px; display: block;" class="btn btn-primary"><a href="relatorio_agendamento.php" style="color: white; text-decoration: none;">Relatório agendamento</a></button>
		<button style="margin-bottom: 10px; display: block;" class="btn btn-primary"><a href="relatorio_animal.php" style="color: white; text-decoration: none;">Relatório animal</a></button>
		<button style="margin-bottom: 10px; display: block;" class="btn btn-primary"><a href="relatorio_fornecedor.php" style="color: white; text-decoration: none;">Relatório fornecedor</a></button>
		<button style="margin-bottom: 10px; display: block;" class="btn btn-primary"><a href="relatorio_produtos.php" style="color: white; text-decoration: none;">Relatório produtos</a></button>
		<button style="margin-bottom: 10px; display: block;" class="btn btn-primary"><a href="relatorio_promocao.php" style="color: white; text-decoration: none;">Relatório promoção</a></button>
		<button style="margin-bottom: 10px; display: block;" class="btn btn-primary"><a href="relatorio_servico.php" style="color: white; text-decoration: none;">Relatório serviços</a></button>
	</ul>
</div>


</body>
</html>

	
	
	