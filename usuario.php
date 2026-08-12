<?php

session_start();

$titulo = "Usuário";
$css = "principais.css";
$js = "usuario.js";
include "assets/componentes/head-header.php";
?>

<main>
    <div id="usuario">
        <?php if (isset($_SESSION["usuario_id"])):?>

        <section id="logado">
            <h2>Seja bem-vindo, <?=htmlspecialchars($_SESSION["usuario_nome"])?>!</h2>
            <a href="alterar-senha.php">Alterar Senha</a>
            <a href="logout.php">Deslogar</a>
        </section>

        <?php else:?>
        
        <section id="logar" class="login-cadastro">
            <h2 class="title">Login</h2>
            <form action="logar.php" method="POST">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email-l" placeholder="seu-email@gmail.com" required maxlength="80">

                <label for="senha">Senha:</label>
                <input type="password" name="senha" id="senha-l" placeholder="Digite sua senha..." required minlength="5" maxlength="30">
                
                <button type="submit">Logar</button>
            </form>
        </section>


        <div id="linha"></div>
        
        <section id="cadastrar" class="login-cadastro">
            <h2 class="title">Cadastro</h2>
            <form action="cadastrar.php" method="POST">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome-c" placeholder="Seu nome aqui..." required minlength="2" maxlength="80">

                <label for="email">Email:</label>
                <input type="email" name="email" id="email-c" placeholder="seu-email@gmail.com" required maxlength="80">

                <label for="senha">Senha:</label>
                <input type="password" name="senha" id="senha-c" placeholder="Digite sua senha..." required minlength="5" maxlength="30">
                
                <button type="submit">Cadastrar</button>
            </form>
        </section>

        <?php endif;?>
    </div>
</main>

<?php
include "assets/componentes/footer.php";
?>