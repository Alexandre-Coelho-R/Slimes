<?php

include "utilidades.php";
verificarAdmin();
$conn = conectar_bd();

mexerSQL(
    "INSERT INTO produto (nome, descricao, valor_unitario)
     VALUES (:nome, :descricao, :valor_unitario)",
    [
        ":nome" => $_POST["nome"],
        ":descricao" => $_POST["descricao"],
        ":valor_unitario" => $_POST["valor"]
    ],
    $conn
);

voltarPagina("../../editar-produtos.php");
?>