<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login - Audit RSIA Mutiara Bunda</title>
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

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- login area start -->
    <div class="login-area">
        <div class="container">
            <?php
            if(isset($_GET['msg'])){
                switch($_GET['msg']){
                    case 'fail':
                        include "view/msg/fail.php";
                        break;
                    case 'ok':
                        include "view/msg/ok.php";
                        break;
                }
            }?>
            <div class="login-box ptb--100">
                <form action="control/main" method="post">
                    <div class="login-form-head">
                        <h4>Sistem Informasi Audit</h4>
                        <p>Rumah Sakit Ibu dan Anak Mutiara Bunda Padang</p>
                    </div>
                    <div class="login-form-body">
                        <div class="form-gp">
                            <label for="pegawai_nomor">Nomor Pegawai</label>
                            <input type="text" id="pegawai_nomor" name="pegawai_nomor" required pattern="[0-9]{1,20}" title="Harap isi dengan nomor pegawai dengan format yang benar">
                            <i class="ti-user"></i>
                        </div>
                        <div class="form-gp">
                            <label for="pegawai_password">Password</label>
                            <input type="password" id="pegawai_password" name="pegawai_password" title="Isikan password anda"required>
                            <i class="ti-lock"></i>
                        </div>
                        <!-- <p><label for="setcookie"><input type="checkbox" name="setcookie" value="true" id="setcookie" /> Remember Me</label></p> -->
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit" name="login">Masuk <i class="ti-arrow-right"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- login area end -->

    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>
    
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>