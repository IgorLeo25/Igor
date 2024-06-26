<?php 
	session_start();
	include_once ("conexao.php");
	$codigo = filter_input(INPUT_GET, 'codigo', FILTER_SANITIZE_NUMBER_INT);
	$sql = "SELECT * FROM agendamento WHERE cod_age = '$codigo'";
	$comando = mysqli_query($conn, $sql);
	$row_agendamento = mysqli_fetch_assoc($comando);
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
		<title>	Editar Agendamento</title>
	</head>
	<style>
	body {
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
	form {
		display: flex;
		flex-direction: column;
		align-items: center;
		padding: 20px;
		margin-top: 50px;
	}
	label {
		font-size: 20px;
		margin-bottom: 10px;
	}
	input[type="text"],
	input[type="number"] {
		padding: 10px;
		border: 1px solid blue;
		border-radius: 5px;
		margin-bottom: 20px;
		width: 100%;
		max-width: 400px;
	}
	input[type="submit"] {
		background-color: blue;
		color: white;
		border: none;
		border-radius: 5px;
		padding: 10px;
		font-size: 20px;
		cursor: pointer;
	}
	input[type="submit"]:hover {
		background-color: darkblue;
	}
</style>

<body>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	<a class="btn btn-light" href="cad_agendamento.php" role="button">CADASTRAR</a>
	<a class="btn btn-light" href="index_agendamento.php" role="button">LISTAR</a>
	<a class="btn btn-light" href="sair.php" role="button">SAIR DO SISTEMA</a>
	<a class="btn btn-light" href="principal.php" role="button">VOLTAR AO INÍCIO</a>
		<center><h1>Editar Agendamento </h1>
<?php
		if(isset($_SESSION['msg']))
		{
		echo $_SESSION['msg'];
		unset($_SESSION['msg']);
		}
?>

<?php
    // Configurações de conexão com o banco de dados
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pet_shop";

    // Criando conexão com o banco de dados
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificando se a conexão foi estabelecida com sucesso
    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    // Consulta SQL para buscar os nomes dos animais
    $sql_animal = "SELECT nome_an FROM animal";
    $result_animal = $conn->query($sql_animal);

    // Consulta SQL para buscar os nomes dos serviços
    $sql_servico = "SELECT nome_s FROM servico";
    $result_servico = $conn->query($sql_servico);
    ?>

    <form method="POST" action="proc_edit_agendamento.php">
    <input type="hidden" name="cod_age" value="<?php echo $row_agendamento['cod_age']; ?>">

    <label for="nome_age">Nome do Animal:</label>
    <select name="nome_age">
        <?php
        // Exibindo as opções para o nome do animal
        if ($result_animal->num_rows > 0) {
            while ($row = $result_animal->fetch_assoc()) {
                $selected = ($row['nome_an'] == $row_agendamento['nome_age']) ? 'selected' : '';
                echo "<option value='" . $row['nome_an'] . "' " . $selected . ">" . $row['nome_an'] . "</option>";
            }
        }
        ?>
    </select>
    <br><br>

    <label for="data_age">Data do Agendamento:</label>
    <input type="date" name="data_age" value="<?php echo $row_agendamento['data_age']; ?>">
    <br><br>

    <label for="hora_age">Hora do Agendamento:</label>
    <input type="time" name="hora_age" value="<?php echo $row_agendamento['hora_age']; ?>">
    <br><br>

    <label for="servico_age">Nome do Serviço:</label>
    <select name="servico_age">
        <?php
        // Exibindo as opções para o nome do serviço
        if ($result_servico->num_rows > 0) {
            while ($row = $result_servico->fetch_assoc()) {
                $selected = ($row['nome_s'] == $row_agendamento['servico_age']) ? 'selected' : '';
                echo "<option value='" . $row['nome_s'] . "' " . $selected . ">" . $row['nome_s'] . "</option>";
            }
        }
        ?>
    </select>
    <br><br>

    <input type="submit" value="Editar" class="btn btn-primary">
</form>

<?php
// Fechando a conexão com o banco de dados
$conn->close();
?>


</body>
</html>
