<?php
session_start();

if (isset($_SESSION['LOG']) && $_SESSION['LOG'] == 1) {
  
    // El usuario ha iniciado sesión correctamente, permitir acceso a la página
} else {
    // El usuario no ha iniciado sesión correctamente, redirigir a la página de inicio de sesión
    header('Location: login.php');
    exit;
}
?>
