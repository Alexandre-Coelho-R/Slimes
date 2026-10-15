<?php

session_start();

$titulo = "Usuário";
$css = "usuario.css";
$js = "cadastrar.js";
include "_cabecalho.php";

if (isset($_SESSION["usuario_nome"])) header("Location: usuario.php");

?>

<main>
    <section class="login-cadastro">
        <h2 class="title">Cadastro</h2>
        <form action="assets/funcoes/cadastrar-usuario.php" method="POST">
            <label for="nome-c">Nome:</label>
            <input type="text" name="nome" id="nome-c" placeholder="Seu nome aqui..." required minlength="2" maxlength="80">

            <label for="telefone-c">Telefone:</label>
            <input type="tel" name="telefone" id="telefone-c" placeholder="(00) 00000-0000" required minlength="15" maxlength="15">

            <label for="email-c">Email:</label>
            <input type="email" name="email" id="email-c" placeholder="seu-email@gmail.com" required maxlength="100">

            <label for="senha-c">Senha:</label>
            <input type="password" name="senha" id="senha-c" placeholder="Digite sua senha..." required minlength="5" maxlength="30">
            
            <button type="submit">Cadastrar</button>
        </form>
    </section>

    <a href="logar.php" class="voltarAtras especial"><span>Já tem conta?</span></a>
</main>

<?php include "_rodape.php"; ?>