<?php 
$titulo = "Contato";
$css = "institucionais.css";
$js = "contato.js";
include "assets/componentes/head-header.php";
?>

<main>
    <h1 class="title">Contato</h1>
    <h2 class="subtitle">Nosso e-mail é pocket.slimes.cti@gmail.com. Você também pode preencher o formulário abaixo para enviar uma mensagem sobre o que quiser</h2>

    <form id="form-contato">
        <fieldset>
            <label for="nome">Nome:</label> 
            <input type="text" name="nome" id="nome" required maxlength="60" placeholder="Slime mágico">

            <label for="assunto">Assunto:</label> 
            <input type="text" name="assunto" id="assunto" required maxlength="60" placeholder="Tenho uma dúvida sobre...">

            <label for="mensagem">Mensagem:</label> 
            <textarea name="mensagem" id="mensagem" required  maxlength="1000"></textarea>

            <button type="submit">Enviar</button>
        </fieldset>
    </form>
</main>
    
<?php include "assets/componentes/footer.php"?> 