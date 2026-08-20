<?php

include "utilidades.php";
verificarAdmin();
$conn = conectar_bd();

$sql = "UPDATE entrada
        SET fk_produto=:fk_produto, quantidade=:quantidade, custo_unitario=:custo_unitario, obs=:obs
        WHERE id_entrada=:id_entrada";

$update = $conn -> prepare($sql);

$update->execute([
    ":fk_produto" => $_POST["fk_produto"],
    ":quantidade" => $_POST["quantidade"],
    ":custo_unitario" => $_POST["custo_unitario"],
    ":obs" => $_POST["obs"],
    ":id_entrada" => $_POST["id_entrada"],    
]);

voltarPagina("../../editar-estoque.php");
?>