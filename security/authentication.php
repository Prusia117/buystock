<?php

session_start();

if(!isset($_SESSION['autenticated']))
{

    $_SESSION['status'] = "Inicia secion para tener todas las caracteristicas";
    header('Location: ../login_regsiter/login.php');
    exit(0);
}

?>