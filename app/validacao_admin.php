<?php

session_start();

require_once "db.php";

$userLogin = $_POST['user'];
$userPassword = $_POST['password'];

$db = new db();
$connectDb = $db->connectDatabase();

$sql = "SELECT * FROM user_admin WHERE user = '$userLogin' AND password = '$userPassword'";

//mysqli_query(conexão com o BD, codigo SQL)
$sendSql = mysqli_query($connectDb, $sql); // retorna um resource caso for true;


if ($sendSql) {
    //mysqli_fetch_array($) -> transforma o resource em array
    $returnDb = mysqli_fetch_array($sendSql);

    if($returnDb['user'] == $userLogin and $returnDb['password'] == $userPassword) {
        $_SESSION['user'] = $returnDb['user'];
        $_SESSION['password'] = $returnDb['password'];
        header('Location: ../admin.php');
    }else {
        header('Location: ../login.php?erro=1');
    }
} else {
    echo "OCORREU UM ERRO AO CONSULTAR O BANCO DE DADOS. CONTATE O ADMINISTRADOR";
}

