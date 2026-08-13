<?php

session_start();
include "utilidades.php";
$conn = conectar_bd();

// Consistência de dados

$nome = trim($_POST["nome"] ?? "");
$email = trim($_POST["email"] ?? "");
$senha = trim($_POST["senha"] ?? "");

if ($nome === "" || $email === "" || $senha === "") voltarPagina("Preencha todos os campos.");
if (strlen($nome) < 2 || strlen($nome) > 80) voltarPagina("Nome inválido.");
if (strlen($email) < 5 || strlen($email) > 100) voltarPagina("Email inválido.");
if (strlen($senha) < 5 || strlen($senha) > 30)voltarPagina("Senha inválida.");

// Verificar se email já está cadastrado

$sql = "SELECT id_usuario FROM usuario WHERE email = :email";
$insert = $conn->prepare($sql);
$insert->bindValue(":email", $email);
$insert->execute();
if ($insert->fetch()) voltarPagina("Este email já está cadastrado.");

// Cadastrar o usuário

$sql = "INSERT INTO usuario (nome, email, senha) VALUES (:nome, :email, :senha)";

$insert = $conn->prepare($sql);
$insert->bindValue(":nome", $nome);
$insert->bindValue(":email", $email);
$insert->bindValue(":senha", password_hash($senha, PASSWORD_DEFAULT));
$insert->execute();

// Pegar ID

$sql = "SELECT id_usuario FROM usuario WHERE email = :email";
$select = $conn->prepare($sql);
$select->bindValue(":email", $email);
$select->execute();
$id = $select->fetchColumn();

// Colocar informações na session

$_SESSION["usuario_id"] = $id;
$_SESSION["usuario_nome"] = $nome;
$_SESSION["usuario_email"] = $email;

header("Location: ../../usuario.php");
exit;
?>