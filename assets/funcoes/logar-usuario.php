<?php

session_start();
include "utilidades.php";
$conn = conectar_bd();

// Consistência de dados

$email = trim($_POST["email"] ?? "");
$senha = $_POST["senha"] ?? "";
if ($email === "" || $senha === "") voltarInfo("Preencha todos os campos.");

// Verificar as credenciais

$select = mexerSQL("SELECT id_usuario, nome, email, senha, admin, excluido
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

// Colocar informações na session

$_SESSION["usuario_id"] = $usuario["id_usuario"];
$_SESSION["usuario_nome"] = $usuario["nome"];
$_SESSION["usuario_email"] = $usuario["email"];
$_SESSION["usuario_admin"] = $usuario["admin"];

voltarPagina("../../usuario.php");
?>