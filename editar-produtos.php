<?php
session_start();
include "assets/funcoes/utilidades.php";
verificarAdmin();

$titulo = "Editar produtos";
$css = "admin.css";
include "_cabecalho.php";
?>

<main class="main-edicao">
    <table id='tabela-produtos'>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Descricao</th>
                <th>Valor</th>
                <th>Excluido</th>
                <th>Data exclusão</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $conn = conectar_bd();
                $select = $conn -> query("SELECT * FROM produto");

                while ($linha = $select->fetch() ) {
                    $excluido =  $linha["excluido"] ? "Sim" : "Não";
                    $excluido2 =  $linha["excluido"] ? "Incluir" : "Excluir";
                    $excluido3 = $linha["excluido"] ? '<i class="fa-solid fa-rotate-left" aria-hidden="true"></i>' : "<i class='fa-solid fa-trash'  aria-hidden='true'></i>";
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
                            <td><a href='form-alterar-produto.php?id={$linha['id_produto']}'><i class='fa fa-pencil-square' aria-hidden='true'></i></a></td>
                            <td><a href='assets/funcoes/excluir-produto.php?id={$linha['id_produto']}&deletar=$excluido2'>$excluido3</a></td>
                        </tr>";   
                }      
            ?>  
        </tbody>
        <tfoot>
            <tr>
                <td colspan="6"> <a href='form-adicionar-produto.php'>Adicionar</a></td>
            </tr>
            <tr>
                <td colspan="6"> <a href='usuario.php'>Voltar à página anterior</a></td>
            </tr>
        </tfoot>
    </table> 
</main>

<?php include "_rodape.php"; ?>