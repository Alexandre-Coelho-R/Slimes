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

if ($nomeArquivo === null) {
    mexerSQL(
        "UPDATE produto
        SET nome=:nome, descricao=:descricao, categoria=:categoria, valor_unitario=:valor_unitario, imagem=:imagem
        WHERE id_produto=:id_produto",
        [
            ":nome" => $_POST["nome"],
            ":descricao" => $_POST["descricao"],
            ":categoria" => $_POST["categoria"],
            ":valor_unitario" => $_POST["valor"],
            ":imagem" => $nomeArquivo,
            ":id_produto" => $_POST["id_produto"]
        ],
        $conn
    );
} else {
    mexerSQL(
        "UPDATE produto
        SET nome=:nome, descricao=:descricao, categoria=:categoria, valor_unitario=:valor_unitario
        WHERE id_produto=:id_produto",
        [
            ":nome" => $_POST["nome"],
            ":descricao" => $_POST["descricao"],
            ":categoria" => $_POST["categoria"],
            ":valor_unitario" => $_POST["valor"],
            ":id_produto" => $_POST["id_produto"]
        ],
        $conn
    );
}

voltarPagina("../../editar-produtos.php");
?>