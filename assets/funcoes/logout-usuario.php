<?php

require_once "utilidades.php";

session_unset();
session_destroy();

voltarPagina("../../index.php");
?>