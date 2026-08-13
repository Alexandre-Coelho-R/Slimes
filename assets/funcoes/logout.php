<?php

session_start();
session_unset();
session_destroy();

header("Location: ../../usuario.php");
exit;
?>