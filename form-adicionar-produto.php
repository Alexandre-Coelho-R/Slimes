<?php 
session_start();

$titulo = "Adicionar produto";
$css = "admin.css";
include "_cabecalho.php";

verificarAdmin();
?>

<main>
    <form method="POST" action="assets/funcoes/adicionar-produto.php" enctype="multipart/form-data">
        <fieldset>
            <label for="nome">Nome:</label> 
            <input type="text" name="nome" id="nome" required>

            <label for="descricao">Descricao:</label> 
            <input type="text" name="descricao" id="descricao" required>

            <label for="categoria">Categoria:</label> 
            <select name="categoria" id="categoria" required>
                <option disabled selected>Escolha uma categoria</option>
                <option value="deck">Deck</option>
                <option value="booster">Booster</option>
                <option value="moeda">Moeda</option>
            </select>

            <label for="valor">Valor:</label> 
            <input type="number" name="valor" id="valor" min="0" step="0.01" required>

            <label for="imagem">Imagem:</label> 
            <input type="file" name="imagem" id="imagem" accept="image/*" required>

            <button type="submit">Enviar</button>
        </fieldset>
    </form>

    <a href="editar-produtos.php" class="a-form">Voltar à página de produtos</a>
</main>
    
<?php include "_rodape.php"; ?>