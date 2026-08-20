<?php
session_start();

$titulo = "Informações";
include "assets/componentes/head-header.php";
?>

<main>
    <h2 class="subtitle"><?=$_SESSION["mensagem"] ?? ""?></h2>
    <?php unset($_SESSION["mensagem"]);?>
</main>

<?php include "assets/componentes/footer.php"?>