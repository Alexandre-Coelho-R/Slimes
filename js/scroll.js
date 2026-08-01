const botao = document.getElementById("subir");

function verificarScroll() {
    if (document.documentElement.scrollHeight <= window.innerHeight + 3) {
        botao.style.display = "none";
    } else {
        botao.style.display = "";
    }
}

botao.addEventListener("click", () => {
    window.scrollTo({top: 0, behavior: "smooth"});
});

window.addEventListener("load", verificarScroll);
window.addEventListener("resize", verificarScroll);