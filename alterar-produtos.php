<?php
$titulo = "Alterar Produtos";
include "assets/componentes/head-header.php";
?>

<main>
    <?php if($_SESSION["usuario_admin"] ?? true):?>
        <?php
            include "assets/funcoes/utilidades.php";
            $conn = conectar_bd();
            $select = $conn -> query("SELECT * FROM produto");
            
            echo "<table border=1'>
                <tr>
                    <td>Id</td>
                    <td>Nome</td>
                    <td>Descricao</td>
                    <td>Valor</td>
                    <td>Excluido</td>
                    <td>Data exclusão</td>
                </tr>";

            while ($linha = $select->fetch() ) { 
                echo "
                    <tr>
                        <td>{$linha['id_produto']}</td>
                        <td>{$linha['nome']}</td>
                        <td>{$linha['descricao']}</td>
                        <td>{$linha['valor_unitario']}</td>
                        <td>{$linha['excluido']}</td>
                        <td>{$linha['data_exclusao']}</td>
                        <td>
                            <a href='assets/funcoes/alterarProduto.php?id{$linha['id_produto']}'>Alterar</a>
                        </td>
                        <td>
                            <a href='assets/funcoes/excluirProduto.php?id={$linha['id_produto']}'>Excluir</a>
                        </td>
                    </tr>";   
            }

            echo "</table> <a href='assets/funcoes/adicionarProduto.php'>Adicionar</a>";         
            
        ?>
    <?php else:?>
        <h1>Você não tem permissão de acessar essa página</h2>
    <?php endif;?>
</main>

<?php include "assets/componentes/footer.php"?>