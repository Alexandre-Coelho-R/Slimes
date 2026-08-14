<?php

include "utilidades.php";
verificarAdmin();
$conn = conectar_bd();

$sql = "UPDATE produto
        SET nome=:nome, descricao=:descricao, valor_unitario=:valor_unitario
        WHERE id_produto=:id_produto";

$update = $conn -> prepare($sql);

$update->execute([
	":nome" => $_POST["nome"],
	":descricao" => $_POST["descricao"],
	":valor_unitario" => $_POST["valor"],
	":id_produto" => $_POST["id_produto"],
]);

header("Location: ../../editar-produtos.php");
exit;
?>