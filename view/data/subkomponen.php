
<div class="row">
    <!-- table primary start -->
    <div class="col-lg-12 mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Sub-Komponen</h4>
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
                                <th scope="col">sub-Komponen</th>
                                <th scope="col">komponen</th>
                            </tr>
                        </thead>
                        <tbody>
                    <?php 
                    $c=1;
                    if(isset($_GET['audit'])){
                        $query=get_subkomponen($_GET['audit'],null);
                        if(isset($_GET['komponen'])){
                            $query=get_subkomponen($_GET['audit'], $_GET['komponen']);
                        }
                    }
                    else{
                        $query=get_subkomponen();
                    }
                    while ($subkomponenan=pg_fetch_array($query)) {
                    ?>
                            <tr>
                                <td><?=$c?></td>
                                <td><?=$subkomponenan['subkomponen_id']?></td>
                                <td><?=ucfirst($subkomponenan['subkomponen_nama'])?></td>
                                <td><?=ucfirst($subkomponenan['komponen_nama'])?>
                                <br>(<?=$subkomponenan['komponen_id']?>)</td>
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