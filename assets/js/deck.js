// Adicionar ao carrinho

import { adicionarCarrinho } from "./funcoes.js";
adicionarCarrinho();

// Troca a carta grande no deck

const cartas = document.querySelectorAll(".linha-carta");
const destaque = document.getElementById("carta-destaque");

const btAnterior = document.getElementById("carta-anterior");
const btProximo = document.getElementById("carta-proxima");

let cartaAtual = 0;

cartas.forEach((carta, index) => {
    carta.addEventListener("mouseenter", () => {
        cartaAtual = index;
        destaque.src = carta.dataset.imagem;
    });
});

function mostraDestaque () {
    destaque.src = cartas[cartaAtual].dataset.imagem;
}

btAnterior.addEventListener("click", () => {
    cartaAtual--;
    if (cartaAtual < 0) cartaAtual = cartas.length - 1;
    mostraDestaque();
});

btProximo.addEventListener("click", () => {
    cartaAtual++;
    if (cartaAtual >= cartas.length) cartaAtual = 0;
    mostraDestaque();
});
