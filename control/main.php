<?php
include 'function.php';

//buat login
if(isset($_POST['login'])){
    $nmr=$_POST['pegawai_nomor'];
    $pwd=md5($_POST['pegawai_password']);
    $login=login($nmr,$pwd);
    if(pg_num_rows($login)==1){
        $_SESSION['user']=pg_fetch_array($login);
        header('location:..');
	}
    else{
        header('location:../?msg=fail');
    }
}

//buat ganti password
if (isset($_POST['simpan_pwd'])) {
    $l  = md5($_POST['passwordLama']);
    $b  = md5($_POST['passwordBaru']);
    $b2 = md5($_POST['passwordBaru2']);
    if($l==$_SESSION['user']['pegawai_password']){
        if($b==$b2){
            $query = "UPDATE pegawai set pegawai_password='$b' where pegawai_password='$l' and pegawai_nomor=".$_SESSION['user']['pegawai_nomor'];
            pg_query ($query);
            $_SESSION['user']=pg_fetch_array(login($_SESSION['user']['pegawai_nomor'],$b));
            header('location:..?view=profile&&msg=ok');
        }
        else{
            header('location:../?view=pwdchg&&msg=fail');
        }
    }
    else{
        header('location:../?view=pwdchg&&msg=fail');
    }
}

//logout
if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['user']);
}

//add record
if(isset($_POST['record_c'])){
        $ruang=null;
        if(isset($_POST['ruang'])){
            $ruang = $_POST['ruang'];
        }
        // echo $ruang;
        $bulan=$_POST['bulan'];
        $pegawai=$_POST['pegawai'];
        $audit=$_POST['audit'];
        if(new_record($ruang,$bulan,$pegawai,$audit)){
            new_hasil($ruang,$bulan,$audit);
            header('location:../');
        }
        else {
            header('location:'.$_POST['url'].'&msg=fail');
        }
}

if(isset($_POST['checkaudit1'])){
    $id=$_GET['record_id'];
    $c=count_ar($id)+1;
    new_update($c,$id);
    $rec=get_tipe1($id);
    while($record=pg_fetch_array($rec)){
        $res=$record['hasiltipe1_id'];
        if(isset($_POST[$res])){
            $r='true'; 
        }
        else{
            $r='false';
        }
        result1($res,$r,$c);
    }
    header('location:../?view=audit_f&msg=done');
}

if(isset($_POST['checkaudit2'])){
    $id=$_GET['record_id'];
    $c=count_ar($id)+1;
    new_update($c,$id);
    $rec=get_tipe2($_GET['record_id']);
    while($record=pg_fetch_array($rec)){
        $res=$record['hasiltipe2_id'];
        if(isset($_POST[$res])){
            $r='true'; 
        }
        else{
            $r='false';
        }
        result2($res,$r,$c);
    }
    header('location:../?view=audit_f&msg=done');
}

if(isset($_POST['checkaudit3'])){
    $id=$_GET['record_id'];
    $c=count_ar($id)+1;
    new_update($c,$id);
    $rec=get_tipe3($_GET['record_id']);
    while($record=pg_fetch_array($rec)){
        $res=$record['hasiltipe3_id'];
        if(isset($_POST[$res])){
            $r='true'; 
        }
        else{
            $r='false';
        }
        result3($res,$r,$c);
    }
    header('location:../?view=audit_f&msg=done');
}
?>