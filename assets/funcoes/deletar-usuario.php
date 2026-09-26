<?php

session_start();
include "utilidades.php";
$conn = conectar_bd();

// Verificar se usuário existe e deletá-lo

if (isset($_SESSION["usuario_id"])) {
    mexerSQL(
        "UPDATE usuario
         SET nome='excluido', email=:email, telefone=null, excluido=TRUE, data_exclusao=CURRENT_TIMESTAMP, imagem=null
         WHERE id_usuario=:id_usuario",
        [
            ":email" => "excluido_" . $_SESSION["usuario_id"],
            ":id_usuario" => $_SESSION["usuario_id"]
        ],
        $conn
    );

    if ($_SESSION["usuario_imagem"]) {
        unlink("../imagens/usuarios/" . $_SESSION["usuario_imagem"]);
    }

    session_unset();
    session_destroy();
    voltarInfo("Sucesso na operação");
} else {
    voltarInfo("Falha na operação");
}

exit;
?>