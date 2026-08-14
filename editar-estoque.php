<?php
session_start();
include "assets/funcoes/utilidades.php";
verificarAdmin();

$titulo = "Editar estoque";
$css = "usuario.css";
include "assets/componentes/head-header.php";
?>

<main>
    <?php
        $conn = conectar_bd();
        $select = $conn -> query("SELECT * FROM entrada");
        
        echo "<table id='tabela-produtos'>
            <tr>
                <td>Id</td>
                <td>FK_produto</td>
                <td>Quantidade</td>
                <td>Custo unitário</td>
                <td>Observações</td>
                <td>Data de entrada</td>
            </tr>";

        while ($linha = $select->fetch() ) {
            $obs = $linha["obs"] ?? "";
            echo "
                <tr>
                    <td>{$linha['id_entrada']}</td>
                    <td>{$linha['fk_produto']}</td>
                    <td>{$linha['quantidade']}</td>
                    <td>{$linha['custo_unitario']}</td>
                    <td>{$obs}</td>
                    <td>{$linha['data_entrada']}</td>
                    <td>
                        <a href='form-alterar-estoque.php?id={$linha['id_entrada']}'>Alterar</a>
                    </td>
                    <td>
                        <a href='assets/funcoes/excluir-estoque.php?id={$linha['id_entrada']}'>Deletar</a>
                    </td>
                </tr>";   
        }

        echo "</table> <a href='form-adicionar-estoque.php'>Adicionar</a>";         
    ?>
</main>

<?php include "assets/componentes/footer.php"?>