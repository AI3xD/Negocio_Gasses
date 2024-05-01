<?php

session_start();
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $tipo_usuario=$_SESSION['tipo_usuario'];
    switch ($tipo_usuario) {
        case '1':
            header("Location:http://localhost/catalogo.php");
            break;
        case '2':
            header('Location:/admin/planes.php');
            break;
        default:
            header('Location:home.php');
            break;
    }

}


?>