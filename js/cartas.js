//Inicializar variáveis

const catalogo = document.getElementById("catalogo");

const btTodos = document.getElementById("todos");
const btSlimes = document.getElementById("slimes");
const btItens = document.getElementById("itens");
const btAcoes = document.getElementById("acoes");
const btFerramentas = document.getElementById("ferramentas");

const cartaAmpliada = document.getElementById("carta-ampliada");

const cartas = [
  {
    nome: "Atomislime",
    categoria: "slime",
    imagem: "imagens/cartas/ss_atomislime.webp"
  },
  {
    nome: "Dj slime",
    categoria: "slime",
    imagem: "imagens/cartas/ss_djslime.webp"
  },
  {
    nome: "Draconislime",
    categoria: "slime",
    imagem: "imagens/cartas/ss_draconislime.webp"
  },
  {
    nome: "Fragilizador",
    categoria: "slime",
    imagem: "imagens/cartas/ss_fragilizador.webp"
  },
  {
    nome: "Slime Alquimista",
    categoria: "slime",
    imagem: "imagens/cartas/ss_slime_alquimista.webp"
  },
  {
    nome: "Slime aquático",
    categoria: "slime",
    imagem: "imagens/cartas/ss_slimeaquatico.webp"
  },
  {
    nome: "Slime buraco negro",
    categoria: "slime",
    imagem: "imagens/cartas/ss_buraconegro.webp"
  },
  {
    nome: "Slime clérigo",
    categoria: "slime",
    imagem: "imagens/cartas/ss_slimeclerigo.webp"
  },
  {
    nome: "Slime comum",
    categoria: "slime",
    imagem: "imagens/cartas/ss_slimecomum.webp"
  },
  {
    nome: "Slime cozinheiro",
    categoria: "slime",
    imagem: "imagens/cartas/ss_slimecozinheiro.webp"
  },
  {
    nome: "Slime de cola",
    categoria: "slime",
    imagem: "imagens/cartas/ss_slimedecola.webp"
  },
  {
    nome: "Slime de grama",
    categoria: "slime",
    imagem: "imagens/cartas/ss_slimegrama.webp"
  },
  {
    nome: "Slime de magma",
    categoria: "slime",
    imagem: "imagens/cartas/ss_slimemagma.webp"
  },
  {
    nome: "Slime elétrico",
    categoria: "slime",
    imagem: "imagens/cartas/ss_slimeeletrico.webp"
  },
  {
    nome: "Slime enfermeiro",
    categoria: "slime",
    imagem: "imagens/cartas/ss_slimeenfermeiro.webp"
  },
  {
    nome: "Slime escavador",
    categoria: "slime",
    imagem: "imagens/cartas/ss_slimeescavador.webp"
  },
  {
    nome: "Slime espadachim",
    categoria: "slime",
    imagem: "imagens/cartas/ss_slimeespadachim.webp"
  },
  {
    nome: "Slime Ferreiro",
    categoria: "slime",
    imagem: "imagens/cartas/ss_slimeferreiro.webp"
  },
  {
    nome: "Slime mágico",
    categoria: "slime",
    imagem: "imagens/cartas/ss_slimemagico.webp"
  },
  {
    nome: "Slime mago",
    categoria: "slime",
    imagem: "imagens/cartas/ss_slimemago.webp"
  },
  {
    nome: "Slime MUITO MUITO MUITO grande",
    categoria: "slime",
    imagem: "imagens/cartas/ss_slimegigante.webp"
  },
  {
    nome: "Slime necromante",
    categoria: "slime",
    imagem: "imagens/cartas/ss_slimenecromante.webp"
  },
  {
    nome: "Slime pescador",
    categoria: "slime",
    imagem: "imagens/cartas/ss_slimepescador.webp"
  },
  {
    nome: "Slime primitivo",
    categoria: "slime",
    imagem: "imagens/cartas/ss_slimeprimitivo.webp"
  },
  {
    nome: "Slime solar",
    categoria: "slime",
    imagem: "imagens/cartas/ss_slimesolar.webp"
  },
  {
    nome: "Slime Viking",
    categoria: "slime",
    imagem: "imagens/cartas/ss_slimeviking.webp"
  },
  {
    nome: "Aspirador de slime",
    categoria: "item",
    imagem: "imagens/cartas/ss_aspiradordeslime.webp"
  },
  {
    nome: "colheita de gosma",
    categoria: "item",
    imagem: "imagens/cartas/ss_colheitadegosma.webp"
  },
  {
    nome: "kit caça slime",
    categoria: "item",
    imagem: "imagens/cartas/ss_kitcacaslime.webp"
  },
  {
    nome: "Poção de cura",
    categoria: "item",
    imagem: "imagens/cartas/ss_pocaodecura.webp"
  },
  {
    nome: "Poção de escudo",
    categoria: "item",
    imagem: "imagens/cartas/ss_pocaodeescudo.webp"
  },
  {
    nome: "Slimonomicon",
    categoria: "item",
    imagem: "imagens/cartas/ss_slimonomicon.webp"
  },
  {
    nome: "Soprador de slime",
    categoria: "item",
    imagem: "imagens/cartas/ss_sopradordeslime.webp"
  },
  {
    nome: "A CAIXA",
    categoria: "item",
    imagem: "imagens/cartas/ss_acaixa.webp"
  },
  {
    nome: "Dança das cadeiras",
    categoria: "ação",
    imagem: "imagens/cartas/ss_dancacadeira.webp"
  },
  {
    nome: "EU ESCOLHO VOCÊ",
    categoria: "ação",
    imagem: "imagens/cartas/ss_euescolhovoce.webp"
  },
  {
    nome: "Imitar",
    categoria: "ação",
    imagem: "imagens/cartas/ss_imitar.webp"
  },
  {
    nome: "Impressora",
    categoria: "ação",
    imagem: "imagens/cartas/ss_impressora.webp"
  },
  {
    nome: "Limpar",
    categoria: "ação",
    imagem: "imagens/cartas/ss_limpar.webp"
  },
  {
    nome: "Pesquisar",
    categoria: "ação",
    imagem: "imagens/cartas/ss_pesquisar.webp"
  },
  {
    nome: "Reciclar",
    categoria: "ação",
    imagem: "imagens/cartas/ss_reciclar.webp"
  },
  {
    nome: "relação interespecífica",
    categoria: "ferramenta",
    imagem: "imagens/cartas/ss_relacaointerespecifica.webp"
  },
  {
    nome: "Ritual de desespero",
    categoria: "ferramenta",
    imagem: "imagens/cartas/ss_ritualdedesespero.webp"
  }
];

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
    mostrarCartas(cartas.filter(carta => carta.categoria === "slime"));
    desativarCores();
    btSlimes.style.backgroundColor = "lightgreen";
});

btItens.addEventListener("click", () => {
    mostrarCartas(cartas.filter(carta => carta.categoria === "item"));
    desativarCores();
    btItens.style.backgroundColor = "lightgreen";
});

btAcoes.addEventListener("click", () => {
    mostrarCartas(cartas.filter(carta => carta.categoria === "ação"));
    desativarCores();
    btAcoes.style.backgroundColor = "lightgreen";
});

btFerramentas.addEventListener("click", () => {
    mostrarCartas(cartas.filter(carta => carta.categoria === "ferramenta"));
    desativarCores();
    btFerramentas.style.backgroundColor = "lightgreen";
});