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
$ruang="SELECT 
    ruang.ruang_nama as nama, ruang.tiperuang_nama as tipe, tiperuang.tiperuang_kelas as kelas 
from 
    ruang 
inner join 
    tiperuang 
on 
    tiperuang.tiperuang_nama=ruang.tiperuang_nama  
where 
    tiperuang.pegawai_nomor=".$_SESSION['user']['pegawai_nomor'];
    $ruang_R = pg_query($ruang);
    while ($ruangan=pg_fetch_array($ruang_R)) {
?>
                                        <tr>
                                            <th><?=$c?></th>
                                            <td><?=ucwords($ruangan['nama'])?></td>
                                            <td><?=ucwords($ruangan['tipe'])?></td>
                                            <td><?=ucwords($ruangan['kelas'])?></td>
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
$unit="select * from unit where pegawai_nomor=".$_SESSION['user']['pegawai_nomor'];
// echo $unit;
    $unit_R = pg_query($unit);
    while ($unitan=pg_fetch_array($unit_R)) {
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
<!-- buat notifikasi -->
    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugiat blanditiis eaque ab qui accusamus laudantium perspiciatis sint quibusdam at eius consequatur quos possimus aspernatur debitis deleniti sed odit provident repudiandae suscipit officiis, tempora voluptas, excepturi perferendis. Quasi delectus tempora temporibus ipsa soluta mollitia, doloremque corrupti labore, quae voluptatem obcaecati consequuntur ad ipsum fugit impedit cum. Facere, ea? Eveniet quisquam ratione voluptate rerum tempora, consectetur assumenda. Porro temporibus suscipit corporis nulla?</p>
    <br><br><br><br><br><br>.
    </div>
</div>