<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include "assets/componentes/head.php"?>
    <link rel="stylesheet" href="assets/css/index.css">
    <title>Pocket Slimes - Início</title>
</head>

<body>
    <?php 
    $pagina_ativada = "index.php";
    include "assets/componentes/header.php";
    ?>

    <main>
        <section id="hero-section">
            <div id="textos">
                <h1>Pocket Slimes</h1>
                <h2>O melhor (e único) TCG de slimes do mundo!</h2>
            </div>
            <img class="um" src="assets/imagens/cartas.webp" alt="Imagem contendo algumas das cartas do jogo">
            <img class="dois" src="assets/imagens/cartas2.webp" alt="Imagem contendo algumas das cartas do jogo">
        </section>


        <section class="site-navigation">
            <i class="fa-solid fa-book-open"></i>
            <div class="secundario-textos">
                <h1 class="sem-emoji">Apresentação do projeto</h1>
                <h1 class="com-emoji"><i class="fa-solid fa-book-open"></i> Apresentação do projeto</h1>
                <p>Pocket Slimes é um jogo de cartas desenvolvido por alunos do 2º ano do Colégio Técnico Industrial (CTI) "Prof. Isaac Portal Roldán" de Bauru como parte de um projeto do curso de informática. O jogo tem todos os desenhos feitos à mão sem uso de IA e combina estratégia, criatividade e diversão em partidas protagonizadas por diferentes tipos de slimes, itens, ações e ferramentas.</p>
            </div>
        </section>
       
        <section class="site-navigation">
            <i class="fa-solid fa-calendar-days"></i>
            <div class="secundario-textos">
                <h1 class="sem-emoji">Como comprar o jogo?</h1>
                <h1 class="com-emoji"><i class="fa-solid fa-calendar-days"></i> Como comprar o jogo?</h1>
                <p>O jogo será vendido presencialmente, principalmente durante a Semana do Colégio CTI.</p>
            </div>
        </section>
        
        <section class="site-navigation">
            <i class="fa-solid fa-envelope"></i>
            <div class="secundario-textos">
                <h1 class="sem-emoji">Equipe e contato</h1>
                <h1 class="com-emoji"><i class="fa-solid fa-envelope"></i> Equipe e contato</h1>
                <p>O projeto é desenvolvido pelos alunos Renan Coelho, Luca Bressan, Frederico Eckhardt e Kauã César. Para conhecer a equipe, tirar dúvidas ou obter mais informações, entre em contato pelo e-mail pocket.slimes.cti@gmail.com.</p>
            </div>
        </section>
    </main>

    <?php include "assets/componentes/footer.php"?>
</body>
</html>