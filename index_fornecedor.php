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
		<title>Fornecedores</title>
	</head>
	<style>
	body{
            font-family: Arial, Helvetica, sans-serif;
			background-color:#E6D432;
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
	<a class="btn btn-light" href="cad_fornecedor.php" role="button">CADASTRAR</a>
	<a class="btn btn-light" href="index_fornecedor.php" role="button">LISTAR</a>
	<a class="btn btn-light" href="sair.php" role="button">SAIR DO SISTEMA</a>
	<a class="btn btn-light" href="principal.php" role="button">VOLTAR AO INÍCIO</a>
	<center><h1>Fornecedores cadastrados</h1>
	<?php
if (isset($_SESSION['msg'])) //verificando o conteudo da variavel e mostrando
{
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}

//Receber o Numero da pagina
$pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

//setar a quantidade de itens por pagina
$qnt_result_pg = 4;

//calcular o inicio visualização
$inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

$sql = "SELECT * FROM fornecedor LIMIT $inicio, $qnt_result_pg";
$comando = mysqli_query($conn, $sql);
?>

<style>
table {
  border-collapse: collapse;
  background-color: black;
  border-radius: 10px;
  overflow: hidden;
}

td {
  border: 1px solid white;
  padding: 10px;
  color: white;
}

th {
  border: 1px solid white;
  padding: 10px;
  color: white;
  background-color: #333;
}

a {
  color: white;
  text-decoration: none;
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

.button-blue {
  background-color: #4287f5; /* cor azul */
}

.button-blue:hover {
  background-color: #3b73d3; /* cor azul mais escura quando hover */
}

.button-disabled {
  background-color: #cccccc; /* cor cinza */
  cursor: default;
}

.button-disabled:hover {
  background-color: #cccccc; /* manter a cor cinza quando hover */
}
</style><table>
    <thead>
        <tr>
            <th>Código</th>
            <th>Nome</th>
			<th>Cep</th>
      <th>Cnpj</th>
            <th>Ações</th>
			
        </tr>
    </thead>
    <tbody>
        <?php while ($row_fornecedor = mysqli_fetch_assoc($comando)) { ?>
            <tr>
                <td><?php echo $row_fornecedor['cod_for']; ?></td>
                <td><?php echo $row_fornecedor['nome_for']; ?></td>
                <td><?php echo $row_fornecedor['cep_for']; ?></td>
                <td><?php echo $row_fornecedor['cnpj_for']; ?></td>

            
                <td>
                    <a href='edit_fornecedor.php?codigo=<?php echo $row_fornecedor['cod_for']; ?>'class='btn btn-primary'>Editar</a>
                    <a href='delete_fornecedor.php?codigo=<?php echo $row_fornecedor['cod_for']; ?>'class='btn btn-danger'>Excluir</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<br>
<?php
$sql = "SELECT COUNT(cod_for) AS num_result FROM fornecedor";
$resultado_pg = mysqli_query($conn, $sql);
$row_pg = mysqli_fetch_assoc($resultado_pg);

$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);
$max_links = 2;

echo '<div style="display: flex; justify-content: center; align-items: center;">';

if ($pagina > 1) {
    echo '<a href="row_fornecedor.php?pagina='.($pagina - 1).'" style="background-color: blue; color: white; padding: 10px; border: none; border-radius: 5px; margin-right: 10px;">Anterior</a>';
}

for ($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++) {
    if ($pag_ant >= 1) {
        echo '<a href="row_fornecedor.php?pagina='.$pag_ant.'" style="background-color: blue; color: white; padding: 10px; border: none; border-radius: 5px; margin-right: 10px;">'.$pag_ant.'</a>';
    }
}

echo '<a href="#" style="background-color: blue; color: white; padding: 10px; border: none; border-radius: 5px; margin-right: 10px;">'.$pagina.'</a>';

for ($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++) {
    if ($pag_dep <= $quantidade_pg) {
        echo '<a href="index_fornecedor.php?pagina='.$pag_dep.'" style="background-color: blue; color: white; padding: 10px; border: none; border-radius: 5px; margin-right: 10px;">'.$pag_dep.'</a>';
    }
}

if ($pagina < $quantidade_pg) {
    echo '<a href="index_fornecedor.php?pagina='.($pagina + 1).'" style="background-color: blue; color: white; padding: 10px; border: none; border-radius: 5px; margin-right: 10px;">Próximo</a>';
}

echo '</div>';