<?php

session_start();
$logado = isset($_SESSION["usuario_id"]) ? true : false;

$titulo = "Deck";
$css = "vendas.css";
$js = "deck.js";

include "assets/componentes/head-header.php";
include "assets/funcoes/utilidades.php";

if (!isset($_GET["id"])) voltarInfo("Deck não encontrado.");

$conn = conectar_bd();

$sql = "SELECT nome, descricao, valor_unitario FROM produto WHERE id_produto=:id_produto AND excluido=FALSE";
$select = $conn->prepare($sql);
$select->execute([":id_produto" => $_GET["id"]]);
$produto = $select->fetch(PDO::FETCH_ASSOC);

if (!$produto) voltarInfo("Produto não encontrado.");

$sql = "SELECT carta.nome, carta.imagem, deck_carta.quantidade FROM deck_carta INNER JOIN carta ON carta.id_carta=deck_carta.fk_carta WHERE deck_carta.fk_produto=:id_produto ORDER BY carta.nome ASC";
$select = $conn->prepare($sql);
$select->execute([":id_produto" => $_GET["id"]]);
$cartas = $select->fetchAll(PDO::FETCH_ASSOC);
?>

<main class="pagina-deck">

    <section class="cabecalho-deck">
        <h1><?=$produto["nome"]?></h1>

        <div class="valor-deck">
            <span>Valor do Deck</span>
            <strong>R$ <?=number_format($produto["valor_unitario"], 2, ",", ".")?></strong>

            <form class="form-carrinho">
                <input type="hidden" name="acao" value="adicionar">
                <input type="hidden" name="id_produto" value="<?=$_GET["id"]?>">
                <button type="submit">Adicionar</button>
            </form>
        </div>
    </section>

    <section class="conteudo-deck">
        <div class="lista-cartas">
            <?php foreach ($cartas as $carta): ?>
                <div class="linha-carta" data-imagem="assets/imagens/cartas/<?=$carta["imagem"]?>.webp">
                    <span class="qtd"><?=$carta["quantidade"]?></span>
                    <span class="nome-carta"><?=$carta["nome"]?></span>
                </div>
            <?php endforeach; ?>
        </div>

        <?php if (!empty($cartas)): ?>
            <div class="carta-preview">
                <img id="carta-destaque" src="assets/imagens/cartas/<?=$cartas[0]["imagem"]?>.webp" alt="<?=$cartas[0]["nome"]?>">
            </div>
        <?php endif; ?>
    </section>

    
    <div id="modal-login">
        <button id="fechar-modal">&times;</button>

        <h2>Login necessário</h2>

        <p>Você precisa estar logado para adicionar produtos ao carrinho.</p>

        <a href="login.php" id="ir-login">Fazer login</a>
    </div>

    <script>const usuarioLogado = <?=json_encode($logado)?></script>
</main>

<?php include "assets/componentes/footer.php"; ?>