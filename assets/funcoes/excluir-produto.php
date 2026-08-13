<?php

include "utilidades.php";
verificarAdmin();
$conn = conectar_bd();

// Deletar produto

$sql = "DELETE FROM produto WHERE id_produto=:id";
$delete = $conn -> prepare($sql);
$delete -> bindParam(":id", $_GET["id"]);
$delete -> execute();

header("Location: ../../editar-produtos.php");
exit;
?>