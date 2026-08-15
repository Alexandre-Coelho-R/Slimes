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

// Função de pegar as cartas do banco de dados

let cartas = [];

async function carregarCartas() {
	const resultado = await fetch("assets/funcoes/buscar-cartas.php");
	cartas = await resultado.json();
	mostrarCartas(cartas);
}

//Inicialização

carregarCartas();
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