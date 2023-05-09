<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>SI comptabilité</title>

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="<?php echo site_url('assets/css/etatFinancier.css'); ?>">
    <link rel="stylesheet" href="<?php echo site_url('assets/css/ecriture.css'); ?>">
    <link rel="stylesheet" href="<?php echo site_url('assets/css/core-style.css'); ?>">
    <link rel="stylesheet" href="<?php echo site_url('assets/css/style3.css'); ?>">
    <link rel="stylesheet" href="<?php echo site_url('assets/css/font-awesome2.min.css'); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo site_url('assets/css/elegant-icons2.css'); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo site_url('assets/css/owl.carousel2.min.css'); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo site_url('assets/css/slicknav2.min.css'); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo site_url('assets/css/style2.css'); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo site_url('assets/css/admin_acceuil.css'); ?>">

    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo site_url('assets/img/apple-icon.png'); ?>">
    <link rel="icon" type="image/png" href="<?php echo site_url('assets/img/favicon.png'); ?>">
    <!-- Nucleo Icons -->
    <link href="<?php echo site_url('assets/css/nucleo-icons.css'); ?>" rel="stylesheet">
    <link href="<?php echo site_url('assets/css/nucleo-svg.css'); ?>" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="<?php echo site_url('assets/css/material-kit.css'); ?>?v=3.0.0" rel="stylesheet">




</head>

<body>



    <!-- Search Wrapper Area Start -->
    <div class="search-wrapper section-padding-100">
        <div class="search-close">
            <i class="fa fa-close" aria-hidden="true"></i>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-content">
                        <form action="#" method="get">
                            <input type="search" name="search" id="search" placeholder="Type your keyword...">
                            <button type="submit"><img src="<?php echo site_url('img/core-img/search.png'); ?>" alt=""></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Wrapper Area End -->

    <!--  Main Content Wrapper Start  -->
    <div class="main-content-wrapper d-flex clearfix">

        <!--  Entete  -->
        <div class="container position-sticky z-index-sticky top-0">
            <div class="row">
                <div class="col-12">
                    <nav
                        class="navbar navbar-expand-lg  blur border-radius-xl top-0 z-index-fixed shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
                        <div class="container-fluid px-0">
                            <a class="navbar-brand font-weight-bolder ms-sm-3"
                                href="#" rel="tooltip"
                                title="Designed and Coded by Creative Tim" data-placement="bottom" target="_blank">
                                SI comptabilité
                            </a>
                            <button class="navbar-toggler shadow-none ms-2 collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon mt-2">
                                    <span class="navbar-toggler-bar bar1"></span>
                                    <span class="navbar-toggler-bar bar2"></span>
                                    <span class="navbar-toggler-bar bar3"></span>
                                </span>
                            </button>
                            <div class="navbar-collapse pt-3 pb-2 py-lg-0 w-100 collapse" id="navigation" style="">
                                <ul class="navbar-nav navbar-nav-hover ms-auto">
                                    <li class="nav-item dropdown dropdown-hover mx-2" style="
    font-size: larger;
">
                                        <a href="<?php echo site_url('acceuil/infoSociete') ?>" style="
    font-size: 92%;
    margin-left: -228%;
">
                                            info société
                                        </a>

                                    </li>


                                    <li class="nav-item dropdown dropdown-hover mx-2" style="
    font-size: larger;
">
                                        <a href="<?php echo site_url('admin/listeDocuments') ?>" style="
    font-size: 92%;
    margin-left: -124%;
">
                                            documents
                                        </a>

                                    </li>

                                    <li class="nav-item dropdown dropdown-hover mx-2" style="
    font-size: larger;
">
                                        <a href="<?php echo site_url('nyAvo/etatFinancier') ?>" style="
    font-size: 92%;
    margin-left: -35%;
">
                                            Etat financier
                                        </a>

                                    </li>




                                    <li class="nav-item my-auto ms-3 ms-lg-0">
                                        <form action="<?php echo(site_url('')); ?>" method="get">
                                        <button type="submit"
                                            class="btn btn-sm  bg-gradient-primary  mb-0 me-1 mt-2 mt-md-0">Deconnexion</a>
                                        </form>

                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <!-- End Navbar -->
                </div>
            </div>
        </div>
        <!-- entete end -->
