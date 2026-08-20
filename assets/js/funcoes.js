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

                const resultado = await resposta.text();
                
                if (resultado == "erro") botao.textContent = "Erro";
                if (resultado == "sucesso") botao.textContent = "Adicionado ✓";
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

export function mexerCarrinho () {
    document.querySelectorAll(".form-carrinho").forEach(form => {
        form.addEventListener("submit", async function(event) {
            event.preventDefault();

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
            
            }
        });
    });
}