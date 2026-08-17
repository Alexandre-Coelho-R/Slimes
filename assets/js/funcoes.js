export function adicionarCarrinho () {
    document.querySelectorAll(".form-carrinho").forEach(form => {
        form.addEventListener("submit", async function(event) {
            event.preventDefault();

            const botao = this.querySelector("button");
            const textoOriginal = botao.textContent;

            try {
                const resposta = await fetch("assets/funcoes/editar-carrinho.php", {
                    method: "POST",
                    body: new FormData(this)
                });

                if (!resposta.ok) throw new Error("Erro ao adicionar");

                botao.textContent = "Adicionado ✓";

                setTimeout(() => {
                    botao.textContent = textoOriginal;
                }, 1200);

            } catch (erro) {
                console.error(erro);
                botao.textContent = "Erro";

                setTimeout(() => {
                    botao.textContent = textoOriginal;
                }, 1200);
            }
        });
    });
}
