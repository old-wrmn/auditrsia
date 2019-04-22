
<div class="row">
    <!-- table primary start -->
    <div class="col-lg-12 mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Tipe Ruangan</h4>
                <div class="single-table">
                    <div class="table-responsive">
                    <table class="table text-center">
                        <thead class="text-uppercase bg-primary">
                            <tr class="text-white">
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">penanggung jawab</th>
                                <th scope="col">Ruangan</th>
                                <?php 
                                if(perm_audit()){?>
                                <th scope="col">Ubah PJ</th>
                                <?php }?>
                            </tr>
                        </thead>
                        <tbody>
                    <?php 
                    $c=1;
                    $query=get_tipe();
                    while ($tipean=pg_fetch_array($query)) {
                    ?>
                            <tr>
                                <td><?=$c?></td>
                                <td><?=ucwords($tipean['tiperuang_nama'])?></td>
                                <td><?=ucwords($tipean['tiperuang_kelas'])?></td>
                                <td><?=ucfirst($tipean['pegawai_nama'])?><br>(<?=$tipean['pegawai_nomor']?>)</td>
                                <td><a href="?view=ruang&&tipe=<?=$tipean['tiperuang_nama']?>"><i class="ti-package"></i></a></td>
                                <td><?php 
                                if(perm_audit()){?>
                                    <a href="?view=tipe_pj&&tipe=<?=$tipean['tiperuang_nama']?>">
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