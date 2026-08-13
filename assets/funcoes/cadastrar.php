<?php

include "utilidades.php";
$conn = conectar_bd();

// Consistência de dados

$nome = trim($_POST["nome"] ?? "");
$email = trim($_POST["email"] ?? "");
$senha = $_POST["senha"] ?? "";

if ($nome === "" || $email === "" || $senha === "") die("Preencha todos os campos.");
if (strlen($nome) < 2 || strlen($nome) > 80) die("Nome inválido.");
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) die("Email inválido.");
if (strlen($senha) < 5 || strlen($senha) > 30)die("Senha inválida.");

// Verificar se email já está cadastrado

$sql = "SELECT id_usuario FROM usuario WHERE email = :email";
$insert = $conn->prepare($sql);
$insert->bindValue(":email", $email);
$insert->execute();
if ($insert->fetch()) die("Este email já está cadastrado.");

// Cadastrar o usuário

$sql = "INSERT INTO usuario (nome, email, senha) VALUES (:nome, :email, :senha)";

$insert = $conn->prepare($sql);
$insert->bindValue(":nome", $nome);
$insert->bindValue(":email", $email);
$insert->bindValue(":senha", password_hash($senha, PASSWORD_DEFAULT));

$insert->execute();

header("Location: ../../usuario.php");
exit;
?>