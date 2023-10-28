<?php

session_start();

include('../data_base/conex.php');

if(isset($_POST['register'])){

    if(!empty(trim($_POST['product_name'])) && !empty(trim($_POST['desc'])) && !empty(trim($_POST['price'])) && !empty(trim($_POST['image_product'])))
    {
        $name = mysqli_real_escape_string($link, $_POST['product_name']);
        $email = mysqli_real_escape_string($link,$_POST['desc']);
        $phone = mysqli_real_escape_string($link,$_POST['price']);
        $confirm_pass = mysqli_real_escape_string($link,$_POST['confirm_pass']); 
    
        //Verificacion 
    
        $check_email = "SELECT email FROM users WHERE email='$email' LIMIT 1";
        $check_email_query_run = mysqli_query($link, $check_email);
    
        $check_user = "SELECT name FROM users WHERE name='$name' LIMIT 1";
        $check_user_query_run = mysqli_query($link, $check_user);
    
        $check_phone = "SELECT phone FROM users WHERE phone='$phone' LIMIT 1";
        $check_phone_query_run = mysqli_query($link, $check_phone);
    
        if(mysqli_num_rows($check_email_query_run) > 0) //email
        {
    
            $_SESSION['status'] = "Este correro ya esta registrado";
            header("Location: register.php");
            exit(0);
    
        }
        elseif(mysqli_num_rows($check_user_query_run) > 0) //usuarios
        {
    
            $_SESSION['status'] = "Este usuario ya esta registrado";
            header("Location: register.php");
            exit(0);
    
        }
        elseif(mysqli_num_rows($check_phone_query_run) > 0) //telefono
        {
    
            $_SESSION['status'] = "Este telefono ya esta registrado";
            header("Location: register.php");
            exit(0);
    
        }
        elseif($pass != $confirm_pass or $confirm_pass != $pass) //contraseñas
        {
    
            $_SESSION['status'] = "Las contraseñas no coindicen";
            header("Location: register.php");
            exit(0);
    
        }
        else //insertar usuarios
        {
    
            $pass_hash = password_hash($pass, PASSWORD_DEFAULT); //hashear la pass
    
            $query = "INSERT INTO users (name, email, phone, pass) VALUES ('$name', '$email', '$phone', '$pass_hash')";
            $query_run = mysqli_query($link, $query);
    
            if($query_run) //si fue exitoso
            {
    
                $_SESSION['status'] = "Registro exitoso";
                header("Location: register.php");
                exit(0);
    
            }
            else //si no
            {
    
                $_SESSION['status'] = "El registro no ha sido exitoso";
                header("Location: register.php");
                exit(0);
    
            }
        }
    }else
    {
        $_SESSION['status'] = "Todos los campos son obligatorios";
        header("Location: register.php");
        exit(0);
    }


}

?>



