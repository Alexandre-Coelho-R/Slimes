<?php

include "utilidades.php";
verificarAdmin();
$conn = conectar_bd();

mexerSQL(
    "DELETE FROM entrada
     WHERE id_entrada=:id_entrada",
    [":id_entrada" => $_GET["id"]],
    $conn
);
voltarPagina("../../editar-estoque.php");
?>