<?php

include "utilidades.php";
verificarAdmin();
$conn = conectar_bd();

// Sabor deletar produto

if ($_GET["deletar"] == "Excluir"){
    $sql = "UPDATE produto
            SET excluido=TRUE, data_exclusao=CURRENT_TIMESTAMP
            WHERE id_produto=:id_produto";
    $deletar = $conn -> prepare($sql);
    $deletar -> execute([":id_produto" => $_GET["id"]]);
}

// Reinserir o produto

if ($_GET["deletar"] == "Incluir") {
    $sql = "UPDATE produto
            SET excluido=FALSE, data_exclusao=null
            WHERE id_produto=:id_produto";
    $deletar = $conn -> prepare($sql);
    $deletar -> execute([":id_produto" => $_GET["id"]]);
}

voltarPagina("../../editar-produtos.php");
?>