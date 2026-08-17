// Adicionar ao carrinho

import { adicionarCarrinho, controleCarrinho } from "./funcoes.js";
adicionarCarrinho();
controleCarrinho();

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