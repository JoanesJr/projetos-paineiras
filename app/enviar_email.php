<?php
// Importar as classes 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// Carregar o autoloader do composer
require '../vendor/autoload.php';

//variaveis

$name = $_POST['name'];
$email = $_POST['email'];
$tel = $_POST['tel'];
$title = $_POST['title'];
$content = $_POST['content'];

$message = 
    "<p><b>Nome:</b> {$name}</p>
    <p><b>E-mail:</b> {$email}</p>
    <p><b>Contato:</b> {$tel}</p></br>
    <p>===================================</p>
    </p>{$content}</P>";

// Instância da classe
$mail = new PHPMailer(true);

    // Configurações do servidor
    $mail->isSMTP();        //Devine o uso de SMTP no envio
    $mail->SMTPAuth = true; //Habilita a autenticação SMTP
    $mail->Username   = 'defcointnunesjr@gmail.com';
    $mail->Password   = '300420023egdjvg0#';
    // Criptografia do envio SSL também é aceito
    $mail->SMTPSecure = 'tls';
    // Informações específicadas pelo Google
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    // Define o remetente
    $mail->setFrom($email);
    // Define o destinatário
    $mail->addAddress('defcointnunesjr@gmail.com', 'Defcoint');
    // Conteúdo da mensagem
    $mail->isHTML(true);  // Seta o formato do e-mail para aceitar conteúdo HTML
    $mail->Subject = $title;
    $mail->Body    = $message;
    // Enviar
    if(!$mail->send()) {
        echo "erro";
    } else {
        header("Location: ../contato.php?2");
    }

