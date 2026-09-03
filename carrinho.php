<?php

session_start();

$titulo = "Carrinho";
$css = "vendas.css";
$js = "carrinho.js";

include "_cabecalho.php";
include "assets/funcoes/utilidades.php";

$conn = conectar_bd();

if (isset($_SESSION["usuario_id"])){
    $sql = "SELECT id_compra FROM compra WHERE status='carrinho' AND fk_usuario=:id_usuario";
    $select = $conn -> prepare($sql);
    $select -> execute([":id_usuario" => $_SESSION["usuario_id"]]);
    $resultado = $select -> fetch(PDO::FETCH_ASSOC);

    // Pegar id_compra
    if ($resultado) $id_compra = $resultado["id_compra"];
}
?>


<main class="pagina-carrinho">
    <h1>Seu carrinho</h1>
    <p class="subtitulo">Confira seus produtos antes de finalizar.</p>

    <div class="area-carrinho">
        <section class="carrinho">
            <?php if (!isset($id_compra)): ?>
                <p>Seu carrinho está vazio.</p>
            <?php else: ?>
                <?php
                $sql = "SELECT produto.id_produto, produto.nome, produto.valor_unitario, produto.imagem, compra_produto.quantidade
                        FROM produto
                        INNER JOIN compra_produto
                        ON produto.id_produto = compra_produto.fk_produto
                        WHERE compra_produto.fk_compra=:id_compra";
                $select = $conn -> prepare($sql);
                $select -> execute([":id_compra" => $id_compra]);
                $resultados = $select -> fetchAll(PDO::FETCH_ASSOC);
                
                $total = 0;
                ?>

                <?php foreach ($resultados as $resultado): ?>
                    <?php
                    $total += $resultado["valor_unitario"] * $resultado["quantidade"];
                    $imagem = "assets/imagens/produtos/";
                    $imagem .= (isset($resultado["imagem"]) ? $resultado["imagem"] : "imagem-substituta") . ".webp";
                    $valor_unitario = number_format($resultado["valor_unitario"], 2, ",", ".");
                    ?>
                    <article class="item-carrinho">
                        <img src="<?=$imagem?>" alt="<?=$resultado["nome"]?>">
                        <div class="info-produto">
                            <h2><?=$resultado["nome"]?></h2>
                            <p>Quantidade: <?=$resultado["quantidade"]?></p>
                        </div>
                        <strong class="preco"><?=$valor_unitario?></strong>
                        <div class="quantidade-carrinho">
                            <form class="form-carrinho">
                                <input type="hidden" name="acao" value="diminuir">
                                <input type="hidden" name="id_produto" value="<?=$resultado["id_produto"]?>">
                                <button type="submit">-</button>
                            </form>

                            <span><?=$resultado["quantidade"]?></span>
                            
                            <form class="form-carrinho">
                                <input type="hidden" name="acao" value="adicionar">
                                <input type="hidden" name="id_produto" value="<?=$resultado["id_produto"]?>">
                                <button type="submit">+</button>
                            </form>
                        </div>

                        <form class="form-carrinho">
                            <input type="hidden" name="acao" value="remover">
                            <input type="hidden" name="id_produto" value="<?=$resultado["id_produto"]?>">
                            <button type="submit" class="remover">x</button>
                        </form>
                    </article>
                <?php endforeach;?>
            <?php endif;?>
        </section>
                
        <?php
        $total = number_format($total ?? 0, 2, ",", ".");
        ?>
        
        <section class="resumo-carrinho">
            <h2>Resumo da compra</h2>

            <div>
                <span>Subtotal</span>
                <strong>R$ <?=$total?></strong>
            </div>

            <div>
                <span>Retirada</span>
                <strong>Grátis</strong>
            </div>

            <div class="total">
                <span>Total</span>
                <strong>R$ <?=$total?></strong>
            </div>

            <button class="finalizar">Finalizar compra</button>
        </section>
    </div>
</main>

<?php include "_rodape.php"; ?>