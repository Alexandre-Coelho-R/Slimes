<?php

session_start();
include "utilidades.php";

$conn = conectar_bd();

$acao = $_POST["acao"] ?? "";
$id_produto = (int) ($_POST["id_produto"] ?? 0);

function buscarProduto($conn, $id_produto) {
    $sql = "SELECT id_produto, valor_unitario FROM produto WHERE id_produto=:id_produto AND excluido=FALSE";
    $select = $conn->prepare($sql);
    $select->execute([":id_produto" => $id_produto]);
    return $select->fetch(PDO::FETCH_ASSOC);
}

function pegarCarrinhoUsuario($conn, $id_usuario) {
    $sql = "SELECT id_compra FROM compra WHERE fk_usuario=:id_usuario AND status='carrinho' ORDER BY id_compra DESC LIMIT 1";
    $select = $conn->prepare($sql);
    $select->execute([":id_usuario" => $id_usuario]);
    $id_compra = $select->fetchColumn();

    if ($id_compra) return $id_compra;

    $sql = "INSERT INTO compra (status, fk_usuario, sessao) VALUES ('carrinho', :id_usuario, :sessao) RETURNING id_compra";
    $insert = $conn->prepare($sql);
    $insert->execute([
        ":id_usuario" => $id_usuario,
        ":sessao" => session_id()
    ]);

    return $insert->fetchColumn();
}

if (isset($_SESSION["usuario_id"])) {
    $id_usuario = $_SESSION["usuario_id"];

    if ($acao === "adicionar") {
        $produto = buscarProduto($conn, $id_produto);
        if (!$produto) voltarInfo("Produto não encontrado.");

        $id_compra = pegarCarrinhoUsuario($conn, $id_usuario);

        $sql = "INSERT INTO compra_produto (fk_produto, fk_compra, quantidade, valor_unitario) VALUES (:fk_produto, :fk_compra, 1, :valor_unitario) ON CONFLICT (fk_produto, fk_compra) DO UPDATE SET quantidade=compra_produto.quantidade+1";
        $insert = $conn->prepare($sql);
        $insert->execute([
            ":fk_produto" => $id_produto,
            ":fk_compra" => $id_compra,
            ":valor_unitario" => $produto["valor_unitario"]
        ]);

        voltarPagina("../../carrinho.php");
    }

    $id_compra = pegarCarrinhoUsuario($conn, $id_usuario);

    if ($acao === "diminuir") {
        $sql = "UPDATE compra_produto SET quantidade=quantidade-1 WHERE fk_compra=:fk_compra AND fk_produto=:fk_produto";
        $update = $conn->prepare($sql);
        $update->execute([
            ":fk_compra" => $id_compra,
            ":fk_produto" => $id_produto
        ]);

        $sql = "DELETE FROM compra_produto WHERE fk_compra=:fk_compra AND fk_produto=:fk_produto AND quantidade<=0";
        $delete = $conn->prepare($sql);
        $delete->execute([
            ":fk_compra" => $id_compra,
            ":fk_produto" => $id_produto
        ]);

        voltarPagina("../../carrinho.php");
    }

    if ($acao === "remover") {
        $sql = "DELETE FROM compra_produto WHERE fk_compra=:fk_compra AND fk_produto=:fk_produto";
        $delete = $conn->prepare($sql);
        $delete->execute([
            ":fk_compra" => $id_compra,
            ":fk_produto" => $id_produto
        ]);

        voltarPagina("../../carrinho.php");
    }

    if ($acao === "limpar") {
        $sql = "DELETE FROM compra_produto WHERE fk_compra=:fk_compra";
        $delete = $conn->prepare($sql);
        $delete->execute([":fk_compra" => $id_compra]);

        voltarPagina("../../carrinho.php");
    }

    voltarPagina("../../carrinho.php");
}

if (!isset($_SESSION["carrinho"])) $_SESSION["carrinho"] = [];

if ($acao === "adicionar") {
    $produto = buscarProduto($conn, $id_produto);
    if (!$produto) voltarInfo("Produto não encontrado.");

    if (isset($_SESSION["carrinho"][$id_produto])) {
        $_SESSION["carrinho"][$id_produto]++;
    } else {
        $_SESSION["carrinho"][$id_produto] = 1;
    }

    voltarPagina("../../carrinho.php");
}

if ($acao === "diminuir") {
    if (isset($_SESSION["carrinho"][$id_produto])) {
        $_SESSION["carrinho"][$id_produto]--;

        if ($_SESSION["carrinho"][$id_produto] <= 0) {
            unset($_SESSION["carrinho"][$id_produto]);
        }
    }

    voltarPagina("../../carrinho.php");
}

if ($acao === "remover") {
    unset($_SESSION["carrinho"][$id_produto]);
    voltarPagina("../../carrinho.php");
}

if ($acao === "limpar") {
    $_SESSION["carrinho"] = [];
    voltarPagina("../../carrinho.php");
}

voltarPagina("../../carrinho.php");

?>