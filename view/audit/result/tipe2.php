<table style="height:100%; width:100%;">
<tr>
<td colspan="2"></td><?php
$long=count_ar($_GET['id']);
$alpel=get_dist_alatpelindung($_GET['id']);
$s=1;
while($alpelan=pg_fetch_array($alpel)){
?>
    <td colspan="<?=$long*2+3?>"><?=ucwords($alpelan['alatpelindung_nama'])?></td>
<?php 
$x[$s]=$alpelan['alatpelindung_id'];
$unit=$alpelan['unit_id'];
$s++;}
// echo $unit;
?>

</tr>
    <tr>
        <td colspan="2">Tanggal</td>
        <?php
        $tot=pg_num_rows($alpel);
        $het=1;
        while($het<=$tot){
            $count=1;
        while($count<=$long){
            $date=record_time($count,$_GET['id']);
            $datean=pg_fetch_array($date);
            $time=strtotime($datean['tgl'])?>
            <td colspan="2"><?=date('d-m-Y H:i:s',$time)?></td>
        <?php $count++;
        }?>
        <td colspan="3">Hasil</td>
        <?php $het++;}?>
    </tr>
    <tr>
        <td rowspan="2">No</td>
        <td rowspan="2">Kegiatan</td>
    <?php
    $het=1;
    while($het<=$tot){
    $cunt=1;
    while($cunt<$count){?>
        <td colspan="2"><?=$cunt?></td>
    <?php $cunt++;}?>
        <td colspan="2">Jumlah</td>
        <td>%</td>
    <?php $het++;}?>
    </tr>
    <?php
    $het=1;
    while($het<=$tot){
        $total_y[$het]=0;
        $total_t[$het]=0;
        $cunt=1;
    while($cunt<$count){?>
        <td>ya</td>
        <td>tidak</td>
    <?php $cunt++;}?>
        <td>ya</td>
        <td>tidak</td>
        <td>ya</td>
<?php
$het++;}
$kira=1;
$komponen=get_komponen($record['audit_id']); 
while($komponenan=pg_fetch_array($komponen)){?>
    <tr>
        <td><?=$kira?></td>
        <td colspan="<?=($count*2*$tot)+3+$tot?>" style="text-align:left"><?=ucwords($komponenan['komponen_nama'])?></td>
    </tr>
<?php
$subkomponen=get_subkomponen(null, $komponenan['komponen_id']);
while($subkomponenan=pg_fetch_array($subkomponen)){?>
    <tr>
        <td></td>
        <td><?=ucwords($subkomponenan['subkomponen_nama'])?></td>
        <?php
        $het=1;
        while($het<=$tot){
        $cunt=1;
        $y[$het]=0;
        $t[$het]=0;
        while($cunt<$count){
            $res=get_tipe2_R($cunt,$record['record_id'],$subkomponenan['subkomponen_id'],$x[$het]);
            ?>
            <td><?php if($res=='t'){echo 'v';$y[$het]++;}?></td>
            <td><?php if($res=='f'){echo 'v';$t[$het]++;}?></td>
        <?php $cunt++;}?> 
        <td><?=$y[$het]?></td>
        <td><?=$t[$het]?></td>
        <td><?php
        $total_y[$het]=$total_y[$het]+$y[$het];
        $total_t[$het]=$total_t[$het]+$t[$het]; 
        $r[$het]=$y[$het]/($y[$het]+$t[$het])*100;
        echo number_format($r[$het], 2, '.', '');?></td>
    
<?php $het++;}}$kira++;}?>
</tr>
<tr>
    <td colspan="2"></td>
    <?php
    $het=1;
    while($het<=$tot){?>
    <td colspan="<?=($count*2-2)?>">Hasil Audit</td>
    <td><?=$total_y[$het]?></td>
    <td><?=$total_t[$het]?></td>
    <td><?php 
        $total_r[$het]=$total_y[$het]/($total_y[$het]+$total_t[$het])*100;
        echo number_format($total_r[$het], 2, '.', '')?></td>
        <?php $het++;}?>
</tr>
</table>
Keterangan :<br>
Menyatakan dengan sesungguhnya bahwa temuan/hasil survei sesuai dengan keadaan yang sebenarnya, tanpda rekayasa atau tekanan dari pihak manapun
<br>
<br>
<div class="row">
    <div class="col">
        PJ Unit/IPCLN
    </div>
    <div class="col">
        IPCN/Surveyor
    </div>
</div>
<br><br><br>
<div class="row">
<?php   
    $pj=pg_fetch_array(get_unit(null,$record['audit_id']))?>
    <div class="col">
        <u><?=ucwords($pj['pegawai_nama'])?><br></u>
        <?=$pj['pegawai_nomor']?>
    </div>
    <div class="col">
            <u><?=ucwords(namaorg($record['pegawai_nomor'], "nama"))?><br></u>
            <?=$record['pegawai_nomor']?>
    </div>
</div>
