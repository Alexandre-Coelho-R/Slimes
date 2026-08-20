<?php 
$titulo = "Cartas";
$css = "principais.css";
$js = "cartas.js";
include "assets/componentes/head-header.php";
?>

<main>
    <h1 class="title">Cartas de Slime Smash</h1>
    <h2 class="subtitle">Veja todas as cartas do jogo e monte seu deck!</h2>

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