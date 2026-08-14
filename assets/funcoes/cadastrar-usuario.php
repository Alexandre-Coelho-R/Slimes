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

$sql = "SELECT id_usuario FROM usuario WHERE email = :email";
$insert = $conn->prepare($sql);
$insert->execute([":email" => $email]);
if ($insert->fetch()) voltarInfo("Este email já está cadastrado.");

// Cadastrar o usuário

$sql = "INSERT INTO usuario (nome, email, senha) VALUES (:nome, :email, :senha)";
$insert = $conn->prepare($sql);
$insert->execute([
    ":nome" => $nome,
    ":email" => $email,
    ":senha" => password_hash($senha, PASSWORD_DEFAULT),
]);

// Pegar ID

$sql = "SELECT id_usuario FROM usuario WHERE email = :email";
$select = $conn->prepare($sql);
$select->execute([":email" => $email]);
$id = $select->fetchColumn();

// Colocar informações na session

$_SESSION["usuario_id"] = $id;
$_SESSION["usuario_nome"] = $nome;
$_SESSION["usuario_email"] = $email;

voltarPagina("../../usuario.php")
?>