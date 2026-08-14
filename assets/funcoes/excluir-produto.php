<?php

include "utilidades.php";
verificarAdmin();
$conn = conectar_bd();

// Sabor deletar produto

if ($_GET["deletar"] == "Excluir"){
    $sql = "UPDATE usuario
            SET excluido=TRUE, data_exclusao=CURRENT_TIMESTAMP
            WHERE id_produto=:id_produto";
    $deletar = $conn -> prepare($sql);
    $deletar -> bindParam(":id_produto", $_GET["id"]);
    $deletar -> execute();
}

// Reinserir o produto

if ($_GET["deletar"] == "Incluir") {
    $sql = "UPDATE usuario
            SET excluido=FALSE, data_exclusao=null
            WHERE id_produto=:id_produto";
    $deletar = $conn -> prepare($sql);
    $deletar -> bindParam(":id_produto", $_GET["id"]);
    $deletar -> execute();
}

header("Location: ../../editar-produtos.php");
exit;
?>