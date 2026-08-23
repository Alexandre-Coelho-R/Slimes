<?php 
$titulo = "Início";
$css = "index.css";
$js= "index.js";

include "assets/componentes/head-header.php";
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
        <img class="mySlides fade" src="assets/imagens/slideshow/BoosterSlide.png" style="width:100%">
        <img class="mySlides fade" src="assets/imagens/slideshow/BoosterSlide.png" style="width:100%">
        <img class="mySlides fade" src="assets/imagens/slideshow/BoosterSlide.png" style="width:100%">
    </div>
    
    <div style="text-align:center">
        <span class="dot" id="dot-1"></span> 
        <span class="dot" id="dot-2"></span> 
        <span class="dot" id="dot-3"></span> 
    </div>

    <nav id="other-pages">

        <a class="site-navigation" href="tutoriais.php">
            <img src="assets/imagens/index/pesquisarbanner.webp" alt="Banner">
            <div>
                <h2>Como Jogar?</h2>
                <p>Aprenda tudo o que precisa para jogar Slime Smash! Desde as regras básicas até conceitos mais avançados.</p>
            </div>
        </a>

        <a class="site-navigation" href="f-mvv.php">
            <img src="assets/imagens/index/slimeburaconegrobanner.webp" alt="Banner">
            <div>
                <h2>Conheça a gente mais a fundo</h2>
                <p>Entenda um pouco mais sobre a nossa empresa, nossas missões, visões e valores</p>
            </div>
        </a>
    
        <a class="site-navigation" href="faq.php">
            <img src="assets/imagens/index/slimeferreirobanner.webp" alt="Banner">
            <div>
                <h2>Como comprar e retirar seus produtos?</h2>
                <p>Aprenda como funciona a compra dos produtos de Slime Smash. Você verá como comprá-los no site, onde e quando retirá-los.</p>
            </div>
        </a>

        <a class="site-navigation" href="carrinho.php">
            <img src="assets/imagens/index/apostartudobanner.webp" alt="Banner">
            <div>
                <h2>Faça suas compras!</h2>
                <p>Veja todos os produtos de Slime Smash para comprar presencialmente, ou reservar para retirada.</p>
            </div>
        </a>
    </nav>
</main>

<?php include "assets/componentes/footer.php"?>