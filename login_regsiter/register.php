<?php

include('../includes/navbar.php');
include('../security/authentication_log.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/css_custom.css">
</head>
<body>
    

    <main>
        <div class="py-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-5">
                        <?php

                            if(isset($_SESSION['status'])){

                                if($_SESSION['status'] == "Registro exitoso")
                                {
                                    ?>
                                        <div class="alert alert-success text-center">
                                            <h5><?= $_SESSION['status']; ?></h5>
                                        </div>
                                    <?php
                                }
                                else
                                {
                                    ?>
                                        <div class="alert alert-warning text-center">
                                            <h5><?= $_SESSION['status']; ?></h5>
                                        </div>
                                    <?php
                                }
                                
                                
                                unset($_SESSION['status']);
                            }
                        ?>
                        <div class="card shadow">
                            <div class="card-header text-alinear-center">
                                <h5>Registro</h5>
                            </div>
                            <div class="card-body">
                                <form action="register_verification.php" method="POST">

                                    <div class="form-group mb-3">
                                        <label for="">Nombre de Usuario</label>
                                        <input type="text" name="name" class="form-control"/>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="">Correo Electronico</label>
                                        <input type="email" name="email" class="form-control"/>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="">Telefono</label>
                                        <input type="tel" name="phone" class="form-control"/>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="">Contraseña</label>
                                        <input type="password" name="pass" class="form-control"/>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="">Repite tu Contraseña</label>
                                        <input type="password" name="confirm_pass" class="form-control"/>
                                    </div>

                                    <div class="justify-content-centrar">
                                        <div class="form-group ">
                                            <button type="submit"  name="register" class="btn btn-primary">Registrate</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>


    


    <script src="../js/bootstrap.min.js"></script>
</body>
</html>