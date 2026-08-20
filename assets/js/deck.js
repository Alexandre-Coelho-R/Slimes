// Adicionar ao carrinho

import { adicionarCarrinho } from "./funcoes.js";
adicionarCarrinho();

// Troca a carta grande no deck

const cartas = document.querySelectorAll(".linha-carta");
const destaque = document.getElementById("carta-destaque");

const btAnterior = document.getElementById("carta-anterior");
const btProximo = document.getElementById("carta-proxima");

let cartaAtual = 0;

cartas[0].classList.add("ativa");

cartas.forEach((carta, index) => {
    carta.addEventListener("mouseenter", () => {
        cartaAtual = index;
        mostraDestaque();
    });
});

function mostraDestaque () {
    destaque.src = cartas[cartaAtual].dataset.imagem;
    cartas.forEach((carta) => {
        carta.classList.remove("ativa");
    })
    cartas[cartaAtual].classList.add("ativa");
}

function voltarUm () {
    cartaAtual--;
    if (cartaAtual < 0) cartaAtual = cartas.length - 1;
    mostraDestaque();
}

function avancarUm () {
    cartaAtual++;
    if (cartaAtual >= cartas.length) cartaAtual = 0;
    mostraDestaque();
}

btAnterior.addEventListener("click", () => {
    voltarUm();
});

btProximo.addEventListener("click", () => {
    avancarUm();
});

document.addEventListener("keydown", (evento) => {
    if (evento.key == "ArrowLeft") voltarUm();
    if (evento.key == "ArrowRight") avancarUm();
})