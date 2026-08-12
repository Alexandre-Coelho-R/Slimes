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