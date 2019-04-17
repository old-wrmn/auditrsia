 <!-- page title area end -->
 <div class="main-content-inner">
    <div class="row">
        <!-- left align tab start -->
        <div class="col-lg-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h1><?=ucwords($_SESSION['user']['pegawai_nama'])?></h1><br>
                    <h5 class="text-muted"><?=$_SESSION['user']['pegawai_nomor']?></h5>
                    <div class="d-md-flex">
                        <div class="nav flex-column nav-pills mr-4 mb-3 mb-sm-0" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</a>
                            <a class="nav-link active" id="v-pills-pj-tab" data-toggle="pill" href="#v-pills-pj" role="tab" aria-controls="v-pills-pj" aria-selected="true">PJ</a>
                            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a>
                        </div>
                        <?php
                        include 'content.php';?>
                    </div>
                </div>
            </div>
        </div>
        <!-- left align tab end -->
    </div>
</div>
        
        <!-- main content area end -->