<?php

session_start();
include "utilidades.php";

if (!verificarLogin()) voltarInfo("Tem que estar logado para reservar a compra");

$conn = conectar_bd();

mexerSQL("UPDATE compra
          SET status='reservado'
          WHERE fk_usuario=:id_usuario AND status='carrinho'",
          [":id_usuario" => $_SESSION["usuario_id"]],
          $conn);

voltarPagina("../../historico-compras.php");
?>