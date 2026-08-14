<?php
function conectar_bd() {   
    try {
        $conn = new PDO("pgsql:host=projetoscti.com.br;port=54432;dbname=cti_db;user=ra2557048;password=GV4H2M6ARl9tDj");
        $conn->exec("SET search_path TO ra2557048");
    } catch (PDOException $e) {
        voltarInfo("Erro na conexão com o banco de dados.");
    }

    return $conn;
}

function voltarInfo($mensagem = "") {
    if (session_status() != PHP_SESSION_ACTIVE) session_start();
    $_SESSION["mensagem"] = $mensagem;
    header("Location: ../../info.php");
    exit;
}

function voltarPagina($pagina = "") {
    header("Location: $pagina");
    exit;
}

function verificarAdmin() {
    if (session_status() != PHP_SESSION_ACTIVE) session_start();
    if (!($_SESSION["usuario_admin"] ?? false)) voltarInfo("Você não tem permissão para acessar essa página");
}
?>