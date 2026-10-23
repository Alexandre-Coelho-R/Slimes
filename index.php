<?php 
include "assets/funcoes/utilidades.php";

$titulo = "Início";
$css = "index.css";
$js= "index.js";
include "_cabecalho.php";
?>

<main>
    <section id="hero-section">
        <img src="assets/imagens/banner.webp" alt="Banner">
        
        <h1 class="hero-title">SLIME SMASH</h1>
        <h2 class="hero-subtitle">O melhor jogo de cartas do CTI</h2>

        <div id="hero-buttons">
            <a href="#other-pages">
                <i class="fa fa-search-plus" aria-hidden="true"></i>
                Conheça mais
            </a>
            <a href="produtos.php">
                Comprar agora
                <i class="fa-solid fa-cart-shopping"></i>
            </a>
        </div>
    </section>

    <div id="slideshow-container">
        <a href="produtos.php"><img class="mySlides fade" src="assets/imagens/index/boosterSlide.webp" style="width:100%"></a>
        <a href="produtos.php"><img class="mySlides fade" src="assets/imagens/index/decksslide.webp" style="width:100%"></a>
    </div>
    
    <div style="text-align:center">
        <span class="dot" id="dot-1"></span> 
        <span class="dot" id="dot-2"></span> 
    </div>
    <nav id="other-pages">

        <a class="site-navigation" href="tutoriais.php">
            <img src="assets/imagens/index/pesquisarbanner.webp" alt="Banner">
            <h2>Como Jogar</h2>
        </a>

        <a class="site-navigation" href="f-sobre-nos.php">
            <img src="assets/imagens/index/slimeburaconegrobanner.webp" alt="Banner">
            <h2>Conheça a gente melhor</h2>
        </a>
    
        <a class="site-navigation" href="faq.php">
            <img src="assets/imagens/index/slimeferreirobanner.webp" alt="Banner">
            <h2>Perguntas frequentes</h2>
        </a>

        <a class="site-navigation" href="produtos.php">
            <img src="assets/imagens/index/apostartudobanner.webp" alt="Banner">
            <h2>Nossos produtos</h2>
        </a>
    </nav>

    <h3 id="texto-video">Veja nosso tutorial do jogo:</h3>
    <div id="video-index">
        <iframe
            src="https://www.youtube.com/embed/uBrBRnzYqrk"
            style="width: 100%; height: 100%; border: none;"
            title="YouTube video player"
            allowfullscreen>
        </iframe>
    </div> 
</main>

<?php include "_rodape.php"; ?>