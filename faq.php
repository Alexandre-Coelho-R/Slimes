<?php 
$titulo = "Perguntas frequentes";
$css = "institucionais.css";
$js = "faq.js";
include "_cabecalho.php";
?>

<main>
    <h1 class="title">Perguntas frequentes</h1>
    <h2 class="subtitle">Tire suas dúvidas sobre o jogo e nossa empresa</h2>

    <article id="faq-container">
        <section class="faq">
            <h3 class="faq-pergunta">
                Quem nós somos?
                <i class="fa-solid fa-arrow-down seta"></i>
            </h3>
            <div class="faq-resposta">
                <p>Nós somos um grupo de alunos do curso de informática diurno do Colégio Técnico Industrial "Prof. Isaac Portal Roldán" que está desenvolvendo um projeto para ser vendido no evento da Semana do Colégio (20-24 de outubro).</p>
                <p>Nosso produto é um jogo de cartas desenhado por nós com sistema de duelos entre jogadores. Mais informações podem ser vistas na página <a href="f-sobre-nos.php">sobre nós</a>.</p>
            </div>
        </section>

        <section class="faq">
            <h3 class="faq-pergunta">
                Onde e quando estaremos na Semana do Colégio?
                <i class="fa-solid fa-arrow-down seta"></i>
            </h3>
            <div class="faq-resposta">
                <p>Nossa loja estará dentro da sala de estudos do colégio. Essa sala fica próxima da cantina do colégio.</p>
                <p>A Semana do Colégio ocorrerá entre os dias 20 e 24 de outubro e provavelmente ficaremos em todos os horários disponíveis para visitas.</p>
                <p>Além disso, na entrada do colégio e ao longo dele, haverão alunos e professores para guiar os visitantes em caso de dúvidas</p>
            </div>
        </section>

        <section class="faq">
            <h3 class="faq-pergunta">
                Como funciona a compra dos produtos?
                <i class="fa-solid fa-arrow-down seta"></i>
            </h3>
            <div class="faq-resposta">
                <p>Para comprar, há duas possibilidades:</p>
                <ul>
                    <li>Criar uma conta na página de <a href="usuario.php">usuário</a>; adicionar <a href="produtos.php">produtos</a> ao carrinho; reservar esses produtos na página do <a href="carrinho.php">carrinho</a>.</li>
                    <li>Ou ir diretamente para nossa loja no CTI Bauru durante a Semana do Colégio e comprar os produtos lá.</li>
                </ul>
                <p>Em qualquer caso, o pagamento e a retirada de produtos somente serão feitos no próprio CTI na nossa loja por meio de dinheiro físico ou de PIX</p>
                <p>Por mais que as duas possibilidades possam ser feitas, é preferível reservar pelo site porque será mais rápido na retirada e não há chance de faltar um produto desejado.</p>
            </div>
        </section>

        <section class="faq">
            <h3 class="faq-pergunta">
                O que você recebe na compra de baralhos, pacotes e moedas?
                <i class="fa-solid fa-arrow-down seta"></i>
            </h3>
            <div class="faq-resposta">
                <p>Baralhos (decks):</p>
                <ul>
                    <li>30 cartas do jogo</li>
                    <li>1 moeda personalizada do jogo</li>
                </ul>
                <p>Pacotes (boosters):</p>
                <ul>
                    <li>7 cartas aleatórias do jogo</li>
                </ul>
                <p>Moedas:</p>
                <ul>
                    <li>1 moeda feita à mão inspirada num slime do jogo</li>
                </ul>
            </div>
        </section>

        <section class="faq">
            <h3 class="faq-pergunta">
                Como os desenhos do jogo foram feitos?
                <i class="fa-solid fa-arrow-down seta"></i>
            </h3>
            <div class="faq-resposta">
                <p>Todos os desenhos do jogo foram feitos à mão num tablet por meio do aplicativo Affinity pelo membro Luca Bressan Morretti</p>
                <p>Depois de fazer os desenhos, colocamos eles em PDFs e imprimimos as cartas com frente e verso em uma impressora que sdownorta o papel mais pesado usado no jogo para ter mais qualidade.</p>
                <p>A seguir, um vídeo mostrando como uma carta foi feita:</p>
            </div>
        </section>

        <!-- <section class="faq">
            <h3 class="faq-pergunta">
                O que é um jogo de cartas do estilo TCG?
                <i class="fa-solid fa-arrow-down seta"></i>
            </h3>
            <div class="faq-resposta">
                <p>Um jogo TCG é um jogo de cartas colecionáveis e trocáveis entre pessoas que tem um sistema de duelos entre jogadores.</p>
            </div>
        </section> -->

        <section class="faq">
            <h3 class="faq-pergunta">
                O que acontece com os seus dados ao criar conta?
                <i class="fa-solid fa-arrow-down seta"></i>
            </h3>
            <div class="faq-resposta">
                <p>Os únicos dados pessoais que guardamos são nome (que pode ser ficíticio) e email.</p>
                <p>Seus dados são salvos num banco de dados da escola.</p>
            </div>
        </section>
    </article>
</main>

<?php include "_rodape.php"; ?>