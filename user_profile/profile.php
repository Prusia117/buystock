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
                <div class="col-md-6">
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
                        <div class="card-header text-alinear-center"><h4>Este es tu usuario: </h4></div>
                        <div class="card-body justify-content-center imagen-circular-p">
                            <img class="margin-tb-2" src="<?= $_SESSION['img']; ?>"/>
                            <p>Username: <?= $_SESSION['user_auth']['username']; ?></p>
                            <p>Email: <?= $_SESSION['user_auth']['email']; ?></p>
                            <p>phone: <?= $_SESSION['user_auth']['phone']; ?></p>
                            <a class="btn btn-success"  href="change_profile.php">Modificar</a>
                            <a class="btn btn-success"  href="change_password.php">Modificar Contraseña</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/bootstrap.min.js"></script>
</body>

</html>
