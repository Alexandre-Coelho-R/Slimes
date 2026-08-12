<?php 
$titulo = "Deck";
$css = "deck.css";
$js = "produtos.js";

include "assets/componentes/lista-deck.php";
include "assets/componentes/head-header.php";

$deck = $_GET['deck'] ?? '';

if (!isset($decks[$deck])) {
    die("Deck não encontrado.");
}

$produto = $decks[$deck];
?>

<main class="pagina-deck">

    <section class="cabecalho-deck">

        <div>
            <h1><?= $produto['nome'] ?></h1>
        </div>

        <div class="valor-deck">
            <span>Valor do Deck</span>
            <strong><?= $produto['preco'] ?></strong>
        </div>

    </section>


    <section class="conteudo-deck">

        <div class="lista-cartas">

            <?php foreach ($produto['cartas'] as $carta): ?>

                <div 
                    class="linha-carta"
                    data-imagem="assets/imagens/cartas/<?= $carta['imagem'] ?>"
                >

                    <span class="qtd">
                        <?= $carta['qtd'] ?>
                    </span>

                    <span class="nome-carta">
                        <?= $carta['nome'] ?>
                    </span>

                </div>

            <?php endforeach; ?>

        </div>


        <div class="carta-preview">

            <img 
                id="carta-destaque"
                src="assets/imagens/cartas/<?= $produto['cartas'][0]['imagem'] ?>"
                alt="Carta selecionada"
            >

        </div>

    </section>

</main>

<?php include "assets/componentes/footer.php"?>