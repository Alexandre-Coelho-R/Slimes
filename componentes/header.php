<?php
$pagina_ativada = $pagina_ativada ?? "";
?>

<header>
    <a href="index.php" id="logo">
        <img src="imagens/logo.webp" alt="Logo do projeto Pocket Slimes">
    </a>

    <nav id="menus">
        <a href="index.php" class="<?php echo $pagina_ativada === "index.php" ? "ativo" : ""?>">
            <i class="fa-solid fa-house"></i>
            <p>Início</p>
        </a>
        <a href="produtos.php" class="<?php echo $pagina_ativada === "produtos.php" ? "ativo" : ""?>">
            <i class="fa-solid fa-box-open"></i>
            <p>Produtos</p>
        </a>
        <a href="tutoriais.php" class="<?php echo $pagina_ativada === "tutoriais.php" ? "ativo" : ""?>">
            <i class="fa-solid fa-gamepad"></i>
            <p>Tutoriais</p>
        </a>
        <a href="cartas.php" class="<?php echo $pagina_ativada === "cartas.php" ? "ativo" : ""?>">
            <i class="fa-solid fa-images"></i>
            <p>Cartas</p>
        </a>
    </nav>

    <div id="acoes-header">
        <a href="usuario.php">
            <i class="fa-solid fa-user"></i>
        </a>

        <a id="carrinho" href="carrinho.php">
            <i class="fa-solid fa-cart-shopping"></i>
        </a>

        <button id="menu-mobile" type="button">
            <i class="fa-solid fa-bars"></i>
        </button>
    </div>
</header>