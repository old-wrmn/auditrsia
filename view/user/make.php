<div class="row">
    <div class="col-lg-12 mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Buat Audit RSIA Mutiara Bunda Padang</h4>
                <form action="control/main.php" method="post">
                <div class="form-group">
                    <label class="col-form-label">Nomor Pegawai</label>
                    <input class="form-control" type="number" id="nomor" name="nomor">
                </div>
                <div class="form-group">
                    <label class="col-form-label">Nama Pegawai</label>
                    <input class="form-control" type="text" id="nama" name="nama">
                </div>
                <div class="form-group">
                    <label class="col-form-label">Jabatan</label>
                    <select class="custom-select" name="jabatan">
                        <option selected="selected">Pilih jabatan...</option>
                        <?php
                        $j=0;
                        while($j<=5){?>
                         <option value="<?=$j?>"><?=ucwords(jabatan($j))?></option>
                        <?php $j++; }?>
                    </select>
                </div>
                  <button type="submit" name="add_user" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>    