<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Formulário de Cadastro de Agendamento</title>
    <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
      background-color: pink;
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
    input[type="text"] {
        padding: 15px;
        border-radius: 20px;
        color: gray;
        font-size: 15px;
    }

    div {
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
    <a class="btn btn-light" href="cad_agendamento.php" role="button">CADASTRAR</a>
    <a class="btn btn-light" href="index_agendamento.php" role="button">LISTAR</a>
    <a class="btn btn-light" href="sair.php" role="button">SAIR DO SISTEMA</a>
    <a class="btn btn-light" href="principal.php" role="button">VOLTAR AO INÍCIO</a>
    <div style="background-color: white; border-radius: 15px; padding: 70px; position: absolute; top: 50%; left: 50%; transform: translate(-50%,-50%);">
      
    <h2>Formulário de Agendamento</h2>

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

    <form action="proc_cad_agendamento.php" method="post">
        <label for="nome_age">Nome do Animal:</label>
        <select name="nome_age">
            <?php
            // Exibindo as opções para o nome do animal
            if ($result_animal->num_rows > 0) {
                while ($row = $result_animal->fetch_assoc()) {
                    echo "<option value='" . $row['nome_an'] . "'>" . $row['nome_an'] . "</option>";
                }
            }
            ?>
        </select>
        <br><br>

        <label for="data_age">Data do Agendamento:</label>
        <input type="date" name="data_age">
        <br><br>

        <label for="hora_age">Hora do Agendamento:</label>
        <input type="time" name="hora_age">
        <br><br>

        <label for="servico_age">Nome do Serviço:</label>
        <select name="servico_age">
            <?php
            // Exibindo as opções para o nome do serviço
            if ($result_servico->num_rows > 0) {
                while ($row = $result_servico->fetch_assoc()) {
                    echo "<option value='" . $row['nome_s'] . "'>" . $row['nome_s'] . "</option>";
                }
            }
            ?>
        </select>
        <br><br>

        <input type="submit" value="Agendar" class="btn btn-primary">
    </form>

    <?php
    // Fechando a conexão com o banco de dados
    $conn->close();
    ?>


    </div>
</body>
</html>
