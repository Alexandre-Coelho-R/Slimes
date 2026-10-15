<?php

require_once "utilidades.php";
$conn = conectar_bd();

$quantidade = null;
if (isset($_SESSION["carrinho_nao_logado_id_compra"])) {
    $id_usuario = $_SESSION["carrinho_nao_logado_id_compra"];
} else if (isset($_SESSION["usuario_id"])){
    $id_usuario = $_SESSION["usuario_id"];
} else {
    return "";
}

return "<p>" . mexerSQL("SELECT COUNT(fk_produto) FROM compra_produto WHERE fk_usuario=:id_usuario", [":id_usuario" => $id_usuario], $conn) . "</p>";
?>