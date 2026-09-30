<?php

session_start();
include "utilidades.php";
$conn = conectar_bd();

// Consistência de dados

$nome = trim($_POST["nome"] ?? "");
$email = trim($_POST["email"] ?? "");
$senha = trim($_POST["senha"] ?? "");

if ($nome === "" || $email === "" || $senha === "") voltarInfo("Preencha todos os campos.");
if (strlen($nome) < 2 || strlen($nome) > 80) voltarInfo("Nome inválido.");
if (strlen($email) < 5 || strlen($email) > 100) voltarInfo("Email inválido.");
if (strlen($senha) < 5 || strlen($senha) > 30)voltarInfo("Senha inválida.");

// Verificar se email já está cadastrado

$insert = mexerSQL(
    "SELECT id_usuario FROM usuario WHERE email = :email",
    [":email" => $email],
    $conn
);

if ($insert->fetch()) voltarInfo("Este email já está cadastrado.");

// Cadastrar o usuário

$insert = mexerSQL(
    "INSERT INTO usuario (nome, email, senha)
     VALUES (:nome, :email, :senha)",
    [
        ":nome" => $nome,
        ":email" => $email,
        ":senha" => password_hash($senha, PASSWORD_DEFAULT)
    ],
    $conn
);

$id = $conn -> lastInsertId();

// Verificar se tem carrinho não logado e, se tiver, colocar para o usuário

if ($_SESSION["carrinho_nao_logado"] ?? false) {
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

$_SESSION["usuario_id"] = $id;
$_SESSION["usuario_nome"] = $nome;
$_SESSION["usuario_email"] = $email;
$_SESSION["usuario_imagem"] = false;

voltarPagina("../../usuario.php");
?>