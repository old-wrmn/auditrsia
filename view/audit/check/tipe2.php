<h6><?php
$record=pg_fetch_array(get_record(null,$_GET['id']));
echo "Bulan &nbsp;&nbsp;: ".$record['record_month'];
echo "<br><br>Audit &nbsp;&nbsp;&nbsp;: ".ucwords($record['audit_nama']);
echo "<br><br> ID &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: ".$record['audit_id'];
echo "<br><br> Ruang : ".ucfirst($record['ruang_nama']); 
?></h6><br>
<table class="table text-center">
    <thead class="text-uppercase bg-primary">
        <tr class="text-white">
            <th scope="col">#</th>
            <th scope="col">id</th>
            <th scope="col">Kegiatan</th>
            <?php
            $n=1;
            $query=get_alatpelindung(null,$record['audit_id']);
            while ($alpelan=pg_fetch_array($query)) {?>
            <th scope="col" style="width:5%"><?=$alpelan['alatpelindung_nama']?></th>
            <?php 
            $alpels[$n]=$alpelan['alatpelindung_id'];
            $n+=1;
            } 
            $cb=count($alpels);?>
        </tr>
    </thead>
    <tbody>
    <form action="control/main.php?record_id=<?=$_GET['id']?>" method="post">       
<?php 
$c=1;
$queryk=get_komponen($record['audit_id']);
while ($komponenan=pg_fetch_array($queryk)) {
?>
    <tr bgcolor="yellow">
            <th><?=$c?></th>
            <td><?=$komponenan['komponen_id']?></td>
            <td><?=ucwords($komponenan['komponen_nama'])?></td>
        </tr>
        <?php
        $querysubk=get_subkomponen($record['audit_id'],$komponenan['komponen_id']);
        while ($subkomponenan=pg_fetch_array($querysubk)) {
        ?>
        <tr>
            <td></td>
            <td><?=$subkomponenan['subkomponen_id']?></td>
            <td><?=ucwords($subkomponenan['subkomponen_nama'])?></td>
            <?php
            $f=1;
            while($f<=$cb){
            ?>
            <td>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="<?=$subkomponenan['subkomponen_id'].$alpels[$f]?>" name="<?=$record['record_month'].$record['ruang_nama'].$subkomponenan['subkomponen_id'].$alpels[$f]?>">
                <label class="custom-control-label" for="<?=$subkomponenan['subkomponen_id'].$alpels[$f]?>"></label>
            </div>
            </td>
            <?php
            $f++;
            }
            ?>
            
        </tr>
        <?php }$c++;} ?>
    </tbody>
</table>
<button type="submit" name="checkaudit2" class="btn btn-primary mt-4 pr-4 pl-4" style="float:right">Submit</button>
</form>