<?php

session_start();
include "assets/componentes/funcoes.php";
$conexao = conectar_bd();

$email = trim($_POST["email"] ?? "");
$senha = $_POST["senha"] ?? "";

if ($email === "" || $senha === "") {
    die("Preencha todos os campos.");
}

$sql = "SELECT id, nome, email, senha
        FROM usuarios
        WHERE email = :email";

$stmt = $conn->prepare($sql);
$stmt->bindValue(":email", $email);
$stmt->execute();

$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$usuario) {
    die("Email ou senha incorretos.");
}

if (!password_verify($senha, $usuario["senha"])) {
    die("Email ou senha incorretos.");
}

$_SESSION["usuario_id"] = $usuario["id"];
$_SESSION["usuario_nome"] = $usuario["nome"];
$_SESSION["usuario_email"] = $usuario["email"];

header("Location: usuario.php");
exit;

?>