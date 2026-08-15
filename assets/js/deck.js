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