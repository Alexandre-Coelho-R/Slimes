<?php

session_start();
include "utilidades.php";

if (!verificarLogin()) voltarInfo("Você não está logado");

$acao = $_POST["acao"] ?? "";
$id_produto = (int) ($_POST["id_produto"] ?? 0);

if ($id_produto === 0 && $acao !== "limpar") {
    echoFechar("erro");
}

$conn = conectar_bd();

// Verificar se usuário tem carrinho ou não

$sql = "SELECT id_compra FROM compra WHERE status='carrinho' AND fk_usuario=:id_usuario";
$select = $conn -> prepare($sql);
$select -> execute([":id_usuario" => $_SESSION["id_usuario"]]);
$resultado = $select -> fetch(PDO::FETCH_ASSOC);

// Pegar id_compra

if ($resultado) {
    $id_compra = $resultado["id_compra"];
}  else {
    $sql = "INSERT INTO compra (fk_usuario, sessao)
            VALUES (:id_usuario, 'seila')";
    $insert = $conn -> prepare($sql);
    $insert -> execute([":id_usuario" => $_SESSION["id_usuario"]]);
    
    $id_compra = $conn -> lastInsertId();
}

// Tratar as diferentes ações

if ($acao === "adicionar") {
    $sql = "SELECT *
            FROM compra_produto
            WHERE fk_compra=:id_compra AND fk_produto=:id_produto";
    $select = $conn -> prepare($sql);
    $select -> execute([":id_compra" => $id_compra, ":id_produto" => $id_produto]);
    $resultado = $select -> fetch(PDO::FETCH_ASSOC);

    if ($resultado) { // Se já existe
        $sql = "UPDATE compra_produto
                SET quantidade = quantidade + 1
                WHERE fk_compra=:id_compra AND fk_produto=:id_produto";
        $update = $conn -> prepare($sql);
        $update -> execute([":id_produto" => $id_produto, ":id_compra" => $id_compra]);
    } else { // Se não existe
        $sql = "INSERT INTO compra_produto (fk_produto, fk_compra, quantidade)
                VALUES (:id_produto, :id_compra, 1)";
        $insert = $conn -> prepare($sql);
        $insert -> execute([":id_produto" => $id_produto, ":id_compra" => $id_compra]);
    }
} else if ($acao === "diminuir") {
    $sql = "SELECT quantidade
            FROM compra_produto
            WHERE fk_compra=:id_compra AND fk_produto=:id_produto";
    $select = $conn -> prepare($sql);
    $select -> execute([":id_compra" => $id_compra, ":id_produto" => $id_produto]);
    $resultado = $select -> fetch(PDO::FETCH_ASSOC);

    if (!$resultado) echoFechar("erro");

    if ($resultado["quantidade"] == 1) {
        $sql = "DELETE FROM compra_produto
                WHERE fk_compra=:id_compra AND fk_produto=:id_produto";
        $delete = $conn -> prepare($sql);
        $delete -> execute([":id_produto" => $id_produto, ":id_compra" => $id_compra]);
    } else {
        $sql = "UPDATE compra_produto
                SET quantidade = quantidade - 1
                WHERE fk_compra=:id_compra AND fk_produto=:id_produto";
        $update = $conn -> prepare($sql);
        $update -> execute([":id_produto" => $id_produto, ":id_compra" => $id_compra]);
    }
} else if ($acao === "remover") {
    $sql = "DELETE FROM compra_produto
            WHERE fk_compra=:id_compra AND fk_produto=:id_produto";
    $delete = $conn -> prepare($sql);
    $delete -> execute([":id_produto" => $id_produto, ":id_compra" => $id_compra]);
} else if ($acao === "limpar") {
    $sql = "DELETE FROM compra_produto
            WHERE fk_compra=:id_compra";
    $delete = $conn -> prepare($sql);
    $delete -> execute([":id_compra" => $id_compra]);
} else {
    echoFechar("erro");
}

echoFechar("sucesso");
?>