<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
    <!--<![endif]-->
    <head>
        <title>GCC | Grab Crypto Currency</title>
        <meta charset="utf-8">
        <!--[if IE]>
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <![endif]-->
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url("assets/ficon/apple-icon-57x57.png"); ?>">
        <link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url("assets/ficon/apple-icon-60x60.png"); ?>">
        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url("assets/ficon/apple-icon-72x72.png"); ?>">
        <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url("assets/ficon/apple-icon-76x76.png"); ?>">
        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url("assets/ficon/apple-icon-114x114.png"); ?>">
        <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url("assets/ficon/apple-icon-120x120.png"); ?>">
        <link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url("assets/ficon/apple-icon-144x144.png"); ?>">
        <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url("assets/ficon/apple-icon-152x152.png"); ?>">
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url("assets/ficon/apple-icon-180x180.png"); ?>">
        <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo base_url("assets/ficon/android-icon-192x192.png"); ?>">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url("assets/ficon/favicon-32x32.png"); ?>">
        <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url("assets/ficon/favicon-96x96.png"); ?>">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url("assets/ficon/favicon-16x16.png"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("assets/css/animations.css"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("assets/css/fonts.css"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("assets/css/main.css"); ?>" class="color-switcher-link">
        <link rel="stylesheet" href="<?php echo base_url("assets/css/shop.css"); ?>">
        <script src='https://www.google.com/recaptcha/api.js'></script>
        <script src="<?php echo base_url("assets/js/vendor/modernizr-2.6.2.min.js"); ?>"></script>
        <!--[if lt IE 9]>
                <script src="<?php echo base_url("assets/js/vendor/html5shiv.min.js"); ?>"></script>
                <script src="<?php echo base_url("assets/js/vendor/respond.min.js"); ?>"></script>
                <script src="<?php echo base_url("assets/js/vendor/jquery-1.12.4.min.js"); ?>"></script>
        <![endif]-->
    </head>
    <style type="text/css">
        .margin-bottom-zero
        {
            margin-bottom: 0px !important;
        }
        .margin-top-zero
        {
            margin-top: 0px !important;
        }
    </style>

    <body>
        <!--[if lt IE 9]>
                <div class="bg-danger text-center">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/" class="highlight">upgrade your browser</a> to improve your experience.</div>
        <![endif]-->
        <div class="preloader">
            <div class="preloader_image"></div>
        </div>
        <!-- search modal -->
        <div class="modal" tabhome="-1" role="dialog" aria-labelledby="search_modal" id="search_modal"> <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">
                    <i class="rt-icon2-cross2"></i>
                </span>
            </button>
            <div class="widget widget_search">
                <form method="get" class="searchform search-form form-inline" action="/">
                    <div class="form-group bottommargin_0"> <input type="text" value="" name="search" class="form-control" placeholder="Search keyword" id="modal-search-input"> </div> <button type="submit" class="theme_button no_bg_button">Search</button> </form>
            </div>
        </div>
        <!-- Unyson messages modal -->
        <div class="modal fade" tabhome="-1" role="dialog" id="messages_modal">
            <div class="fw-messages-wrap ls with_padding">
                <!-- Uncomment this UL with LI to show messages in modal popup to your user: -->
                <!--
        <ul class="list-unstyled">
                <li>Message To User</li>
        </ul>
                -->
            </div>
        </div>
        <!-- eof .modal -->
        <!-- wrappers for visual page editor and boxed version of template -->
        <div id="canvas">
            <div id="box_wrapper">
                <!-- template sections -->
                <section class="page_toplogo ls section_padding_top_15 section_padding_bottom_15 table_section table_section_md">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 col-sm-12 col-md-push-4 text-center"> <a href="<?php echo base_url('home');?>" class="logo top_logo top_offset_logo">
                                    <img src="<?php echo base_url("assets/img/logo-final.png");?>" alt="grabcryptocoins.com" style="max-width: 150px;margin-top:10px;">
                                </a>
                                <!-- header toggler --><span class="toggle_menu"><span></span></span>
                            </div>
                            <div class="col-md-4 col-sm-6 col-md-pull-4 text-center text-md-left">

                                <h4 class="margin-bottom-zero highlight" >Grabcryptocoins</h4>
                                <h6 class="margin-top-zero"> &nbsp;A Unit of  GCC Blockstat</h6>

                            </div>
                            <div class="col-md-4 col-sm-6 text-center text-md-right hidden-xs">
                                <div> <a class="social-icon border-icon rounded-icon color-icon soc-facebook" href="https://www.facebook.com/GCCblockstat" title="Facebook"></a> <a class="social-icon border-icon rounded-icon color-icon soc-twitter" href="https://twitter.com/GCCblockstat" title="Twitter"></a> <a class="social-icon border-icon rounded-icon color-icon soc-youtube" href="#" title="Youtube"></a> </div>
                            </div>
                        </div>
                    </div>
                </section>

                <header class="page_header header_white">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <!-- main nav start -->
                                <nav class="mainmenu_wrapper">
                                    <ul class="mainmenu nav sf-menu">
                                        <li class="active"> <a href="<?php echo base_url('home');?>">Home</a>

                                        </li>
                                        <li> <a href="<?php echo base_url('about');?>">About GCC</a>
                                            <ul>
                                                <li> <a href="<?php echo base_url('about');?>">Our Team</a> </li>
                                                <li> <a href="<?php echo base_url('value');?>">Our Values</a> </li>
                                            </ul>
                                        </li>
                                        <!-- eof pages -->
                                        <li> <a href="<?php echo base_url('buy-sell');?>">Buy & Sell</a> </li>

                                        <!-- eof features -->
                                        <!-- blog -->
                                        <li> <a href="<?php echo base_url('store');?>">Store</a>

                                        </li>
                                        <li> <a href="<?php echo base_url('launchpad');?>">LaunchPad</a>

                                        </li>
                                        <!-- eof blog -->
                                        <!-- shop -->
                                        <li> <a href="<?php echo base_url('career');?>">Careers</a>

                                        </li>
                                        <!-- eof shop -->
                                        <!-- contacts -->
                                        <?php if(isset($_SESSION['user'])){?>
                                        
                                        <li> <a href="<?php echo base_url('dashboard');?>">My Account</a>
                                            <ul style="min-width:300px;">
                                                   <li> <center>Buy Limit: Rs.<b><?php echo ' '.getUserData($_SESSION['user'])->limitation.'.00'; ?> </b></center></li>
                                               <li> <center>Sell Limit: Rs.<b><?php echo ' '.getUserData($_SESSION['user'])->seller_limitation.'.00'; ?> </b> </center></li>
                                            </ul>
                                        </li>
                                        <?php } else { ?>
                                        <li> <a href="<?php echo base_url('registration');?>">SignUp</a>

                                        </li>
                                        <li> <a href="<?php echo base_url('login');?>">Login</a>

                                        </li> <?php } ?>
                                        <!-- eof contacts -->
                                    </ul>
                                </nav>
                                <!-- eof main nav -->
                            </div>
                        </div>
                    </div>
                </header>
                <div class="diclaimer" style="background-color: #efefef; background-color: #efefef;max-height: 30px;">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-1 col-xs-4" style="margin: 0;"> <span><b>Disclaimer:</b></span></div>
                            <div class="col-sm-11 col-xs-8" style="margin: 0;">
                                <marquee> <?php echo getDisclaimerContent(); ?></marquee>
                            </div>
                        </div>
                    </div>
                </div>