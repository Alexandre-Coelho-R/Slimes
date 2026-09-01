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

$select = mexerSQL("SELECT id_compra
                    FROM compra
                    WHERE status='carrinho' AND fk_usuario=:id_usuario",
                    [":id_usuario" => $_SESSION["usuario_id"]],
                    $conn);

$resultado = $select -> fetch(PDO::FETCH_ASSOC);

// Pegar id_compra

if ($resultado) {
    $id_compra = $resultado["id_compra"];
}  else {
    mexerSQL("INSERT INTO compra (fk_usuario, sessao)
              VALUES (:id_usuario, 'seila')", 
              [":id_usuario" => $_SESSION["usuario_id"]],
              $conn);

    $id_compra = $conn -> lastInsertId();
}

// Tratar as diferentes ações

if ($acao === "adicionar") {
    $select = mexerSQL("SELECT *
                        FROM compra_produto
                        WHERE fk_compra=:id_compra AND fk_produto=:id_produto",
                        [   
                            ":id_compra" => $id_compra,
                            ":id_produto" => $id_produto
                        ],
                        $conn);
                        
    $resultado = $select -> fetch(PDO::FETCH_ASSOC);

    if ($resultado) { // Se já existe
        mexerSQL("UPDATE compra_produto
                  SET quantidade = quantidade + 1
                  WHERE fk_compra=:id_compra AND fk_produto=:id_produto",
                  [":id_produto" => $id_produto, ":id_compra" => $id_compra],
                  $conn);
    } else { // Se não existe
        mexerSQL("INSERT INTO compra_produto (fk_produto, fk_compra, quantidade)
                  VALUES (:id_produto, :id_compra, 1)",
                  [":id_produto" => $id_produto, ":id_compra" => $id_compra],
                  $conn);
    }
} else if ($acao === "diminuir") {
    $select = mexerSQL("SELECT quantidade
                        FROM compra_produto
                        WHERE fk_compra=:id_compra AND fk_produto=:id_produto",
                        [":id_compra" => $id_compra, ":id_produto" => $id_produto],
                        $conn);
    $resultado = $select -> fetch(PDO::FETCH_ASSOC);

    if (!$resultado) echoFechar("erro");

    if ($resultado["quantidade"] == 1) {
        mexerSQL("DELETE FROM compra_produto
                  WHERE fk_compra=:id_compra AND fk_produto=:id_produto",
                  [":id_produto" => $id_produto, ":id_compra" => $id_compra],
                  $conn);
    } else {
        mexerSQL("UPDATE compra_produto
                  SET quantidade = quantidade - 1
                  WHERE fk_compra=:id_compra AND fk_produto=:id_produto",
                  [":id_produto" => $id_produto, ":id_compra" => $id_compra],
                  $conn);
    }
} else if ($acao === "remover") {
    mexerSQL("DELETE FROM compra_produto
              WHERE fk_compra=:id_compra AND fk_produto=:id_produto",
              [":id_produto" => $id_produto, ":id_compra" => $id_compra],
              $conn);
} else if ($acao === "limpar") {
    mexerSQL("DELETE FROM compra_produto
              WHERE fk_compra=:id_compra",
              [":id_compra" => $id_compra],
              $conn);
} else {
    echoFechar("erro");
}

echoFechar("sucesso");
?>