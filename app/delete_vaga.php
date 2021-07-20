<?php
    require_once "db.php";

    $db = new db();
    $connecDb = $db->connectDatabase();
    $id = $_GET['n'];

    $sql = "DELETE FROM jobs WHERE id = '{$id}'";

    if (mysqli_query($connecDb, $sql)) {
        header('Location: ../admin_vagas.php?code=5');
    } else {
        header('Location: ../admin_vagas.php?code=6');
    }