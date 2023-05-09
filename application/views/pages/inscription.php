<html lang="en" ><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo site_url('assets/img/apple-icon.png') ?>">
    <link rel="icon" type="image/png" href="<?php echo site_url('assets/img/favicon.png') ?>">
    <title>
      Inscription
    </title>
    <!-- CSS Files -->
    <link id="pagestyle" href="<?php echo site_url('assets/css/material-kit.css') ?>?v=3.0.0" rel="stylesheet">
 
 <style>

.bg-gradient-primary {
    background-image: linear-gradient(195deg, #EC4 0%, #D81B60 94%);
}


 </style> 
  <body class="sign-in-basic">
    <!-- Navbar Transparent -->
    
    <!-- End Navbar -->
    <div class="page-header align-items-start min-vh-100" style="background-image: url('<?php echo site_url('img/bglogin.jpg') ?>');" loading="lazy">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Inscription</h4>
                  
                </div>
              </div>
              <div class="card-body">
                <form role="form" class="text-start" method="post" action="<?php echo site_url('login/insertNewUser'); ?>">
                  <div class="input-group input-group-outline mb-3">
                    <!-- <label class="form-label">Nom</label> -->
                    <input type="text" class="form-control" name="nom" required> 
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <!-- <label class="form-label">Mot de passe</label> -->
                    <input type="password" class="form-control" name="mdp" required>
                  </div>
                  
                  <div class="text-center">
                    <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">S'inscrire</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </div>
    <!--   Core JS Files   -->
    <script src="<?php echo site_url('assets/js/core/popper.min.js') ?>" type="text/javascript"></script>
    <script src="<?php echo site_url('assets/js/core/bootstrap.min.js') ?>" type="text/javascript"></script>
    <script src="<?php echo site_url('assets/js/plugins/perfect-scrollbar.min.js') ?>"></script>
    <!--  Plugin for Parallax, full documentation here: https://github.com/wagerfield/parallax  -->
    <script src="<?php echo site_url('assets/js/plugins/parallax.min.js') ?>"></script>
    <!-- Control Center for Material UI Kit: parallax effects, scripts for the example pages etc -->

    <script src="<?php echo site_url('assets/js/material-kit.min.js?v=3.0.0') ?>" type="text/javascript"></script>
  
  
  </body></html>