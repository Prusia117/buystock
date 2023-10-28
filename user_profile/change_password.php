<?php
include('../security/authentication.php');
include('../includes/navbar_login.php');
include('../includes/header.php');
include('../includes/footer.php');




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/css_custom.css">
</head>

<body>
    <div class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                <?php

                    if(isset($_SESSION['status'])){

                            ?>
                                <div class="alert alert-info text-center">
                                    <h5><?= $_SESSION['status']; ?></h5>
                                </div>
                            <?php
                        unset($_SESSION['status']);
                    }
                    ?>
                    <div class="card">
                        <div class="card-header"><h4>Cambiar tu contraseña</h4></div>
                        <div class="card-body">
                                <form action="code_password.php" method="POST">

                                    <div class="form-group mb-3">
                                        <label for="">Tu Actual Contraseña</label>
                                        <input type="text" name="password" text= "<?= $_SESSION['user_auth']['phone']; ?>" class="form-control"/>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="">Nueva Contraseña</label>
                                        <input type="password" name="new_password" text= "<?= $_SESSION['user_auth']['username']; ?>" class="form-control"/>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="">Repite la Contraseña</label>
                                        <input type="password" name="confirm_new_password" text= "<?= $_SESSION['user_auth']['email']; ?>" class="form-control"/>
                                    </div>

                                    <div class="justify-content-centrar">
                                        <div class="form-group ">
                                            <button type="submit" name="update_pass" class="btn btn-warning">Cambiar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/bootstrap.min.js"></script>
</body>

</html>