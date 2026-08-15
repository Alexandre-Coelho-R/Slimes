// ========================================
// TROCA A CARTA DESTAQUE AO PASSAR O MOUSE
// ========================================

const itensDaLista = document.querySelectorAll('.carta-item');
const imagemDestaque = document.getElementById('imagem-destaque');

itensDaLista.forEach(item => {

    // Detecta quando o mouse entra na carta
    item.addEventListener('mouseenter', function() {

        // Pega o caminho da imagem no atributo data-imagem
        const novaImagem = this.getAttribute('data-imagem');

        // Troca a imagem grande
        if (novaImagem) {
            imagemDestaque.src = novaImagem;
        }
    });

});


// ========================================
// CONTROLE DOS CARROSSÉIS DE PRODUTOS
// ========================================

document.querySelectorAll(".carrossel").forEach(carrossel => {

    // Área onde ficam os produtos
    const produtos = carrossel.querySelector(".produtos");

    // Botões de navegação
    const esquerda = carrossel.querySelector(".seta-esquerda");
    const direita = carrossel.querySelector(".seta-direita");


    // ------------------------------------
    // BOTÃO DIREITO
    // ------------------------------------

    direita.addEventListener("click", () => {

        // Move os produtos para a direita
        produtos.scrollBy({
            left: 700,
            behavior: "smooth"
        });

    });


    // ------------------------------------
    // BOTÃO ESQUERDO
    // ------------------------------------

    esquerda.addEventListener("click", () => {

        // Move os produtos para a esquerda
        produtos.scrollBy({
            left: -700,
            behavior: "smooth"
        });

    });

});


// ========================================
// TROCA A CARTA GRANDE NO DECK
// ========================================

const cartas = document.querySelectorAll(".linha-carta");
const destaque = document.querySelector("#carta-destaque");

cartas.forEach(carta => {

    // Quando o mouse passa sobre uma carta da lista
    carta.addEventListener("mouseenter", () => {

        // Pega a imagem definida no data-imagem
        destaque.src = carta.dataset.imagem;

    });

});
// =========================
// BOTÕES DO CARRINHO
// =========================

const itensCarrinho = document.querySelectorAll(".item-carrinho");


// =========================
// ATUALIZAR TOTAL
// =========================

function atualizarTotal(){

    let total = 0;

    document.querySelectorAll(".item-carrinho").forEach(item => {

        const preco = Number(item.dataset.preco);

        const quantidade = Number(
            item.querySelector(".quantidade").textContent
        );

        total += preco * quantidade;

    });


    const valorFormatado =
        `R$ ${total.toFixed(2).replace(".", ",")}`;


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
// ==============================
// ADICIONAR AO CARRINHO
// ==============================

document.querySelectorAll(".form-carrinho").forEach(form => {

    form.addEventListener("submit", async function(event) {

        event.preventDefault();

        const botao = this.querySelector("button");
        const textoOriginal = botao.textContent;

        try {

            const resposta = await fetch(this.action, {
                method: "POST",
                body: new FormData(this)
            });

            if (!resposta.ok) {
                throw new Error("Erro ao adicionar");
            }

            botao.textContent = "Adicionado ✓";

            setTimeout(() => {
                botao.textContent = textoOriginal;
            }, 1200);

        } catch (erro) {

            console.error(erro);

            botao.textContent = "Erro";

            setTimeout(() => {
                botao.textContent = textoOriginal;
            }, 1200);
        }

    });

});