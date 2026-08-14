<?php

include "utilidades.php";
verificarAdmin();
$conn = conectar_bd();

$sql = "INSERT INTO produto (nome, descricao, valor_unitario)
        VALUES (:nome, :descricao, :valor_unitario)";

$inserto = $conn -> prepare($sql);

$inserto->execute([
	":nome" => $_POST["nome"],
	":descricao" => $_POST["descricao"],
	":valor_unitario" => $_POST["valor"],
]);

voltarPagina("../../editar-estoque.php")
?>