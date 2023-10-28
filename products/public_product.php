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
                        <div class="card-header"><h4>Publicar un articulo</h4></div>
                        <div class="card-body imagen-cuadrada-p">

                                <div class="form-group mb-3">
                                    <label for="">Imagen del producto:</label>
                                </div>
                                <div class="justify-content-centrar">
                                    <img class="margin-tb-2" src="../images/producto.png"/>
                                </div>
                                

                                <form action="code_profile.php"  enctype="multipart/form-data" method="POST">

                                    <div>
                                        <div class="input-group mb-3">
                                            <input type="file" class="form-control" name="image_product">
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Nombre del producto:</label>
                                        <input type="text" name="product_name"  class="form-control"/>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="">Descripcion:</label>
                                        <input type="text" name="desc"  class="form-control"/>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="">Precio:</label>
                                        <input type="text" name="price" class="form-control"/>
                                    </div>

                                    <div class="justify-content-centrar">
                                        <div class="form-group ">
                                            <button type="submit" name="update_data" class="btn btn-warning">Subir</button>
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