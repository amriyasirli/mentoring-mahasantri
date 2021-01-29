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
                                        <h5 class="m-b-10">Jadwal Mentoring</h5>
                                    </div>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?= base_url('Welcome/') ?>"><i class="feather icon-home"></i></a></li>
                                        <li class="breadcrumb-item"><a href="#">Jadwal</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- [ breadcrumb ] end -->
                    <div class="main-body">
                        <div class="page-wrapper">
                            <!-- [ Main Content ] start -->
                            <div class="col-sm-12">
                                    <hr>
                                    <?php
                                        
                                        foreach ($jadwal as $row) :
                                    ?>
                                    <div class="accordion" id="accordionExample">
                                        <div class="card">
                                            <div class="card-header" id="headingOne">
                                                <h5 class="mb-0"><a href="#!" data-toggle="collapse" data-target="#<?= $row->id_jadwal; ?>" aria-expanded="true" aria-controls="<?= $row->id_jadwal; ?>"><?= $row->materi; ?></a></h5>
                                            </div>
                                            <div id="<?= $row->id_jadwal; ?>" class=" card-body collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <td>Kelompok</td>
                                                            <td>: <?= $row->kelompok; ?> (<?= $row->jadwal_jenis_kelamin; ?>)</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Materi</td>
                                                            <td>: <?= $row->materi; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Pemateri</td>
                                                            <td>: <?= $row->nama_pemateri; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Hari</td>
                                                            <td>: <?= $row->hari; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Jam</td>
                                                            <td>: <?= $row->jam; ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                                <!-- [ collapse ] end -->
                            <!-- [ Main Content ] end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->