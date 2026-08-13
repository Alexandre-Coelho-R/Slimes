<?php

session_start();
include "utilidades.php";
$conn = conectar_bd();

if (isset($_SESSION["usuario_id"])) {
    $sql = "DELETE FROM usuario WHERE id_usuario=:id_usuario";
    $delete = $conn -> prepare($sql);
    $delete -> bindParam(":id_usuario", $_SESSION["usuario_id"]);
    $delete -> execute();
    session_unset();
    session_destroy();
    voltarPagina("Sucesso na operação");
} else {
    voltarPagina("Falha na operação");
}

exit;
?>