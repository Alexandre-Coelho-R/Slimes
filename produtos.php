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
 
        <h2 style="text-align: center;">Produtos</h2> 
 
        <div class="carrossel"> 
 
            <div class="produtos"> 
 
                <!-- PRODUTO 1 -->

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

                    <form
                        action="assets/funcoes/carrin.php"
                        method="POST"
                        class="form-carrinho"
                    >

                        <input type="hidden" name="acao" value="adicionar">

                        <input type="hidden" name="id" value="anciao">

                        <input type="hidden" name="nome" value="67">

                        <input type="hidden" name="preco" value="67">

                        <input
                            type="hidden"
                            name="imagem"
                            value="assets/imagens/cartas/ss_acaixa.webp"
                        >

                        <button type="submit">
                            Adicionar
                        </button>

                    </form>

                </div>


                <!-- PRODUTO 2 -->

                <div class="produto">

                    <a href="deck.php?deck=outro-deck">

                        <div class="imagem-produto"> 
                            <img src="assets/imagens/cartas/ss_slimeferreiro.webp"> 
                            <span class="quantidade">
                                67<br><small>unid</small>
                            </span> 
                        </div>

                    </a>

                    <p class="nome">42</p> 
                    <strong>R$ 42,00</strong>

                    <form
                        action="assets/funcoes/carrin.php"
                        method="POST"
                        class="form-carrinho"
                    >

                        <input type="hidden" name="acao" value="adicionar">

                        <input type="hidden" name="id" value="outro-deck">

                        <input type="hidden" name="nome" value="42">

                        <input type="hidden" name="preco" value="42">

                        <input
                            type="hidden"
                            name="imagem"
                            value="assets/imagens/cartas/ss_slimeferreiro.webp"
                        >

                        <button type="submit">
                            Adicionar
                        </button>

                    </form>

                </div>

            </div> 
 
        </div> 
    </section> 

</main> 
 
<?php include "assets/componentes/footer.php"; ?>