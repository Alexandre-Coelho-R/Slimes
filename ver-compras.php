<?php

include "assets/funcoes/utilidades.php";
verificarAdmin();

if (isset($_GET["pdf"])) {
    include "assets/bibliotecas/vendor/autoload.php";
    $dompdf = new Dompdf\Dompdf();
    ob_start();
}

$titulo = "Compras";
$css = "usuario.css";
if (!isset($_GET["pdf"])) {
    include "_cabecalho.php";
} else {
    echo '
    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <style>
            body {
                font-family: sans-serif;
            }
            h1 {
                text-align: center;
            }
            .secao-historico {
                border: 1px solid #ccc;
                padding: 1rem;
                margin-bottom: 1.5rem;
                page-break-inside: avoid;
            }
        </style>
    </head>
    <body>';
}
?>

<main>
    <h1 id="h1_compras" class="title">Todas as compras</h1>
    
    <?php if (!isset($_GET['pdf'])): ?>
        <a href="ver-compras.php?pdf=1" target="_blank" id="gerar-pdf">Gerar PDF</a>
    <?php endif; ?>

    <?php
        $conn = conectar_bd();

        $select = mexerSQL("SELECT 
                                    compra.id_compra,
                                    compra.data,
                                    compra.status,
                                    compra.acrescimo_total,
                                    compra.fk_usuario,
                                    usuario.nome AS usuario_nome
                                FROM compra
                                LEFT JOIN usuario ON compra.fk_usuario = usuario.id_usuario
                                ORDER BY compra.id_compra DESC;",
                                [],
                                $conn);

        while ($linha_compra = $select->fetch()) {
            $id_compra = $linha_compra["id_compra"];
            $horarioReserva = $linha_compra["data"];
            $status = $linha_compra["status"];
            $acrescimo = $linha_compra["acrescimo_total"] ?? 0;
            $idUsuario = $linha_compra["fk_usuario"] ?? 0;

            if ($idUsuario) {
                $nomeDoCara = htmlspecialchars($linha_compra["usuario_nome"] . ' (ID: '. $idUsuario .')');
            } else {
                $nomeDoCara = "Sem login";
            }

            $subtotalProdutos = 0;

            echo '
            <section class="secao-historico">
                <p>Id compra: ' . $id_compra . '</p>
                <p>Comprador: ' . $nomeDoCara . '</p>
                <p>Data: ' . $horarioReserva . '</p>
                <p><strong>Status: ' . $status . '</strong></p>
                <ul>
            ';

            $selectProdutos = mexerSQL("SELECT 
                                            compra_produto.quantidade, 
                                            produto.nome, 
                                            compra_produto.valor_unitario
                                        FROM compra_produto
                                        INNER JOIN produto ON compra_produto.fk_produto = produto.id_produto
                                        WHERE compra_produto.fk_compra = :id_compra;",
                                        [":id_compra" => $id_compra],
                                        $conn);

            $total = 0;

            while ($linhaProduto = $selectProdutos->fetch()) {
                $quantidadeProduto = $linhaProduto["quantidade"];
                $nomeProduto = $linhaProduto["nome"];
                $valorProduto = $linhaProduto["valor_unitario"] ?? -1;

                $total += $valorProduto * $quantidadeProduto;

                echo '<li>' . $quantidadeProduto . 'x <div>' . $nomeProduto . '</div><div> R$ ' . number_format($valorProduto, 2, ',', '.') . '</div></li>';
            }

            echo '
                </ul>
                <p>Acréscimo: ' . $acrescimo . '%</p>
                <p>Total = R$ ' . number_format($total * (1 + $acrescimo/100), 2, ',', '.') . '</p>
            </section>';
        }
    ?>
</main>

<?php
if (isset($_GET['pdf'])) {
    echo '</body></html>';
    $html = ob_get_clean();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();

    $dompdf->stream("relatorio_compras.pdf", ["Attachment" => false]);
    exit;
}

include '_rodape.php';
?>
