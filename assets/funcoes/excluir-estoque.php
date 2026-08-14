<?php

include "utilidades.php";
verificarAdmin();
$conn = conectar_bd();

$sql = "DELETE FROM entrada WHERE id_entrada=:id_entrada";
$deletar = $conn -> prepare($sql);
$deletar -> bindValue(":id_entrada", $_GET["id"]);
$deletar -> execute();

header("Location: ../../editar-estoque.php");
exit;
?>