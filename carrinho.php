<?php

session_start();

$titulo = "Carrinho";
$css = "vendas.css";
$js = "carrinho.js";

include "assets/componentes/head-header.php";

$carrinho = $_SESSION['carrinho'] ?? [];

?>

<main class="pagina-carrinho">

    <h1>Seu carrinho</h1>

    <p class="subtitulo">Confira seus produtos antes de finalizar.</p>


    <div class="area-carrinho">
        <section class="carrinho">

            <?php if (empty($carrinho)): ?>

                <p>Seu carrinho está vazio.</p>

            <?php else: ?>

                <?php foreach ($carrinho as $id => $produto): ?>

                    <article class="item-carrinho">

                        <img src="<?= htmlspecialchars($produto['imagem']) ?>" alt="<?= htmlspecialchars($produto['nome']) ?>">

                        <div class="info-produto">
                            <h2><?= htmlspecialchars($produto['nome']) ?></h2>
                            <p>Quantidade: <?= $produto['quantidade'] ?></p>
                        </div>


                        <strong class="preco">
                            R$<?= number_format($produto['preco'] * $produto['quantidade'], 2, ',', '.')?>
                        </strong>


                        <div class="quantidade-carrinho">
                            <form action="assets/funcoes/carrin.php" method="POST">
                                <input type="hidden" name="acao" value="diminuir">
                                <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">
                                <button type="submit">&minus;</button>
                            </form>

                            <span><?= $produto['quantidade'] ?></span>

                            <form action="assets/funcoes/carrin.php" method="POST">
                                <input type="hidden" name="acao" value="adicionar">

                                <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">

                                <input type="hidden" name="nome" value="<?= htmlspecialchars($produto['nome']) ?>">

                                <input type="hidden" name="preco" value="<?= $produto['preco'] ?>">

                                <input type="hidden" name="imagem" value="<?= htmlspecialchars($produto['imagem']) ?>">

                                <button type="submit">+</button>
                            </form>

                        </div>


                        <form action="assets/funcoes/carrin.php" method="POST">
                            <input type="hidden" name="acao" value="remover">

                            <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">

                            <button type="submit" class="remover">&times;</button>
                        </form>
                    </article>
                <?php endforeach; ?>

            <?php endif; ?>
        </section>

        <!-- RESUMO -->

        <section class="resumo-carrinho">
            <h2>Resumo da compra</h2>
            
            <?php
            $total = 0;
            foreach ($carrinho as $produto) {
                $total += $produto['preco'] * $produto['quantidade'];}
            ?>

            <div>
                <span>Subtotal</span>
                <strong>R$<?= number_format($total, 2, ',', '.') ?></strong>
            </div>

            <div>
                <span>Retirada</span>
                <strong>Grátis</strong>
            </div>

            <div class="total">
                <span>Total</span>
                <strong>R$<?= number_format($total,2,',','.')?></strong>
            </div>

            <button class="finalizar">
                Finalizar compra
            </button>
        </section>
    </div>
</main>

<?php include "assets/componentes/footer.php"; ?>