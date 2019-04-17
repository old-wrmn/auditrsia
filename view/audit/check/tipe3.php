<h6><?php
    $record=pg_fetch_array(get_record(null,$_GET['id']));
    echo "Bulan &nbsp;&nbsp;: ".$record['record_month'];
    echo "<br><br>Audit &nbsp;&nbsp;&nbsp;: ".ucwords($record['audit_nama']);
    echo "<br><br> ID &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: ".$record['audit_id'];
?></h6><br>
<table class="table text-center">
    <thead class="text-uppercase bg-primary">
        <tr class="text-white">
            <th scope="col">#</th>
            <th scope="col">id</th>
            <th scope="col">Kegiatan</th>
            <th scope="col" style="width:2%">hasil</th>
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
            <td><?=ucfirst($komponenan['komponen_id'])?></td>
            <td><?=ucfirst($komponenan['komponen_nama'])?></td>
        </tr>
        <?php
        $querysubk=get_subkomponen($record['audit_id'],$komponenan['komponen_id']);
        while ($subkomponenan=pg_fetch_array($querysubk)) {
        ?>
        <tr>
            <td></td>
            <td><?=$subkomponenan['subkomponen_id']?></td>
            <td><?=ucfirst($subkomponenan['subkomponen_nama'])?></td>
            <td>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="<?=$subkomponenan['subkomponen_id']?>" name="<?=$record['record_month'].$subkomponenan['subkomponen_id']?>">
                <label class="custom-control-label" for="<?=$subkomponenan['subkomponen_id']?>"></label>
            </div>
            </td>
        </tr>
        <?php }$c++;} ?>
    </tbody>
</table>
<button type="submit" name="checkaudit3" class="btn btn-primary mt-4 pr-4 pl-4" style="float:right">Submit</button>
</form>