<?php
    session_start();
    include_once("conexao.php"); // incluindo a conexão com o banco de dados
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Pet Shop</title>
    <style>
        html {
  font-family: Arial, sans-serif;
  background-image: url("login.jpg");
  background-size: cover;
  margin: 0;
  padding: 0;
}
        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            color:#AEB404;
        }

        .page {
            display: flex;
            flex-direction: column;
            align-items: center;
            align-content: center;
            justify-content: center;
            width: 100%;
            height: 100vh;
        }

        .formLogin {
    display: flex;
    flex-direction: column;
    background-color: rgba(255, 255, 255, 0.5); /* Semi-transparent background */
    border-radius: 7px;
    padding: 40px;
    border: 2px solid rgba(255, 255, 255, 0.5);
    box-shadow: 10px 10px 40px rgba(255, 255, 255, 0.5);
    backdrop-filter: blur(20px); /* Frosted effect */
    gap: 5px;
}


        .formLogin h1 {
            padding: 0;
            margin: 0;
            font-weight: 500;
            font-size: 2.3em;
        }

        .formLogin p {
            display: inline-block;
            font-size: 14px;
            color: #666;
            margin-bottom: 25px;
        }

        .formLogin input {
            padding: 15px;
            font-size: 14px;
            border: 1px solid #ccc;
            margin-bottom: 20px;
            margin-top: 5px;
            border-radius: 4px;
            transition: all linear 160ms;
            outline: none;
        }

        .formLogin input:focus {
            border: 1px solid #AEB404;
        }

        .formLogin label {
            font-size: 14px;
            font-weight: 600;
        }

        .formLogin a {
            display: inline-block;
            margin-bottom: 20px;
            font-size: 13px;
            color: #555;
            transition: all linear 160ms;
        }

        .formLogin a:hover {
            color: #f72585;
        }

        .btn {
    background-color: #F3F781;
    color: black;
    font-size: 14px;
    font-weight: 600;
    border: 2px solid #D7DF01;
    border-radius: 10px;
    transition: all linear 160ms;
    cursor: pointer;
    width: 300px;
    height: 50px;
    margin: 0;
}

.btn:hover {
    transform: scale(1.05);
    background-color:#D7DF01;
    border-color: #AEB404;
}

    </style>
</head>
<body>
    <div class="page">
        <form action="proc_login.php" method="POST" class="formLogin">
            <h1>Login Pet Shop</h1>
            <?php
                if(isset($_SESSION['msg'])) {
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
            ?>
            <p>Digite os seus dados de acesso no campo abaixo.</p>
            <label for="email">E-mail</label>
            <input type="text" placeholder="Digite seu e-mail" name="email" required autofocus="true" />

                <label>Senha:</label>
                  <input type="password" placeholder="Senha" name= "senha"></td>
                        <br><br>
                   
                    <button class='btn'>Entrar no Sistema</button><br><br>
                    <button class='btn'><a href="./cad_usuario.php">Cadastrar</a></button>
                    </tr>
                </form>
            </td>
        </tr>
    </div>
</body>
</html