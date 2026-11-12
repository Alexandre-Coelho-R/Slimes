<?php
include "assets/funcoes/utilidades.php";

header("Referrer-Policy: no-referrer");
header("Cache-Control: no-store");

$email = $_SESSION["recuperacao_email"] ?? "";
$token = (string) filter_input(INPUT_GET, "token");

if ($email === "" || $token === "") {
    voltarInfo("Solicite novamente a recuperação de senha.");
}

$conn = conectar_bd();

$usuario = mexerSQL(
    "SELECT id_usuario, senha FROM usuario
     WHERE email = :email AND excluido = FALSE",
    [":email" => $email],
    $conn
)->fetch(PDO::FETCH_ASSOC);

if (!$usuario || !hash_equals($usuario["senha"], $token)) {
    voltarInfo("Link inválido ou senha já alterada.");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $senha = trim((string) filter_input(INPUT_POST, "senha"));
    $confirmacao = trim((string) filter_input(INPUT_POST, "confirmacao"));

    if (strlen($senha) < 5 || strlen($senha) > 30) {
        voltarInfo("A senha deve ter entre 5 e 30 caracteres.");
    }

    if ($senha !== $confirmacao) {
        voltarInfo("As senhas não coincidem.");
    }

    $update = mexerSQL(
        "UPDATE usuario SET senha = :nova
         WHERE id_usuario = :id AND senha = :anterior
           AND excluido = FALSE",
        [
            ":nova" => password_hash($senha, PASSWORD_DEFAULT),
            ":id" => $usuario["id_usuario"],
            ":anterior" => $usuario["senha"]
        ],
        $conn
    );

    if ($update->rowCount() !== 1) {
        voltarInfo("Link inválido ou senha já alterada.");
    }

    unset($_SESSION["recuperacao_email"]);

    voltarInfo('Senha alterada! <a href="logar.php">Entrar</a>');
}

$titulo = "Redefinir senha";
$css = "usuario.css";
include "_cabecalho.php";
?>

<main>
    <section class="login-cadastro">
        <h2 class="title">Redefinir senha</h2>

        <form action="redefinir.php?token=<?= rawurlencode($token) ?>"
              method="POST">

            <label for="senha">Nova senha:</label>
            <input type="password" name="senha" id="senha"
                   required minlength="5" maxlength="30">

            <label for="confirmacao">Confirme a senha:</label>
            <input type="password" name="confirmacao" id="confirmacao"
                   required minlength="5" maxlength="30">

            <button type="submit">Alterar senha</button>
        </form>
    </section>
</main>

<?php include "_rodape.php"; ?>