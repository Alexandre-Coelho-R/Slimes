<?php  

session_start();
$logado = isset($_SESSION["usuario_id"]) ? true : false;

$titulo = "Produtos"; 
$css = "vendas.css"; 
$js = "produtos.js"; 
include "assets/componentes/head-header.php"; 
?> 
 
<main> 
    <!-- <section id="banner-produtos"> 
        <img src="assets/imagens/banner.webp" alt="Banner da loja"> 
    </section>  -->
 
    <h2 class="title">Produtos</h2> 

    <section id="produtos"> 
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
                <a href='$link' class='imagem-produto'>
                    <img src='$imagem'>
                    <span class='quantidade'>$quantidade<br><small>unid</small></span>
                </a>

                <p>{$linha['nome']}</p>
                <strong>R$ {$linha['valor_unitario']}</strong>

                <form class='form-carrinho'>
                    <input type='hidden' name='acao' value='adicionar'>
                    <input type='hidden' name='id_produto' value='{$linha["id_produto"]}'>
                    <button type='submit'>Adicionar</button>
                </form>
            </div>
            ";
        }
        ?>
    </section> 

    <div id="modal-login">
        <button id="fechar-modal">&times;</button>

        <h2>Login necessário</h2>

        <p>Você precisa estar logado para adicionar produtos ao carrinho.</p>

        <a href="usuario.php" id="ir-login">Fazer login</a>
    </div>

    <script>const usuarioLogado = <?=json_encode($logado)?></script>
</main> 
 
<?php include "assets/componentes/footer.php"; ?>