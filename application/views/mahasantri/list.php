


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
                            <div class="row">
                                <!-- [ basic-table ] start -->
                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-4">Data Mahasantri</h5>
                                            <!-- <span class="d-block m-t-5">use class <code>table</code> inside table element</span> -->
                                            <div class="col-md-12 text-center">
                                                <?= $this->session->flashdata('pesan') ?>
                                            </div>
                                        </div>
                                        <div class="card-block table-border-style">
                                            <div class="table-responsive">
                                                <table id="myTable" class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Nim</th>
                                                            <th>Nama</th>
                                                            <th>Jenis Kelamin</th>
                                                            <th>Jurusan</th>
                                                            <th class="text-center">Kelompok</th>
                                                            <th class="text-center"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                        $no = 1;
                                                        foreach ($mahasantri as $row) :
                                                    ?>
                                                        
                                                        
                                                        <tr>
                                                            <th scope="row"><?= $no++ ?></th>
                                                            <td><?= $row->nim; ?></td>
                                                            <td><?= $row->nama_santri; ?></td>
                                                            <td><?= $row->jenis_kelamin; ?></td>
                                                            <td><?= $row->jurusan; ?></td>
                                                            <td class="text-center"><?= $row->kelompok; ?></td>
                                                            <td class="text-center">
                                                                <div class="btn-group mb-2 mr-2 shadow">
                                                                    <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi</button>
                                                                    <div class="dropdown-menu">
                                                                        <!-- <a style="color: green" class="dropdown-item" href="#!" data-toggle="modal" data-target="#<?= $row->nim; ?>detail"><i class="feather icon-eye"></i> Detail</a> -->
                                                                        <a style="color: blue" class="dropdown-item" href="#!" data-toggle="modal" data-target="#<?= $row->nim; ?>update"><i class="feather icon-edit"></i> Update</a>
                                                                        <a style="color: red" class="dropdown-item" href="#!" data-toggle="modal" data-target="#<?= $row->nim; ?>delete"><i class="feather icon-trash"></i> Delete</a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- [ tabs ] end -->
                            </div>
                            <!-- [ Main Content ] end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->

    <a href="#" class="act-btn" data-placement="top" title="Tambah Data" data-toggle="modal" data-target="#tambah">
        +
    </a>

    
    
    <!---------------------
        TAMBAH DATA
    ---------------------->
    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Mahasantri</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <?= form_open_multipart('Mahasantri/create') ?>
                <div class="modal-body">
                    <div class="form-group">
                      <label for="nim">Nim</label>
                      <input type="text"
                        class="form-control" name="nim" id="nim" aria-describedby="helpId" value="<?=set_value('nim') ?>">
                      <small id="helpId" class="form-text text-danger"><?= form_error('nim') ?></small>
                    </div>
                    <div class="form-group">
                      <label for="nama">Nama Lengkap</label>
                      <input type="text"
                        class="form-control" name="nama" id="nama" aria-describedby="helpId" value="<?=set_value('nama') ?>">
                      <small id="helpId" class="form-text text-danger"><?= form_error('nama') ?></small>
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="custom-select" name="jenis_kelamin" id="jenis_kelamin" required>
                            <option value="">Pilih...</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                      <small id="helpId" class="form-text text-danger"><?= form_error('jenis_kelamin') ?></small>
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <select class="custom-select" name="jurusan" id="jurusan" required>
                            <option value="">Pilih...</option>
                            <?php
                                foreach ($jurusan as $j) :
                            ?>
                            <option value="<?= $j->id_jurusan; ?>"><?= $j->jurusan; ?></option>
                            <?php endforeach; ?>
                        </select>
                      <small id="helpId" class="form-text text-danger"><?= form_error('jurusan') ?></small>
                    </div>
                    
                    <div class="form-group">
                        <label for="kelompok">Kelompok</label>
                        <select class="custom-select" name="kelompok" id="kelompok" required>
                            <option value="">Pilih...</option>
                            <?php
                                foreach ($kelompok as $k) :
                            ?>
                            <option value="<?= $k->id_kelompok; ?>"><?= $k->kelompok; ?></option>
                            <?php endforeach; ?>
                        </select>
                      <small id="helpId" class="form-text text-danger"><?= form_error('kelompok') ?></small>
                    </div>
                    <div class="form-group">
                      <label for="nama">Password</label>
                      <input type="password"
                        class="form-control" name="password" id="password" aria-describedby="helpId" value="<?=set_value('password') ?>">
                      <small id="helpId" class="form-text text-danger"><?= form_error('password') ?></small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary shadow" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success shadow">Simpan</button>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>


    <!---------------------
        UPDATE DATA
    ---------------------->

    <?php
        
        foreach ($mahasantri as $row) :
    ?>
        
    <div class="modal fade" id="<?= $row->nim; ?>update" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Data Mahasantri</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <?= form_open_multipart('Mahasantri/update/'.encrypt_url($row->nim)) ?>
                <div class="modal-body">
                    <div class="form-group">
                      <label for="nim">Nim</label>
                      <input type="text"
                        class="form-control" name="nim" id="nim" readonly value="<?= $row->nim ?>">
                      <small id="helpId" class="form-text text-danger"><?= form_error('nim') ?></small>
                    </div>
                    <div class="form-group">
                      <label for="nama">Nama Lengkap</label>
                      <input type="text"
                        class="form-control" name="nama" id="nama" aria-describedby="helpId" value="<?= $row->nama_santri ?>">
                      <small id="helpId" class="form-text text-danger"><?= form_error('nama') ?></small>
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="custom-select" name="jenis_kelamin" id="jenis_kelamin" required>
                            <option value="<?= $row->jenis_kelamin; ?>"><?= $row->jenis_kelamin; ?></option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                      <small id="helpId" class="form-text text-danger"><?= form_error('jenis_kelamin') ?></small>
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <select class="custom-select" name="jurusan" id="jurusan" required>
                            <option value="<?= $row->id_jurusan; ?>"><?= $row->jurusan; ?></option>
                            <?php
                                foreach ($jurusan as $j) :
                            ?>
                            <option value="<?= $j->id_jurusan; ?>"><?= $j->jurusan; ?></option>
                            <?php endforeach; ?>
                        </select>
                      <small id="helpId" class="form-text text-danger"><?= form_error('jurusan') ?></small>
                    </div>
                    <div class="form-group">
                        <label for="kelompok">Kelompok</label>
                        <select class="custom-select" name="kelompok" id="kelompok" required>
                            <option value="<?= $row->id_kelompok; ?>"><?= $row->kelompok; ?></option>
                            <?php
                                foreach ($kelompok as $k) :
                            ?>
                            <option value="<?= $k->id_kelompok; ?>"><?= $k->kelompok; ?></option>
                            <?php endforeach; ?>
                        </select>
                      <small id="helpId" class="form-text text-danger"><?= form_error('kelompok') ?></small>
                    </div>
                    <div class="form-group">
                      <label for="nama">Password</label>
                      <input type="password"
                        class="form-control" name="password" id="password" oninvalid="this.setCustomValidity('Masukan ulang password anda !')" placeholder="Masukkan ulang password" required>
                      <small id="helpId" class="form-text text-danger"><?= form_error('password') ?></small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="shadow btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="shadow btn btn-primary">Update</button>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>

    <?php endforeach; ?>

    <!---------------------
        DELETE DATA
    ---------------------->

    <?php
        
        foreach ($mahasantri as $row) :
    ?>
        
    <div class="modal fade" id="<?= $row->nim; ?>delete" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Data Mahasantri</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <p>Anda Yakin Hapus Data Ini ? </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="shadow btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('Mahasantri/delete/'.encrypt_url($row->nim)) ?>" class="shadow btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
    </div>

    <?php endforeach; ?>

    