//Inicializar variáveis

const catalogo = document.getElementById("catalogo");
const btTodos = document.getElementById("todos");
const btSlimes = document.getElementById("slimes");
const btItens = document.getElementById("itens");
const btAcoes = document.getElementById("acoes");
const btFerramentas = document.getElementById("ferramentas");
const cartaAmpliada = document.getElementById("carta-ampliada");
const possuiMouse = window.matchMedia("(pointer: fine)").matches;

//Função de mostrar cartas

function mostrarCartas(lista){
    catalogo.innerHTML = "";
    lista.forEach((carta) => {
        const imagem = document.createElement("img");
        imagem.src = "assets/imagens/cartas/" + carta.imagem + ".webp";
        imagem.alt = carta.nome;

        imagem.addEventListener("click", () => {
            ampliarCarta(carta);
        });

        catalogo.appendChild(imagem);
    }
    );
}

//Função de remover cores de fundo dos botões

function mudarCores(){
    btTodos.style.backgroundColor = "";
    btSlimes.style.backgroundColor = "";
    btItens.style.backgroundColor = "";
    btAcoes.style.backgroundColor = "";
    btFerramentas.style.backgroundColor = "";
    return "var(--bigger-color)";
}

//Função de ampliar carta quando clica nela

function ampliarCarta(carta){
    if (window.innerWidth < 270) return;

    cartaAmpliada.innerHTML = "";

    const cartaCriada = document.createElement("img");
    cartaCriada.src = "assets/imagens/cartas/" + carta.imagem + ".webp";
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

          const mudanca = 30;

          const relativoY = (mouseY - centroY) / coordenadas.height * -mudanca;
          const relativoX = (mouseX - centroX) / coordenadas.width * mudanca;

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

// Função de pegar as cartas do banco de dados

let cartas = [];

async function carregarCartas() {
    try {
        const resultado = await fetch("assets/funcoes/buscar-cartas.php");
        cartas = await resultado.json();
	    mostrarCartas(cartas);
    } catch (e) {
        mostrarMensagem();
    }
}

// Mostrar mensagem

function mostrarMensagem() {
    if (cartas.length === 0) {
        catalogo.innerHTML = "";
        const aviso = document.createElement("h2");
        aviso.textContent = "Erro de conexão.";
        aviso.classList.add("subtitle");    
        catalogo.appendChild(aviso);
    }
}

//Inicialização

carregarCartas();
btTodos.style.backgroundColor = mudarCores();

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
    btTodos.style.backgroundColor = mudarCores();
    mostrarMensagem();
});

btSlimes.addEventListener("click", () => {
    mostrarCartas(cartas.filter(carta => carta.categoria === "slime"));
    btSlimes.style.backgroundColor = mudarCores();
    mostrarMensagem();
});

btItens.addEventListener("click", () => {
    mostrarCartas(cartas.filter(carta => carta.categoria === "item"));
    btItens.style.backgroundColor = mudarCores();
    mostrarMensagem();
});

btAcoes.addEventListener("click", () => {
    mostrarCartas(cartas.filter(carta => carta.categoria === "ação"));
    btAcoes.style.backgroundColor = mudarCores();
    mostrarMensagem();
});

btFerramentas.addEventListener("click", () => {
    mostrarCartas(cartas.filter(carta => carta.categoria === "ferramenta"));
    btFerramentas.style.backgroundColor = mudarCores();

    const larguraTela = window.innerWidth;
    if (larguraTela > 800) {
      for (let i = 2; i < larguraTela / 230; i++){
        const sabor_imagem = document.createElement("div");
        catalogo.appendChild(sabor_imagem);
      }
    }

    mostrarMensagem();
});