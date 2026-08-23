<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Projeto de jogo de cartas de alunos do curso de informática do Colégio Técnico Industrial "Prof. Isaac Portal Roldán" chamado Slime Smash">
    <link rel="icon" href="assets/imagens/icone.svg" type="image/svg+xml">
    <link rel="stylesheet" href="assets/css/geral.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    
    <title>Slime Smash - <?= $titulo ?? ""?></title>
    <script src="assets/js/geral.js" defer></script>
    <?php
    if (isset($css)) echo "<link rel='stylesheet' href='assets/css/$css'>";
    if (isset($js)) echo "<script src='assets/js/$js' type='module'></script>";
    ?>
</head>

<body>
<header>
    <a href="index.php" id="logo">
        <img src="assets/imagens/logo.webp" alt="Logo do projeto Slime Smash">
    </a>
    <div id="acoes-header">
        <a href="usuario.php">
            <i class="fa-solid fa-user"></i>
        </a>
        <a id="carrinho" href="carrinho.php">
            <i class="fa-solid fa-cart-shopping"></i>
        </a>
    </div>
</header>

<nav id="header-navigation">
    <a href="index.php">Início</a>
    <a href="produtos.php">Produtos</a>
    <a href="tutoriais.php">Tutoriais</a>
    <a href="cartas.php">Cartas</a>
</nav>