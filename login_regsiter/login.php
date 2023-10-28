<?php

include('../includes/navbar.php');
include('../security/authentication_log.php');




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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

                            if($_SESSION['status'] == "Inicia secion para tener todas las caracteristicas" or $_SESSION['status'] == "Has cerrado seción correctamente")
                            {
                                ?>
                                    <div class="alert alert-info text-center">
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
                                <h5>Inicio de Seción</h5>
                            </div>
                            <div class="card-body">
                                <form action="login_code.php" method="POST">

                                    <div class="form-group mb-3">
                                        <label for="">Correo Electronico</label>
                                        <input type="email" name="email" class="form-control"/>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="">Contraseña</label>
                                        <input type="password" name="pass" class="form-control"/>
                                    </div>

                                    <div class="justify-content-centrar">
                                        <div class="form-group ">
                                            <button type="submit" name="login" class="btn btn-primary">Inica Seción</button>
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