<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include "componentes/head.php"?>
    <script src="js/contato.js" defer></script>
    <link rel="stylesheet" href="css/subpaginas.css">
    <title>Pocket Slimes - Contato</title>
</head>

<body>
    <?php include "componentes/header.php"?>

    <main>
        <h1>Contato</h1>

        <p class="p_subpaginas">Nosso e-mail é pocket.slimes.cti@gmail.com. Você pode preencher o formulário abaixo para enviar uma mensagem se você tiver um aplicativo de e-mail configurado no dispositivo.</p>

        <form id="form_contato">
            <fieldset>
                <legend>Envie uma mensagem</legend>

                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" required maxlength="60">

                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required maxlength="60">

                <label for="assunto">Assunto:</label>
                <input type="text" name="assunto" id="assunto" required maxlength="60">

                <label for="mensagem">Mensagem:</label>
                <textarea name="mensagem" id="mensagem" required  maxlength="1000"></textarea>

                <button type="submit">Enviar</button>
            </fieldset>
        </form>
    </main>
    
    <?php include "componentes/footer.php"?>
</body>
</html>