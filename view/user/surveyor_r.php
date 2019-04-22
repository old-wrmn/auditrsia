<div class="row">
    <div class="col-lg-12 mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Buat Audit RSIA Mutiara Bunda Padang</h4>
                <form action="control/main.php" method="post">
                <div class="form-group">
                    <label class="col-form-label">Nama Pegawai</label>
                    <select class="form-control" type="select" id="nama" name="pegawai">   
                        <option value="asd">Pilih Pegawai</option>
                        <?php   
                        $user=get_pegawai(2);
                        while($useran=pg_fetch_array($user)){ ?>
                            <option value="<?=$useran['pegawai_nomor']?>"><?=ucwords($useran['pegawai_nama'])?></option> 
                        <?php }?>
                    </select>
                </div>
                  <button type="submit" name="del_surveyor" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>    