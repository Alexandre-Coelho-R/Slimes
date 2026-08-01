<?php
$pagina_ativada = $pagina_ativada ?? "";
?>

<header>
    <a href="index.php" id="logo">
        <img src="imagens/logo_provisoria.png" alt="Logo do projeto Pocket Slimes">
    </a>
    <nav id="menus">
        <a href="index.php" class="<?php echo $pagina_ativada === "index.php" ? "ativo" : ""?>">
            <i class="fa-solid fa-house"></i>
            <p>Início</p>
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
</header>