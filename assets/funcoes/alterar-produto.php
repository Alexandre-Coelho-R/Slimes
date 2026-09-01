<?php

include "utilidades.php";
verificarAdmin();
$conn = conectar_bd();

mexerSQL(
    "UPDATE produto
     SET nome=:nome, descricao=:descricao, valor_unitario=:valor_unitario
     WHERE id_produto=:id_produto",
    [
        ":nome" => $_POST["nome"],
        ":descricao" => $_POST["descricao"],
        ":valor_unitario" => $_POST["valor"],
        ":id_produto" => $_POST["id_produto"]
    ],
    $conn
);

voltarPagina("../../editar-produtos.php");
?>