
<div class="row">
    <!-- table primary start -->
    <div class="col-lg-12 mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Komponen</h4>
                <h6><?php
                if(isset($_GET['audit'])){
                    echo "Audit &nbsp;: ".ucwords(namaaud($_GET['audit'],"nama"));
                    echo "<br> ID &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: ".namaaud($_GET['audit'],"id");
                }?></h6><br>
                <div class="single-table">
                    <div class="table-responsive">
                    <table class="table text-center">
                        <thead class="text-uppercase bg-primary">
                            <tr class="text-white">
                                <th scope="col">#</th>
                                <th scope="col">id</th>
                                <th scope="col">komponen</th>
                                <th scope="col">audit</th>
                                <th scope="col">sub-komponen</th>
                            </tr>
                        </thead>
                        <tbody>
                    <?php 
                    $c=1;
                    if(isset($_GET['audit'])){
                        $query=get_komponen($_GET['audit']);
                    }
                    else{
                        $query=get_komponen();
                    }
                    while ($komponenan=pg_fetch_array($query)){
                    ?>
                            <tr>
                                <td><?=$c?></td>
                                <td><?=$komponenan['komponen_id']?></td>
                                <td><?=ucfirst($komponenan['komponen_nama'])?></td>
                                <td><?=ucfirst($komponenan['audit_nama'])?><br>(<?=$komponenan['audit_id']?>)</td>
                                <td><?php if(pg_num_rows(get_subkomponen(null,$komponenan['komponen_id']))){?><a href="?view=subkomponen&&audit=<?=$komponenan['audit_id']?>&&komponen=<?=$komponenan['komponen_id']?>"><i class="ti-eye"></i></a><?php }?></td>
                            </tr>
                    <?php $c++;} ?>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>