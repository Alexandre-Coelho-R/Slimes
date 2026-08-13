<?php 
$titulo = "Alterar produto";
include "assets/componentes/head-header.php";
?>

<main>
    <form method="POST" action="assets/funcoes/alterar-produto.php">
        <fieldset>
            <label for="nome">Nome:</label> 
            <input type="text" name="nome" id="nome" required>

            <label for="descricao">Descricao:</label> 
            <input type="text" name="descricao" id="descricao" required>

            <label for="valor">Valor:</label> 
            <input type="number" name="valor" id="valor" required>

            <select name="excluido" required>
                <option value="" disabled selected>Excluido?</option>
                <option value="true">Sim</option>
                <option value="false">Não</option>
            </select>

            <input type="hidden" name="id_produto" value="<?=$_GET["id"]?>">

            <button type="submit">Enviar</button>
        </fieldset>
    </form>
</main>
    
<?php include "assets/componentes/footer.php"?> 