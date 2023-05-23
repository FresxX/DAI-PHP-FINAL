<?php

//if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == 'admin' && $password == '1234') {
        session_start();
        $_SESSION['LOG'] = 1;
        header("Location: menu.php");
        exit();
    } else {
        $error_message = 'Nombre de usuario o contraseña incorrectos.';
        header('Location: login.php');
        exit();
    }
//}
?>
