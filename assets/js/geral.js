// Header

const botao_hamburguer = document.getElementById("menu-mobile");
const menus = document.getElementById("menus");
const icone = document.getElementById("simbolo_hamburguer");
let rotacionado = false;

botao_hamburguer.addEventListener("click", () => {
    menus.classList.toggle("aberto");
    icone.classList.toggle("fa-bars");
    icone.classList.toggle("fa-xmark");
    icone.style.transform = rotacionado ? "rotate(0deg)" : "rotate(180deg)";
    rotacionado = !rotacionado;
});

// Scroll

const botao = document.getElementById("subir");

function verificarScroll() {
    botao.style.display = (window.scrollY == 0) ? "none" : "";
}

botao.addEventListener("click", () => {
    window.scrollTo({top: 0, behavior: "smooth"});
});

window.addEventListener("scroll", verificarScroll);
window.addEventListener("load", verificarScroll);
window.addEventListener("resize", verificarScroll);