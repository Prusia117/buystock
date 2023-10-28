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
                                <div class="alert alert-warning text-center">
                                    <h5><?= $_SESSION['status']; ?></h5>
                                </div>
                            <?php
                        unset($_SESSION['status']);
                    }
                    ?>
                    <div class="card">
                        <div class="card-header"><h4>Modificar Perfil</h4></div>
                        <div class="card-body imagen-circular-p">

                                <div class="justify-content-centrar">
                                    <img class="margin-tb-2" src="<?= $_SESSION['img']; ?>"/>
                                </div>
                                
                                <div>
                                    <form action="image_code.php" method="post" enctype="multipart/form-data">
                                        <div class="input-group mb-3">
                                            <input type="file" class="form-control" name="image_profile">
                                            <label class="input-group-text sin-margin-padding" for="inputGroupFile02"><button type="submit" name="updateimg" class="sin-radius btn btn-warning">Subir</button></label>
                                        </div>
                                    </form>
                                </div>
                                <form action="code_profile.php" method="POST">

                                    <div class="form-group mb-3">
                                        <label for="">Nombre de usuario:</label>
                                        <input type="text" name="username" value= "<?= $_SESSION['user_auth']['username']; ?>" class="form-control"/>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="">Correo Electronico:</label>
                                        <input type="email" name="email" value= "<?= $_SESSION['user_auth']['email']; ?>" class="form-control"/>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="">Telefono:</label>
                                        <input type="tel" name="phone" value= "<?= $_SESSION['user_auth']['phone']; ?>" class="form-control"/>
                                    </div>

                                    <div class="justify-content-centrar">
                                        <div class="form-group ">
                                            <button type="submit" name="update_data" class="btn btn-warning">Cambiar</button>
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