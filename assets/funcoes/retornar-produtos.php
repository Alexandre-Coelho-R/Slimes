<?php

require_once "utilidades.php";

if (!isset($_SESSION["carrinho_id_compra"])) return 0;

$conn = conectar_bd();

$select = mexerSQL("SELECT SUM(quantidade)
                    FROM compra_produto
                    WHERE fk_compra=:id_compra",
                    [":id_compra" => $_SESSION["carrinho_id_compra"]],
                    $conn);
               
return (int) ($select -> fetchColumn());
?>