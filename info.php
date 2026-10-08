<?php
session_start();

$titulo = "Informações";
include "_cabecalho.php";
?>

<main>
    <h2 class="subtitle"><?=$_SESSION["mensagem"] ?? ""?></h2>
</main>

<?php include "_rodape.php"; ?>