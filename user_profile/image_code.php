<?php

include('../data_base/conex.php');
include('../security/authentication.php');

    

        if(isset($_POST['updateimg'])){

                $usuariooo = $_SESSION['user_auth']['username'];
                $idee = $_SESSION['id'];
                $giuon = "_";
                
                $id_usuario = $_SESSION['id'];
                
                $sql = "SELECT * FROM users WHERE id ='$id_usuario'";

                $resultado =$link->query($sql);
                $row = $resultado->fetch_assoc();

                $user_name_img = $row['name'];

                $img_user1 = $row['image_profile'];

                $image_profile = $_FILES['image_profile'];

                $directorio_destino = "../img_usuarios/";

                $tmp_name = $image_profile['tmp_name'];
                    
                    
                $img_file = $usuariooo . $giuon . $user_name_img . $giuon . $idee . $giuon . $id_usuario . $giuon . $image_profile['name'];
                $img_type = $image_profile['type'];

                // Si se trata de una imagen 
                if (((strpos($img_type, "gif") || strpos($img_type, "jpeg") ||
                strpos($img_type, "jpg")) || strpos($img_type, "jfif") || strpos($img_type, "ico")
                || strpos($img_type, "png") || strpos($img_type, "svg")))
                {
                    //¿Tenemos permisos para subir la imágen?
                    $destino = $directorio_destino . '/' .  $img_file;
                    if (file_exists($destino)) {
                        $_SESSION['status'] = "Sorry, file already exists.";
                    }elseif ($_FILES["image_profile"]["size"] > 1000000) {
                        $_SESSION['status'] = "Tu archivo es muy grande el máximo es de un1MB.";
                        header("Location: change_profile.php");
                        exit(0);
                    }else{
                        if($img_user1 == "../images/profile-user.png") {
                            mysqli_query($link, "UPDATE users SET image_profile = '$destino' WHERE id = '$id_usuario'");
                            (move_uploaded_file($tmp_name, $destino));
                            $_SESSION['img'] = $destino;
                            $_SESSION['status'] = "Imagen actualizada correctamente";
                            header("Location: profile.php");
                            exit(0);
                        }else {
                            unlink("$row[image_profile]");
                            mysqli_query($link, "UPDATE users SET image_profile = '$destino' WHERE id = '$id_usuario'");
                            (move_uploaded_file($tmp_name, $destino));
                            $_SESSION['img'] =  $destino;
                            $_SESSION['status'] = "Imagen actualizada correctamente";
                            header("Location: profile.php");
                            exit(0);
                        }
                    }
                }else{
                    $_SESSION['status'] = "Extensiones permitidas gif, jpeg, jpg, jfif, png, ico y svg";
                    header("Location: change_profile.php");
                    exit(0);
                }
            
        }
    ?>
