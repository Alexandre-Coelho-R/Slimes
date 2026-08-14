<?php

include "utilidades.php";
verificarAdmin();
$conn = conectar_bd();

$sql = "DELETE FROM entrada WHERE id_entrada=:id_entrada";
$deletar = $conn -> prepare($sql);
$deletar -> execute([[":id_entrada"] => $_GET["id"]]);

voltarPagina("../../editar-estoque.php");
?>