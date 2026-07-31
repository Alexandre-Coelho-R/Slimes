const botao = document.getElementById("subir");

function verificarScroll() {
    if (document.documentElement.scrollHeight < window.innerHeight) {
        subir.style.display = "none";
    }
}

botao.addEventListener("click", () => {
    window.scrollTo({top: 0, behavior: "smooth"});
});