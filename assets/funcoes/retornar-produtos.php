<?php

require_once "utilidades.php";

if (isset($_SESSION["carrinho_nao_logado_id_compra"])) {
    $id_compra = $_SESSION["carrinho_nao_logado_id_compra"];
} else if (isset($_SESSION["carrinho_id_compra"])){
    $id_compra = $_SESSION["carrinho_id_compra"];
} else {
    return "";
}

$conn = conectar_bd();

$select = mexerSQL("SELECT SUM(quantidade)
                    FROM compra_produto
                    WHERE fk_compra=:id_compra",
                    [":id_compra" => $id_compra],
                    $conn);
               
return (int) ($select -> fetchColumn());
?>