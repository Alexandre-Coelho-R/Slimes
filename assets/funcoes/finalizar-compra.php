<?php

require_once "utilidades.php";

if (!verificarLogin()) voltarInfo("Tem que estar logado para reservar a compra");

$conn = conectar_bd();

$resultado = mexerSQL("SELECT id_compra
                       FROM compra
                       WHERE fk_usuario=:id_usuario AND status='carrinho'",
                       [":id_usuario" => $_SESSION["usuario_id"]],
                       $conn);

$id_compra = $resultado->fetchColumn();

if ($id_compra === false) {
    voltarInfo("Seu carrinho está vazio.");
}

// Conferir o estoque antes de reservar
$select = mexerSQL(
    "SELECT 1
     FROM compra_produto
     WHERE fk_compra = :id_compra
       AND quantidade > COALESCE(qtd_estoque(fk_produto), 0)
     LIMIT 1",
    [":id_compra" => $id_compra],
    $conn
);

if ($select->fetchColumn() !== false) {
    voltarInfo("Ao menos um produto não tem estoque suficiente para a compra");
}


mexerSQL("UPDATE compra_produto
          SET valor_unitario = (SELECT valor_unitario FROM produto WHERE id_produto = fk_produto)
          WHERE fk_compra=:id_compra",
          [":id_compra" => $id_compra],
          $conn);

mexerSQL("UPDATE compra
          SET status='reservado'
          WHERE id_compra=:id_compra",
          [":id_compra" => $id_compra],
          $conn);

unset($_SESSION["carrinho_id_compra"]);

voltarPagina("../../historico-compras.php");
?>