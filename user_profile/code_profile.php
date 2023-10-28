<?php

include ("../data_base/conex.php");
include("../security/authentication.php");

if(isset($_POST['update_data'])){

    $id = $_SESSION["id"];
        
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    

    
            
    $sql = "SELECT name FROM users WHERE name = '$username'";
    $sql2 = "SELECT email FROM users WHERE email = '$email'";
    $sql3 = "SELECT phone FROM users WHERE phone = '$email'";

    $result = mysqli_query($link, $sql);
    $result2 = mysqli_query($link, $sql2);
    $result3 = mysqli_query($link, $sql3);

    if(empty(trim($_POST["email"])) or empty(trim($_POST["username"])) or empty(trim($_POST["phone"])))
    {
        $_SESSION['status'] = "Todos los campos son necesarios";
        header("Location: change_profile.php");
    }
    else
    {
        if(strlen(trim($_POST["username"])) < 5)
        {
            $_SESSION['status'] = "El usuairo tiene que ser mayor a 5 caracteres";
            header("Location: change_profile.php");
            
        }
        elseif(mysqli_num_rows($result)>0)
        {
            $_SESSION['status'] = "El usuairo ya esta en uso";
            header("Location: change_profile.php");
            
        }
        else
        {
            $query = "UPDATE users SET name = '$username'
            WHERE id='$id'";
    
            $query_run = mysqli_query($link, $query);
    
            if($query_run){
                $_SESSION['user_auth'] = 
                [
                    'username' => $username,
                    'email' => $_SESSION['user_auth']['email'],
                    'phone' => $_SESSION['user_auth']['phone'],
                    'img_p' => $_SESSION['user_auth']['im_g'],
                ];
                $_SESSION['status'] = "Se ha actualizado correctamente tu cuenta";
                header("Location: profile.php");
                exit(0);
            }
            else 
            {
                $_SESSION['status'] = "Se ha produciodo un error intetalo mas tarde";
                header("Location: profile.php");
                exit(0);
            }
        }
        
        if(mysqli_num_rows($result2)>0)
        {
            $_SESSION['status'] = "El correo ya esta en uso";
            header("Location: change_profile.php");
            
        }
        else
        {
            $query = "UPDATE users SET email = '$email' WHERE id='$id'";
    
            $query_run = mysqli_query($link, $query);
    
            if($query_run){
                $_SESSION['user_auth'] = 
                [
                    'username' => $_SESSION['user_auth']['username'],
                    'email' => $email,
                    'phone' => $_SESSION['user_auth']['phone'],
                    'img_p' => $_SESSION['user_auth']['im_g'],
                ];
                $_SESSION['status'] = "Se ha actualizado correctamente tu cuenta";
                header("Location: profile.php");
                exit(0);
            }
            else 
            {
                $_SESSION['status'] = "Se ha produciodo un error intetalo mas tarde";
                header("Location: profile.php");
                
            }
        }

        if(is_numeric($phone))
        {
            if(mysqli_num_rows($result3)>0)
            {
                $_SESSION['status'] = "El telefono ya esta en uso";
                header("Location: change_profile.php");
                
            }
            elseif(strlen(trim($_POST["phone"]))>10)
            {
                $_SESSION['status'] = "Introduce un numero de telefono valido";
                header("Location: change_profile.php");
                
            }
            else
            {
                $query = "UPDATE users SET phone = '$phone' WHERE id='$id'";
        
                $query_run = mysqli_query($link, $query);
        
                if($query_run){
                    $_SESSION['user_auth'] = 
                    [
                        'username' => $_SESSION['user_auth']['username'],
                        'email' =>  $_SESSION['user_auth']['email'],
                        'phone' => $phone,
                        'img_p' => $_SESSION['user_auth']['im_g'],
                    ];
                    $_SESSION['status'] = "Se ha actualizado correctamente tu cuenta";
                    header("Location: profile.php");
                    exit(0);
                }
                else 
                {
                    $_SESSION['status'] = "Se ha produciodo un error intetalo mas tarde";
                    header("Location: profile.php");
                    
                }
            }
    
        }
        else
        {
            $_SESSION['status'] = "Introduce un formato de numero valido";
            header("Location: change_profile.php");
        }
    }

}
else
{
    header("Location: profile.php");
    exit(0);
}
?>