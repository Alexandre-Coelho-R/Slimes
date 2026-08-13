<?php

include "utilidades.php";
$conn = conectar_bd();

$sql = "UPDATE produto
        SET nome=:nome, descricao=:descricao, valor_unitario=:valor_unitario
        WHERE id_produto=:id_produto";

$update = $conn -> prepare($sql);
$update->bindValue(':nome', $_POST['nome']);
$update->bindValue(':descricao', $_POST['descricao']);
$update->bindValue(':valor_unitario', $_POST['valor']);
$update->bindValue(':id_produto', $_POST['id_produto']);
$update->execute();

header("Location: ../../editar-produtos.php");
exit;
?>