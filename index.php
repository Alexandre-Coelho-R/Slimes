<?php 
$titulo = "Início";
$css = "index.css";
include "assets/componentes/head-header.php";
?>

<section id="hero-section">
    <img src="assets/imagens/Banner.png" alt="Banner">
    
    <div class="title-container">
        <h1 class="title-outline">SLIME SMASH</h1>
        <h1 class="title-fill">SLIME SMASH</h1>
        
    </div>

    <div class="title-container">
        <h2 class="title-fill">O melhor jogo TCG do CTI</h2>
        <h2 class="title-outline">O melhor jogo TCG do CTI</h2>
    </div>


    <div id="hero-buttons">
        <a href="#first-section">
            <i class="fa fa-search-plus" aria-hidden="true"></i>
            Conheça mais
        </a>
        <a href="produtos.php">
            Comprar agora
            <i class="fa-solid fa-cart-shopping"></i>
        </a>
    </div>

</section>

<main>
    <nav id="other-pages">

        <a class="site-navigation" id="first-section" href="tutoriais.php">
            <div class="site-navigation-img">
                <img src="assets/imagens/Banner.png" alt="Banner">
            </div>
            <div class="site-navigation-text">
                <h2>Como Jogar?</h2>
                <p>Nesse artigo, você aprenderá tudo o que precisa saber para jogar Slime Smash! Desde as regras básicas até conceitos mais avançados. Seja mais um jogador e vença contra seus slimes rivais!</p>
            </div>
        </a>

        <a class="site-navigation" href="f-mvv.php">
            <div class="site-navigation-img">
                <img src="assets/imagens/Banner.png" alt="Banner">
            </div>
            <div class="site-navigation-text">
                <h2>Conheça a gente mais a fundo</h2>
                <p>Nesse artigo, você entenderá um pouco mais sobre a nossa empresa, nossas missões, visões e valores, além dos nossos conteúdos nas redes sociais</p>
            </div>
        </a>
    
        <a class="site-navigation" href="faq.php">
            <div class="site-navigation-img">
                <img src="assets/imagens/Banner.png" alt="Banner">
            </div>
            <div class="site-navigation-text">
                <h2>Como comprar e retirar seus produtos?</h2>
                <p>Nesse artigo você aprenderá como funciona a compra dos produtos de Slime Smash. Você verá como comprá-los no site, onde e quando retirá-los. Não tenha mais dúvidas!</p>
            </div>
        </a>

        <a class="site-navigation" href="carrinho.php">
            <div class="site-navigation-img">
                <img src="assets/imagens/Banner.png" alt="Banner">
            </div>
            <div class="site-navigation-text">
                <h2>Faça suas compras!</h2>
                <p>Nesse local, será apresentado uma lista de todos os produtos de Slime Smash para você comprar presencialmente, ou reservar para retirada.</p>
            </div>
        </a>
    </nav>
</main>

<?php include "assets/componentes/footer.php"?>