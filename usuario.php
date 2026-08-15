<?php

session_start();

$titulo = "Usuário";
$css = "principais.css";
$js = "usuario.js";
include "assets/componentes/head-header.php";
?>

<main>
    <?php if (isset($_SESSION["usuario_nome"])):?>
    <!-- USUÁRIO CADASTRADO -->
    <section id="logado">
        <div id="user-img">
            <h2>Seja bem-vindo, <?=htmlspecialchars($_SESSION["usuario_nome"])?>!</h2>
            <img src="assets/user-prefs/"<?php echo 'sei la'; ?> alt="Profile picture">
        </div>
        <div id="user-actions">
            <?php if($_SESSION["usuario_admin"] ?? false): ?>
                <div id="mod-powers">
                    <h2>PODERES DE MODERADOR</h2>
                    <a href="editar-produtos.php" class="subtitle">Gerenciar produtos</a>
                    <a href="editar-estoque.php" class="subtitle">Gerenciar estoque</a>
                </div>
            <?php endif;?>
            <h2>Tem algo a nos dizer?</h2>
            <a href="f-contato.php" class="subtitle">Entrar em contato</a>
            <h2>Opções de conta</h2>
            <a href="" class="subtitle">Alterar Senha</a>
            <a href="assets/funcoes/logout-usuario.php" class="subtitle">Deslogar no navegador</a>
            <a href="assets/funcoes/deletar-usuario.php" class="subtitle" id="delete-conta">Deletar conta</a>
        </div>
    </section>

    <?php else:?>
    <!-- USUÁRIO NÃO CADASTRADO -->
    <div id="logar-cadastrar">
        <section class="login-cadastro">
            <h2 class="title">Login</h2>
            <form action="assets/funcoes/logar-usuario.php" method="POST">
                <label for="email-l">Email:</label>
                <input type="email" name="email" id="email-l" placeholder="seu-email@gmail.com" required maxlength="100">

                <label for="senha-l">Senha:</label>
                <input type="password" name="senha" id="senha-l" placeholder="Digite sua senha..." required minlength="5" maxlength="30">
                
                <button type="submit">Logar</button>
            </form>
        </section>


        <div id="linha"></div>
        
        <section class="login-cadastro">
            <h2 class="title">Cadastro</h2>
            <form action="assets/funcoes/cadastrar-usuario.php" method="POST">
                <label for="nome-c">Nome:</label>
                <input type="text" name="nome" id="nome-c" placeholder="Seu nome aqui..." required minlength="2" maxlength="80">

                <label for="email-c">Email:</label>
                <input type="email" name="email" id="email-c" placeholder="seu-email@gmail.com" required maxlength="100">

                <label for="senha-c">Senha:</label>
                <input type="password" name="senha" id="senha-c" placeholder="Digite sua senha..." required minlength="5" maxlength="30">
                
                <button type="submit">Cadastrar</button>
            </form>
        </section>
    </div>

    <?php endif;?>
</main>

<?php
include "assets/componentes/footer.php";
?>