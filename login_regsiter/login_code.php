<?php

session_start();

include('../data_base/conex.php');

if(isset($_POST['login'])){

    if(!empty(trim($_POST['email'])) && !empty(trim($_POST['pass'])))
    {

        $email = mysqli_real_escape_string($link, $_POST['email']);
        $pass = $_POST['pass'];
        $pass_hash = password_hash($pass, PASSWORD_DEFAULT);
    
        //Verificacion password_verify($password, $hashed_password)

        $login_query = "SELECT * FROM users Where email = '$email' LIMIT 1 ";
        $login_query_run = mysqli_query($link, $login_query);

        if(mysqli_num_rows($login_query_run) > 0)
        {

            
            $row = mysqli_fetch_array($login_query_run);

            $hashed_password = $row['pass'];

            if(password_verify($pass, $hashed_password)){
                $_SESSION['autenticated'] = TRUE;
                $_SESSION['user_auth'] = 
                [
    
                    'username' => $row['name'],
                    'email' => $row['email'],
                    'phone' => $row['phone'],
                    'img_p' => $row['image_profile'],
                ];
                $_SESSION['id'] = $row['id'];
                $_SESSION['img'] = $row['image_profile'];

                $_SESSION['status'] = "Has iniciado secion correctamente";
                header("Location: ../home/home.php");
                exit(0);
            }
            else
            {
                $_SESSION['status'] = "Correo o Contraseña no validos";
                header("Location: login.php");
                exit(0);
            }

        }
        else
        {
            $_SESSION['status'] = "Correo o Contraseña no validos";
            header("Location: login.php");
            exit(0);
        }

    }else
    {
        $_SESSION['status'] = "Todos los campos son obligatorios";
        header("Location: login.php");
        exit(0);
    }


}
else{
    header("Location: login.php");
    exit(0);
}

?>


