<?php

session_start();
include "utilidades.php";

$acao = $_POST["acao"] ?? "";
$id_produto = (int) ($_POST["id_produto"] ?? 0);

if ($id_produto === 0 && $acao !== "limpar") {
    echoFechar("erro");
}

$conn = conectar_bd();

// Verificar se usuário está logado ou não

if (verificarLogin()) {
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
        mexerSQL("INSERT INTO compra (fk_usuario, status)
                  VALUES (:id_usuario, 'carrinho')", 
                  [":id_usuario" => $_SESSION["usuario_id"]],
                  $conn);

        $id_compra = $conn -> lastInsertId();
    }
} else {
    // Verificar se usuário tem carrinho ou não

    $select = mexerSQL("SELECT id_compra
                        FROM compra
                        WHERE status='carrinho' AND sessao=:id_sessao",
                        [":id_sessao" => session_id()],
                        $conn);

    $resultado = $select -> fetch(PDO::FETCH_ASSOC);

    // Pegar id_compra

    if ($resultado) {
        $id_compra = $resultado["id_compra"];
    }  else {
        mexerSQL("INSERT INTO compra (sessao, status)
                  VALUES (:id_sessao, 'carrinho')", 
                  [":id_sessao" => session_id()],
                  $conn);

        $id_compra = $conn -> lastInsertId();
    }

    $_SESSION["carrinho_nao_logado"] = true;
    $_SESSION["carrinho_nao_logado_id_compra"] = $id_compra;
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