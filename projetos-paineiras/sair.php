<?php

session_start();

unset($_SESSION['user']);
unset($_SESSION['password']);

header('Location: ../login.php');