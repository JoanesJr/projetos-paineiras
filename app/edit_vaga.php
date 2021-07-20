<?php
    require_once "db.php";

    $id = $_POST['id'];
    $vacany= $_POST['vaga'];
    $sector = $_POST['setor'];
    $imgName = $_FILES['img']['name'];
    
     //verifica se foi enviado o arquivo no formulariio
     if (isset($_FILES['img'])) {
        //salva o nome do arquivo enviado
        $file = $_FILES['img']['name'];
        //pathinfo(nome do arquvio, o que quer) -->pathinfo_extension seleciona a extenção
        //pega a extenção do arquivo enviado.
        $extension = pathinfo($file, PATHINFO_EXTENSION);
        $lastName = $file.$extension;

        //atribui um nome unico, para evitar duplicidade (data de envio+extenção)
        $newName = time()."." . $extension;
        //diretorio onde as imagens vão ser salvas no servidor
        $directory = "../upload/";
        //faz o upload
        //move_uploaded_files(nome arquivo enviado, pra onde vai (diretorio+extenção)); 
        if($newName != $lastName) {
            move_uploaded_file($_FILES['img']['tmp_name'], $directory . $newName);
        }
        
    }

    $db = new db();
    $connecDb = $db->connectDatabase();

 $sqlUpdate = "UPDATE jobs SET vaga = '{$vacany}', setor = '{$sector}', datas = NOW(), arquivo = '{$newName}' WHERE id = {$id}";

    if (mysqli_query($connecDb, $sqlUpdate)) {
        header('Location: ../admin_vagas.php?code=3');
    }else {
        header('Location: ../admin_vagas.php?code=4');
    }