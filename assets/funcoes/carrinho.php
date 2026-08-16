<?php

session_start();

if (!isset($_SESSION['carrinho'])) $_SESSION['carrinho'] = [];

$acao = $_POST['acao'] ?? '';
$id = $_POST['id'] ?? '';

/* =========================
   ADICIONAR
========================= */

if ($acao === 'adicionar') {

    if ($id !== '') {
        if (isset($_SESSION['carrinho'][$id])) { 
            $_SESSION['carrinho'][$id]['quantidade']++;
        } else {
            $_SESSION['carrinho'][$id] = [
                'nome' => $_POST['nome'] ?? '',
                'preco' => (float) ($_POST['preco'] ?? 0),
                'imagem' => $_POST['imagem'] ?? '',
                'quantidade' => 1
            ];
        }
    }
    /*
     * Se veio do produtos.php/deck.php,
     * retorna "OK" para o JavaScript.
     */
    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH'])) {
        echo "OK";
        exit;
    }

    header("Location: ../../carrinho.php");
    exit;
}


/* =========================
   DIMINUIR
========================= */

if ($acao === 'diminuir') {

    if (isset($_SESSION['carrinho'][$id])) {

        $_SESSION['carrinho'][$id]['quantidade']--;

        /*
         * Se chegar a zero, remove o produto.
         */
        if ($_SESSION['carrinho'][$id]['quantidade'] <= 0) {
            unset($_SESSION['carrinho'][$id]);
        }
    }

    header("Location: ../../carrinho.php");
    exit;
}


/* =========================
   REMOVER
========================= */

if ($acao === 'remover') {

    if (isset($_SESSION['carrinho'][$id])) {
        unset($_SESSION['carrinho'][$id]);
    }

    header("Location: ../../carrinho.php");
    exit;
}


/* =========================
   LIMPAR CARRINHO
========================= */

if ($acao === 'limpar') {

    $_SESSION['carrinho'] = [];

    header("Location: ../../carrinho.php");
    exit;
}


/* =========================
   ALTERAR QUANTIDADE
========================= */

if ($acao === 'alterar') {

    $quantidade = (int) ($_POST['quantidade'] ?? 1);

    if (isset($_SESSION['carrinho'][$id])) {

        if ($quantidade <= 0) {

            unset($_SESSION['carrinho'][$id]);

        } else {

            $_SESSION['carrinho'][$id]['quantidade'] = $quantidade;

        }
    }

    header("Location: ../../carrinho.php");
    exit;
}

header("Location: ../../carrinho.php");
exit;