<div class="row">
    <div class="col-lg-12 mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Buat Audit RSIA Mutiara Bunda Padang</h4>
                <form action="<?=get_url()?>" method="get">
                <div class="form-group">
                    <input class="form-control" type="text" value="audit_n" id="example-month-input" name="view" hidden>
                </div>
                <div class="form-group">
                      <label class="col-form-label">Audit</label>
                    <select class="custom-select" name="audit">
                    <option selected="selected">Pilih Audit...</option>
                <?php 
                    $query=get_audit();
                    while ($pegawaian=pg_fetch_array($query)) {
                ?>
            <option value="<?=$pegawaian['audit_id']?>"><?=ucwords($pegawaian['audit_nama'])?></option>
        <?php }?>
        </select>
    </div>
              <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>    