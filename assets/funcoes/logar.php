<?php

session_start();
include "utilidades.php";
$conn = conectar_bd();

// Consistência de dados

$email = trim($_POST["email"] ?? "");
$senha = $_POST["senha"] ?? "";

if ($email === "" || $senha === "") die("Preencha todos os campos.");

// Verificar as credenciais

$sql = "SELECT id_usuario, nome, email, senha
        FROM usuario
        WHERE email = :email";

$select = $conn->prepare($sql);
$select->bindValue(":email", $email);
$select->execute();

$usuario = $select->fetch(PDO::FETCH_ASSOC);

if (!$usuario) die("Email ou senha incorretos.");

if (!password_verify($senha, $usuario["senha"])) die("Email ou senha incorretos.");

$_SESSION["usuario_id"] = $usuario["id_usuario"];
$_SESSION["usuario_nome"] = $usuario["nome"];
$_SESSION["usuario_email"] = $usuario["email"];

header("Location: usuario.php");
exit;

?>