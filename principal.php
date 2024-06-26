<!DOCTYPE html>
<html>
<head>
  <title>Pet Shop</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

  <header>
    <h1>Pet Shop</h1>
    <nav>
      <ul>
        
        <style>
    .navbar {
        display: flex;
        justify-content: flex-end;
        align-items: center;
    }

    .navbar .nav-item {
        margin-right: 10px;
    }
</style>

<nav class="navbar">
    <ul class="nav-list">
        <!-- Your navigation bar items here -->
        <li><a href="./principal.php">Inicio</a></li>
        <li><a href="./index_animal.php">Animais</a></li>
        <li><a href="./index_servico.php">Serviços</a></li>
        <li><a href="./index_produtos.php">Produtos</a></li>
        <li><a href="./index_promocao.php">Promoções</a></li>
        <li><a href="./index_fornecedor.php">Fornecedores</a></li>
        <li><a href="./index_relatorio.php">Relatórios</a></li>
    </ul>

    <button style="background-color: red; border: 2px; border-radius: 5px">
        <a href="./sair.php" style="color: white; text-decoration: none;">SAIR</a>
    </button>
</nav>
  </header>

  <section id="banner">
    <h2>Bem-vindo ao nosso Pet Shop!</h2>
    <p>Oferecemos uma variedade de serviços e produtos para o seu animal de estimação.</p>
    <a href="./index_servico.php" class="button">Agende um serviço</a>
  </section>
</body>
</html>
