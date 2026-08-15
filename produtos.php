<?php  
$titulo = "Produtos"; 
$css = "vendas.css"; 
$js = "produtos.js"; 
include "assets/componentes/head-header.php"; 
?> 
 
<main class="pagina-produtos"> 
    <section class="banner-produtos"> 
        <img src="assets/imagens/banner.webp" alt="Banner da loja"> 
    </div> 
 
    <h2 style="text-align: center;">Produtos</h2> 

    <section class="produtos"> 
        <div class="produto">
            <a href="deck.php?deck=anciao">
                <div class="imagem-produto"> 
                    <img src="assets/imagens/cartas/ss_acaixa.webp"> 
                    <span class="quantidade">
                        42<br><small>unid</small>
                    </span> 
                </div>
            </a>

            <p class="nome">67</p> 
            <strong>R$ 67,00</strong>

            <form action="assets/funcoes/carrin.php" method="POST" class="form-carrinho">

                <input type="hidden" name="acao" value="adicionar">

                <input type="hidden" name="id" value="anciao">

                <input type="hidden" name="nome" value="67">

                <input type="hidden" name="preco" value="67">

                <input type="hidden" name="imagem" value="assets/imagens/cartas/ss_acaixa.webp">

                <button type="submit">
                    Adicionar
                </button>
            </form>
        </div>
    </div> 
</main> 
 
<?php include "assets/componentes/footer.php"; ?>