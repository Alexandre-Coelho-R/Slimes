<?php
session_start();
include "assets/funcoes/utilidades.php";
verificarAdmin();

$titulo = "Editar produtos";
$css = "usuario.css";
include "assets/componentes/head-header.php";
?>

<main>
    <?php
        $conn = conectar_bd();
        $select = $conn -> query("SELECT * FROM produto");
        
        echo "<table id='tabela-produtos'>
            <tr>
                <td>Id</td>
                <td>Nome</td>
                <td>Descricao</td>
                <td>Valor</td>
                <td>Excluido</td>
                <td>Data exclusão</td>
            </tr>";

        while ($linha = $select->fetch() ) {
            $excluido =  $linha["excluido"] ? "Sim" : "Não";
            $excluido2 =  $linha["excluido"] ? "Incluir" : "Excluir";
            $data_exclusao = $linha['data_exclusao'];
            if ($data_exclusao === null) $data_exclusao = "Não possui";
            echo "
                <tr>
                    <td>{$linha['id_produto']}</td>
                    <td>{$linha['nome']}</td>
                    <td>{$linha['descricao']}</td>
                    <td>{$linha['valor_unitario']}</td>
                    <td>{$excluido}</td>
                    <td>{$data_exclusao}</td>
                    <td>
                        <a href='form-alterar-produto.php?id={$linha['id_produto']}'>Alterar</a>
                    </td>
                    <td>
                        <a href='assets/funcoes/excluir-produto.php?id={$linha['id_produto']}&deletar=$excluido2'>$excluido2</a>
                    </td>
                </tr>";   
        }

        echo "</table> <a href='form-adicionar-produto.php'>Adicionar</a>";         
    ?>
</main>

<?php include "assets/componentes/footer.php"?>