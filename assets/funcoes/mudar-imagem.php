<?php

session_start();
include "utilidades.php";

if (!isset($_SESSION["usuario_id"])) voltarPagina("../../usuario.php");
if (!isset($_FILES["imagem"])) voltarPagina("../../usuario.php");
if ($_FILES["imagem"]["error"] !== UPLOAD_ERR_OK) voltarPagina("../../usuario.php");

$conn = conectar_bd();




voltarPagina("../../usuario.php");
?>