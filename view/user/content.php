<div class="tab-content" id="v-pills-tabContent">

<!-- buat profile -->
    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
    <div class="row">
        <div class="col-lg-3">
            <h5>Nama Pegawai</h5>
        </div>
        <div class="col-lg-9">
            <div class="grid-col"><?=ucwords($_SESSION['user']['pegawai_nama']);?></div>
        </div>
        <div class="col-lg-3"> 
            <h5>Nomor Pegawai</h5>
        </div>
        <div class="col-lg-9">
            <div class="grid-col"><?=$_SESSION['user']['pegawai_nomor'];?></div>
        </div>
        <div class="col-lg-3">
            <h5>Jabatan</h5>
        </div>
        <div class="col-lg-9">
           <div class="grid-col"><?php echo jabatan($_SESSION['user']['pegawai_jabatan']);?></div>
        </div>

        <div class="col-lg-3">
        <h5>Password</h5>
        </div>    
        <div class="col-lg-8">
            <div class="grid-col"><?php echo password();?></div>
        </div>
        <div class="col-lg-1" style="float: right;">
        <a href="?view=pwdchg" class="btn btn-primary mb-12">Ubah</a>
        </div>
    </div>
    </div>
   
<!-- buat penangung jawab -->
    <div class="tab-pane fade show active" id="v-pills-pj" role="tabpanel" aria-labelledby="v-pills-pj-tab">
    <div class="card-area">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h3>Tugas</h3><br>
                        <p>Memeriksa hasil audit dari surveyor yang telah diisi.</p><br>
                        <p>Notifikasi akan masuk dalam message, dan jika memiliki audit yang harus diperiksa.</p><br>
                        <p>Hasil diperiksa dengan sungguh-sungguh dan tanpa rekayasa.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h3>Ruangan</h3><br>
                        <div class="single-table">
                            <div class="table-responsive">
                                <table class="table text-center">
                                    <thead class="text-uppercase bg-primary">
                                        <tr class="text-white">
                                            <th scope="col">#</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">tipe</th>
                                            <th scope="col">kelas</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php 
$c=1;
$query=get_ruang($_SESSION['user']['pegawai_nomor'],null);
while ($ruangan=pg_fetch_array($query)) {?>
                                        <tr>
                                            <th><?=$c?></th>
                                            <td><?=ucwords($ruangan['ruang_nama'])?></td>
                                            <td><?=ucwords($ruangan['tiperuang_nama'])?></td>
                                            <td><?=ucwords($ruangan['tiperuang_kelas'])?></td>
                                        </tr>
<?php $c++;} ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>                       
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h3>Unit</h3>
                        <br>
                        <div class="single-table">
                            <div class="table-responsive">
                            <table class="table text-center">
                                    <thead class="text-uppercase bg-primary">
                                        <tr class="text-white">
                                            <th scope="col">#</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Act</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php 
$d=1;
$query=get_unit($_SESSION['user']['pegawai_nomor'],null);
while ($unitan=pg_fetch_array($query)) {
?>
                                        <tr>
                                            <th><?=$c?></th>
                                            <td><?=ucwords($unitan['unit_nama'])?></td>
                                            <td><a href="main?view=unit&&id=<?=$unitan['unit_id']?>"><i class="ti-eye"></i></a></td>
                                        </tr>
<?php $d++;} ?>
                                    </tbody>
                                </table>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    </div>

</div>