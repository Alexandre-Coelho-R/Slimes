<?php
function conectar_bd() {   
    try {
        $conn = new PDO("pgsql:host=projetoscti.com.br;port=54432;dbname=loja2a;user=loja2a;password=OcZahD4zvDa0FhJ");
    } catch (PDOException $e) {
        voltarInfo("Erro na conexão com o banco de dados.");
    }

    return $conn;
}

function mexerSQL($sql, $parametros, $conn) {
    try {
        $variavel = $conn -> prepare($sql);
        $variavel -> execute($parametros);
        return $variavel;
    } catch (PDOException $e) {
        voltarInfo("Erro na conexão com o servidor.");
    }
}

function voltarInfo($mensagem = "") {
    if (session_status() !== PHP_SESSION_ACTIVE) session_start();
    $_SESSION["mensagem"] = $mensagem;
    header("Location: /info.php");
    exit;
}

function voltarPagina($pagina = "") {
    header("Location: $pagina");
    exit;
}

function verificarLogin() {
    if (session_status() != PHP_SESSION_ACTIVE) session_start();
    return isset($_SESSION["usuario_id"]) ? true : false;
}

function verificarAdmin() {
    if (session_status() != PHP_SESSION_ACTIVE) session_start();
    if (!($_SESSION["usuario_admin"] ?? false)) voltarInfo("Você não tem permissão para acessar essa página");
}

function echoFechar($mensagem = "") {
    echo $mensagem;
    return;
}
?>