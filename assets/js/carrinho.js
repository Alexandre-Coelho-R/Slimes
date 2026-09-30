// Adicionar ao carrinho

document.querySelectorAll(".form-carrinho").forEach(form => {
    form.addEventListener("submit", async function(event) {
        event.preventDefault();

        try {
            const resposta = await fetch("assets/funcoes/editar-carrinho.php", {
                method: "POST",
                body: new FormData(this)
            });

            const resultado = await resposta.text();

            if (resultado === "sucesso") {
                location.reload();
            } else {
                console.error(resultado);
            }
            
        } catch (erro) {
        
        }
    });
});