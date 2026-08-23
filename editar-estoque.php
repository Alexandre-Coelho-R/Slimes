<?php
session_start();
include "assets/funcoes/utilidades.php";
verificarAdmin();

$titulo = "Editar estoque";
$css = "admin.css";
include "assets/componentes/head-header.php";
?>

<main class="main-edicao">
    <table id='tabela-produtos'>
        <thead>
            <tr>
                <th>Id</th>
                <th>FK_produto</th>
                <th>Quantidade</th>
                <th>Custo unitário</th>
                <th>Observações</th>
                <th>Data de entrada</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $conn = conectar_bd();
        $select = $conn -> query("SELECT * FROM entrada");
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
                    <td><a href='form-alterar-estoque.php?id={$linha['id_entrada']}'><i class='fa fa-pencil-square' aria-hidden='true'></i></a></td>
                    <td><a href='assets/funcoes/excluir-estoque.php?id={$linha['id_entrada']}'><i class='fa-solid fa-trash'  aria-hidden='true'></i></a></td>
                </tr>";   
        }
        ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="6"> <a href='form-adicionar-estoque.php'>Adicionar</a></td>
            </tr>
            <tr>
                <td colspan="6"> <a href='usuario.php'>Voltar à página anterior</a></td>
            </tr>
        </tfoot>
    </table>
</main>

<?php include "assets/componentes/footer.php"?>