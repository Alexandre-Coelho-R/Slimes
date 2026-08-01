<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include "componentes/head.php"?>
    <link rel="stylesheet" href="css/index.css">
    <title>Pocket Slimes - Início</title>
</head>

<body>
    <?php include "componentes/header.php"?>

    <main>
        <section id="principal">
            <div id="textos">
                <h1>Pocket Slimes</h1>
                <h2>Jogo de cartas de alunos do CTI Bauru!</h2>
                <div id="botoes">
                    <a class="botao" href="tutoriais.php">
                        <i class="fa-solid fa-gamepad"></i>
                        <span>Ver tutoriais</span>
                    </a>

                    <a class="botao" href="cartas.php">
                        <i class="fa-solid fa-images"></i>
                        <span>Abrir catálogo</span>
                    </a>                 
                </div>
            </div>
            <img class="um" src="imagens/cartas.webp" alt="Imagem contendo algumas das cartas do jogo">
            <img class="dois" src="imagens/cartas2.webp" alt="Imagem contendo algumas das cartas do jogo">
        </section>


        <section class="secundario">
            <i class="fa-solid fa-book-open"></i>
            <div class="secundario-textos">
                <h1 class="sem-emoji">Apresentação do projeto</h1>
                <h1 class="com-emoji"><i class="fa-solid fa-book-open"></i> Apresentação do projeto</h1>
                <p>Pocket Slimes é um jogo de cartas desenvolvido por alunos do 2º ano do Colégio Técnico Industrial (CTI) "Prof. Isaac Portal Roldán" de Bauru como parte de um projeto do curso de informática. O jogo tem todos os desenhos feitos à mão sem uso de IA e combina estratégia, criatividade e diversão em partidas protagonizadas por diferentes tipos de slimes, itens, ações e ferramentas.</p>
            </div>
        </section>
       
        <section class="secundario">
            <i class="fa-solid fa-calendar-days"></i>
            <div class="secundario-textos">
                <h1 class="sem-emoji">Como comprar o jogo?</h1>
                <h1 class="com-emoji"><i class="fa-solid fa-calendar-days"></i> Como comprar o jogo?</h1>
                <p>O jogo será vendido presencialmente, principalmente durante a Semana do Colégio CTI.</p>
            </div>
        </section>
        
        <section class="secundario">
            <i class="fa-solid fa-envelope"></i>
            <div class="secundario-textos">
                <h1 class="sem-emoji">Equipe e contato</h1>
                <h1 class="com-emoji"><i class="fa-solid fa-envelope"></i> Equipe e contato</h1>
                <p>O projeto é desenvolvido pelos alunos Renan Coelho, Luca Bressan, Frederico Eckhardt e Kauã César. Para conhecer a equipe, tirar dúvidas ou obter mais informações, entre em contato pelo e-mail pocket.slimes.cti@gmail.com.</p>
            </div>
        </section>
    </main>

    <?php include "componentes/footer.php"?>
</body>
</html>