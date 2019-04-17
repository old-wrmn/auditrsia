
<div class="row align-items-center">
    <!-- table primary start -->
    <div class="col-lg-12 mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Alat Pelindung</h4>
                <h6><?php
                if(isset($_GET['pegawai'])){
                    echo "PJ : ".ucwords(namaorg($_GET['pegawai'],"nama"));
                    echo "(".namaorg($_GET['pegawai'],"nomor").")";
                }?></h6>
                <div class="single-table">
                    <div class="table-responsive">
                    <table class="table text-center">
                        <thead class="text-uppercase bg-primary">
                            <tr class="text-white">
                                <th scope="col">#</th>
                                <th scope="col">unit</th>
                                <th scope="col">Nama</th>
                            </tr>
                        </thead>
                        <tbody>
                    <?php 
                    if(isset($_GET['unit'])){
                        $query=get_alatpelindung($_GET['unit']);
                    }
                    else{
                        $query=get_alatpelindung();
                    }
                    while ($alatpelindungan=pg_fetch_array($query)) {
                    ?>
                            <tr>
                                <td><?=$alatpelindungan['alatpelindung_id']?></td>
                                <td><?=ucwords($alatpelindungan['unit_nama'])?></td>
                                <td><?=ucwords($alatpelindungan['alatpelindung_nama'])?></td>
                            </tr>
                    <?php } ?>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>