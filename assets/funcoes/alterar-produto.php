<?php

include "utilidades.php";
verificarAdmin();
$conn = conectar_bd();

mexerSQL(
    "UPDATE produto
     SET nome=:nome, descricao=:descricao, categoria=:categoria, valor_unitario=:valor_unitario, imagem=:imagem
     WHERE id_produto=:id_produto",
    [
        ":nome" => $_POST["nome"],
        ":descricao" => $_POST["descricao"],
        ":categoria" => $_POST["categoria"],
        ":valor_unitario" => $_POST["valor"],
        ":imagem" => $_POST["imagem"],
        ":id_produto" => $_POST["id_produto"]
    ],
    $conn
);

voltarPagina("../../editar-produtos.php");
?>