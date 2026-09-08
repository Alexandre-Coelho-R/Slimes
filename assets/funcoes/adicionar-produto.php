<?php

include "utilidades.php";
verificarAdmin();
$conn = conectar_bd();

mexerSQL(
    "INSERT INTO produto (nome, descricao, categoria, valor_unitario, imagem)
     VALUES (:nome, :descricao, :categoria, :valor_unitario, :imagem)",
    [
        ":nome" => $_POST["nome"],
        ":descricao" => $_POST["descricao"],
        ":categoria" => $_POST["categoria"],
        ":valor_unitario" => $_POST["valor"],
        ":imagem" => $_POST["imagem"]
    ],
    $conn
);

voltarPagina("../../editar-produtos.php");
?>