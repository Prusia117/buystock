<?php
session_start();

unset($_SESSION['autenticated']);
unset($_SESSION['user_auth']);

$_SESSION['status'] = "Has cerrado seción correctamente";
header('Location: ../login_regsiter/login.php');


?>