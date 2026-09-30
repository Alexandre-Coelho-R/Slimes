// Adicionar ao carrinho

document.querySelectorAll(".form-carrinho").forEach(form => {
    form.addEventListener("submit", async function(event) {
        event.preventDefault();

        const botao = this.querySelector("button");
        botao.disabled = true;

        try {
            const resposta = await fetch("assets/funcoes/editar-carrinho.php", {
                method: "POST",
                body: new FormData(this)
            });

            const resultado = await resposta.text();

            if (resultado === "sucesso") {
                location.reload();
            } else {
                console.error(resultado);
            }
            
        } catch (erro) {
            alert("Erro na conexão com o servidor.");
        } finally {
            botao.disabled = false;
        }
    });
});