<?php
    require_once "db.php";

    $id = $_POST['id'];
    $name= $_POST['name'];
    if (isset($_FILES)) {
        $imgName = $_FILES['img']['name'];
    }else {
        $imgName = $_POST['img'];
    }

    $db = new db();
    $connecDb = $db->connectDatabase();
    $sql = "SELECT * FROM banners WHERE id = {$id}";
    $sqlSelect = mysqli_query($connecDb, $sql);
    $sqlArray = mysqli_fetch_array($sqlSelect);
    $nameImg = $sqlArray['arquivo'];
    
     //verifica se foi enviado o arquivo no formulariio
     if (!empty($_FILES['img']['name'])) {
        //salva o nome do arquivo enviado
        $file = $_FILES['img']['name'];
        //pathinfo(nome do arquvio, o que quer) -->pathinfo_extension seleciona a extenção
        //pega a extenção do arquivo enviado.
        $extension = pathinfo($file, PATHINFO_EXTENSION);
        $newName = $file.$extension;
        $lastName = $nameImg;
        //diretorio onde as imagens vão ser salvas no servidor
        $directory = "../upload/banner/";
        //faz o upload
        //move_uploaded_files(nome arquivo enviado, pra onde vai (diretorio+extenção)); 
        if($newName != $lastName) {
            unlink("../upload/{$lastName}");
            //atribui um nome unico, para evitar duplicidade (data de envio+extenção)
            $newName = time()."." . $extension;
            move_uploaded_file($_FILES['img']['tmp_name'], $directory . $newName);  
        }  
    }else {
        $newName = $nameImg;
    }

 $sqlUpdate = "UPDATE banners SET nome = '{$name}', arquivo = '{$newName}', data = NOW()  WHERE id = {$id}";
echo $sqlUpdate;
    if (mysqli_query($connecDb, $sqlUpdate)) {
        header('Location: ../admin_banner.php?code=3');
    }else {
        header('Location: ../admin_banner.php?code=4');
    }