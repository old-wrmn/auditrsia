<div class="col-12 mt-5">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">Ganti Password</h4>
            <form action='control/main.php' method='post' >
                <div class="form-group">
                    <label for="passwordLama" class="">Password Lama</label>
                    <input type="password" class="form-control" id="passwordLama" name="passwordLama" required>
                </div>
                <div class="form-group">
                    <label for="passwordBaru1" class="">Password Baru</label>
                    <input type="password" class="form-control" id="passwordBaru" name="passwordBaru" required>
                </div>
                <div class="form-group">
                    <label for="passwordBaru2" class="">Masukkan Lagi Password</label>
                    <input type="password" class="form-control" id="passwordBaru2" name="passwordBaru2" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success mb-3" name="simpan_pwd" style="float:right;">OK</button>
                </div>
            </form>
        </div>
    </div>
</div>