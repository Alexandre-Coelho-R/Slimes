<?php
$pagina_ativada = $pagina_ativada ?? "";
?>

<header>
    <a href="../../index.php" id="logo">
        <img src="assets/imagens/Logo.png" alt="Logo do projeto Pocket Slimes">
    </a>
    <div id="acoes-header">
        <a href="../../login.php">
            <i class="fa-solid fa-user"></i>
        </a>
        <a id="carrinho" href="../../carrinho.php">
            <i class="fa-solid fa-cart-shopping"></i>
        </a>
    </div>
</header>
    <nav id="header-navigation">
        <a href="../../index.php" class="<?php echo $pagina_ativada === "../../index.php" ? "ativo" : ""?>">
            <p>Início</p>
        </a>
        <a href="../../produtos.php" class="<?php echo $pagina_ativada === "../../produtos.php" ? "ativo" : ""?>">
            <p>Produtos</p>
        </a>
        <a href="../../tutoriais.php" class="<?php echo $pagina_ativada === "../../tutoriais.php" ? "ativo" : ""?>">
            <p>Tutoriais</p>
        </a>
        <a href="../../cartas.php" class="<?php echo $pagina_ativada === "../../cartas.php" ? "ativo" : ""?>">
            <p>Cartas</p>
        </a>
    </nav>
