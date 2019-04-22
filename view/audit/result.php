<div class="row">
    <!-- table primary start -->
    <div class="col-lg-12 mt-5">
        <div class="card">
            <div class="card-body">
                <h4>Audit RSIA Mutiara Bunda Padang</h4><br>
                
<table class="table text-center">
    <thead class="text-uppercase bg-primary">
        <tr class="text-white">
            <th scope="col">#</th>
            <th scope="col">Bulan</th>
            <th scope="col">Audit</th>
            <th scope="col">Ruang</th>
            <th scope="col" style="width:2%">Report</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $c=1;
        $query=get_record();
        if($_SESSION['user']['pegawai_jabatan']==4){
            $query=get_record();    
        }
        while ($recordan=pg_fetch_array($query)) {
        ?>
        <tr>
            <td><?=$c?></td>
            <td><?=ucfirst($recordan['record_month'])?></td>
            <td><?=ucfirst($recordan['audit_nama'])?></td>
            <td><?=ucfirst($recordan['ruang_nama'])?></td>
            <td>
            <a href="view/audit/result?view=audit_ck&id=<?=$recordan['record_id']?>&tipe=<?=$recordan['audit_tipe']?>"><i class="ti-clipboard"></i></a>
            </td>
        </tr>
    
<?php $c++;} ?>
    </tbody>
</table>
            </div>       
        </div>
    </div>
</div>