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
                                        <h5 class="m-b-10">Cetak Laporan</h5>
                                    </div>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?= base_url('Welcome/') ?>"><i class="feather icon-home"></i></a></li>
                                        <li class="breadcrumb-item"><a href="#">Cetak</a></li>
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
                                    <div class="accordion" id="accordionExample">
                                        <!-- <div class="card">
                                            <div class="card-header" id="headingOne">
                                                <h5 class="mb-0"><a href="#!" data-toggle="collapse" data-target="#laporan_1" aria-expanded="true" aria-controls="laporan_1">Cetak Jadwal</a></h5>
                                            </div>
                                            <div id="laporan_1" class=" card-body collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                <form action="<?= base_url('Laporan/jadwal') ?>" method="get">
                                                    <div class="form-group">
                                                        <label for="">Kelompok</label>
                                                        <select class="form-control" name="kelompok" required>
                                                            <option value="">Pilih...</option>
                                                            <option value="all">Semua Kelompok</option>
                                                        <?php
                                                            foreach ($kelompok as $row) :
                                                        ?>
                                                            <option value="<?= $row->id_kelompok; ?>">Kelompok <?= $row->kelompok; ?></option>
                                                        <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <button type="submit" class="btn btn-outline-danger"><i class="feather icon-printer"></i>Cetak</button>
                                                </form>
                                            </div>
                                        </div> -->
                                        <div class="card">
                                            <div class="card-header" id="headingOne">
                                                <h5 class="mb-0"><a href="#!" data-toggle="collapse" data-target="#laporan_2" aria-expanded="true" aria-controls="laporan_2">Cetak Absen</a></h5>
                                            </div>
                                            <div id="laporan_2" class=" card-body collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                
                                                <form action="<?= base_url('Laporan/absen') ?>" method="get">
                                                    <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label class="sub-title">Tanggal</label>
                                                        <input type="text" name="datefilter" class="form-control" value="" required>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="">Kelompok</label>
                                                        <select class="form-control" name="kelompok" required>
                                                            <option value="">Pilih...</option>
                                                        <?php
                                                            foreach ($kelompok as $row) :
                                                        ?>
                                                            <option value="<?= $row->id_kelompok; ?>">Kelompok <?= $row->kelompok; ?></option>
                                                        <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    </div>
                                                    <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label for="">Materi</label>
                                                        <select class="form-control" name="materi" required>
                                                            <option value="">Pilih...</option>
                                                        <?php
                                                            foreach ($materi as $row) :
                                                        ?>
                                                            <option value="<?= $row->id_materi; ?>"><?= $row->materi; ?></option>
                                                        <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                      <label for="jenis_kelamin">Jenis Kelamin</label>
                                                      <select class="form-control" name="jenis_kelamin" required>
                                                        <option value="">Pilih...</option>
                                                        <option value="Laki-Laki">Ikhwan</option>
                                                        <option value="Perempuan">Akhwat</option>
                                                      </select>
                                                    </div>
                                                    <div class="col-md-12 text-right">
                                                        <button type="submit" class="btn btn-sm btn-outline-danger"><i class="feather icon-printer"></i>Cetak</button>
                                                    </div>
                                                </div>
                                                </form>
                                                    
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="headingOne">
                                                <h5 class="mb-0"><a href="#!" data-toggle="collapse" data-target="#laporan_3" aria-expanded="true" aria-controls="laporan_3">Cetak Data Mahasantri</a></h5>
                                            </div>
                                            <div id="laporan_3" class=" card-body collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                            <form action="<?= base_url('Laporan/kelompok') ?>" method="get">
                                            <div class="row">
                                            <div class="form-group col-md-6">
                                                  <select class="form-control" name="kelompok" required>
                                                    <option value="">Pilih Kelompok</option>
                                                    <option value="all">Semua Kelompok</option>
                                                    <?php
                                                        foreach ($kelompok as $row) :
                                                    ?>
                                                        <option value="<?= $row->id_kelompok; ?>">Kelompok <?= $row->kelompok; ?></option>
                                                    <?php endforeach; ?>
                                                  </select>
                                                </div>
                                                <div class="col-md-2 mb-3 text-right">
                                                    <label for=""></label>
                                                    <button type="submit" class="btn btn-sm btn-outline-danger"><i class="feather icon-printer"></i>Cetak</button>
                                                </div>
                                            </div>
                                            </form>
                                            <form action="<?= base_url('Laporan/jurusan') ?>" method="get">
                                            <div class="row">
                                            <div class="form-group col-md-6">
                                                  <select class="form-control" name="jurusan" required>
                                                    <option value="">Pilih Jurusan</option>
                                                    <option value="all">Semua Jurusan</option>
                                                    <?php
                                                        foreach ($jurusan as $row) :
                                                    ?>
                                                        <option value="<?= $row->id_jurusan; ?>"><?= $row->jurusan; ?></option>
                                                    <?php endforeach; ?>
                                                  </select>
                                                </div>
                                                <div class="col-md-2 text-right">
                                                    <button type="submit" class="btn btn-sm btn-outline-danger"><i class="feather icon-printer"></i>Cetak</button>
                                                </div>
                                            </div>
                                            </form>
                                                
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="headingOne">
                                                <h5 class="mb-0"><a href="#!" data-toggle="collapse" data-target="#laporan_4" aria-expanded="true" aria-controls="laporan_4">Cetak Master Data</a></h5>
                                            </div>
                                            <div id="laporan_4" class=" card-body collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                <a href="<?= base_url('Laporan/musrif') ?>" class="btn btn-sm btn-outline-danger btn-block"><i class="feather icon-user"></i>Cetak Data Musrif</a>
                                                <a href="<?= base_url('Laporan/pemateri') ?>" class="btn btn-sm btn-outline-danger btn-block"><i class="feather icon-edit-2"></i>Cetak Data Pemateri</a>
                                                <a href="<?= base_url('Laporan/cetak_jurusan') ?>" class="btn btn-sm btn-outline-danger btn-block"><i class="feather icon-grid"></i>Cetak Data Jurusan</a>
                                                <a href="<?= base_url('Laporan/materi') ?>" class="btn btn-sm btn-outline-danger btn-block"><i class="feather icon-file"></i>Cetak Data Materi</a>
                                            </div>
                                            </form>
                                                
                                            </div>
                                        </div>
                                    </div>
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