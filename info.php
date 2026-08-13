<?php
$titulo = "Informações";
include "assets/componentes/head-header.php";
session_start();
?>

<main>
    <h2 class="title"><?=$_SESSION["mensagem"] ?? ""?></h2>
</main>

<?php include "assets/componentes/footer.php"?>