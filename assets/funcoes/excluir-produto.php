<?php

include "utilidades.php";
verificarAdmin();
$conn = conectar_bd();

// Sabor deletar produto

if ($_GET["deletar"] == "Excluir"){
    mexerSQL(
        "UPDATE produto
         SET excluido=TRUE, data_exclusao=CURRENT_TIMESTAMP
         WHERE id_produto=:id_produto",
        [":id_produto" => $_GET["id"]],
        $conn
    );
}

// Reinserir o produto

if ($_GET["deletar"] == "Incluir") {
    mexerSQL("UPDATE produto
              SET excluido=FALSE, data_exclusao=null
              WHERE id_produto=:id_produto",
             [":id_produto" => $_GET["id"]],
             $conn);
}

voltarPagina("../../editar-produtos.php");
?>