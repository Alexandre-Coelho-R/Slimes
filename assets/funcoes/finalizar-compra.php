<?php

session_start();
include "utilidades.php";

if (!verificarLogin()) voltarInfo("Tem que estar logado para reservar a compra");

$conn = conectar_bd();

$resultado = mexerSQL("SELECT id_compra
                       FROM compra
                       WHERE fk_usuario=:id_usuario AND status='carrinho'",
                       [":id_usuario" => $_SESSION["usuario_id"]],
                       $conn);

$id_compra = $resultado->fetchColumn();

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

voltarPagina("../../historico-compras.php");
?>