
<div class="row">
    <!-- table primary start -->
    <div class="col-lg-12 mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Ruangan</h4>
                <h6><?php
                if(isset($_GET['pegawai'])){
                    echo "PJ : ".ucwords(namaorg($_GET['pegawai'],"nama"));
                    echo "(".namaorg($_GET['pegawai'],"nomor").")";
                }?></h6>
                <div class="single-table mt-3">
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
                    if(isset($_GET['pegawai'])){
                        $query=get_ruang($_GET['pegawai'],null);
                    }
                    else if(isset($_GET['tipe'])){
                        $query=get_ruang(null,$_GET['tipe']);
                    }
                    else{
                        $query=get_ruang();
                    }
                    while ($ruangan=pg_fetch_array($query)) {
                    ?>
                            <tr>
                                <td><?=$c?></td>
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
</div>