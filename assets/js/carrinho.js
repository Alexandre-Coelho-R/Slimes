// =========================
// BOTÕES DO CARRINHO
// =========================

const itensCarrinho = document.querySelectorAll(".item-carrinho");


// =========================
// ATUALIZAR TOTAL
// =========================

function atualizarTotal(){
    let total = 0;

    itensCarrinho.forEach(item => {
        const preco = Number(item.dataset.preco);
        const quantidade = Number(
            item.querySelector(".quantidade").textContent
        );
        total += preco * quantidade;
    });


    const valorFormatado = `R$ ${total.toFixed(2).replace(".", ",")}`;

    const subtotal = document.querySelector("#subtotal");
    const totalElemento = document.querySelector("#total");

    if(subtotal){
        subtotal.textContent = valorFormatado;
    }

    if(totalElemento){
        totalElemento.textContent = valorFormatado;
    }
}



// =========================
// BOTÕES DE CADA PRODUTO
// =========================

itensCarrinho.forEach(item => {
    const menos =
        item.querySelector(".menos");

    const mais =
        item.querySelector(".mais");

    const quantidade =
        item.querySelector(".quantidade");

    const preco =
        item.querySelector(".preco");

    const remover =
        item.querySelector(".remover");


    const precoOriginal =
        Number(item.dataset.preco);

    // =========================
    // AUMENTAR QUANTIDADE
    // =========================

    mais.addEventListener("click", () => {

        let valor =
            Number(quantidade.textContent);

        valor++;

        quantidade.textContent =
            valor;


        preco.textContent =
            `R$ ${(precoOriginal * valor)
            .toFixed(2)
            .replace(".", ",")}`;


        atualizarTotal();

    });

    // =========================
    // DIMINUIR QUANTIDADE
    // =========================

    menos.addEventListener("click", () => {

        let valor =
            Number(quantidade.textContent);


        if(valor > 1){

            valor--;

            quantidade.textContent =
                valor;


            preco.textContent =
                `R$ ${(precoOriginal * valor)
                .toFixed(2)
                .replace(".", ",")}`;


            atualizarTotal();
        }
    });


    // =========================
    // REMOVER PRODUTO
    // =========================

    remover.addEventListener("click", () => {

        item.remove();

        atualizarTotal();

    });

});




// =========================
// CALCULAR AO ABRIR
// =========================

if(document.querySelector(".item-carrinho")){

    atualizarTotal();

}