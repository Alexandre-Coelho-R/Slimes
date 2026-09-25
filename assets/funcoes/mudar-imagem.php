<?php

session_start();
include "utilidades.php";

if (!isset($_SESSION["usuario_id"])) voltarPagina("../../usuario.php");
if (!isset($_FILES["imagem"])) voltarPagina("../../usuario.php");
if ($_FILES["imagem"]["error"] !== 0) voltarPagina("../../usuario.php");

$conn = conectar_bd(); // Alertar os erros?

$imagemAntiga = $_SESSION["usuario_imagem"] ?? false;
$arquivo = $_FILES["imagem"];
if ($arquivo["size"] > 2 * 1024 * 1024) voltarPagina("../../usuario.php");
if (@getimagesize($arquivo['tmp_name']) === false) voltarPagina("../../usuario.php");

$extensao = pathinfo($arquivo["name"], PATHINFO_EXTENSION);
$pasta = "../imagens/usuarios/";
$nomeArquivo = 'usuario_' . time() . '_' . uniqid() . '.' . $extensao;
if (move_uploaded_file($arquivo["tmp_name"], $pasta . $nomeArquivo)) {
    $_SESSION["usuario_imagem"] = $nomeArquivo;
    mexerSQL("UPDATE usuario
              SET imagem=:imagem
              WHERE id_usuario=:id_usuario",
              [":imagem" => $nomeArquivo, ":id_usuario" => $_SESSION["usuario_id"]],
              $conn);

    if ($imagemAntiga) {
        unlink($pasta . $imagemAntiga);
    }
}

voltarPagina("../../usuario.php");
?>