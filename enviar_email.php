<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

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
    


$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';
$mail->Username = 'defcointnunesjr@gmail.com';
$mail->Password = '300420023egdjvg0#';
$mail->Port = 587;

$mail->setFrom($email);
$mail->addAddress('defcointnunesjr@gmail.com', 'Defcoint');

$mail->isHTML(true);
$mail->Subject = $title;
$mail->Body    = $message;
    
if(!$mail->send()) {
    header("Location: contato.php?1");
} else {
    header("Location: contato.php?2");
}
