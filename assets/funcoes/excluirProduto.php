<?php

include "utilidades.php";
$conn = conectar_bd();

// Deletar produto

$sql = "DELETE FROM produto WHERE id_produto=:id";
$delete = $conn -> prepare($sql);
$delete -> bindParam(":id", $_GET["id"]);
$delete -> execute();

header("Location: ../../alterar-produtos.php");
exit;
?>