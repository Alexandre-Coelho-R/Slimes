<?php
function conectar_bd() {   
    try {
        $conn = new PDO("pgsql:host=projetoscti.com.br;port=54432;dbname=cti_db;user=ra2557048;password=GV4H2M6ARl9tDj");
        $conn->exec("SET search_path TO ra2557048");
    } catch (PDOException $e) {
        voltarPagina("Erro na conexão com o banco.");
    }

    return $conn;
}

function voltarPagina($mensagem = "") {
    if (session_status() != PHP_SESSION_ACTIVE) session_start();
    $_SESSION["mensagem"] = $mensagem;
    header("Location: ../../info.php");
    exit;
}
?>