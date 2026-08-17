// Adicionar ao carrinho

import { adicionarCarrinho } from "./funcoes.js";
adicionarCarrinho();

// ========================================
// TROCA A CARTA GRANDE NO DECK
// ========================================

const cartas = document.querySelectorAll(".linha-carta");
const destaque = document.querySelector("#carta-destaque");

cartas.forEach(carta => {
    carta.addEventListener("mouseenter", () => {
        destaque.src = carta.dataset.imagem;
    });
});