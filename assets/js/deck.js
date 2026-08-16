// ==============================
// ADICIONAR AO CARRINHO
// ==============================

document.querySelectorAll(".form-carrinho").forEach(form => {
    form.addEventListener("submit", async function(event) {
        event.preventDefault();

        const botao = this.querySelector("button");
        const textoOriginal = botao.textContent;

        try {
            const resposta = await fetch(this.action, {
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

// ========================================
// TROCA A CARTA GRANDE NO DECK
// ========================================

const cartas = document.querySelectorAll(".linha-carta");
const destaque = document.querySelector("#carta-destaque");

cartas.forEach(carta => {
    // Quando o mouse passa sobre uma carta da lista
    carta.addEventListener("mouseenter", () => {
        // Pega a imagem definida no data-imagem
        destaque.src = carta.dataset.imagem;
    });
});