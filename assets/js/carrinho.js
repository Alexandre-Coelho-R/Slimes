// Adicionar ao carrinho

document.querySelectorAll(".form-carrinho").forEach(form => {
    form.addEventListener("submit", async function(event) {
        event.preventDefault();

        const botao = this.querySelector("button");
        botao.disabled = true;

        try {
            const resposta = await fetch("assets/funcoes/editar-carrinho.php", {
                method: "POST",
                body: new FormData(this)
            });

            const resultado = (await resposta.text()).trim();

            if (resultado == "sucesso") {
                location.reload();
            } else if (resultado == "Sem estoque") {
                window.alert("Não há estoque suficiente desse produto");
            } else {
                console.error(resultado);
            }
            
        } catch (erro) {
            alert("Erro na conexão com o servidor.");
        } finally {
            botao.disabled = false;
        }
    });
});

// Reservar o carrinho

const botaoFinalizar = document.getElementById("finalizar-compra");

botaoFinalizar.addEventListener("click", () => {
    if (usuarioLogado) {
        if (confirm("Deseja confirmar a reserva dos produtos do seu carrinho?")) {
            window.location.href = "assets/funcoes/finalizar-compra.php";
        }
    } else {
        window.alert("Você tem que estar logado numa conta para reservar produtos")
    }

});