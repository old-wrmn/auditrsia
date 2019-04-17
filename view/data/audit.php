
<div class="row">
    <!-- table primary start -->
    <div class="col-lg-12 mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Audit</h4>
                <div class="single-table">
                    <div class="table-responsive">
                    <table class="table text-center">
                        <thead class="text-uppercase bg-primary">
                            <tr class="text-white">
                                <th scope="col">#</th>
                                <th scope="col">id</th>
                                <th scope="col">jenis</th>
                                <th scope="col">Nama</th>
                                <th scope="col">komponen</th>
                            </tr>
                        </thead>
                        <tbody>
                    <?php 
                    $c=1;
                    $query = get_audit();
                    while ($auditan=pg_fetch_array($query)) {
                    ?>
                            <tr>
                                <td><?=$c?></td>
                                <td><?=$auditan['audit_id']?></td>
                                <td><?=ucwords($auditan['audit_jenis'])?></td>
                                <td><?=ucwords($auditan['audit_nama'])?></td>
                                <td><a href="?view=komponen&&audit=<?=$auditan['audit_id']?>"><i class="ti-eye"></i></a></td>
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