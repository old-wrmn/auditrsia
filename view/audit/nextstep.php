<div class="row">
    <div class="col-lg-12 mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Buat Audit RSIA Mutiara Bunda Padang</h4>
                <form action="control/main.php" method="post">
                <div class="form-group">
                    <input class="form-control" type="text" value="<?=get_url()?>" name="url" hidden>
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" value="<?=$_GET['audit']?>" name="audit" hidden>
                </div>
                <div class="form-group">
                    <label for="example-month-input" class="col-form-label">Bulan</label>
                    <input class="form-control" type="month" value="<?=monthnow()?>" id="example-month-input" name="bulan">
                </div>
                <?php
                $audit=get_audit($_GET['audit']);
                $res=pg_fetch_array($audit);
                if($res['audit_tipe']!=3){?>
                <div class="form-group">
                    <label class="col-form-label">Ruangan</label>
                    <select class="custom-select" name="ruang">
                        <option selected="selected">Pilih Ruangan...</option>
<?php 
    $query = get_ruang();
    while ($ruangan=pg_fetch_array($query)) {
?>
                        <option value="<?=$ruangan['ruang_nama']?>"><?=ucwords($ruangan['ruang_nama'])?></option>
                    <?php }?>
                    </select>
                </div>
                <?php }?>
                <div class="form-group">
                    <label class="col-form-label">Surveyor</label>
                    <select class="custom-select" name="pegawai">
                        <option selected="selected">Pilih Pegawai...</option>
<?php 
    $query = get_surveyor();
    while ($pegawaian=pg_fetch_array($query)) {
?>
                        <option value="<?=$pegawaian['pegawai_nomor']?>"><?=ucwords($pegawaian['pegawai_nama'])?></option>
                    <?php }?>
                    </select>
                </div>
              <button type="submit" name="record_c" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>    