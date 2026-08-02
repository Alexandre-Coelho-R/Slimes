const inputs = document.querySelectorAll("input[type='text'], input[type='email']");
const textarea = document.querySelector("textarea");
const formulario = document.getElementById("form_contato");

inputs.forEach(input => {
    input.addEventListener("input", () => {
        input.style.width = `${1.1 * Math.max(18, input.value.length)}ch`;
    })
}
)

textarea.addEventListener("input", () => {
    textarea.style.height = "auto";
    textarea.style.height = textarea.scrollHeight + 10 + "px"; 
})

formulario.addEventListener("submit", (eventolegal) => {
    eventolegal.preventDefault();

    const nome = document.getElementById("nome").value;
    const email = document.getElementById("email").value;
    const assunto = document.getElementById("assunto").value;
    const mensagem = document.getElementById("mensagem").value;

    const corpo = 
`Nome: ${nome}
Email: ${email}

Mensagem:
${mensagem}`;

    window.location.href = `mailto:pocket.slimes.cti@gmail.com?subject=${encodeURIComponent(assunto)}&body=${encodeURIComponent(corpo)}`;
});