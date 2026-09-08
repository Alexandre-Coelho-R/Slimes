<?php
include "assets/funcoes/utilidades.php";
verificarAdmin();

$titulo = "Alterar produto";
$css = "admin.css";
include "_cabecalho.php";

$conn = conectar_bd();

$select = mexerSQL("SELECT nome, descricao, categoria, valor_unitario, imagem
                    FROM produto
                    WHERE id_produto = :id_produto",
                    [":id_produto" => $_GET["id"]],
                    $conn);

$produto = $select->fetch(PDO::FETCH_ASSOC);

if(!$produto) voltarInfo("Produto não encontrado");

$categoria = $produto["categoria"]
?>

<main>
    <form method="POST" action="assets/funcoes/alterar-produto.php">
        <fieldset>
            <label for="nome">Nome:</label> 
            <input type="text" name="nome" id="nome" required value="<?=$produto["nome"]?>">

            <label for="descricao">Descricao:</label> 
            <input type="text" name="descricao" id="descricao" required value="<?=$produto["descricao"]?>">

            <label for="categoria">Categoria:</label> 
            <select name="categoria" id="categoria" required>
                <?php if ($categoria == "deck"): ?>
                    <option value="deck" selected>Deck</option>
                    <option value="booster">Booster</option>
                    <option value="moeda">Moeda</option>
                <?php elseif ($categoria == "booster"): ?>
                    <option value="deck">Deck</option>
                    <option value="booster" selected>Booster</option>
                    <option value="moeda">Moeda</option>
                <?php else: ?>
                    <option value="deck">Deck</option>
                    <option value="booster">Booster</option>
                    <option value="moeda" selected>Moeda</option>
                <?php endif;?>
            </select>

            <label for="valor">Valor:</label> 
            <input type="number" name="valor" id="valor" min="0" step="0.01" required value="<?=$produto["valor_unitario"]?>">
            
            <label for="imagem">Imagem:</label> 
            <input type="text" name="imagem" id="imagem" required value="<?=$produto["imagem"]?>">

            <input type="hidden" name="id_produto" value="<?=$_GET["id"]?>">

            <button type="submit">Enviar</button>
        </fieldset>
    </form>

    <a href="editar-produtos.php" class="a-form">Voltar à página de produtos</a>
</main>
    
<?php include "_rodape.php"; ?>