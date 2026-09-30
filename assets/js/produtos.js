// Adicionar ao carrinho

document.querySelectorAll(".form-carrinho").forEach(form => {
    form.addEventListener("submit", async function(event) {
        event.preventDefault();

        const botao = this.querySelector("button");
        const textoOriginal = botao.textContent;
        
        botao.textContent = "Carregando...";
        botao.disabled = true;

        try {
            const resposta = await fetch("assets/funcoes/editar-carrinho.php", {
                method: "POST",
                body: new FormData(this)
            });

            const resultado = await resposta.text();

            if (resultado == "sucesso") botao.textContent = "Adicionado ✓";
            else botao.textContent = "Erro";
            
        } catch (erro) {
            botao.textContent = "Erro";
        } finally {
            setTimeout(() => {
                botao.textContent = textoOriginal;
                botao.disabled = false;
            }, 1000);
        }
    });
});
