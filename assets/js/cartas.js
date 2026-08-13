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
    imagem: "assets/imagens/cartas/ss_atomislime.webp"
  },
  {
    nome: "DJ Slime",
    categoria: "slime",
    imagem: "assets/imagens/cartas/ss_djslime.webp"
  },
  {
    nome: "Draconislime",
    categoria: "slime",
    imagem: "assets/imagens/cartas/ss_draconislime.webp"
  },
  {
    nome: "Slime alquimista",
    categoria: "slime",
    imagem: "assets/imagens/cartas/ss_slimealquimista.webp"
  },
  {
    nome: "Slime aquático",
    categoria: "slime",
    imagem: "assets/imagens/cartas/ss_slimeaquatico.webp"
  },
  {
    nome: "Slime buraco negro",
    categoria: "slime",
    imagem: "assets/imagens/cartas/ss_slimeburaconegro.webp"
  },
  {
    nome: "Slime clérigo",
    categoria: "slime",
    imagem: "assets/imagens/cartas/ss_slimeclerigo.webp"
  },
  {
    nome: "Slime comum",
    categoria: "slime",
    imagem: "assets/imagens/cartas/ss_slimecomum.webp"
  },
  {
    nome: "Slime cozinheiro",
    categoria: "slime",
    imagem: "assets/imagens/cartas/ss_slimecozinheiro.webp"
  },
  {
    nome: "Slime de cola",
    categoria: "slime",
    imagem: "assets/imagens/cartas/ss_slimedecola.webp"
  },
  {
    nome: "Slime de grama",
    categoria: "slime",
    imagem: "assets/imagens/cartas/ss_slimedegrama.webp"
  },
  {
    nome: "Slime de magma",
    categoria: "slime",
    imagem: "assets/imagens/cartas/ss_slimedemagma.webp"
  },
  {
    nome: "Slime elétrico",
    categoria: "slime",
    imagem: "assets/imagens/cartas/ss_slimeeletrico.webp"
  },
  {
    nome: "Slime enfermeiro",
    categoria: "slime",
    imagem: "assets/imagens/cartas/ss_slimeenfermeiro.webp"
  },
  {
    nome: "Slime escavador",
    categoria: "slime",
    imagem: "assets/imagens/cartas/ss_slimeescavador.webp"
  },
  {
    nome: "Slime espadachim",
    categoria: "slime",
    imagem: "assets/imagens/cartas/ss_slimeespadachim.webp"
  },
  {
    nome: "Slime ferreiro",
    categoria: "slime",
    imagem: "assets/imagens/cartas/ss_slimeferreiro.webp"
  },
  {
    nome: "Slime gigantesco",
    categoria: "slime",
    imagem: "assets/imagens/cartas/ss_slimegigantesco.webp"
  },
  {
    nome: "Slime mágico",
    categoria: "slime",
    imagem: "assets/imagens/cartas/ss_slimemagico.webp"
  },
  {
    nome: "Slime mago",
    categoria: "slime",
    imagem: "assets/imagens/cartas/ss_slimemago.webp"
  },
  {
    nome: "Slime necromante",
    categoria: "slime",
    imagem: "assets/imagens/cartas/ss_slimenecromante.webp"
  },
  {
    nome: "Slime pescador",
    categoria: "slime",
    imagem: "assets/imagens/cartas/ss_slimepescador.webp"
  },
  {
    nome: "Slime pistoleiro",
    categoria: "slime",
    imagem: "assets/imagens/cartas/ss_slimepistoleiro.webp"
  },
  {
    nome: "Slime primitivo",
    categoria: "slime",
    imagem: "assets/imagens/cartas/ss_slimeprimitivo.webp"
  },
  {
    nome: "Slime solar",
    categoria: "slime",
    imagem: "assets/imagens/cartas/ss_slimesolar.webp"
  },
  {
    nome: "Slime viking",
    categoria: "slime",
    imagem: "assets/imagens/cartas/ss_slimeviking.webp"
  },
  {
    nome: "A caixa",
    categoria: "item",
    imagem: "assets/imagens/cartas/ss_acaixa.webp"
  },
  {
    nome: "Aspirador de slime",
    categoria: "item",
    imagem: "assets/imagens/cartas/ss_aspiradordeslimes.webp"
  },
  {
    nome: "Árvore de slime",
    categoria: "item",
    imagem: "assets/imagens/cartas/ss_arvoredegosma.webp"
  },
  {
    nome: "Kit caça slime",
    categoria: "item",
    imagem: "assets/imagens/cartas/ss_kitcacaslime.webp"
  },
  {
    nome: "Mapa de gosmas",
    categoria: "item",
    imagem: "assets/imagens/cartas/ss_mapadegosmas.webp"
  },
  {
    nome: "Poção de cura",
    categoria: "item",
    imagem: "assets/imagens/cartas/ss_pocaodecura.webp"
  },
  {
    nome: "Slimonomicon",
    categoria: "item",
    imagem: "assets/imagens/cartas/ss_slimonomicon.webp"
  },
  {
    nome: "Apostar tudo",
    categoria: "ação",
    imagem: "assets/imagens/cartas/ss_apostartudo.webp"
  },
  {
    nome: "Dança das cadeiras",
    categoria: "ação",
    imagem: "assets/imagens/cartas/ss_dancadascadeiras.webp"
  },
  {
    nome: "Eu escolho você",
    categoria: "ação",
    imagem: "assets/imagens/cartas/ss_euescolhovoce.webp"
  },
  {
    nome: "Imitar",
    categoria: "ação",
    imagem: "assets/imagens/cartas/ss_imitar.webp"
  },
  {
    nome: "Impressora",
    categoria: "ação",
    imagem: "assets/imagens/cartas/ss_impressora.webp"
  },
  {
    nome: "Limpar",
    categoria: "ação",
    imagem: "assets/imagens/cartas/ss_limpar.webp"
  },
  {
    nome: "Pesquisar",
    categoria: "ação",
    imagem: "assets/imagens/cartas/ss_pesquisar.webp"
  },
  {
    nome: "Relação interespecífica",
    categoria: "ferramenta",
    imagem: "assets/imagens/cartas/ss_relacaointerespecie.webp"
  },
  {
    nome: "Ritual de desespero",
    categoria: "ferramenta",
    imagem: "assets/imagens/cartas/ss_ritualdedesespero.webp"
  }
];

const possuiMouse = window.matchMedia("(pointer: fine)").matches;

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
    if (window.innerWidth < 270) return;

    cartaAmpliada.innerHTML = "";

    const cartaCriada = document.createElement("img");
    cartaCriada.src = carta.imagem;
    cartaCriada.alt = carta.nome;

    cartaAmpliada.appendChild(cartaCriada);
    cartaAmpliada.classList.add("aberta");

    //Movimento ao mexer o mouse

    if (possuiMouse){
      cartaCriada.addEventListener("mousemove", (evento) => {
          const coordenadas = cartaCriada.getBoundingClientRect();

          const mouseX = evento.clientX;
          const mouseY = evento.clientY;

          const centroY = coordenadas.top + coordenadas.height / 2;
          const centroX = coordenadas.left + coordenadas.width / 2;

          const mudanca = 15;

          const relativoY = (2 * (mouseY - centroY) / coordenadas.height) * -mudanca;
          const relativoX = (2 * (mouseX - centroX) / coordenadas.width) * mudanca;

          cartaCriada.style.transform = `
              perspective(800px)
              rotateX(${relativoY}deg)
              rotateY(${relativoX}deg)
          `;
      });      
      
      cartaCriada.addEventListener("mouseout", () => {
        cartaCriada.style.transform = `
            perspective(800px)
            rotateX(0deg)
            rotateY(0deg)
        `
      });
    }
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

document.addEventListener("keydown", (evento) => {
  if (evento.key === "Escape"){
    if (cartaAmpliada.classList.contains("aberta")){
        cartaAmpliada.classList.remove("aberta");
        cartaAmpliada.innerHTML = "";
    }
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

    const larguraTela = window.innerWidth;
    if (larguraTela > 800) {
      for (let i = 2; i < larguraTela / 230; i++){
        const sabor_imagem = document.createElement("div");
        catalogo.appendChild(sabor_imagem);
      }
    }
});