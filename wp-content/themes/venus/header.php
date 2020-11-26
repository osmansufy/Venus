<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
    wp_head();
    ?>
</head>

<body <?php body_class();?> >

    <!--header start-->
    <header class="app-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!--<div class="branding-wrap">-->
                    <!--brand start-->
                    <div class="navbar-brand float-left">
                        <a class="" href="index.html">
                            <img class="logo-dark" src="<?php echo get_stylesheet_directory_uri();?>/assets/img/logo-dark.png"
                                srcset="<?php echo get_stylesheet_directory_uri();?>/assets/img/logo-dark@2x.png 2x" alt="Venus">
                        </a>
                    </div>
                    <!--brand end-->
                    <!--start responsive nav toggle button-->
                    <div class="nav-btn hamburger hamburger--slider js-hamburger ">
                        <div class="hamburger-box">
                            <div class="hamburger-inner"></div>
                        </div>
                    </div>
                    <!--end responsive nav toggle button-->
                    <!--</div>-->

                    <!--top mega menu start-->
                    <nav id="vl-menu">
                        <!--extra links start-->
                        <div class="float-right nav-extra-link">
                            <a href="javascript:;" data-toggle="modal" data-target="#f-modal" class="nav-search"><i
                                    class="vl-search"></i></a>
                        </div>
                        <!--extra links end-->
                        <!--start nav-->
                        <ul class="vlmenu dark-sub-menu slide-effect float-right">
                            <li><a href="index.html">Home</a></li>
                            <li><a href="page-about-us.html">About Us</a> </li>
                            <li><a href="page-services.html">Services</a> </li>
                            <li><a href="portfolio.html">Portfolio</a> </li>
                            <li><a href="#">Pages <i class="fa fa-angle-down"></i></a>
                                <!--start level 2-->
                                <ul>

                                    <li><a href="page-team.html">Our Team</a> </li>
                                    <li><a href="utility-404.html">404 Error</a></li>
                                    <li><a href="utility-500.html">500 Error</a></li>
                                    <li><a href="utility-search-result.html">Search Result</a></li>
                                </ul>
                                <!--end level 2-->
                            </li>
                            <li><a href="page-contact.html">Contact Us</a> </li>
                        </ul>
                        <!--end nav-->
                    </nav>
                    <!--top mega menu end-->
                </div>
            </div>
        </div>
    </header>
    <!--header end-->

    <!-- search modal start-->
    <div class="modal fade" id="f-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content border-0">
                <div class="modal-body">
                    <form>
                        <div class="form-group mb-0">
                            <div class="icon-field-right">
                                <i class="vl-search"></i>
                                <input type="text" class="form-control border-0" placeholder="Type Here...">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- search modal end-->