<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include "assets/componentes/head.php"?>
    <script src="assets/js/cartas.js" defer></script>
    <link rel="stylesheet" href="assets/css/cartas.css">
    <title>Pocket Slimes - Cartas</title>
</head>

<body>
    <?php 
    $pagina_ativada = "cartas.php";
    include "assets/componentes/header.php";
    ?>

    <main>
        <h1>Cartas do Pocket Slimes</h1>
        <h2>Veja todas as cartas do jogo e monte seu deck!</h2>
        <nav id="filtros">
            <button id="todos" type="button">
                <i class="fa-solid fa-table-cells-large"></i>
                <p>Todas as cartas</p>
            </button>

            <button id="slimes" type="button">
                <i class="fa-solid fa-droplet"></i>
                <p>Slimes</p>
            </button>

            <button id="itens" type="button">
                <i class="fa-solid fa-flask"></i>
                <p>Itens</p>
            </button>

            <button id="acoes" type="button">
                <i class="fa-solid fa-bolt"></i>
                <p>Ações</p>
            </button>

            <button id="ferramentas" type="button">
                <i class="fa-solid fa-screwdriver-wrench"></i>
                <p>Ferramentas</p>
            </button>
        </nav>

        <section id="catalogo"></section>
        
        <section id="carta-ampliada"></section>

    </main>

    <?php include "assets/componentes/footer.php"?>
</body>
</html>