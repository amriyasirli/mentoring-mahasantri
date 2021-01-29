


    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <!-- [ breadcrumb ] start -->
                    <!-- [ breadcrumb ] end -->
                    <div class="main-body">
                        <div class="page-wrapper">
                            <!-- [ Main Content ] start -->
                            <?= $this->session->flashdata('pesan') ?>
                            <div class="row">
                            <!--[ Recent Users ] start-->
                                <div class="col-xl-4 col-md-6">
                                    <div class="card card-event">
                                        <div class="card-block">
                                            <div class="row align-items-center justify-content-center">
                                                <div class="col">
                                                    <h5 class="m-0">Aplikasi Mentoring</h5>
                                                </div>
                                                <div class="col-auto">
                                                    <label class="label theme-bg2 text-white f-14 f-w-400 float-right">2021</label>
                                                </div>
                                            </div>
                                            <h6 class="text-muted mt-4 mb-0">Mahad Al-Jami'ah IAIN Bukittinggi </h6>
                                            <h2 class="mt-3 f-w-300"><?= $kelompok ?><sub class="text-muted f-14"> Kelompok</sub></h2>
                                            <i class="feather icon-monitor text-c-purple f-50"></i><br>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-block border-bottom">
                                            <div class="row d-flex align-items-center">
                                                <div class="col-auto">
                                                    <i class="feather icon-grid f-30 text-c-green"></i>
                                                </div>
                                                <div class="col">
                                                    <h3 class="f-w-300"><?= $jurusan ?></h3>
                                                    <span class="d-block text-uppercase">Jurusan</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-block">
                                            <div class="row d-flex align-items-center">
                                                <div class="col-auto">
                                                    <i class="feather icon-edit-2 f-30 text-c-blue"></i>
                                                </div>
                                                <div class="col">
                                                    <h3 class="f-w-300"><?= $pemateri ?></h3>
                                                    <span class="d-block text-uppercase">Pemateri</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-8 col-md-6">
                                    <div class="card Recent-Users">
                                        <div class="card-header">
                                            <h5>Jadwal Terbaru</h5>
                                        </div>
                                        <div class="card-block px-0 py-3">
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <tbody>
                                                    <?php
                                                        
                                                        foreach ($jadwal as $row) :
                                                    ?>
                                                        <tr class="unread">
                                                        <?php if($row->jadwal_jenis_kelamin == "Laki-Laki"){ ?>
                                                            <td><img class="rounded-circle" style="width:40px;" src="<?= base_url('assets/template/') ?>assets/images/user/avatar-2.jpg" alt="activity-user"></td>
                                                        <?php }else{ ?>
                                                            <td><img class="rounded-circle" style="width:40px;" src="<?= base_url('assets/template/') ?>assets/images/user/avatar-6.jpg" alt="activity-user"></td>
                                                        <?php } ?>
                                                            <td>
                                                                <h6 class="mb-1"><?= $row->materi; ?> (Kelompok <?= $row->kelompok; ?>)</h6>
                                                                <p class="m-0"><?= $row->hari; ?> <?= $row->jam; ?></p>
                                                            </td>
                                                            <?php if($row->jadwal_jenis_kelamin=="Laki-Laki"){$warna="blue";}else{$warna="yellow";} ?>
                                                            <td>
                                                                <h6 class="text-muted"><i class="fas fa-circle text-c-<?= $warna ?> f-10 m-r-15"></i><?= $row->jadwal_jenis_kelamin; ?></h6>
                                                            </td>
                                                        </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--[ Recent Users ] end-->

                                <!-- [ statistics year chart ] start -->
                                
                                <!--[ daily sales section ] start-->
                                <div class="col-md-6 col-xl-4">
                                    <div class="card daily-sales">
                                        <div class="card-block">
                                            <h6 class="mb-4">Mahasantri</h6>
                                            <div class="row d-flex align-items-center">
                                                <div class="col-9">
                                                    <h3 class="f-w-300 d-flex align-items-center m-b-0"><i class="feather icon-users text-c-purple f-30 m-r-10"></i><?= $mahasantri ?></h3>
                                                </div>

                                                <div class="col-3 text-right">
                                                    <!-- <p class="m-b-0">67%</p> -->
                                                </div>
                                            </div>
                                            <div class="progress m-t-30" style="height: 7px;">
                                                <div class="progress-bar progress-c-theme2" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--[ daily sales section ] end-->
                                <!--[ Monthly  sales section ] starts-->
                                <div class="col-md-6 col-xl-4">
                                    <div class="card Monthly-sales">
                                        <div class="card-block">
                                            <h6 class="mb-4">Pembina (Musrif/Musrifa)</h6>
                                            <div class="row d-flex align-items-center">
                                                <div class="col-9">
                                                    <h3 class="f-w-300 d-flex align-items-center  m-b-0"><i class="feather icon-user-check text-c-red f-30 m-r-10"></i><?= $musrif ?></h3>
                                                </div>
                                                <div class="col-3 text-right">
                                                    <!-- <p class="m-b-0">36%</p> -->
                                                </div>
                                            </div>
                                            <div class="progress m-t-30" style="height: 7px;">
                                                <div class="progress-bar progress-c-red" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--[ Monthly  sales section ] end-->
                                <!--[ year  sales section ] starts-->
                                <div class="col-md-12 col-xl-4">
                                    <div class="card yearly-sales">
                                        <div class="card-block">
                                            <h6 class="mb-4">Materi Mentoring</h6>
                                            <div class="row d-flex align-items-center">
                                                <div class="col-9">
                                                    <h3 class="f-w-300 d-flex align-items-center  m-b-0"><i class="feather icon-file text-c-green f-30 m-r-10"></i><?= $materi ?></h3>
                                                </div>
                                                <div class="col-3 text-right">
                                                    <!-- <p class="m-b-0">80%</p> -->
                                                </div>
                                            </div>
                                            <div class="progress m-t-30" style="height: 7px;">
                                                <div class="progress-bar progress-c-theme" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--[ year  sales section ] end-->
                                
                                <!-- [ statistics year chart ] end -->
                                <!--[social-media section] start-->
                                
                                <!--[social-media section] end-->
                                <!-- [ rating list ] starts-->
                                

                            </div>
                            <!-- [ Main Content ] end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->