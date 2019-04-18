
<table width="100%">
    <tr>
        <td colspan="2">Tanggal</td>
        <?php
        $count=1;
        $long=count_ar($_GET['id']);
        while($count<=$long){
            $date=record_time($count,$_GET['id']);
            $datean=pg_fetch_array($date);
            $time=strtotime($datean['tgl'])?>
            <td colspan="2"><?=date('d-m-Y H:i:s',$time)?></td>
        <?php $count++;
        }?>
        <td colspan="3">Hasil</td>
        <td rowspan="3">Keterangan</td>
    </tr>
    <tr>
        <td rowspan="2">No</td>
        <td rowspan="2">Komponen</td>
    <?php
    $cunt=1;
    while($cunt<$count){?>
        <td colspan="2"><?=$cunt?></td>
    <?php $cunt++;}?>
        <td colspan="2">Jumlah</td>
        <td>%</td>
    </tr>
    <?php
    $cunt=1;
    while($cunt<$count){?>
        <td>ya</td>
        <td>tidak</td>
    <?php $cunt++;}?>
        <td>ya</td>
        <td>tidak</td>
        <td>ya</td>
<?php
$kira=1;
$total_y=0;
$total_t=0;
$komponen=get_komponen($record['audit_id']); 
while($komponenan=pg_fetch_array($komponen)){
    $cunt=1;?>
    <tr>
        <td><?=$kira?></td>
        <td><?=ucwords($komponenan['komponen_nama'])?></td>
        <?php
        $y=0;
        $t=0;
        while($cunt<$count){
            $res=get_tipe1_R($cunt,$record['record_id'],$komponenan['komponen_id']);
            ?>
            <td><?php if($res=='t'){echo 'v';$y++;}?></td>
            <td><?php if($res=='f'){echo 'v';$t++;}?></td>
        <?php $cunt++;}?> 
        <td><?=$y?></td>
        <td><?=$t?></td>
        <td><?php
        $total_y+=$y;
        $total_t+=$t; 
        $r=$y/($y+$t)*100;
        echo number_format($r, 2, '.', '')?></td>
        <td></td>
    </tr>
<?php $kira++;}?>
<tr>
    <td colspan="<?=($count*2)?>">Hasil Audit</td>
    <td><?=$total_y?></td>
    <td><?=$total_t?></td>
    <td><?php 
        $total_r=$total_y/($total_y+$total_t)*100;
        echo number_format($total_r, 2, '.', '')?></td>  
</tr>
</table>
Keterangan :<br>
Menyatakan dengan sesungguhnya bahwa temuan/hasil survei sesuai dengan keadaan yang sebenarnya, tanpda rekayasa atau tekanan dari pihak manapun
<br>
<br>
<div class="row">
    <div class="col">
        KEPALA RUANGAN
    </div>
    <div class="col">
        IPCN/Surveyor
    </div>
</div>
<br><br><br>
<div class="row">
    <div class="col">
            __________________
    </div>
    <div class="col">
            <u><?=ucwords(namaorg($record['pegawai_nomor'], "nama"))?><br></u>
            <?=$record['pegawai_nomor']?>
    </div>
</div>
