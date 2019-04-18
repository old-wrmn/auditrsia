<?php
include ('../../../control/main.php'); 
$record=pg_fetch_array(get_record(null,$_GET['id']));?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Hasil <?=$record['audit_nama']?></title>
    <script>
    window.print();
    </script>
    <style>
    table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
    text-align: center;
    <?php if($_GET['tipe']==2){?>
    font-size:10px;   
    <?php }?>
    
    }
    .row {
    display: flex;
    }
    .col {
    flex: 50%;
    text-align:center;
    }
    </style>
</head>
<body>
<center>
    <?=ucwords($record['audit_nama'])?>
</center>

<br>
Bulan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?=$record['record_month']?>
<?php if($_GET['tipe']!=3){?>
        <br>
        Ruangan : <?=ucwords($record['ruang_nama'])?>
        <?php }

$tipe = $_GET['tipe'];
switch ($tipe) {
    case '1':
        include "tipe1.php";
        break;
    case '2':
        include "tipe2.php";
        break;
    case '3':
        include "tipe3.php";
        break;
    default:  
        break;
    }
?>
</body>
</html>