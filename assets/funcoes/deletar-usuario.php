<?php

session_start();
include "utilidades.php";
$conn = conectar_bd();

// Verificar se usuário existe e deletá-lo

if (isset($_SESSION["usuario_id"])) {
    $sql = "UPDATE usuario
    SET nome='excluido', email='excluido', excluido=TRUE, data_exclusao=CURRENT_TIMESTAMP
    WHERE id_usuario=:id_usuario";
    $deletar = $conn -> prepare($sql);
    $deletar -> bindParam(":id_usuario", $_SESSION["usuario_id"]);
    $deletar -> execute();
    session_unset();
    session_destroy();
    voltarPagina("Sucesso na operação");
} else {
    voltarPagina("Falha na operação");
}

exit;
?>