<?php
include "assets/funcoes/utilidades.php";
if (!verificarLogin()) voltarPagina("logar.php");

$titulo = "Usuário";
$css = "usuario.css";
include "_cabecalho.php";
?>

<main>
    <section id="logado">
        <div id="user-img">
            <h2>Seja bem-vindo, <?=htmlspecialchars($_SESSION["usuario_nome"])?>!</h2>
            <?php $src = "assets/imagens/usuarios/" . (($_SESSION["usuario_imagem"] == null) ? "usuario-padrao.webp" : htmlspecialchars($_SESSION['usuario_imagem'])); ?>
            <form action="assets/funcoes/mudar-imagem.php" method="POST" enctype="multipart/form-data">
                <label for="imagem-usuario">
                    <img src="<?= $src ?>" alt="Foto de perfil">
                </label>
                <input type="file" name="imagem" id="imagem-usuario" accept="image/*" onchange="this.form.submit()">
            </form>
        </div>
        <div id="user-actions">
            <?php if($_SESSION["usuario_admin"] ?? false): ?>
                <h2>Poderes de administrador</h2>
                <a href="editar-produtos.php">Gerenciar produtos</a>
                <a href="editar-estoque.php">Gerenciar estoque</a>
                <a href="ver-compras.php">Visualizar todas as compras</a>
            <?php endif;?>
            <h2>Tirar dúvidas</h2>
            <a href="faq.php">Veja as perguntas mais frequentes</a>
            <h2>Histórico de compras</h2>
            <a href="historico-compras.php">Visualizar suas compras agendadas</a>
            <h2>Tem algo a nos dizer?</h2>
            <a href="f-contato.php">Entrar em contato</a>
            <h2>Opções de conta</h2>
            <a href="assets/funcoes/logout-usuario.php">Deslogar no navegador</a>
            <a href="assets/funcoes/deletar-usuario.php" id="delete-conta">Deletar conta</a>
        </div>
    </section>
</main>

<?php include "_rodape.php"; ?>