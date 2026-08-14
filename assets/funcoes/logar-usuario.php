<?php

session_start();
include "utilidades.php";
$conn = conectar_bd();

// Consistência de dados

$email = trim($_POST["email"] ?? "");
$senha = $_POST["senha"] ?? "";

if ($email === "" || $senha === "") voltarPagina("Preencha todos os campos.");

// Verificar as credenciais

$sql = "SELECT id_usuario, nome, email, senha, admin, excluido
        FROM usuario
        WHERE email = :email";
$select = $conn->prepare($sql);
$select->bindValue(":email", $email);
$select->execute();
$usuario = $select->fetch(PDO::FETCH_ASSOC);

if (!$usuario) voltarPagina("Email não cadastrado");
if ($usuario["excluido"]) voltarPagina("Email não cadastrado");
if (!password_verify($senha, $usuario["senha"])) voltarPagina("Senha incorreta.");

// Colocar informações na session

$_SESSION["usuario_id"] = $usuario["id_usuario"];
$_SESSION["usuario_nome"] = $usuario["nome"];
$_SESSION["usuario_email"] = $usuario["email"];
$_SESSION["usuario_admin"] = $usuario["admin"];

header("Location: ../../usuario.php");
exit;
?>