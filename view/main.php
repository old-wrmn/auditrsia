<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Audit RSIA Mutiara Bunda</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body class="body-bg">
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- main wrapper start -->
    <div class="horizontal-main-wrapper">
        <!-- main header area start -->
        <div class="mainheader-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-1">
                        <div class="logo">
                            <a href="../"><img src="assets/images/icon/logo2.png" alt="logo">
                        </div>
                    </div>
                    <div class="col-md-2">
                    <h5>Audit RSIA Mutiara Bunda</h5></a>
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-9 clearfix text-right">
                        <div class="d-md-inline-block d-block mr-md-4">
                            <ul class="notification-area">
                                <li id="full-view"><i class="ti-fullscreen"></i></li>
                                <li id="full-view-exit"><i class="ti-zoom-out"></i></li>
                            </ul>
                        </div>
                        <div class="clearfix d-md-inline-block d-block">
                            <div class="user-profile m-0">
                                <img class="avatar user-thumb" src="assets/images/author/avatar.png" alt="avatar">
                                <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?=ucwords($_SESSION['user']['pegawai_nama'])?><i class="fa fa-angle-down"></i></h4>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="?view=profile">Profile</a>
                                    <a class="dropdown-item" href="?logout">Log Out</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- main header area end -->
        <!-- header area start -->
        <div class="header-area header-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-9  d-none d-lg-block">
                        <div class="horizontal-menu">
                            <nav>
                                <ul id="nav_menu">
                                    <li 
                                    <?php
                                    if(!isset($_GET['view'])){
                                        echo "class='active'";
                                    }?>>
                                        <a href="../auditrsia"><i class="ti-home"></i><span>Beranda</span></a>
                                    </li>
                                    <li
                                    <?php
                                    $jabatan=$_SESSION['user']['pegawai_jabatan'];
                                    if(
                                    isset($_GET['view'])&&audit_act($_GET['view'])==1){
                                        echo "class='active'";
                                    }?>>
                                        <a href="javascript:void(0)"><i class="ti-check-box"></i><span>Audit</span></a>
                                        <ul class="submenu">
                                            <?php
                                            if($jabatan==0||$jabatan==1){?>
                                                <li
                                                <?php
                                                if(isset($_GET['view'])&&$_GET['view']=='audit_c'){
                                                echo "class='active'";
                                                }?>>
                                                <a href="?view=audit_c">Buat Audit </a></li>
                                            <?php }?>
                                            <?php
                                            if($jabatan==2){?>
                                                <li
                                                <?php
                                                if(isset($_GET['view'])&&$_GET['view']=='audit_f'){
                                                echo "class='active'";
                                                }?>>
                                                <a href="?view=audit_f">isi audit</a></li>
                                            <?php }?>
                                            <li
                                            <?php
                                            if(isset($_GET['view'])&&$_GET['view']=='audit_r'){
                                            echo "class='active'";
                                            }?>>
                                            <a href="?view=audit_r">hasil Audit</a></li>
                                        </ul>
                                    </li>
                                    <li
                                    <?php
                                    if(isset($_GET['view'])&&audit_act($_GET['view'])==2){
                                        echo "class='active'";
                                    }?>>
                                        <a href="javascript:void(0)"><i class="ti-clipboard"></i><span>Data</span></a>
                                        <ul class="submenu">
                                            <li
                                            <?php
                                            if(isset($_GET['view'])&&$_GET['view']=='alatpelindung'){
                                            echo "class='active'";
                                            }?>>
                                            <a href="?view=alatpelindung">alat pelindung</a></li>
                                            <li
                                            <?php
                                            if(isset($_GET['view'])&&$_GET['view']=='audit'){
                                            echo "class='active'";
                                            }?>><a href="?view=audit">audit</a></li>
                                            <li
                                            <?php
                                            if(isset($_GET['view'])&&$_GET['view']=='komponen'){
                                            echo "class='active'";
                                            }?>><a href="?view=komponen">komponen</a></li>
                                            <li
                                            <?php
                                            if(isset($_GET['view'])&&$_GET['view']=='pegawai'){
                                            echo "class='active'";
                                            }?>><a href="?view=pegawai">pegawai</a></li>
                                            <li
                                            <?php
                                            if(isset($_GET['view'])&&$_GET['view']=='ruang'){
                                            echo "class='active'";
                                            }?>><a href="?view=ruang">ruang</a></li>
                                            <li
                                            <?php
                                            if(isset($_GET['view'])&&$_GET['view']=='sukomponen'){
                                            echo "class='active'";
                                            }?>><a href="?view=subkomponen">sub-komponen</a></li>
                                            <li
                                            <?php
                                            if(isset($_GET['view'])&&$_GET['view']=='tiperuang'){
                                            echo "class='active'";
                                            }?>><a href="?view=tiperuang">tipe ruang</a></li>
                                            <li
                                            <?php
                                            if(isset($_GET['view'])&&$_GET['view']=='unit'){
                                            echo "class='active'";
                                            }?>><a href="?view=unit">unit</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- nav and search button -->
                    <div class="col-lg-3 clearfix">
                        <div class="search-box">
                            
                        </div>
                    </div>
                    <!-- mobile_menu -->
                    <div class="col-12 d-block d-lg-none">
                        <div id="mobile_menu"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- header area end -->
        <!-- page title area end -->
        <!-- main content area start -->

      
            <div class="container">
        <?php
        include 'control/route.php';
        ?>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p>© Copyright 2018. All right reserved. Template by <a href="https://colorlib.com/wp/">Colorlib</a>.</p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- main wrapper start -->
   
    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>

    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <!-- start amcharts -->
    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="https://www.amcharts.com/lib/3/ammap.js"></script>
    <script src="https://www.amcharts.com/lib/3/maps/js/worldLow.js"></script>
    <script src="https://www.amcharts.com/lib/3/serial.js"></script>
    <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
    <script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
    <!-- all line chart activation -->
    <script src="assets/js/line-chart.js"></script>
    <!-- all pie chart -->
    <script src="assets/js/pie-chart.js"></script>
    <!-- all bar chart -->
    <script src="assets/js/bar-chart.js"></script>
    <!-- all map chart -->
    <script src="assets/js/maps.js"></script>
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>
</html>