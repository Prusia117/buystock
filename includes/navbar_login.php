<div class="gb-dark-green-logo">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
            <nav class="navbar navbar-expand-lg navbar-dark ">
              <div class="container-fluid">
                <div class="imagen-circular-s">
                  <a class="navbar-brand" ><img src="../images/logo_sl.jpg"></a>
                </div>
                <a class="navbar-brand" >Buystock</a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                  <ul class="navbar-nav ms-auto mb-2 mb-lg-0 " >

                    <li class="nav-item">
                      <a class="nav-link active"  href="../home/home.php">Home</a>
                    </li>

                    <li class="nav-item">
                      <a class="nav-link active"  href="../products/your_products.php">Tus publicaciones</a>
                    </li>

                    <li class="nav-item">
                      <a class="nav-link active"  href="">Carrito</a>
                    </li>

                    <li class="nav-item">
                      <a class="nav-link active"  href="../user_profile/profile.php">Perfil</a>
                    </li>

                    <li class="nav-item">
                      <a class="nav-link active"  href="../security/logout.php">Cerrar Seción</a>
                    </li>

                    <li class="nav-item">
                      <div class="imagen-circular">
                        <a class="nav-link active"><img src="<?= $_SESSION['img']; ?>"></a>
                      </div>
                      
                    </li>
                  </ul>

                </div>
              </div>
          </nav>
      </div>
    </div>
  </div>  
</div>
