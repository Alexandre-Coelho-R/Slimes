<?php
include "assets/funcoes/utilidades.php";
verificarAdmin();

$titulo = "Alterar estoque";
$css = "usuario.css";
include "assets/componentes/head-header.php";

$conn = conectar_bd();
$sql = "SELECT fk_produto, quantidade, custo_unitario, obs
        FROM  entrada
        WHERE id_entrada = :id_entrada";
$select = $conn->prepare($sql);
$select->bindValue(":id_entrada", $_GET["id"]);
$select->execute();
$entrada = $select->fetch(PDO::FETCH_ASSOC);

if(!$entrada) voltarInfo("Entrada não encontrado");
?>

<main>
    <form method="POST" action="assets/funcoes/alterar-estoque.php">
        <fieldset>
            <label for="fk_produto">Produto:</label>
            <select name="fk_produto" id="fk_produto" required>
                <?php
                $conn = conectar_bd();
                $select = $conn -> query("SELECT id_produto, nome, excluido FROM produto");
                while ($linha = $select -> fetch()) {
                    if ($linha["excluido"]) continue;
                    $id = $linha["id_produto"];
                    $nome = $linha["nome"];
                    $selected = ($id === $entrada['fk_produto']) ? 'selected' : '';
                    echo "<option value=$id $selected>($id) $nome</option>";
                }
                ?>
            </select>

            <label for="quantidade">Quantidade:</label>
            <input type="number" name="quantidade" id="quantidade" min="1" step="1" value="<?=$entrada["quantidade"]?>" required>

            <label for="custo_unitario">Custo unitário:</label> 
            <input type="number" name="custo_unitario" id="custo_unitario" min="0" step="0.01" value="<?=$entrada["custo_unitario"]?>" required>

            <label for="obs">Observações:</label> 
            <input type="text" name="obs" id="obs" maxlength="255" value="<?=$entrada["obs"]?>">

            <input type="hidden" name="id_entrada" value="<?=$_GET["id"]?>">

            <button type="submit">Alterar</button>
        </fieldset>
    </form>

    <a href="editar-produtos.php">Voltar à página de produtos</a>
</main>
    
<?php include "assets/componentes/footer.php"?> 