<div class="row">
    <div class="col-lg-12 mt-5">
        <div class="card">
            <div class="card-body">
                <h4>Isi Audit RSIA Mutiara Bunda Padang</h4><br>
<?php 
if(isset($_GET['tipe'])){
    $tipe = $_GET['tipe'];
    switch ($tipe) {
        case '1':
            include "view/audit/check/tipe1.php";
            break;
        case '2':
            include "view/audit/check/tipe2.php";
            break;
        case '3':
            include "view/audit/check/tipe3.php";
            break;
        default:
            break;
        }
    }
?>
            </div>       
        </div>
    </div>
</div>