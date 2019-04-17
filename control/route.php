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
}
if(isset($_GET['view'])){
    $view = $_GET['view'];
    switch ($view) {
        case 'unit':
            include "view/data/unit.php";
            break;
        case 'audit_c':
            include "view/audit/create.php";
            break;
        case 'audit_f':
            include "view/audit/fill.php";
            break;
        case 'audit_r':
            include "view/audit/result.php";
            break;
        case 'ruang':
            include "view/data/ruangan.php";
            break;
        case 'tiperuang':
            include "view/data/tiperuang.php";
            break;
        case 'alatpelindung':
            include "view/data/alatpelindung.php";
            break;
        case 'audit':
            include "view/data/audit.php";
            break;
        case 'komponen':
            include "view/data/komponen.php";
            break;
        case 'pegawai':
            include "view/data/pegawai.php";
            break;
        case 'subkomponen':
            include "view/data/subkomponen.php";
            break;
        case 'profile':
            include "view/user/profile.php";
            break;
        case 'pwdchg':
            include "view/user/pwdchg.php";
            break;
        default:
            include "view/404.php";
            break;
    }}
?>