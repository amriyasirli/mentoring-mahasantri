<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <!-- [ breadcrumb ] start -->
                    <div class="page-header">
                        <div class="page-block">
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <div class="page-header-title">
                                        <h5 class="m-b-10">Absensi</h5>
                                    </div>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?= base_url('Welcome/') ?>"><i class="feather icon-home"></i></a></li>
                                        <li class="breadcrumb-item"><a href="javascript:">Absen</a></li>
                                    </ul>
                                </div>
                            </div>
                            <?= $this->session->flashdata('pesan') ?>
                        </div>
                    </div>
                    <!-- [ breadcrumb ] end -->
                    <div class="main-body">
                        <div class="page-wrapper">
                            <!-- [ Main Content ] start -->
                            <div class="row">
                            <div class="col-md-12 col-xl-6">
                                    <div class="card card-social">
                                        <div class="card-block border-bottom">
                                            <div class="row align-items-center justify-content-center">
                                                <div class="col-auto">
                                                    <img class="rounded-circle  m-r-10" style="width:70px;" src="<?= base_url('assets/template/') ?>assets/images/user/avatar-2.jpg" alt="activity-user">
                                                </div>
                                                <div class="col text-right">
                                                    <h3>Ikhwan</h3>
                                                    <h5 class="text-c-green mb-0"> <span class="text-muted"><?= $jml_ikhwan ?> Orang</span></h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-block">
                                            <div class="row align-items-center justify-content-center card-active">
                                                <div class="col-6">
                                                    
                                                </div>
                                                <div class="col-6 text-center">
                                                    <a class="btn btn-primary" href="<?= base_url('Absen/kelompok/'.encrypt_url($ikhwan)) ?>" role="button">Ambil Absen</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-6">
                                    <div class="card card-social">
                                        <div class="card-block border-bottom">
                                            <div class="row align-items-center justify-content-center">
                                                <div class="col-auto">
                                                    <img class="rounded-circle  m-r-10" style="width:70px;" src="<?= base_url('assets/template/') ?>assets/images/user/avatar-6.jpg" alt="activity-user">
                                                </div>
                                                <div class="col text-right">
                                                    <h3>Akhwat</h3>
                                                    <h5 class="text-c-purple mb-0"><span class="text-muted"><?= $jml_akhwat ?> Orang</span></h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-block">
                                            <div class="row align-items-center justify-content-center card-active">
                                                <div class="col-6">
                                                    
                                                </div>
                                                <div class="col-6 text-center">
                                                    <a class="btn btn-warning" href="<?= base_url('Absen/kelompok/'.encrypt_url($akhwat)) ?>" role="button">Ambil Absen</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- [ Main Content ] end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->