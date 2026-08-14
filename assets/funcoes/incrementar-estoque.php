<?php

include "utilidades.php";
verificarAdmin();
$conn = conectar_bd();

$sql = "INSERT INTO entrada (fk_produto, quantidade, custo_unitario, obs)
        VALUES (:fk_produto, :quantidade, :custo_unitario, :obs)";

$inserto = $conn -> prepare($sql);
$inserto->bindValue(':fk_produto', $_POST['produto']);
$inserto->bindValue(':quantidade', $_POST['quantidade']);
$inserto->bindValue(':custo_unitario', $_POST['custo_unitario']);
$inserto->bindValue(':obs', $_POST['obs'] ?? "");
$inserto->execute();

header("Location: ../../adicionar-estoque.php");
exit;
?>