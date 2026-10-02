


<!-- ESTÁ NO CSSS USUARIOS.CSS!!!!!!!!!!!!!!!!! -->













<?php

session_start();

$titulo = "Compras";
$css = "usuario.css";
include "_cabecalho.php";
include "assets/funcoes/utilidades.php";
?>

<main id="main-historico">
    <h1 class="title">Compras reservadas</h1>
    <!-- Se o usuário está logado -->
    <?php if (isset($_SESSION["usuario_nome"])):?>
        <?php
            $id_usuario = $_SESSION["usuario_id"] ?? 0;
            $conn = conectar_bd();

            $select = mexerSQL("SELECT id_compra, data
                                FROM compra
                                WHERE fk_usuario=:id_usuario AND status='carrinho'",
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
                    <p>Horário da reserva: ' . $horarioReserva . '</p>
                    <ul>
                ';

                $select = mexerSQL("SELECT compra_produto.quantidade, produto.nome, compra_produto.valor_unitario
                                    FROM compra_produto, produto
                                    WHERE compra_produto.fk_produto = produto.id_produto
                                    AND compra_produto.fk_compra = :id_compra;",
                                    [":id_compra" => $id_compra],
                                    $conn);
                
                while ($linhaProduto = $select->fetch()) {
                    $quantidadeProduto = $linhaProduto["quantidade"];
                    $nomeProduto = $linhaProduto["nome"];
                    $valorProduto = $linhaProduto["valor_unitario"];
                    
                    echo '<li>' . $quantidadeProduto . 'x ' . $nomeProduto . ' - R$ ' . $valorProduto . '</li>';
                    $total += $quantidadeProduto * $valorProduto;
                }

                echo '
                    </ul>
                    <p>Total = ' . $total . '</p>
                </section>';
            }

            
            if (!$encontrou){
                echo '<p class="historico-falar">Você não tem nenhum produto pendente de entrega</p>';
            }
        ?>

    <!-- Se o usuário não está logado na conta -->
    <?php else:?>
        <p class="historico-falar">Você tem que estar logado na sua conta para ver o suas compras</p>
    <?php endif;?>
</main>

<?php include "_rodape.php"; ?>