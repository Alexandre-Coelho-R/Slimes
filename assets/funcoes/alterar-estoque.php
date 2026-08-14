<?php

include "utilidades.php";
verificarAdmin();
$conn = conectar_bd();

$sql = "UPDATE entrada
        SET fk_produto=:fk_produto, quantidade=:quantidade, custo_unitario=:custo_unitario, obs=:obs
        WHERE id_entrada=:id_entrada";

$update = $conn -> prepare($sql);
$update->bindValue(':fk_produto', $_POST['fk_produto']);
$update->bindValue(':quantidade', $_POST['quantidade']);
$update->bindValue(':custo_unitario', $_POST['custo_unitario']);
$update->bindValue(':obs', $_POST['obs']);
$update->bindValue(':id_entrada', $_POST['id_entrada']);
$update->execute();

header("Location: ../../editar-estoque.php");
exit;
?>