<?php

include "assets/componentes/funcoes.php";
$conn = conectar_bd();

$nome = trim($_POST["nome"] ?? "");
$email = trim($_POST["email"] ?? "");
$senha = $_POST["senha"] ?? "";

if ($nome === "" || $email === "" || $senha === "") die("Preencha todos os campos.");
if (strlen($nome) < 2 || strlen($nome) > 80) die("Nome inválido.");
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) die("Email inválido.");
if (strlen($senha) < 5 || strlen($senha) > 30)die("Senha inválida.");

$sql = "SELECT id FROM usuarios WHERE email = :email";
$insert = $conn->prepare($sql);
$insert->bindValue(":email", $email);
$insert->execute();

if ($insert->fetch()) {
    die("Este email já está cadastrado.");
}

$senhaHash = password_hash($senha, PASSWORD_DEFAULT);

$sql = "$insert INTO usuarios (nome, email, senha)
        VALUES (:nome, :email, :senha)";

$insert = $conn->prepare($sql);
$insert->bindValue(":nome", $nome);
$insert->bindValue(":email", $email);
$insert->bindValue(":senha", $senhaHash);

$insert->execute();

echo "Cadastro realizado com sucesso!";

?>