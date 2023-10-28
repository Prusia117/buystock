<?php
include('../data_base/conex.php');
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
            <div class="row">
                <div class="cold-m-12">
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
                        <div class="card-header display-flex align-items-sm-center"><div class="margin-lr-2 imagen-circular-secondary"><img class="imagen-circular" src="<?= $_SESSION['img']; ?>"></div><h4>Bienvenido a Buystock</h4> </div>
                        <div class="card-body">
                            <p>Como estas hoy? <?= $_SESSION['user_auth']['username']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/bootstrap.min.js"></script>
</body>

</html>