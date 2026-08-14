<?php
include "assets/funcoes/utilidades.php";
verificarAdmin();

$titulo = "Adicionar estoque";
$css = "usuario.css";
include "assets/componentes/head-header.php";
?>

<main>
    <form method="POST" action="assets/funcoes/incrementar-estoque.php">
        <fieldset>
            <label for="produto">Produto:</label>
            <select name="produto" id="produto" required>
                <?php
                $conn = conectar_bd();
                $select = $conn -> query("SELECT id_produto, nome, excluido FROM produto");
                while ($linha = $select -> fetch()) {
                    if ($linha["excluido"]) continue;
                    $id = $linha["id_produto"];
                    $nome = $linha["nome"];
                    echo "<option value=$id>($id) $nome</option>";
                }
                ?>
            </select>

            <label for="quantidade">Quantidade:</label> 
            <input type="number" name="quantidade" id="quantidade" min="1" step="1" required>

            <label for="custo_unitario">Custo unitário:</label> 
            <input type="number" name="custo_unitario" id="custo_unitario" min="0" step="0.01" required>

            <label for="obs">Observações:</label> 
            <input type="text" name="obs" id="obs" maxlength="255">

            <button type="submit">Adicionar</button>
        </fieldset>
    </form>
</main>

<?php include "assets/componentes/footer.php"?>