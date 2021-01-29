


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
                                            <h5 class="mb-4">Data Musrif</h5>
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
                                                            <th>Nama</th>
                                                            <th>Jenis Kelamin</th>
                                                            <th class="text-center"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                        $no = 1;
                                                        foreach ($musrif as $row) :
                                                    ?>
                                                        
                                                        
                                                        <tr>
                                                            <th scope="row"><?= $no++ ?></th>
                                                            <td class="text-left"><?= $row->nama_musrif; ?></td>
                                                            <td class="text-left"><?= $row->gender_musrif; ?></td>
                                                            <td class="text-center">
                                                                <div class="btn-group mb-2 mr-2 shadow">
                                                                    <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi</button>
                                                                    <div class="dropdown-menu">
                                                                        <!-- <a style="color: green" class="dropdown-item" href="#!" data-toggle="modal" data-target="#<?= $row->id_musrif; ?>detail"><i class="feather icon-eye"></i> Detail</a> -->
                                                                        <a style="color: blue" class="dropdown-item" href="#!" data-toggle="modal" data-target="#<?= $row->id_musrif; ?>update"><i class="feather icon-edit"></i> Update</a>
                                                                        <a style="color: red" class="dropdown-item" href="#!" data-toggle="modal" data-target="#<?= $row->id_musrif; ?>delete"><i class="feather icon-trash"></i> Delete</a>
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
                    <h5 class="modal-title">Tambah Data Musrif</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <?= form_open_multipart('Musrif/create') ?>
                <div class="modal-body">
                    <div class="form-group">
                      <label for="nama">Nama Musrif</label>
                      <input type="text"
                        class="form-control" name="nama" id="nama" aria-describedby="helpId" value="<?=set_value('nama') ?>">
                      <small id="helpId" class="form-text text-danger"><?= form_error('nama') ?></small>
                    </div>
                    <div class="form-group">
                      <label for="gender">Jenis Kelamin</label>
                      <select class="form-control" name="gender" required>
                        <option value="">Pilih...</option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="nama">Username</label>
                      <input type="text"
                        class="form-control" name="username" id="username" aria-describedby="helpId" value="<?=set_value('username') ?>">
                      <small id="helpId" class="form-text text-danger"><?= form_error('username') ?></small>
                    </div>
                    <div class="form-group">
                      <label for="nama">Password</label>
                      <input type="password"
                        class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="Minimal 8 Karakter !">
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
        
        foreach ($musrif as $row) :
    ?>
        
    <div class="modal fade" id="<?= $row->id_musrif; ?>update" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Data Musrif</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <?= form_open_multipart('Musrif/update/'.encrypt_url($row->id_musrif)) ?>
                <div class="modal-body">
                    <div class="form-group">
                      <label for="nama">Nama Musrif</label>
                      <input type="text"
                        class="form-control" name="nama" id="nama" aria-describedby="helpId" value="<?= $row->nama_musrif ?>">
                      <small id="helpId" class="form-text text-danger"><?= form_error('nama') ?></small>
                    </div>
                    <div class="form-group">
                      <label for="gender">Jenis Kelamin</label>
                      <select class="form-control" name="gender" required>
                        <option value="<?= $row->gender_musrif; ?>"><?= $row->gender_musrif; ?></option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="nama">Username</label>
                      <input type="text"
                        class="form-control" readonly aria-describedby="helpId" value="<?=$row->username ?>">
                    </div>
                    <div class="form-group">
                      <label for="nama">Password</label>
                      <input type="password"
                        class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="Masukan ulang password !">
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
        
        foreach ($musrif as $row) :
    ?>
        
    <div class="modal fade" id="<?= $row->id_musrif; ?>delete" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Data Musrif</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <p>Anda Yakin Hapus Data Ini ? </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="shadow btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('Musrif/delete/'.encrypt_url($row->id_musrif)) ?>" class="shadow btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
    </div>

    <?php endforeach; ?>

    