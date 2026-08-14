<?php

include "utilidades.php";
verificarAdmin();
$conn = conectar_bd();

$sql = "INSERT INTO entrada (fk_produto, quantidade, custo_unitario, obs)
        VALUES (:fk_produto, :quantidade, :custo_unitario, :obs)";

$inserto = $conn -> prepare($sql);

$inserto->execute([
	":fk_produto" => $_POST["produto"],
	":quantidade" => $_POST["quantidade"],
	":custo_unitario" => $_POST["custo_unitario"],
	":obs" => $_POST["obs"],
]);

voltarPagina("../../adicionar-estoque.php");
?>