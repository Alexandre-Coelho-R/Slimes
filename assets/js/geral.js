const voltarTopo = document.getElementById("voltar-topo");

function verificarScroll () {
    if (document.documentElement.scrollHeight > window.innerHeight + 15) {
        voltarTopo.style.display = "flex";
    } else {
        voltarTopo.style.display = "none";
    }
}

window.addEventListener("load", verificarScroll);
window.addEventListener("resize", verificarScroll);