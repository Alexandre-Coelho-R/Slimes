<?php
include "assets/funcoes/utilidades.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim((string) filter_input(INPUT_POST, "email"));

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        voltarInfo("Informe um e-mail válido.");
    }

    $conn = conectar_bd();

    $usuario = mexerSQL(
        "SELECT email, senha FROM usuario
         WHERE email = :email AND excluido = FALSE",
        [":email" => $email],
        $conn
    )->fetch(PDO::FETCH_ASSOC);

    if (!$usuario) voltarInfo("E-mail não encontrado.");

    $_SESSION["recuperacao_email"] = $usuario["email"];

    $link = rtrim("http://localhost:1000", "/") .
            "/redefinir.php?token=" . rawurlencode($usuario["senha"]);

    $link = htmlspecialchars($link, ENT_QUOTES, "UTF-8");

    if (!EnviaEmail(
        "Recuperação de senha",
        "<p><a href='$link'>Clique aqui para redefinir sua senha</a></p>",
        $usuario["email"],
        $erro
    )) {
        unset($_SESSION["recuperacao_email"]);
        voltarInfo("Erro no envio: " . htmlspecialchars($erro, ENT_QUOTES, "UTF-8"));
    }

    voltarInfo("Link enviado! Abra-o no mesmo navegador.");
}

$titulo = "Recuperar senha";
$css = "usuario.css";
include "_cabecalho.php";
?>

<main>
    <section class="login-cadastro">
        <h2 class="title">Recuperar senha</h2>

        <form method="POST">
            <label for="email">Email cadastrado:</label>
            <input type="email" name="email" id="email"
                   required maxlength="100">

            <button type="submit">Enviar link</button>
        </form>

        <a href="logar.php">Voltar ao login</a>
    </section>
</main>

<?php include "_rodape.php"; ?>