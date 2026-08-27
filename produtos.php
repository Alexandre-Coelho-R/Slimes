<?php  

session_start();
$logado = isset($_SESSION["usuario_id"]) ? true : false;

$titulo = "Produtos"; 
$css = "vendas.css"; 
$js = "produtos.js"; 
include "assets/componentes/head-header.php"; 
?> 
 
<main id="main-produtos"> 

    <div id="banner-container">
        <img id="banner-produtos" src="assets/imagens/banner.webp" alt="Banner da loja"> 
        <h1>PRODUTOS</h1>
    </div>

    <section id="produtos"> 
        <?php
        include "assets/funcoes/utilidades.php";
        $conn = conectar_bd();
        $select = $conn -> query("SELECT * FROM produto WHERE excluido=FALSE");

        while ($linha = $select->fetch() ) {
            $categoria = $linha["categoria"] ?? "";
            //Adicionar mais depois:
            if ($categoria == "deck") {
                $link = "deck.php?id=" . $linha["id_produto"];
            } else {
                $link = "";
            }
            
            if (empty($linha["imagem"])) {
                $imagem = "assets/imagens/produtos/imagem-substituta.webp";
            } else {
                $imagem = "assets/imagens/produtos/" . $linha["imagem"] . ".webp";
            }

            $quantidade = 76; // Temporário

            $nome = $linha['nome'];

            $valor_unitario = number_format($linha["valor_unitario"], 2, ",", ".");

            $id_produto = $linha["id_produto"];
            
            echo "
            <div class='produto'>
                <a href='$link' class='imagem-produto'>
                    <img src='$imagem'>
                    <span class='quantidade'>$quantidade<br><small>unid</small></span>
                </a>

                <p>$nome</p>
                <strong>R$ $valor_unitario</strong>

                <form class='form-carrinho'>
                    <input type='hidden' name='acao' value='adicionar'>
                    <input type='hidden' name='id_produto' value='$id_produto'>
                    <button type='submit'>Adicionar</button>
                </form>
            </div>
            ";
        }
        ?>
    </section> 

    <script>const usuarioLogado = <?=json_encode($logado)?></script>
</main> 
 
<?php include "assets/componentes/footer.php"; ?>