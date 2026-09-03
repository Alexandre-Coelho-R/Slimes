<?php 
include "assets/funcoes/utilidades.php";
verificarAdmin();

$titulo = "Adicionar produto";
$css = "admin.css";
include "_cabecalho.php";
?>

<main>
    <form method="POST" action="assets/funcoes/adicionar-produto.php">
        <fieldset>
            <label for="nome">Nome:</label> 
            <input type="text" name="nome" id="nome" required>

            <label for="descricao">Descricao:</label> 
            <input type="text" name="descricao" id="descricao" required>

            <label for="valor">Valor:</label> 
            <input type="number" name="valor" id="valor" min="0" step="0.01" required>

            <button type="submit">Enviar</button>
        </fieldset>
    </form>

    <a href="editar-produtos.php" class="a-form">Voltar à página de produtos</a>
</main>
    
<?php include "_rodape.php"; ?>