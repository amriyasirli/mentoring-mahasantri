


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
                                            <h5 class="mb-4">Pemateri</h5>
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
                                                            <th class="text-center"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                        $no = 1;
                                                        foreach ($pemateri as $row) :
                                                    ?>
                                                        
                                                        
                                                        <tr>
                                                            <th scope="row"><?= $no++ ?></th>
                                                            <td class="text-left"><?= $row->nama_pemateri; ?></td>
                                                            <td class="text-center">
                                                                <div class="btn-group mb-2 mr-2 shadow">
                                                                    <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi</button>
                                                                    <div class="dropdown-menu">
                                                                        <!-- <a style="color: green" class="dropdown-item" href="#!" data-toggle="modal" data-target="#<?= $row->id_pemateri; ?>detail"><i class="feather icon-eye"></i> Detail</a> -->
                                                                        <a style="color: blue" class="dropdown-item" href="#!" data-toggle="modal" data-target="#<?= $row->id_pemateri; ?>update"><i class="feather icon-edit"></i> Update</a>
                                                                        <a style="color: red" class="dropdown-item" href="#!" data-toggle="modal" data-target="#<?= $row->id_pemateri; ?>delete"><i class="feather icon-trash"></i> Delete</a>
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
                    <h5 class="modal-title">Tambah Pemateri</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <?= form_open_multipart('Pemateri/create') ?>
                <div class="modal-body">
                    <div class="form-group">
                      <label for="nama">Nama Pemateri</label>
                      <input type="text"
                        class="form-control" name="nama" id="nama" aria-describedby="helpId" value="<?=set_value('nama') ?>">
                      <small id="helpId" class="form-text text-danger"><?= form_error('nama') ?></small>
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
        
        foreach ($pemateri as $row) :
    ?>
        
    <div class="modal fade" id="<?= $row->id_pemateri; ?>update" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Pemateri</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <?= form_open_multipart('Pemateri/update/'.encrypt_url($row->id_pemateri)) ?>
                <div class="modal-body">
                    <div class="form-group">
                      <label for="nama">Nama Pemateri</label>
                      <input type="text"
                        class="form-control" name="nama" id="nama" aria-describedby="helpId" value="<?= $row->nama_pemateri ?>">
                      <small id="helpId" class="form-text text-danger"><?= form_error('nama') ?></small>
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
        
        foreach ($pemateri as $row) :
    ?>
        
    <div class="modal fade" id="<?= $row->id_pemateri; ?>delete" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Pemateri</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <p>Anda Yakin Hapus Data Ini ? </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="shadow btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('Pemateri/delete/'.encrypt_url($row->id_pemateri)) ?>" class="shadow btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
    </div>

    <?php endforeach; ?>

    