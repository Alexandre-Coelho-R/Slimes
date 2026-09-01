<?php

session_start();
include "utilidades.php";
$conn = conectar_bd();

// Verificar se usuário existe e deletá-lo

if (isset($_SESSION["usuario_id"])) {
    mexerSQL(
        "UPDATE usuario
         SET nome='excluido', email=:email, excluido=TRUE, data_exclusao=CURRENT_TIMESTAMP, imagem=null
         WHERE id_usuario=:id_usuario",
        [
            ":email" => "excluido_" . $_SESSION["usuario_id"],
            ":id_usuario" => $_SESSION["usuario_id"]
        ],
        $conn
    );
    session_unset();
    session_destroy();
    voltarInfo("Sucesso na operação");
} else {
    voltarInfo("Falha na operação");
}

exit;
?>