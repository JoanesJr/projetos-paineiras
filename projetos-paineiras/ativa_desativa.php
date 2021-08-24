<?php
require_once "db.php";

$situacion = $_GET['ativo'];
$id = $_GET['n'];

if ($situacion) {
    $situacion = 0;
} else {
    $situacion = 1;
}

$db = new db();
$connectDb = $db->connectDatabase();
$sql = "UPDATE banners set ativo = '{$situacion}' WHERE id = '{$id}'";

if (mysqli_query($connectDb, $sql)) {
    header('Location: ../admin_banner.php?code=7');
} else {
    header('Location: ../admin_banner?code=8');
}
