
<div class="row">
    <!-- table primary start -->
    <div class="col-lg-12 mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Pegawai</h4>
                <div class="single-table">
                    <div class="table-responsive">
                    <?if(perm_audit()){?>
                        <div class="row">
                            <div class="col">
                                <a href="?view=usermk" class="btn btn-primary mb-3"><i class="ti-plus"></i>&nbsp;Tambah Data Pegawai</a><br>
                                <a href="?view=userdel" class="btn btn-danger mb-3"><i class="ti-minus"></i>&nbsp;Hapus Data Pegawai</a>
                            </div>
                            <div class="col">
                                <div style="float:right;">
                                <a href="?view=surveyormk" class="btn btn-primary mb-3"><i class="ti-plus"></i>&nbsp;Tambah surveyor</a><br>
                                <a href="?view=surveyordel" class="btn btn-danger mb-3"><i class="ti-minus"></i>&nbsp;Hapus surveyor</a>  
                                </div>
                            </div>
                        </div>
                    <?php }?>
                    <table class="table text-center">
                        <thead class="text-uppercase bg-primary">
                            <tr class="text-white">
                                <th scope="col">#</th>
                                <th scope="col">jabatan</th>
                                <th scope="col">nomor pegawai</th>
                                <th scope="col">Nama</th>
                                <th scope="col">unit</th>
                                <th scope="col">ruangan</th>
                            </tr>
                        </thead>
                        <tbody>
                    <?php 
                    $c=1;
                    $query=get_pegawai();
                    while ($pegawaian=pg_fetch_array($query)) {
                        $jabatan=jabatan($pegawaian['pegawai_jabatan']);
                    ?>
                            <tr>
                                <td><?=$c?></th>
                                <td><?=ucfirst($jabatan)?></td>
                                <td><?=$pegawaian['pegawai_nomor']?></td>
                                <td><?=ucwords($pegawaian['pegawai_nama'])?></td>
                                <td><?php if(pg_num_rows(get_unit($pegawaian['pegawai_nomor'],null))){ 
                                    ?><a href="?view=unit&&pegawai=<?=$pegawaian['pegawai_nomor']?>">
                                    <i class="ti-panel"></i></a><?php }?></td>
                                <td><?php if(pg_num_rows(get_ruang($pegawaian['pegawai_nomor'],null))){ 
                                    ?><a href="?view=ruang&&pegawai=<?=$pegawaian['pegawai_nomor']?>">
                                    <i class="ti-package"></i></a><?php }?></td>
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