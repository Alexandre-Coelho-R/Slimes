<?php 
include "assets/funcoes/utilidades.php";

// Processa o formulário quando submetido
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome     = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $assunto  = filter_input(INPUT_POST, 'assunto', FILTER_SANITIZE_SPECIAL_CHARS);
    $mensagem = filter_input(INPUT_POST, 'mensagem', FILTER_SANITIZE_SPECIAL_CHARS);

    if (!empty($nome) && !empty($assunto) && !empty($mensagem)) {
        
        $corpoEmail = "
            <h2>Nova mensagem enviada pelo site</h2>
            <p><strong>Nome do visitante:</strong> {$nome}</p>
            <p><strong>Assunto:</strong> {$assunto}</p>
            <p><strong>Mensagem:</strong></p>
            <p>" . nl2br($mensagem) . "</p>
        ";

        $tituloEmail = "Contato via Site: " . $assunto;

        // Envia para o próprio e-mail da loja
        if (EnviaEmail($tituloEmail, $corpoEmail, 'pocket.slimes.cti@gmail.com')) {
            voltarInfo("Mensagem enviada com sucesso!");
        } else {
            voltarInfo("Erro ao enviar a mensagem.");
        }
    } else {
        voltarInfo("Por favor, preencha todos os campos.");
    }
}

$titulo = "Contato";
$css = "institucionais.css";
$js = "contato.js";
include "_cabecalho.php";
?>

<main>
    <h1 class="title">Contato</h1>
    <h2 class="subtitle">Nosso e-mail é pocket.slimes.cti@gmail.com. Você também pode preencher o formulário abaixo para enviar uma mensagem sobre o que quiser</h2>

    <form id="form-contato" action="f-contato.php" method="POST">
        <fieldset>
            <label for="nome">Nome:</label> 
            <input type="text" name="nome" id="nome" required maxlength="60" placeholder="Slime mágico">

            <label for="assunto">Assunto:</label> 
            <input type="text" name="assunto" id="assunto" required maxlength="60" placeholder="Tenho uma dúvida sobre...">

            <label for="mensagem">Mensagem:</label> 
            <textarea name="mensagem" id="mensagem" required maxlength="1000"></textarea>

            <button type="submit">Enviar</button>
        </fieldset>
    </form>
</main>
    
<?php include "_rodape.php"; ?>