<?php 
$titulo = "Início";
$css = "index.css";
$js='slideshow.js';
include "assets/componentes/head-header.php";
?>

<main>
    <section id="hero-section">
        <img src="assets/imagens/banner.webp" alt="Banner">
        
        <h1 class="hero-title">SLIME SMASH</h1>
        <h2 class="hero-subtitle">O melhor jogo TCG do CTI</h2>

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

        <div class="slideshow-container">

        <div class="mySlides fade">
        <img src="assets/imagens/Banner.webp" style="width:100%">
        </div>

        <div class="mySlides fade">
        <img src="assets/imagens/slideshow/BoosterSlide.png" style="width:100%">
        </div>

        <div class="mySlides fade">
        <img src="assets/imagens/Banner.webp" style="width:100%">
        </div>

        </div>
        <br>

        <div style="text-align:center">
        <span class="dot"></span> 
        <span class="dot"></span> 
        <span class="dot"></span> 
        </div>

    <nav id="other-pages">

        <a class="site-navigation" href="tutoriais.php">
            <img src="assets/imagens/banner.webp" alt="Banner">
            <div class="site-navigation-text">
                <h2>Como Jogar?</h2>
                <p>Nesse artigo, você aprenderá tudo o que precisa saber para jogar Slime Smash! Desde as regras básicas até conceitos mais avançados. Seja mais um jogador e vença contra seus slimes rivais!</p>
            </div>
        </a>

        <a class="site-navigation" href="f-mvv.php">
            <img src="assets/imagens/banner.webp" alt="Banner">
            <div class="site-navigation-text">
                <h2>Conheça a gente mais a fundo</h2>
                <p>Nesse artigo, você entenderá um pouco mais sobre a nossa empresa, nossas missões, visões e valores, além dos nossos conteúdos nas redes sociais</p>
            </div>
        </a>
    
        <a class="site-navigation" href="faq.php">
            <img src="assets/imagens/banner.webp" alt="Banner">
            <div class="site-navigation-text">
                <h2>Como comprar e retirar seus produtos?</h2>
                <p>Nesse artigo você aprenderá como funciona a compra dos produtos de Slime Smash. Você verá como comprá-los no site, onde e quando retirá-los. Não tenha mais dúvidas!</p>
            </div>
        </a>

        <a class="site-navigation" href="carrinho.php">
            <img src="assets/imagens/banner.webp" alt="Banner">
            <div class="site-navigation-text">
                <h2>Faça suas compras!</h2>
                <p>Nesse local, será apresentado uma lista de todos os produtos de Slime Smash para você comprar presencialmente, ou reservar para retirada.</p>
            </div>
        </a>
    </nav>
</main>

<?php include "assets/componentes/footer.php"?>