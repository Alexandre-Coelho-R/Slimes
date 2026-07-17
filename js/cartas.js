//Inicializar variáveis

const catalogo = document.getElementById("catalogo");

const btTodos = document.getElementById("todos");
const btSlimes = document.getElementById("slimes");
const btItens = document.getElementById("itens");
const btAcoes = document.getElementById("acoes");
const btFerramentas = document.getElementById("ferramentas");

const cartaAmpliada = document.getElementById("carta-ampliada");

const cartas = [{nome:"Slime necromante",categoria:"Slime",imagem:"imagens/cartas/slime-provisorio.png"},{nome:"Slime mágico",categoria:"Slime",imagem:"imagens/cartas/slime-provisorio.png"},{nome:"Slime primitivo",categoria:"Slime",imagem:"imagens/cartas/slime-provisorio.png"},{nome:"Slime solar",categoria:"Slime",imagem:"imagens/cartas/slime-provisorio.png"},{nome:"Slime de grama",categoria:"Slime",imagem:"imagens/cartas/slime-provisorio.png"},{nome:"Slime MUITO MUITO MUITO grande",categoria:"Slime",imagem:"imagens/cartas/slime-provisorio.png"},{nome:"Slime Alquimista",categoria:"Slime",imagem:"imagens/cartas/slime-provisorio.png"},{nome:"Slime comum",categoria:"Slime",imagem:"imagens/cartas/slime-provisorio.png"},{nome:"Slime buraco negro",categoria:"Slime",imagem:"imagens/cartas/slime-provisorio.png"},{nome:"Slime enfermeiro",categoria:"Slime",imagem:"imagens/cartas/slime-provisorio.png"},{nome:"Slime elétrico",categoria:"Slime",imagem:"imagens/cartas/slime-provisorio.png"},{nome:"Slime aquático",categoria:"Slime",imagem:"imagens/cartas/slime-provisorio.png"},{nome:"Slime espadachim",categoria:"Slime",imagem:"imagens/cartas/slime-provisorio.png"},{nome:"Fragilizador",categoria:"Slime",imagem:"imagens/cartas/slime-provisorio.png"},{nome:"Slime clérigo",categoria:"Slime",imagem:"imagens/cartas/slime-provisorio.png"},{nome:"Atomislime",categoria:"Slime",imagem:"imagens/cartas/slime-provisorio.png"},{nome:"Slime de magma",categoria:"Slime",imagem:"imagens/cartas/slime-provisorio.png"},{nome:"Dj slime",categoria:"Slime",imagem:"imagens/cartas/slime-provisorio.png"},{nome:"Slime de cola",categoria:"Slime",imagem:"imagens/cartas/slime-provisorio.png"},{nome:"Slime Ferreiro",categoria:"Slime",imagem:"imagens/cartas/slime-provisorio.png"},{nome:"Slime mago",categoria:"Slime",imagem:"imagens/cartas/slime-provisorio.png"},{nome:"Draconislime",categoria:"Slime",imagem:"imagens/cartas/slime-provisorio.png"},{nome:"Slime pescador",categoria:"Slime",imagem:"imagens/cartas/slime-provisorio.png"},{nome:"Slime escavador",categoria:"Slime",imagem:"imagens/cartas/slime-provisorio.png"},{nome:"Slime cozinheiro",categoria:"Slime",imagem:"imagens/cartas/slime-provisorio.png"},{nome:"Slime Viking",categoria:"Slime",imagem:"imagens/cartas/slime-provisorio.png"},{nome:"Aspirador de slime",categoria:"Item",imagem:"imagens/cartas/slime-provisorio.png"},{nome:"Soprador de slime",categoria:"Item",imagem:"imagens/cartas/slime-provisorio.png"},{nome:"kit caça slime",categoria:"Item",imagem:"imagens/cartas/slime-provisorio.png"},{nome:"colheita de gosma",categoria:"Item",imagem:"imagens/cartas/slime-provisorio.png"},{nome:"Slimonomicon",categoria:"Item",imagem:"imagens/cartas/slime-provisorio.png"},{nome:"Poção de escudo",categoria:"Item",imagem:"imagens/cartas/slime-provisorio.png"},{nome:"Poção de cura",categoria:"Item",imagem:"imagens/cartas/slime-provisorio.png"},{nome:"relação interespecífica",categoria:"Ferramenta",imagem:"imagens/cartas/slime-provisorio.png"},{nome:"Ritual de desespero",categoria:"Ferramenta",imagem:"imagens/cartas/slime-provisorio.png"},{nome:"Dança das cadeiras",categoria:"Ação",imagem:"imagens/cartas/slime-provisorio.png"},{nome:"Imitar",categoria:"Ação",imagem:"imagens/cartas/slime-provisorio.png"},{nome:"Pesquisar",categoria:"Ação",imagem:"imagens/cartas/slime-provisorio.png"},{nome:"Reciclar",categoria:"Ação",imagem:"imagens/cartas/slime-provisorio.png"},{nome:"EU ESCOLHO VOCÊ",categoria:"Ação",imagem:"imagens/cartas/slime-provisorio.png"},{nome:"Impressora",categoria:"Ação",imagem:"imagens/cartas/slime-provisorio.png"},{nome:"Limpar",categoria:"Ação",imagem:"imagens/cartas/slime-provisorio.png"}];
// const cartas = [{nome:"Slime necromante",categoria:"Slime",imagem:"imagens/cartas/slime-provisorio.aaa"},{nome:"Slime mágico",categoria:"Slime",imagem:"imagens/cartas/slime-provisorio.aaa"},{nome:"Slime primitivo",categoria:"Slime",imagem:"imagens/cartas/slime-provisorio.aaa"},{nome:"Slime solar",categoria:"Slime",imagem:"imagens/cartas/slime-provisorio.aaa"},{nome:"Slime de grama",categoria:"Slime",imagem:"imagens/cartas/slime-provisorio.aaa"},{nome:"Slime MUITO MUITO MUITO grande",categoria:"Slime",imagem:"imagens/cartas/slime-provisorio.aaa"},{nome:"Slime Alquimista",categoria:"Slime",imagem:"imagens/cartas/slime-provisorio.aaa"},{nome:"Slime comum",categoria:"Slime",imagem:"imagens/cartas/slime-provisorio.aaa"},{nome:"Slime buraco negro",categoria:"Slime",imagem:"imagens/cartas/slime-provisorio.aaa"},{nome:"Slime enfermeiro",categoria:"Slime",imagem:"imagens/cartas/slime-provisorio.aaa"},{nome:"Slime elétrico",categoria:"Slime",imagem:"imagens/cartas/slime-provisorio.aaa"},{nome:"Slime aquático",categoria:"Slime",imagem:"imagens/cartas/slime-provisorio.aaa"},{nome:"Slime espadachim",categoria:"Slime",imagem:"imagens/cartas/slime-provisorio.aaa"},{nome:"Fragilizador",categoria:"Slime",imagem:"imagens/cartas/slime-provisorio.aaa"},{nome:"Slime clérigo",categoria:"Slime",imagem:"imagens/cartas/slime-provisorio.aaa"},{nome:"Atomislime",categoria:"Slime",imagem:"imagens/cartas/slime-provisorio.aaa"},{nome:"Slime de magma",categoria:"Slime",imagem:"imagens/cartas/slime-provisorio.aaa"},{nome:"Dj slime",categoria:"Slime",imagem:"imagens/cartas/slime-provisorio.aaa"},{nome:"Slime de cola",categoria:"Slime",imagem:"imagens/cartas/slime-provisorio.aaa"},{nome:"Slime Ferreiro",categoria:"Slime",imagem:"imagens/cartas/slime-provisorio.aaa"},{nome:"Slime mago",categoria:"Slime",imagem:"imagens/cartas/slime-provisorio.aaa"},{nome:"Draconislime",categoria:"Slime",imagem:"imagens/cartas/slime-provisorio.aaa"},{nome:"Slime pescador",categoria:"Slime",imagem:"imagens/cartas/slime-provisorio.aaa"},{nome:"Slime escavador",categoria:"Slime",imagem:"imagens/cartas/slime-provisorio.aaa"},{nome:"Slime cozinheiro",categoria:"Slime",imagem:"imagens/cartas/slime-provisorio.aaa"},{nome:"Slime Viking",categoria:"Slime",imagem:"imagens/cartas/slime-provisorio.aaa"},{nome:"Aspirador de slime",categoria:"Item",imagem:"imagens/cartas/slime-provisorio.aaa"},{nome:"Soprador de slime",categoria:"Item",imagem:"imagens/cartas/slime-provisorio.aaa"},{nome:"kit caça slime",categoria:"Item",imagem:"imagens/cartas/slime-provisorio.aaa"},{nome:"colheita de gosma",categoria:"Item",imagem:"imagens/cartas/slime-provisorio.aaa"},{nome:"Slimonomicon",categoria:"Item",imagem:"imagens/cartas/slime-provisorio.aaa"},{nome:"Poção de escudo",categoria:"Item",imagem:"imagens/cartas/slime-provisorio.aaa"},{nome:"Poção de cura",categoria:"Item",imagem:"imagens/cartas/slime-provisorio.aaa"},{nome:"relação interespecífica",categoria:"Ferramenta",imagem:"imagens/cartas/slime-provisorio.aaa"},{nome:"Ritual de desespero",categoria:"Ferramenta",imagem:"imagens/cartas/slime-provisorio.aaa"},{nome:"Dança das cadeiras",categoria:"Ação",imagem:"imagens/cartas/slime-provisorio.aaa"},{nome:"Imitar",categoria:"Ação",imagem:"imagens/cartas/slime-provisorio.aaa"},{nome:"Pesquisar",categoria:"Ação",imagem:"imagens/cartas/slime-provisorio.aaa"},{nome:"Reciclar",categoria:"Ação",imagem:"imagens/cartas/slime-provisorio.aaa"},{nome:"EU ESCOLHO VOCÊ",categoria:"Ação",imagem:"imagens/cartas/slime-provisorio.aaa"},{nome:"Impressora",categoria:"Ação",imagem:"imagens/cartas/slime-provisorio.aaa"},{nome:"Limpar",categoria:"Ação",imagem:"imagens/cartas/slime-provisorio.aaa"}];


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
    cartaAmpliada.innerHTML = "";

    let cartaCriada = document.createElement("img");
    cartaCriada.src = carta.imagem;
    cartaCriada.alt = carta.nome;

    cartaAmpliada.appendChild(cartaCriada);
    cartaAmpliada.classList.add("aberta");
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