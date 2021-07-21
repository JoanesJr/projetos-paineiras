<?php
    require_once "db.php";

    $name = $_POST['name'];

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
        $directory = "../upload/banner/";
        //faz o upload
        //move_uploaded_files(nome arquivo enviado, pra onde vai (diretorio+extenção)); 
        move_uploaded_file($_FILES['img']['tmp_name'], $directory . $newName);
    }

    $db = new db();
    $connectDb = $db->connectDatabase();
    $ativo = 1;

    $sql = "INSERT INTO banners (nome, arquivo, data, ativo) VALUES ('{$name}', '{$newName}', NOW(), {$ativo})";

    if(mysqli_query($connectDb, $sql)) {
        header('Location: ../admin_banner.php?code=1');
    } else {
        header('Location: ../admin_banner.php?code=2');
    }