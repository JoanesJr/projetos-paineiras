<?php
// Importar as classes 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// Carregar o autoloader do composer
require '../vendor/autoload.php';

if (isset($_FILES['anexo'])) {
    //salva o nome do arquivo enviado
    $file = $_FILES['anexo']['name'];
    //pathinfo(nome do arquvio, o que quer) -->pathinfo_extension seleciona a extenção
    //pega a extenção do arquivo enviado.
    $extension = pathinfo($file, PATHINFO_EXTENSION);

    //atribui um nome unico, para evitar duplicidade (data de envio+extenção)
    $newName = time()."." . $extension;
    //diretorio onde as imagens vão ser salvas no servidor
    $directory = "../anexo_email/";
    //faz o upload
    //move_uploaded_files(nome arquivo enviado, pra onde vai (diretorio+extenção)); 
    move_uploaded_file($_FILES['anexo']['tmp_name'], $directory . $newName);
}


//variaveis
if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['tel']) && !empty($_POST['title']) && !empty($_POST['content'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $title = $_POST['title'];
    $content = $_POST['content'];
} else {
    if(isset($_POST['v']) && isset($_POST['n'])) {
        $v = $_POST['v'];
        $n = $_POST['n'];
        header("Location: ../contato.php?v={$v}&n={$n}&code=9");
    }else {
        header("Location: ../contato.php?code=10");
    }
};

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
    if (isset($newName)) {
        //envia anexo
        $mail->addAttachment("../anexo_email/{$newName}", $file.$extension); 
    }
     
    // Conteúdo da mensagem
    $mail->isHTML(true);  // Seta o formato do e-mail para aceitar conteúdo HTML
    $mail->Subject = $title;
    $mail->Body    = $message;
    // Enviar
    if(!$mail->send()) {
        if (isset($newName)) {
            unlink("../anexo_email/{$newName}");
        }
        
    } else {
        if (isset($newName)) {
            unlink("../anexo_email/{$newName}");
        }
        header("Location: ../contato.php?code=11");
    }

