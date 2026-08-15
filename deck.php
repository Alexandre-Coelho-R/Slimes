<?php  
$titulo = "Deck"; 
$css = "vendas.css"; 
$js = "produtos.js"; 
 
include "assets/componentes/head-header.php"; 
include "assets/funcoes/lista-deck.php"; 
 
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
            
            <!-- ADICIONAR AO CARRINHO -->

            <form action="assets/funcoes/carrin.php" method="POST" class="form-carrinho">
                <input type="hidden" name="acao "value="adicionar">

                <input type="hidden" name="id "value="<?= htmlspecialchars($deck) ?>">

                <input type="hidden" name="nome "value="<?= htmlspecialchars($produto['nome']) ?>">

                <input type="hidden" name="preco "value="<?= htmlspecialchars($produto['preco']) ?>">

                <input type="hidden" name="imagem "value="assets/imagens/cartas/<?= htmlspecialchars($produto['cartas'][0]['imagem']) ?>">

                <button type="submit">Adicionar</button>
            </form>
        </div> 
 
    </section> 
 
 
    <section class="conteudo-deck"> 
        <div class="lista-cartas"> 
            <?php foreach ($produto['cartas'] as $carta): ?> 
                <div class="linha-carta" data-imagem="assets/imagens/cartas/<?= $carta['imagem'] ?>" > 
                    <span class="qtd"><?= $carta['qtd'] ?></span> 
                    <span class="nome-carta"><?= $carta['nome'] ?></span> 
                </div> 
            <?php endforeach; ?> 
        </div> 
 
        <div class="carta-preview"> 
            <img id="carta-destaque" src="assets/imagens/cartas/<?= $produto['cartas'][0]['imagem'] ?>" alt="Carta selecionada"> 
        </div> 
    </section> 
 
</main> 
 
<?php include "assets/componentes/footer.php" ?>