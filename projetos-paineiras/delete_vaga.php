<?php
    require_once "db.php";

    $db = new db();
    $connecDb = $db->connectDatabase();
    $id = $_GET['n'];

    $sqlSelect = "SELECT * FROM jobs WHERE id = {$id}";
    $file = mysqli_query($connecDb, $sqlSelect);
    $findSql = mysqli_fetch_array($file);
    $fileName = $findSql['arquivo'];
    unlink("../upload/{$fileName}");
    $sql = "DELETE FROM jobs WHERE id = '{$id}'";
   

    if (mysqli_query($connecDb, $sql)) {
        header('Location: ../admin_vagas.php?code=5');
    } else {
        header('Location: ../admin_vagas.php?code=6');
    }