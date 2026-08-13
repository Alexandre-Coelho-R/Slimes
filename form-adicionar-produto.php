<?php 
$titulo = "Adicionar produto";
include "assets/componentes/head-header.php";
?>

<main>
    <form method="POST" action="assets/funcoes/adicionar-produto.php">
        <fieldset>
            <label for="nome">Nome:</label> 
            <input type="text" name="nome" id="nome" required>

            <label for="descricao">Descricao:</label> 
            <input type="text" name="descricao" id="descricao" required>

            <label for="valor">Valor:</label> 
            <input type="number" name="valor" id="valor" required>

            <button type="submit">Enviar</button>
        </fieldset>
    </form>
</main>
    
<?php include "assets/componentes/footer.php"?> 