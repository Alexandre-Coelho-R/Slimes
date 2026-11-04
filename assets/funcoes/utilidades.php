<?php

if (session_status() !== PHP_SESSION_ACTIVE) session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
require_once __DIR__ . '/PHPMailer-master/src/Exception.php';
require_once __DIR__ . '/PHPMailer-master/src/PHPMailer.php';
require_once __DIR__ . '/PHPMailer-master/src/SMTP.php';


function conectar_bd() {   
    try {
        $conn = new PDO("pgsql:host=projetoscti.com.br;port=54432;dbname=loja2a;user=loja2a;password=OcZahD4zvDa0FhJ");
    } catch (PDOException $e) {
        voltarInfo("Erro na conexão com o banco de dados.");
    }

    return $conn;
}

function mexerSQL($sql, $parametros, $conn) {
    try {
        $variavel = $conn -> prepare($sql);
        $variavel -> execute($parametros);
        return $variavel;
    } catch (PDOException $e) {
        voltarInfo("Erro na conexão com o servidor.");
    }
}

function voltarInfo($mensagem = "") {
    if (session_status() !== PHP_SESSION_ACTIVE) session_start();
    $_SESSION["mensagem"] = $mensagem;
    header("Location: /info.php");
    exit;
}

function voltarPagina($pagina = "") {
    header("Location: $pagina");
    exit;
}

function verificarLogin() {
    return isset($_SESSION["usuario_id"]) ? true : false;
}

function verificarAdmin() {
    if (!($_SESSION["usuario_admin"] ?? false)) voltarInfo("Você não tem permissão para acessar essa página");
}

function echoFechar($mensagem = "") {
    echo $mensagem;
    exit;
}

function qtd_prod($paramConn, $paramId) {
    try {
        $sql = "SELECT qtd_estoque(:p)";
        $select = $paramConn->prepare($sql);
        $select->bindParam(':p',$paramId);
        if ($select->execute()) return $select->fetchColumn();
    } catch (PDOException $e) {
        return -1;
    }
}

function EnviaEmail($pEmailDestino,$pAssunto,$pHtml,$pUsuario = "pocket.slimes.cti@gmail.com",$pSenha = "qktw guvg kakp lpgq",$pSMTP = "smtp.gmail.com"
) {
    $mail = new PHPMailer();
    
    $mail->IsSMTP(); // diz ao PHP que o servidor é SMTP
    $mail->Host = $pSMTP; // configura o servidor

    $mail->SMTPAuth = true; // requer autenticação no servidor
    $mail->SMTPSecure = 'tls'; // nível de segurança

    $mail->SMTPOptions = array('ssl' => array('verify_peer' => false,'verify_peer_name' => false,'allow_self_signed' => true)
    );

    $mail->Port = 587; // porta do serviço no servidor

    $mail->Username = $pUsuario;
    $mail->Password = $pSenha;

    $mail->From = $pUsuario;
    $mail->FromName = "Suporte de senhas - Slime Smash";

    $mail->AddAddress($pEmailDestino, $_SESSION["usuario_nome"]);

    $mail->IsHTML(true); // o conteúdo enviado é HTML
    $mail->CharSet = 'UTF-8';
    $mail->Encoding = 'base64';

    $mail->Subject = $pAssunto;
    $mail->Body = $pHtml;

    $enviado = $mail->Send(); // dispara o envio

    if (!$enviado) {
        echo "<br>Erro: " . $mail->ErrorInfo;
    } else {
        return "Email enviado";
    }
    
}

function mostrarProduto($conn, $categoria) {
    $select = $conn -> query("SELECT * FROM produto WHERE excluido=FALSE AND categoria='$categoria'");

    while ($linha = $select->fetch() ) {

        $imagem_bd = $linha["imagem"];
        if (empty($imagem_bd) || $imagem_bd == "null") {
            $imagem = "assets/imagens/produtos/imagem-substituta.webp";
        } else {
            $imagem = "assets/imagens/produtos/" . $imagem_bd;
        }

        $nome = $linha['nome'];

        $valor_unitario = number_format($linha["valor_unitario"], 2, ",", ".");

        $id_produto = $linha["id_produto"];

        $quantidade = qtd_prod($conn, $id_produto);

        if ($categoria == "deck") {
            $link = "deck.php?id=" . $linha["id_produto"];
            echo "
                <div class='produto'>
                    <a href='$link' class='imagem-produto'>
                        <img src='$imagem'>
                        <span class='quantidade'>$quantidade<br><small>unid</small></span>
                    </a>
                ";
        } else {
            echo "
                <div class='produto'>
                    <section href='deck.php' class='imagem-produto'>
                        <img src='$imagem'>
                        <span class='quantidade'>$quantidade<br><small>unid</small></span>
                    </section>
                ";
        }

        echo "
            <p>$nome</p>
            <strong>R$ $valor_unitario</strong>

            <form class='form-carrinho'>
                <input type='hidden' name='acao' value='adicionar'>
                <input type='hidden' name='id_produto' value='$id_produto'>
                <button type='submit'>Adicionar</button>
            </form>
        </div>
        ";
    }
}
?>