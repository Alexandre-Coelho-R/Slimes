<?php

session_start();

$titulo = "Carrinho";
$css = "vendas.css";

include "assets/componentes/head-header.php";
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
                
            <?php endif;?>
        </section>
                
        <section class="resumo-carrinho">
            <h2>Resumo da compra</h2>

            <div>
                <span>Subtotal</span>
                <strong>R$ <?= number_format(6, 2, ',', '.') ?></strong>
            </div>

            <div>
                <span>Retirada</span>
                <strong>Grátis</strong>
            </div>

            <div class="total">
                <span>Total</span>
                <strong>R$ <?= number_format(7, 2, ',', '.') ?></strong>
            </div>

            <button class="finalizar">Finalizar compra</button>
        </section>
    </div>
</main>

<?php include "assets/componentes/footer.php"; ?>