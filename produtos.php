<?php  
$titulo = "Produtos"; 
$css = "vendas.css"; 
$js = "produtos.js"; 
include "assets/componentes/head-header.php"; 
?> 
 
<main class="pagina-produtos"> 
    <section class="banner-produtos"> 
        <img src="assets/imagens/banner.webp" alt="Banner da loja"> 
    </section> 
 
    <h2 style="text-align: center;">Produtos</h2> 

    <section class="produtos"> 
        <?php
        include "assets/funcoes/utilidades.php";
        $conn = conectar_bd();
        $select = $conn -> query("SELECT * FROM produto WHERE excluido=FALSE");

        while ($linha = $select->fetch() ) {
            $categoria = $linha["categoria"] ?? "";
            if ($categoria == "deck") { // Adicionar mais depois
                $link = "deck.php?id=" . $linha["id_produto"];
            } else {
                $link = "";
            }
            
            if (empty($linha["imagem"])) {
                $imagem = "assets/imagens/produtos/imagem-substituta.webp";
            } else {
                $imagem = "assets/imagens/produtos/" . $linha["imagem"] . ".webp";
            }

            $imagem = "assets/imagens/cartas/ss_slimedecola.webp"; // Temporário

            $quantidade = 76; // Temporário

            echo "
            <div class='produto'>
                <a href='$link'>
                    <div class='imagem-produto'>
                        <img src='$imagem'>
                        <span class='quantidade'>$quantidade<br><small>unid</small></span>
                    </div>
                </a>

                <p class='nome'>{$linha['nome']}</p>
                <strong>R$ {$linha['valor_unitario']}</strong>

                <form action='assets/funcoes/carrin.php' method='POST' class='form-carrinho'>
                    <input type='hidden' name='id' value='{$linha["id_produto"]}'>
                    <button type='submit'>Adicionar</button>
                </form>
            </div>
            ";
        }
        ?>
    </section> 
</main> 
 
<?php include "assets/componentes/footer.php"; ?>