export function adicionarCarrinho () {
    document.querySelectorAll(".form-carrinho").forEach(form => {
        form.addEventListener("submit", async function(event) {
            event.preventDefault();

            if (!usuarioLogado) {
                document.getElementById("modal-login").style.display = "block";
                return;
            }

            const botao = this.querySelector("button");
            const textoOriginal = botao.textContent;

            try {
                const resposta = await fetch("assets/funcoes/editar-carrinho.php", {
                    method: "POST",
                    body: new FormData(this)
                });
                
                if (resposta.text() == "erro") botao.textContent = "Erro";
                if (resposta.text() == "sucesso") botao.textContent = "Adicionado ✓";
            } catch (erro) {
                botao.textContent = "Erro";
            } finally {
                setTimeout(() => {
                    botao.textContent = textoOriginal;
                }, 1200);
            }
        });
    });
}

export function controleCarrinho() {
    const modalLogin = document.getElementById("modal-login");
    const fecharModal = document.getElementById("fechar-modal");

    fecharModal.addEventListener("click", function () {
        modalLogin.style.display = "none";
    });
}