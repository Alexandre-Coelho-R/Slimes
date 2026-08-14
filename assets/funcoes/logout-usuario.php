<?php

session_start();
include "utilidades.php";

session_unset();
session_destroy();

voltarPagina("../../usuario.php");
?>