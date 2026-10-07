document.querySelectorAll(".faq-pergunta").forEach(pergunta => {
    pergunta.addEventListener("click", () => {
        pergunta.parentElement.classList.toggle("aberto");
    });
});