<?php

session_start();
include "utilidades.php";
$conn = conectar_bd();

// Consistência de dados

$email = trim($_POST["email"] ?? "");
$senha = $_POST["senha"] ?? "";
if ($email === "" || $senha === "") voltarInfo("Preencha todos os campos.");

// Verificar as credenciais

$select = mexerSQL("SELECT id_usuario, nome, email, senha, admin, excluido, imagem
                    FROM usuario
                    WHERE email = :email",
                    [":email" => $email],
                    $conn
                    );

$usuario = $select->fetch(PDO::FETCH_ASSOC);

// + Consistência de dados

if (!$usuario) voltarInfo("Email não cadastrado");
if ($usuario["excluido"]) voltarInfo("Email não cadastrado");
if (!password_verify($senha, $usuario["senha"])) voltarInfo("Senha incorreta.");

// Verificar se tem carrinho não logado e, se tiver, colocar para o usuário

if ($_SESSION["carrinho_nao_logado"] ?? false) {
    // Apagar possível carrinho antigo da conta
    mexerSQL("DELETE FROM compra
              WHERE status = 'carrinho'
              AND fk_usuario = :id_usuario",
              [":id_usuario" => $usuario["id_usuario"]],
              $conn);

    // Transformar o carrinho sem logar no carrinho do usuário
    mexerSQL("UPDATE compra
              SET fk_usuario = :id_usuario, sessao = NULL
              WHERE id_compra = :id_compra",
              [":id_usuario" => $usuario["id_usuario"],
               ":id_compra" => $_SESSION["carrinho_nao_logado_id_compra"]],
              $conn);

    unset($_SESSION["carrinho_nao_logado"]);
    unset($_SESSION["carrinho_nao_logado_id_compra"]);
}

// Colocar informações na session

$_SESSION["usuario_id"] = $usuario["id_usuario"];
$_SESSION["usuario_nome"] = $usuario["nome"];
$_SESSION["usuario_email"] = $usuario["email"];
$_SESSION["usuario_admin"] = $usuario["admin"];
$_SESSION["usuario_imagem"] = $usuario["imagem"];

voltarPagina("../../usuario.php");
?>