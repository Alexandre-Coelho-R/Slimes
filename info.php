<?php
include "assets/funcoes/utilidades.php";

$mostrar_contador_carrinho = false;
$titulo = "Informações";
include "_cabecalho.php";
?>

<main>
    <h2 class="subtitle"><?=$_SESSION["mensagem"] ?? ""?></h2>
</main>

<?php include "_rodape.php"; ?>