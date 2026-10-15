<?php

require_once "utilidades.php";
verificarAdmin();
$conn = conectar_bd();

$nomeArquivo = null;

if (isset($_FILES["imagem"]) && $_FILES["imagem"]["error"] === UPLOAD_ERR_OK) {
    $arquivo = $_FILES["imagem"];

    if (@getimagesize($arquivo["tmp_name"]) === false) {
        voltarPagina("../../editar-produtos.php");
    }

    $extensao = pathinfo($arquivo["name"], PATHINFO_EXTENSION);

    $pasta = "../imagens/produtos/";
    $nomeArquivo = "produto_" . time() . "_" . uniqid() . "." . $extensao;

    if (!move_uploaded_file($arquivo["tmp_name"], $pasta . $nomeArquivo)) {
        voltarPagina("../../editar-produtos.php");
    }
}

if ($nomeArquivo !== null) {
    voltarPagina("../../editar-produtos.php");
}

mexerSQL(
    "INSERT INTO produto (nome, descricao, categoria, valor_unitario, imagem)
     VALUES (:nome, :descricao, :categoria, :valor_unitario, :imagem)",
    [
        ":nome" => $_POST["nome"],
        ":descricao" => $_POST["descricao"],
        ":categoria" => $_POST["categoria"],
        ":valor_unitario" => $_POST["valor"],
        ":imagem" => $nomeArquivo
    ],
    $conn
);

voltarPagina("../../editar-produtos.php");
?>