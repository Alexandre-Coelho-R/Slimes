<?php
function conectar_bd() {   
    $string_conexao = "pgsql:host=projetoscti.com.br;port=54432;dbname=cti_db;user=ra2557048;password=GV4H2M6ARl9tDj";

    try {
        $conn = new PDO($string_conexao);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $conn->exec("SET search_path TO ra2557048");

    } catch (PDOException $e) {
        die("Erro na conexão com o banco: " . $e->getMessage());
    }

    return $conn;
}

function voltarPagina($mensagem = "") {
    session_start();
    $_SESSION["mensagem"] = $mensagem;
    header("Location: /info.php");
    exit;
}
?>