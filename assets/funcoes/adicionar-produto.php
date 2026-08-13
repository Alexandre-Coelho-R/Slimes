<?php

include "utilidades.php";
verificarAdmin();
$conn = conectar_bd();

$sql = "INSERT INTO produto (nome, descricao, valor_unitario)
        VALUES (:nome, :descricao, :valor_unitario)";

$inserto = $conn -> prepare($sql);
$inserto->bindValue(':nome', $_POST['nome']);
$inserto->bindValue(':descricao', $_POST['descricao']);
$inserto->bindValue(':valor_unitario', $_POST['valor']);
$inserto->execute();

header("Location: ../../editar-produtos.php");
exit;
?>