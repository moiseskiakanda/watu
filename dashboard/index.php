<?php
/* Created by kiaka
   Project name watu
   Data: 02/09/2023
   Time: 19:03
*/
require __DIR__."./../vendor/autoload.php";
//add autoload
use Source\Authentication\Authentication;

//saber user loagado
$aut = new Authentication();
$aut->isLogged();

?>
<!doctype html>
<html class="no-js" lang="pt">
<head>
    <meta charset="UTF-8">
    <title><?= CONF_SITE_DESC ?></title>
    <!--IE Compatibility modes-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Mobile first-->
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href=" <?= CONF_SITE_LOGO ?>"/>
    <link rel="author" href="<?= CONF_AUTHOR?>"/>
    <!-- global styles-->
    <link rel="stylesheet" href="./../node_modules/@fortawesome/fontawesome-free/css/all.min.css"/>
    <link rel="stylesheet" href="./../node_modules/@fortawesome/fontawesome-free/css/v4-shims.min.css"/>

    <link rel="stylesheet" href="css/components.css"/>
    <link rel="stylesheet" href="css/custom.css"/>


    <link rel="stylesheet" href="./../node_modules/bootstrap/dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/pages/layouts.css" />
    <link rel="stylesheet" href="vendors/animate/css/animate.min.css"/>
    <link rel="stylesheet" href="vendors/select2/css/select2.min.css"/>
    <link rel="stylesheet" href="#" id="skin_change"/>
    <style>
        .preloader {
            background: #ffffff;
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 100000;
            backface-visibility: hidden;
        }
        .preloader_img {
            width: 200px;
            height: 200px;
            position: absolute;
            left: 48%;
            top: 48%;
            background-position: center;
            z-index: 999999;
        }
        .active {
            transition: all 0.5s ease-in-out;
        }
        .fa-1x {
            font-size:1.2em !important;
        }
        .card {
            box-shadow: rgba(0, 0, 0, 0.35) 0 5px 15px; !important;
        }
        /* Colocar animacao a Class (newContent) do tipo (puffIn) */
        .newContent {
            animation: puffIn 0.5s ease-in-out;
        }
        #mdPrintConf {
            max-width: 90% !important;
            width: 90% !important;
        }
        /* Estilo para telas menores, por exemplo, abaixo de 768px de largura */
        @media (max-width: 768px) {
            #mdPrintConf {
                max-width: 90% !important; /* Ajuste para 100% em telas menores */
                width: 90% !important;
            }
        }
        #iframePrint {
            width: 90%;
            height: 70vh !important; /* 90% da altura da viewport */
            margin: auto; /* Centraliza horizontalmente */
            position: relative;
            top: 50%;
        }
        }
    </style>
    <!-- end of global styles-->
</head>
<body class="fixedMenu_header">
<div class="preloader" style=" position: fixed;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  z-index: 100000;
  backface-visibility: hidden;
  background: #ffffff;">
    <div class="preloader_img" style="width: 200px;
  height: 200px;
  position: absolute;
  left: 48%;
  top: 48%;
  background-position: center;
z-index: 999999">
        <img src="img/loader.gif" style=" width: 40px;" alt="carregando...">
    </div>
</div>
<div id="wrap">
    <div id="top" class="fixed">
        <!-- .navbar -->
        <nav class="navbar navbar-static-top">
            <div class="container-fluid m-0">
                <a class="navbar-brand mr-0" href="./">
                    <h4 class="text-white"> <?= CONF_SITE_NAME ?></h4>
                </a>
                <div class="menu mr-sm-auto">
                        <span class="toggle-left" id="menu-toggle">
                        <i class="fa fa-bars text-white"></i>
                    </span>
                </div>
                <div class="navbar-toggleable-sm m-lg-auto d-none d-lg-flex top_menu" id="nav-content">
                    <ul class="nav navbar-nav flex-row top_menubar">
                        <li class="nav-item ">
                            <a class="nav-link text-white" href="javascript:window.location.reload()">
                                <i class="fa fa-dashboard"></i> <span class="quick_text">DASHBOARD</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">
                                <i class="fa fa fa-group"></i> <span class="quick_text">LSTA DOS AGRICULTORES</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#" onclick="return agricultorHomePage();">
                                <i class="fa fa-user-plus"></i> <span class="quick_text">AGRICULTORES</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="topnav dropdown-menu-right ml-auto">
                    <div class="btn-group">
                        <div class="user-settings no-bg">
                            <button type="button" class="btn btn-default no-bg micheal_btn vanishIn" data-toggle="dropdown">
                                <img src="<?= CONF_SITE_AVATAR ?>" class="admin_img2 rounded-circle avatar-img" alt="avatar"> <strong><?= $_SESSION["nU"] ?>&nbsp;&nbsp;</strong>
                                <span class="fa fa-sort-down white_bg"></span>
                            </button>
                            <div class="dropdown-menu admire_admin">
                                <div class="popover-header text-center"><?= $_SESSION["nU"] ?></div>
                                <a class="dropdown-item" href="#"><i class="fa fa-cogs"></i>
                                    Configurações</a>
                                <a class="dropdown-item" href="#">
                                    <i class="fa fa-user"></i> Status do usuário
                                </a>
                                <a class="dropdown-item" id="btnLogout"  href="#"><i class="fa fa-sign-out text-danger"></i>
                                    Terminar e Sair</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </nav>
        <!-- /.navbar -->
        <!-- /.head -->
    </div>
    <!-- /#top -->
    <div class="wrapper">
        <div id="left" class="fixed">
            <div class="menu_scroll">
                <div class="media user-media">
                    <div class="user-media-toggleHover">
                        <span class="fa fa-user"></span>
                    </div>
                    <div class="user-wrapper">
                        <a class="user-link" href="#">
                            <img class="media-object img-thumbnail user-img rounded-circle admin_img3" alt="User Picture"
                                 src="<?= CONF_SITE_AVATAR ?>">
                            <p class="text-white user-info">Olá, <?= $_SESSION["nU"] ?></p></a>

                    </div>
                </div>
                <!-- #menu -->
                <ul id="menu">
                    <li>
                        <a href="#"  onclick="return agricultorHomePage();">
                            <i class="fa fa-user-plus"></i>
                            <span class="link-title menu_hide">&nbsp;AGRICULTORES</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-group"></i>
                            <span class="link-title menu_hide">&nbsp;LISTA DOS AGRICULTORES</span>
                        </a>
                    </li>

                </ul>
            </div>
            <!-- /#menu -->
        </div>

        <!-- seccao onde ira mudar o conteudo novo -->
        <section id="pageContentPaneil">
            <!-- /#left content-->
            <div id="content" class="bg-container fixed_header_menu_conainer fixed_header_menu_page newContent">

                <header class="head">
                    <div class="main-bar">
                        <div class="row">
                            <div class="col-lg-5">
                                <h4 class="nav_top_align"><i class="fa fa-th"></i> Fixed Header and Menu</h4>
                            </div>
                            <div class="col-lg-7">
                                <ul class="breadcrumb float-right nav_breadcrumb_top_align">
                                    <li class=" breadcrumb-item">
                                        <a href="#">
                                            <i class="fa fa-home" data-pack="default" data-tags=""></i> Dashboard
                                        </a>
                                    </li>
                                    <li class=" breadcrumb-item">
                                        <a href="#">Layouts</a>
                                    </li>
                                    <li class="breadcrumb-item active">Fixed Header and Menu</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </header>

                <div class="outer">
                    <div class="inner bg-container">
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <div class="card-header bg-white">
                                        About Admire
                                    </div>
                                    <div class="card-body card_block_top_align ">
                                        <h5> Here Comes Admire  Admin Theme  Description. </h5>
                                        <p> Admire Admin Theme is built on Bootstrap v4.0.0-alpha.5 and it is a fully responsive theme...</p>
                                        <p class="text-justify">Lorem ipsum dolor sit amet, facer honestatis ut usu, eripuit docendi volumus eu mel, sea ad case
                                            nusquam voluptua. An mei vidit saepe adolescens, qui in diam nostro. Regione dolores his no,
                                            mea audiam vidisse dolorem et. Qui wisi nulla electram ut, his soleat virtute temporibus an,
                                            primis hendrerit eu ius.
                                            Vix ea audire rationibus. Tale aperiri sit ad, zril noluisse ut sit.
                                            Altera euismod propriae eam ex, has aeque lobortis reprimique ad, mei cu oratio salutandi
                                            maluisset. Ius te fierent inimicus dignissim. Eos an feugait rationibus. At unum etiam
                                            concludaturque nam.</p>
                                        <p class="text-justify">Lorem ipsum dolor sit amet, facer honestatis ut usu, eripuit docendi volumus eu mel, sea ad case
                                            nusquam voluptua. An mei vidit saepe adolescens, qui in diam nostro. Regione dolores his no,
                                            mea audiam vidisse dolorem et. Qui wisi nulla electram ut, his soleat virtute temporibus an,
                                            primis hendrerit eu ius.
                                            Vix ea audire rationibus. Tale aperiri sit ad, zril noluisse ut sit.
                                            Altera euismod propriae eam ex, has aeque lobortis reprimique ad, mei cu oratio salutandi
                                            maluisset. Ius te fierent inimicus dignissim. Eos an feugait rationibus. At unum etiam
                                            concludaturque nam.</p>
                                        <p class="text-justify">Lorem ipsum dolor sit amet, facer honestatis ut usu, eripuit docendi volumus eu mel, sea ad case
                                            nusquam voluptua. An mei vidit saepe adolescens, qui in diam nostro. Regione dolores his no,
                                            mea audiam vidisse dolorem et. Qui wisi nulla electram ut, his soleat virtute temporibus an,
                                            primis hendrerit eu ius.
                                            Vix ea audire rationibus. Tale aperiri sit ad, zril noluisse ut sit.
                                            Altera euismod propriae eam ex, has aeque lobortis reprimique ad, mei cu oratio salutandi
                                            maluisset. Ius te fierent inimicus dignissim. Eos an feugait rationibus. At unum etiam
                                            concludaturque nam.</p>
                                        <p class="text-justify">Lorem ipsum dolor sit amet, facer honestatis ut usu, eripuit docendi volumus eu mel, sea ad case
                                            nusquam voluptua. An mei vidit saepe adolescens, qui in diam nostro. Regione dolores his no,
                                            mea audiam vidisse dolorem et. Qui wisi nulla electram ut, his soleat virtute temporibus an,
                                            primis hendrerit eu ius.
                                            Vix ea audire rationibus. Tale aperiri sit ad, zril noluisse ut sit.
                                            Altera euismod propriae eam ex, has aeque lobortis reprimique ad, mei cu oratio salutandi
                                            maluisset. Ius te fierent inimicus dignissim. Eos an feugait rationibus. At unum etiam
                                            concludaturque nam.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- /#content -->


        </section>
        <!-- Modal -->
        <div class="modal fade" id="modalIframePrint" tabindex="-1" aria-labelledby="mdTitlePrint" aria-hidden="true">
            <div class="modal-dialog" id="mdPrintConf">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="mdTitlePrint">Impresao do relatorio solicitado</h1>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <iframe id="iframePrint" src="" style="width: 100%; height: 100%"></iframe>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal iframe-->
        <!-- seccao onde ira mudar o conteudo novo -->
        <!-- Section de modal com ifram no body -->
        <!-- Button trigger modal -->
        <!-- /#wrap -->



    </div>
    <!--wrapper-->
</div>
<!-- global scripts
<script src="./../node_modules/jquery/dist/jquery.min.js"></script>
-->
<script src="./../node_modules/@fortawesome/fontawesome-free/js/all.min.js"></script>
<script src="./../node_modules/@fortawesome/fontawesome-free/js/v4-shims.min.js"></script>
<script src="js/components.js"></script>
<script src="js/custom.js"></script>
<!-- end of global scripts-->
<script src="js/pages/fixed_menu.js"></script>
<script src="js/pages/fixed_menu.js"></script>
<script type="text/javascript" src="./../node_modules/sweetalert2/dist/sweetalert2.all.js"></script>
<script type="text/javascript" src="./vendors/select2/js/select2.js"></script>
<script type="text/javascript" src="js/support.js"></script>
<script type="text/javascript" src="js/navegation.fuctions.js"></script>
<script src="./../node_modules/bootstrap/js/dist/modal.js"></script>
<script type="text/javascript"></script>
</body>
</html>