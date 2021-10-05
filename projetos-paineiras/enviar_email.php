<?php
// Importar as classes 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// Carregar o autoloader do composer
require '../vendor/autoload.php';
$nameContato = "Contato Site";

if (isset($_FILES['anexo'])) {
    //salva o nome do arquivo enviado
    $file = $_FILES['anexo']['name'];
    //pathinfo(nome do arquvio, o que quer) -->pathinfo_extension seleciona a extenção
    //pega a extenção do arquivo enviado.
    $extension = pathinfo($file, PATHINFO_EXTENSION);

    //atribui um nome unico, para evitar duplicidade (data de envio+extenção)
    $newName = time() . "." . $extension;
    //diretorio onde as imagens vão ser salvas no servidor
    $directory = "../anexo_email/";
    //faz o upload
    //move_uploaded_files(nome arquivo enviado, pra onde vai (diretorio+extenção)); 
    move_uploaded_file($_FILES['anexo']['tmp_name'], $directory . $newName);
    $nameContato = "Trabalhe Conosco";
}


//variaveis
if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['tel']) && !empty($_POST['title']) && !empty($_POST['content'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $title = $_POST['title'];
    $content = $_POST['content'];
} else {
    if (isset($_POST['n'])) {
        $v = $_POST['v'];
        $n = $_POST['n'];
        return false;
        header("Location: ../contato.php?v={$v}&n={$n}&code=9");
    } else {
        header("Location: ../contato.php?code=10");
        return false;
    }
};

$message =
"<!DOCTYPE html>
<html lang='pt-br'>
    <head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Document</title>
        <style>

            body {
                text-align: justify;
            }

            span {
                font-weight: bold;
            }

        </style>
    </head>

    <body>
        <header>
            <p><span>Nome:</span> {$name}</p>
            <p><span>E-mail:</span> {$email}</p>
            <p><span>Contato:</span> {$tel}</p></br>
            <span><p>============================================================</p></span>
        </header>

        <main>
            <p>{$content}</p>
        </main>
    
    </body>
</html>";
    

// Instância da classe
$mail = new PHPMailer(true);

// Configurações do servidor
$mail->isSMTP();        //Devine o uso de SMTP no envio
$mail->SMTPAuth = true; //Habilita a autenticação SMTP
$mail->Username   = 'email que vai enviar';
$mail->Password   = 'senha do email que vai enviar';
// Criptografia do envio SSL também é aceito
$mail->SMTPSecure = 'tls';
// Informações específicadas pelo Google
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
// Define o remetente
$mail->From = "email que vai enviar";
$mail->FromName = $nameContato;
// Define o destinatário
$mail->addAddress('email que vai receber');
if (isset($newName)) {
    //envia anexo
    $mail->addAttachment("../anexo_email/{$newName}", $file);
}

// Conteúdo da mensagem
$mail->isHTML(true);  // Seta o formato do e-mail para aceitar conteúdo HTML
$mail->Subject = $title;
$mail->Body    = $message;
// Enviar
if (!$mail->send()) {
    if (isset($newName)) {
        unlink("../anexo_email/{$newName}");
    }
} else {
    if (isset($newName)) {
        unlink("../anexo_email/{$newName}");
    }
}

function validaEnvio()
{
    if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['tel']) && !empty($_POST['title']) && !empty($_POST['content'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $tel = $_POST['tel'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        return true;
    } else {
        if (isset($_POST['n'])) {
            $v = $_POST['v'];
            $n = $_POST['n'];
            return false;
        } else {
            return false;
        }
    };
}
