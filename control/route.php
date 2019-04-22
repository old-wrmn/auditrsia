<?php
if(isset($_GET['msg'])){
    switch($_GET['msg']){
        case 'fail':
            include "view/msg/fail.php";
            break;
        case 'ok':
            include "view/msg/ok.php";
            break;
        case 'done':
            include "view/msg/done.php";
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
            if(perm_audit()){
                include "view/audit/create.php";}
            else{
                include "view/404.php";
            }
            break;
        case 'audit_f':
            include "view/audit/fill.php";
            break;
        case 'audit_r':
                include "view/audit/result.php";
            break;
        case 'audit_n':
            if(perm_audit()){
                include "view/audit/nextstep.php";}
            else{
                include "view/404.php";
            }
            break;
        case 'audit_ck':
            include "view/audit/check.php";
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
        case 'usermk':
            include "view/user/make.php";
            break;
        case 'userdel':
            include "view/user/delete.php";
            break;
        case 'surveyormk':
            include "view/user/surveyor_m.php";
            break;
        case 'surveyordel':
            include "view/user/surveyor_r.php";
            break;
        case 'unit_pj':
            include "view/user/unit_pj.php";
            break;
        case 'tipe_pj':
            include "view/user/tipe_pj.php";
            break;
        default:
            include "view/404.php";
            break;
    }}
else{
    include "view/audit/result.php";
}
?>