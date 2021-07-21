<?php
    require_once "db.php";

    $db = new db();
    $connecDb = $db->connectDatabase();
    $id = $_GET['n'];

    $sqlSelect = "SELECT * FROM banners WHERE id = {$id}";
    $file = mysqli_query($connecDb, $sqlSelect);
    $findSql = mysqli_fetch_array($file);
    $fileName = $findSql['arquivo'];
    unlink("../upload/banner/{$fileName}");
    $sql = "DELETE FROM banners WHERE id = '{$id}'";
   

    if (mysqli_query($connecDb, $sql)) {
        header('Location: ../admin_banner.php?code=5');
    } else {
        header('Location: ../admin_banner.php?code=6');
    }