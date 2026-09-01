<?php

include "utilidades.php";
$conn = conectar_bd();

$sql = "SELECT *
        FROM carta
        ORDER BY id_carta
        ";
$select = $conn->query($sql);
$cartas = $select->fetchAll(PDO::FETCH_ASSOC);

header("Content-Type: application/json; charset=utf-8");
echo json_encode($cartas);
?>