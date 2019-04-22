
<div class="row">
    <!-- table primary start -->
    <div class="col-lg-12 mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Unit</h4>
                <br>
                <div class="single-table">
                    <div class="table-responsive">
                    <table class="table text-center">
                        <thead class="text-uppercase bg-primary">
                            <tr class="text-white">
                                <th scope="col">#</th>
                                <th scope="col">ID</th>
                                <th scope="col">Nama</th>
                                <th scope="col">penanggung jawab</th>
                                <th scope="col">alat pelindung</th>
                                <?php 
                                if(perm_audit()){?>
                                    <th scope="col">Edit</th>    
                                
                            <?php }?>
                            </tr>
                        </thead>
                        <tbody>
                    <?php 
                    $c=1;
                    $query=get_unit();
                    if(isset($_GET['pegawai'])){
                        $query=get_unit($_GET['pegawai']);
                    }
                    while ($unitan=pg_fetch_array($query)) {
                    ?>
                            <tr>
                                <td><?=$c?></td>
                                <td><?=$unitan['unit_id']?></td>
                                <td><?=ucwords($unitan['unit_nama'])?></td>
                                <td><?=ucwords($unitan['pegawai_nama'])?><br>(<?=$unitan['pegawai_nomor']?>)</td>
                        <td><?php 
                        if(pg_num_rows(get_alatpelindung($unitan['unit_id']))>0){?>
                            <a href="?view=alatpelindung&&unit=<?=$unitan['unit_id']?>">
                            <i class="ti-eye"></i></a>
                        <?php }?></td>
                        <td><?php 
                        if(perm_audit()){?>
                            <a href="?view=unit_pj&&unit=<?=$unitan['unit_id']?>">
                            <i class="ti-pencil"></i></a>
                        <?php }?></td>
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