<?php
$titulo = "Usuário";
$css = "principais.css";
$js = "usuario.js";
include "assets/componentes/head-header.php";
?>

<main>
    <div id="usuario">
        <section id="logado">
            <!-- Seja bem vindo, seu nome -->
            <!-- Alterar senha -->
            <!-- Deslogar usuário -->
        </section>
        
        <section id="logar" class="login-cadastro">
            <h2 class="title">Login</h2>
            <form>
                <label for="email-l">Email:</label>
                <input type="email" name="email-l" id="email-l" placeholder="seu-email@gmail.com" required>

                <label for="senha-l">Senha:</label>
                <input type="password" name="senha-l" id="senha-l" placeholder="Digite sua senha..." required>
                
                <button type="submit">Logar</button>
            </form>
        </section>

        <div id="linha"></div>
        
        <section id="cadastrar" class="login-cadastro">
            <h2 class="title">Cadastro</h2>
            <form>
                <label for="nome-c">Nome:</label>
                <input type="text" name="nome-c" id="nome-c" placeholder="Seu nome aqui..." required>

                <label for="email-c">Email:</label>
                <input type="email" name="email-c" id="email-c" placeholder="seu-email@gmail.com" required>

                <label for="senha-c">Senha:</label>
                <input type="password" name="senha-c" id="senha-c" placeholder="Digite sua senha..." required>
                
                <button type="submit">Cadastrar</button>
            </form>
        </section>
    </div>
</main>

<?php
include "assets/componentes/footer.php";
?>