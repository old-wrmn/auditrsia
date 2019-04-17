<?php
include 'control/main.php';

if(isLoggedIn()){
    $_SESSION['count']=0;
    include 'view/main.php';
}
else{
    $_SESSION['count']=0;
    include 'view/login.php';
    if($_SESSION['count']!=0){
        header('location:?msg=fail');
    }
    $_SESSION['count']++;
}
?>