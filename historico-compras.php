<?php

session_start();

$titulo = "Compras";
$css = "usuario.css";
include "_cabecalho.php";

if (!isset($_SESSION["usuario_nome"])) voltarPagina("usuario.php");
?>

<main>
    <h1 class="title">Compras reservadas</h1>
    <h2 class="subtitle" id="h2_historico">Veja mais na página de <a href="faq.php">perguntas frequentes</a></h2>

    <?php
        $id_usuario = $_SESSION["usuario_id"] ?? 0;
        $conn = conectar_bd();

        $select = mexerSQL("SELECT id_compra, data
                            FROM compra
                            WHERE fk_usuario=:id_usuario AND status='reservado'",
                            [":id_usuario" => $id_usuario],
                            $conn);
                            
        $encontrou = false;

        while ($linha = $select->fetch()) {
            $encontrou = true;
            $id_compra = $linha["id_compra"];
            $horarioReserva = $linha["data"];
            $total = 0;

            echo '
            <section class="secao-historico">
                <p>Dia da reserva: ' . substr($horarioReserva, 8, 2) . '/' . substr($horarioReserva, 5, 2) . '/' . substr($horarioReserva, 0, 4) . '</p>
                <ul>
            ';

            $select2 = mexerSQL("SELECT compra_produto.quantidade, produto.nome, compra_produto.valor_unitario
                                FROM compra_produto, produto
                                WHERE compra_produto.fk_produto = produto.id_produto
                                AND compra_produto.fk_compra = :id_compra;",
                                [":id_compra" => $id_compra],
                                $conn);
            
            while ($linhaProduto = $select2->fetch()) {
                $quantidadeProduto = $linhaProduto["quantidade"];
                $nomeProduto = $linhaProduto["nome"];
                $valorProduto = $linhaProduto["valor_unitario"];
                
                echo '<li><p>' . $quantidadeProduto . 'x ' .'</p><p>'. $nomeProduto .'</p><p>'. ' R$ ' . $valorProduto . '</p></li>';
                $total += $quantidadeProduto * $valorProduto;
            }

            echo '
                </ul>
                <p>Total = R$ ' . $total . '</p>
            </section>';
        }
        
        if (!$encontrou){
            echo '<p id="historico-falar">Você não tem nenhum produto pendente de entrega</p>';
        }
    ?>
</main>

<?php include "_rodape.php"; ?>