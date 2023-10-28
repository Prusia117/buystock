<?php

include ("../data_base/conex.php");
include("../security/authentication.php");

if(isset($_POST['update_pass'])){

    $id = $_SESSION["id"];
        
    $pas_actual = $_POST['password'];
    $pass_n = $_POST['new_password'];
    $pass_c_n = $_POST['confirm_new_password'];
    
    $sql = "SELECT pass FROM users WHERE id = '$id'";

    $result = mysqli_query($link, $sql);
    $row = $result->fetch_assoc();


    $pass_data = $row['pass'];

    if(empty(trim($_POST["password"])) or empty(trim($_POST["new_password"])) or empty(trim($_POST["confirm_new_password"])))
    {
        $_SESSION['status'] = "Todos los campos son necesarios";
        header("Location: change_password.php");
    }
    else
    {
        if(password_verify($pas_actual, $pass_data))
        {
            if(strlen(trim($_POST["new_password"])) < 8 or strlen(trim($_POST["new_password"])) < 8)
            {
                $_SESSION['status'] = "La contraseña debe tener minimo 8 caracteres";
                header("Location: change_password.php");
                
            }
            elseif($pass_c_n != $pass_n or $pass_n != $pass_c_n)
            {
                $_SESSION['status'] = "Las nuevas contraseñas no coinciden";
                header("Location: change_password.php");
                
            }
            else
            {
                $pass_hash = password_hash($pass_n, PASSWORD_DEFAULT); //hashear la pass
                $query = "UPDATE users SET pass = '$pass_hash' WHERE id='$id'";
        
                $query_run = mysqli_query($link, $query);
        
                if($query_run){
                    
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
            $_SESSION['status'] = "La contraseña actual no coinciden";
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