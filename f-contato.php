<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include "assets/componentes/head.php"?>
    <script src="assets/js/contato.js" defer></script>
    <link rel="stylesheet" href="assets/css/subpaginas.css">
    <title>Pocket Slimes - Contato</title>
</head>

<body>
    <?php include "assets/componentes/header.php"?>

    <main id="main-contato">
        <h1>Contato</h1>

        <p>Nosso e-mail é pocket.slimes.cti@gmail.com. Você pode preencher o formulário abaixo para enviar uma mensagem pelo aplicativo de e-mail configurado no dispositivo.</p>

        <form id="form-contato">
            <fieldset>
                <label for="nome">Nome:</label> 
                <input type="text" name="nome" id="nome" required maxlength="60" placeholder="Slime de magma">

                <label for="assunto">Assunto:</label> 
                <input type="text" name="assunto" id="assunto" required maxlength="60">

                <label for="mensagem">Mensagem:</label> 
                <textarea name="mensagem" id="mensagem" required  maxlength="1000"></textarea>

                <button type="submit">Enviar</button>
            </fieldset>
        </form>
    </main>
    
    <?php include "assets/componentes/footer.php"?>
</body>
</html>