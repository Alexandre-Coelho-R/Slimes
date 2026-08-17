<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Projeto escolar de informática do Colégio Técnico Industrial Prof. Isaac Portal Roldán chamado Pocket Slimes">
    <link rel="icon" href="assets/imagens/icone.svg" type="image/svg+xml">
    <link rel="stylesheet" href="assets/css/geral.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    
    <title>Pocket Slimes - <?= $titulo ?? ""?></title>
    <?php
    if (isset($css)) echo "<link rel='stylesheet' href='assets/css/$css'>";
    if (isset($js)) echo "<script src='assets/js/$js' type='module'></script>";
    ?>
</head>

<body>
<header>
    <a href="index.php" id="logo">
        <img src="assets/imagens/logo.webp" alt="Logo do projeto Pocket Slimes">
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
    <a href="index.php">
        <p>Início</p>
    </a>
    <a href="produtos.php">
        <p>Produtos</p>
    </a>
    <a href="tutoriais.php">
        <p>Tutoriais</p>
    </a>
    <a href="cartas.php">
        <p>Cartas</p>
    </a>
</nav>