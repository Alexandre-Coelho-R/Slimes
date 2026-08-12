<?php 
$titulo = "Produtos";
$css = "produto.css";
$js = "produtos.js";
include "assets/componentes/head-header.php";
?>

<main class="pagina-produtos">

    <!-- BANNER -->
    <div class="banner-produtos">
        <img 
            src="assets/imagens/banner.webp" 
            alt="Banner da loja"
        >
    </div>

<section class="categoria">

    <h2 style="text-align: center;">Anciao fulcral</h2>

    <div class="carrossel">

        <button class="seta seta-esquerda">‹</button>

        <div class="produtos">

            <a href="deck.php?deck=anciao" class="produto">
                <div class="imagem-produto">
                    <img src="assets/imagens/cartas/ss_acaixa.webp">
                    <span class="quantidade">42<br><small>unid</small></span>
                </div>

                <p class="nome">67</p>
                <strong>R$ 67,00</strong>
            </a>


            <a href="deck.php?deck=outro-deck" class="produto">
                <div class="imagem-produto">
                    <img src="assets/imagens/cartas/ss_slimeferreiro.webp">
                    <span class="quantidade">67<br><small>unid</small></span>
                </div>

                <p class="nome">42</p>
                <strong>R$ 42,00</strong>
            </a>

        </div>

        <button class="seta seta-direita">›</button>

    </div>
</section>
</main>

<?php include "assets/componentes/footer.php"; ?>