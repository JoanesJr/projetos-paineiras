<?php
    require_once "db.php";

    $vacancy = $_POST['vaga'];
    $sector = $_POST['setor'];
    $assunt = $_POST['assunto'];

    //verifica se foi enviado o arquivo no formulariio
    if (isset($_FILES['img'])) {
        //salva o nome do arquivo enviado
        $file = $_FILES['img']['name'];
        //pathinfo(nome do arquvio, o que quer) -->pathinfo_extension seleciona a extenção
        //pega a extenção do arquivo enviado.
        $extension = pathinfo($file, PATHINFO_EXTENSION);

        //atribui um nome unico, para evitar duplicidade (data de envio+extenção)
        $newName = time()."." . $extension;
        //diretorio onde as imagens vão ser salvas no servidor
        $directory = "../upload/";
        //faz o upload
        //move_uploaded_files(nome arquivo enviado, pra onde vai (diretorio+extenção)); 
        move_uploaded_file($_FILES['img']['tmp_name'], $directory . $newName);
    }

    $db = new db();
    $connectDb = $db->connectDatabase();

    $sql = "INSERT INTO jobs (vaga, setor, arquivo, datas, assunto) VALUES ('{$vacancy}', '{$sector}', '{$newName}', NOW(), '{$assunt}')";

    if(mysqli_query($connectDb, $sql)) {
        header('Location: ../admin_vagas.php?code=1');
    } else {
        header('Location: ../admin_vagas.php?code=2');
    }