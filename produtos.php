<?php  

session_start();
$logado = isset($_SESSION["usuario_id"]) ? true : false;

$titulo = "Produtos"; 
$css = "vendas.css"; 
$js = "produtos.js"; 
include "_cabecalho.php";
include "assets/funcoes/utilidades.php";
$conn = conectar_bd();
?> 
 
<main id="main-produtos"> 
    <div id="banner-container">
        <img id="banner-produtos" src="assets/imagens/banner.webp" alt="Banner da loja"> 
        <h1>Produtos</h1>
    </div>

    <h2 class="title">Decks de batalha</h2>
    <h3 class="subtitle">Compre baralhos de jogo prontos para duelo com moeda inclusa</h3>
    <section class="produtos" id="produtos-deck"> 
        <?php mostrarProduto($conn, "deck");?>
    </section> 

    <h2 class="title">Pacotes de cartas</h2>
    <h3 class="subtitle">Compre um pacote com 7 cartas aleatórias</h3>
    <section class="produtos" id="produtos-booster"> 
        <?php mostrarProduto($conn, "booster");?>
    </section>

    <h2 class="title">Moedas do jogo</h2>
    <h3 class="subtitle">Compre moedas feitas à mão</h3>
    <section class="produtos" id="produtos-moeda"> 
        <?php mostrarProduto($conn, "moeda");?>
    </section> 

    <script>const usuarioLogado = <?=json_encode($logado)?></script>
</main> 
 
<?php include "_rodape.php"; ?>