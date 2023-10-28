<?php

session_start();

if(isset($_SESSION['autenticated']) != FALSE)
{
    header('Location: ../home/home.php');
    exit(0);
}

?>