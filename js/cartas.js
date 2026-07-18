//Inicializar variáveis

const catalogo = document.getElementById("catalogo");

const btTodos = document.getElementById("todos");
const btSlimes = document.getElementById("slimes");
const btItens = document.getElementById("itens");
const btAcoes = document.getElementById("acoes");
const btFerramentas = document.getElementById("ferramentas");

const cartaAmpliada = document.getElementById("carta-ampliada");

const cartas = [{nome:"Slime slime",categoria:"Slime",imagem:"imagens/cartas/necromante-provisorio.webp"},{nome:"Slime mágico",categoria:"Slime",imagem:"imagens/cartas/necromante-provisorio.webp"},{nome:"Slime primitivo",categoria:"Slime",imagem:"imagens/cartas/necromante-provisorio.webp"},{nome:"Slime solar",categoria:"Slime",imagem:"imagens/cartas/necromante-provisorio.webp"},{nome:"Slime de grama",categoria:"Slime",imagem:"imagens/cartas/necromante-provisorio.webp"},{nome:"Slime MUITO MUITO MUITO grande",categoria:"Slime",imagem:"imagens/cartas/necromante-provisorio.webp"},{nome:"Slime Alquimista",categoria:"Slime",imagem:"imagens/cartas/necromante-provisorio.webp"},{nome:"Slime comum",categoria:"Slime",imagem:"imagens/cartas/necromante-provisorio.webp"},{nome:"Slime buraco negro",categoria:"Slime",imagem:"imagens/cartas/necromante-provisorio.webp"},{nome:"Slime enfermeiro",categoria:"Slime",imagem:"imagens/cartas/necromante-provisorio.webp"},{nome:"Slime elétrico",categoria:"Slime",imagem:"imagens/cartas/necromante-provisorio.webp"},{nome:"Slime aquático",categoria:"Slime",imagem:"imagens/cartas/necromante-provisorio.webp"},{nome:"Slime espadachim",categoria:"Slime",imagem:"imagens/cartas/necromante-provisorio.webp"},{nome:"Fragilizador",categoria:"Slime",imagem:"imagens/cartas/necromante-provisorio.webp"},{nome:"Slime clérigo",categoria:"Slime",imagem:"imagens/cartas/necromante-provisorio.webp"},{nome:"Atomislime",categoria:"Slime",imagem:"imagens/cartas/necromante-provisorio.webp"},{nome:"Slime de magma",categoria:"Slime",imagem:"imagens/cartas/necromante-provisorio.webp"},{nome:"Dj slime",categoria:"Slime",imagem:"imagens/cartas/necromante-provisorio.webp"},{nome:"Slime de cola",categoria:"Slime",imagem:"imagens/cartas/necromante-provisorio.webp"},{nome:"Slime Ferreiro",categoria:"Slime",imagem:"imagens/cartas/necromante-provisorio.webp"},{nome:"Slime mago",categoria:"Slime",imagem:"imagens/cartas/necromante-provisorio.webp"},{nome:"Draconislime",categoria:"Slime",imagem:"imagens/cartas/necromante-provisorio.webp"},{nome:"Slime pescador",categoria:"Slime",imagem:"imagens/cartas/necromante-provisorio.webp"},{nome:"Slime escavador",categoria:"Slime",imagem:"imagens/cartas/necromante-provisorio.webp"},{nome:"Slime cozinheiro",categoria:"Slime",imagem:"imagens/cartas/necromante-provisorio.webp"},{nome:"Slime Viking",categoria:"Slime",imagem:"imagens/cartas/necromante-provisorio.webp"},{nome:"Aspirador de slime",categoria:"Item",imagem:"imagens/cartas/necromante-provisorio.webp"},{nome:"Soprador de slime",categoria:"Item",imagem:"imagens/cartas/necromante-provisorio.webp"},{nome:"kit caça slime",categoria:"Item",imagem:"imagens/cartas/necromante-provisorio.webp"},{nome:"colheita de gosma",categoria:"Item",imagem:"imagens/cartas/necromante-provisorio.webp"},{nome:"Slimonomicon",categoria:"Item",imagem:"imagens/cartas/necromante-provisorio.webp"},{nome:"Poção de escudo",categoria:"Item",imagem:"imagens/cartas/necromante-provisorio.webp"},{nome:"Poção de cura",categoria:"Item",imagem:"imagens/cartas/necromante-provisorio.webp"},{nome:"relação interespecífica",categoria:"Ferramenta",imagem:"imagens/cartas/necromante-provisorio.webp"},{nome:"Ritual de desespero",categoria:"Ferramenta",imagem:"imagens/cartas/necromante-provisorio.webp"},{nome:"Dança das cadeiras",categoria:"Ação",imagem:"imagens/cartas/necromante-provisorio.webp"},{nome:"Imitar",categoria:"Ação",imagem:"imagens/cartas/necromante-provisorio.webp"},{nome:"Pesquisar",categoria:"Ação",imagem:"imagens/cartas/necromante-provisorio.webp"},{nome:"Reciclar",categoria:"Ação",imagem:"imagens/cartas/necromante-provisorio.webp"},{nome:"EU ESCOLHO VOCÊ",categoria:"Ação",imagem:"imagens/cartas/necromante-provisorio.webp"},{nome:"Impressora",categoria:"Ação",imagem:"imagens/cartas/necromante-provisorio.webp"},{nome:"Limpar",categoria:"Ação",imagem:"imagens/cartas/necromante-provisorio.webp"}];

//Função de mostrar cartas

function mostrarCartas(lista){
    catalogo.innerHTML = "";
    lista.forEach((carta) => {
        const imagem = document.createElement("img");
        imagem.src = carta.imagem;
        imagem.alt = carta.nome;

        imagem.addEventListener("click", () => {
            ampliarCarta(carta);
        });

        catalogo.appendChild(imagem);
    }
    );
}

//Função de remover cores de fundo dos botões

function desativarCores(){
    btTodos.style.backgroundColor = "";
    btSlimes.style.backgroundColor = "";
    btItens.style.backgroundColor = "";
    btAcoes.style.backgroundColor = "";
    btFerramentas.style.backgroundColor = "";
}

//Função de ampliar carta quando clica nela

function ampliarCarta(carta){
    if (window.innerWidth < 500) return;

    cartaAmpliada.innerHTML = "";

    const cartaCriada = document.createElement("img");
    cartaCriada.src = carta.imagem;
    cartaCriada.alt = carta.nome;

    cartaAmpliada.appendChild(cartaCriada);
    cartaAmpliada.classList.add("aberta");

    //Movimento ao mexer o mouse

    cartaCriada.addEventListener("mousemove", (evento) => {
        const coordenadas = cartaCriada.getBoundingClientRect();

        const mouseX = evento.clientX;
        const mouseY = evento.clientY;

        const centroY = coordenadas.top + coordenadas.height / 2;
        const centroX = coordenadas.left + coordenadas.width / 2;

        const relativoY = (2 * (mouseY - centroY) / coordenadas.height) * -15;
        const relativoX = (2 * (mouseX - centroX) / coordenadas.width) * 15;

        cartaCriada.style.transform = `
            perspective(800px)
            rotateX(${relativoY}deg)
            rotateY(${relativoX}deg)
        `;
    });

    cartaCriada.addEventListener("mouseout", (evento) => {
        cartaCriada.style.transform = `
            perspective(800px)
            rotateX(0deg)
            rotateY(0deg)
        `
    });
}

//Inicialização

mostrarCartas(cartas);
btTodos.style.backgroundColor = "lightgreen";

cartaAmpliada.addEventListener("click", (evento) => {
    if (evento.target === cartaAmpliada) {
        cartaAmpliada.classList.remove("aberta");
        cartaAmpliada.innerHTML = "";
    }
});

// Ao clicar nos filtros

btTodos.addEventListener("click", () => {
    mostrarCartas(cartas);
    desativarCores();
    btTodos.style.backgroundColor = "lightgreen";
});

btSlimes.addEventListener("click", () => {
    mostrarCartas(cartas.filter(carta => carta.categoria === "Slime"));
    desativarCores();
    btSlimes.style.backgroundColor = "lightgreen";
});

btItens.addEventListener("click", () => {
    mostrarCartas(cartas.filter(carta => carta.categoria === "Item"));
    desativarCores();
    btItens.style.backgroundColor = "lightgreen";
});

btAcoes.addEventListener("click", () => {
    mostrarCartas(cartas.filter(carta => carta.categoria === "Ação"));
    desativarCores();
    btAcoes.style.backgroundColor = "lightgreen";
});

btFerramentas.addEventListener("click", () => {
    mostrarCartas(cartas.filter(carta => carta.categoria === "Ferramenta"));
    desativarCores();
    btFerramentas.style.backgroundColor = "lightgreen";
});