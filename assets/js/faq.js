window.alert("A Semana do Colégio do CTI Bauru já terminou e não estamos mais vendendo produtos.");

document.querySelectorAll(".faq-pergunta").forEach(pergunta => {
    pergunta.addEventListener("click", () => {
        pergunta.parentElement.classList.toggle("aberto");
    });
});