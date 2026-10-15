<?php

session_start();

$titulo = "Usuário";
$css = "usuario.css";
include "_cabecalho.php";

if (isset($_SESSION["usuario_nome"])) header("Location: usuario.php");
?>

<main>
    <section class="login-cadastro">
        <h2 class="title">Login</h2>
        <form action="assets/funcoes/logar-usuario.php" method="POST">
            <label for="email-l">Email:</label>
            <input type="email" name="email" id="email-l" placeholder="seu-email@gmail.com" required maxlength="32">

            <label for="senha-l">Senha:</label>
            <input type="password" name="senha" id="senha-l" placeholder="Digite sua senha..." required minlength="5" maxlength="30">
            
            <button type="submit">Logar</button>
        </form>
    </section>

    <a href="cadastrar.php" class="voltarAtras especial"><span>Não tem conta?</span></a>
</main>

<?php include "_rodape.php"; ?>