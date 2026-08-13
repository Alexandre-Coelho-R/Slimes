<?php 
$titulo = "Alterar produto";
$css = "usuario.css";
include "assets/componentes/head-header.php";
?>

<?php
include "assets/funcoes/utilidades.php";
verificarAdmin();
$conn = conectar_bd();

$sql = "SELECT nome, descricao, valor_unitario
        FROM produto
        WHERE id_produto = :id_produto";

$select = $conn->prepare($sql);
$select->bindValue(":id_produto", $_GET["id"]);
$select->execute();
$produto = $select->fetch(PDO::FETCH_ASSOC);

if(!$produto) voltarPagina("Produto não encontrado");
?>

<main>
    <form method="POST" action="assets/funcoes/alterar-produto.php">
        <fieldset>
            <label for="nome">Nome:</label> 
            <input type="text" name="nome" id="nome" required value="<?=htmlspecialchars($produto["nome"])?>">

            <label for="descricao">Descricao:</label> 
            <input type="text" name="descricao" id="descricao" required value="<?=htmlspecialchars($produto["descricao"])?>">

            <label for="valor">Valor:</label> 
            <input type="number" name="valor" id="valor" min="0" step="0.01" required value="<?=htmlspecialchars($produto["valor_unitario"])?>">
            
            <input type="hidden" name="id_produto" value="<?=$_GET["id"]?>">

            <button type="submit">Enviar</button>
        </fieldset>
    </form>
</main>
    
<?php include "assets/componentes/footer.php"?> 