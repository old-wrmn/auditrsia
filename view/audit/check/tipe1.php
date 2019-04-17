<h6><?php
    $record=pg_fetch_array(get_record(null,$_GET['id']));
    echo "Bulan &nbsp;&nbsp;: ".$record['record_month'];
    echo "<br><br>Audit &nbsp;&nbsp;&nbsp;: ".ucfirst($record['audit_nama']);
    echo "<br><br> ID &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: ".$record['audit_id'];
    echo "<br><br> Ruang : ".ucfirst($record['ruang_nama']); 
?></h6><br>
<table class="table text-center">
    <thead class="text-uppercase bg-primary">
        <tr class="text-white">
            <th scope="col">#</th>
            <th scope="col">id</th>
            <th scope="col">komponen</th>
            <th scope="col" style="width:2%">hasil</th>
        </tr>
    </thead>
    <tbody>
    <form action="control/main.php?record_id=<?=$_GET['id']?>" method="post">
<?php 
$c=1;
    $query=get_komponen($record['audit_id']);
    while ($komponenan=pg_fetch_array($query)) {
?>
        <tr>
            <th><?=$c?></th>
            <td><?=ucfirst($komponenan['komponen_id'])?></td>
            <td><?=ucfirst($komponenan['komponen_nama'])?></td>
            <td>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="<?=$komponenan['komponen_id']?>" name="<?=$record['record_month'].$record['ruang_nama'].$komponenan['komponen_id']?>">
                <label class="custom-control-label" for="<?=$komponenan['komponen_id']?>"></label>
            </div>
            </td>
        </tr>
<?php $c++;} ?>
    </tbody>
</table>
<button type="submit" name="checkaudit1" class="btn btn-primary mt-4 pr-4 pl-4" style="float:right">Submit</button>
</form>