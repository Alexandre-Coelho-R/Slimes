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