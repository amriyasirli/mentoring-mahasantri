


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
                                            <h5 class="mb-4">Jadwal</h5>
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
                                                            <th class="">Materi</th>
                                                            <th class="">Pemateri</th>
                                                            <th class="">Kelompok</th>
                                                            <th class="">Hari</th>
                                                            <th class="">Jam</th>
                                                            <th class=""></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                        $no = 1;
                                                        foreach ($jadwal as $row) :
                                                    ?>
                                                        
                                                        
                                                        <tr>
                                                            <th scope="row"><?= $no++ ?></th>
                                                            <td class="text-left"><?= $row->materi; ?></td>
                                                            <td class="text-left"><?= $row->nama_pemateri; ?></td>
                                                            <td class="text-left"><?= $row->kelompok; ?> (<?= $row->jadwal_jenis_kelamin; ?>)</td>
                                                            <td class="text-left"><?= $row->hari; ?></td>
                                                            <td class="text-left"><?= $row->jam; ?></td>
                                                            <td class="text-center">
                                                                <div class="btn-group mb-2 mr-2 shadow">
                                                                    <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi</button>
                                                                    <div class="dropdown-menu">
                                                                        <!-- <a style="color: green" class="dropdown-item" href="#!" data-toggle="modal" data-target="#<?= $row->id_jadwal; ?>detail"><i class="feather icon-eye"></i> Detail</a> -->
                                                                        <a style="color: blue" class="dropdown-item" href="#!" data-toggle="modal" data-target="#<?= $row->id_jadwal; ?>update"><i class="feather icon-edit"></i> Update</a>
                                                                        <a style="color: red" class="dropdown-item" href="#!" data-toggle="modal" data-target="#<?= $row->id_jadwal; ?>delete"><i class="feather icon-trash"></i> Delete</a>
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
                    <h5 class="modal-title">Tambah Jadwal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <?= form_open_multipart('Jadwal/create') ?>
                <div class="modal-body">
                    <div class="form-group">
                      <label for="materi">Materi</label>
                      <select class="form-control" name="materi" id="materi">
                        <option>Pilih...</option>
                        <?php
                            foreach ($materi as $row) :
                        ?>
                        <option value="<?= $row->id_materi; ?>"><?= $row->materi; ?></option>
                        <?php endforeach; ?>
                      </select>
                        <small id="helpId" class="form-text text-danger"><?= form_error('materi') ?></small>
                    </div> 
                    <div class="form-group">
                      <label for="pemateri">Nama Pemateri</label>
                      <select class="form-control" name="pemateri" id="pemateri">
                        <option>Pilih...</option>
                        <?php
                            foreach ($pemateri as $row) :
                        ?>
                        <option value="<?= $row->id_pemateri; ?>"><?= $row->nama_pemateri; ?></option>
                        <?php endforeach; ?>
                      </select>
                        <small id="helpId" class="form-text text-danger"><?= form_error('pemateri') ?></small>
                    </div>                                       
                    <div class="form-group">
                      <label for="kelompok">Kelompok</label>
                      <select class="form-control" name="kelompok" id="kelompok">
                        <option>Pilih...</option>
                        <?php
                            foreach ($kelompok as $row) :
                        ?>
                        <option value="<?= $row->id_kelompok; ?>"><?= $row->kelompok; ?></option>  
                        <?php endforeach; ?>
                      </select>
                      <small id="helpId" class="form-text text-danger"><?= form_error('kelas') ?></small>
                    </div>
                    <div class="form-group">
                      <label for="jenis_kelamin">Jenis Kelamin</label>
                      <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                        <option>Pilih...</option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                      </select>
                      <small id="helpId" class="form-text text-danger"><?= form_error('jenis_kelamin') ?></small>
                    </div>
                    <div class="form-group">
                      <label for="hari">Hari</label>
                      <select class="form-control" name="hari" id="hari">
                        <option>Pilih...</option>
                        <option value="Senin">Senin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Kamis">Kamis</option>
                        <option value="Jumat">Jumat</option>
                        <option value="Sabtu">Sabtu</option>
                        <option value="Minggu">Minggu</option>
                      </select>
                      <small id="helpId" class="form-text text-danger"><?= form_error('hari') ?></small>
                    </div> 
                    <div class="form-group">
                      <label for="jam">Jam</label>
                      <input type="time"
                        class="form-control" name="jam" id="jam" aria-describedby="helpId" value="<?= set_value('jam') ?>">
                      <small id="helpId" class="form-text text-danger"><?= form_error('jam') ?></small>
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
        
        foreach ($jadwal as $row) :
    ?>
        
    <div class="modal fade" id="<?= $row->id_jadwal; ?>update" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Jadwal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <?= form_open_multipart('Jadwal/update/'.encrypt_url($row->id_jadwal)) ?>
                <div class="modal-body">
                <div class="form-group">
                      <label for="materi">Materi</label>
                      <select class="form-control" name="materi" id="materi">
                        <option value="<?= $row->id_materi; ?>"><?= $row->materi; ?></option>
                        <?php
                            foreach ($materi as $mt) :
                        ?>
                        <option value="<?= $mt->id_materi; ?>"><?= $mt->materi; ?></option>
                        <?php endforeach; ?>
                      </select>
                        <small id="helpId" class="form-text text-danger"><?= form_error('materi') ?></small>
                    </div> 
                    <div class="form-group">
                      <label for="pemateri">Nama Pemateri</label>
                      <select class="form-control" name="pemateri" id="pemateri">
                      <option value="<?= $row->id_pemateri; ?>"><?= $row->nama_pemateri; ?></option>
                        <?php
                            foreach ($pemateri as $pmt) :
                        ?>
                        <option value="<?= $pmt->id_pemateri; ?>"><?= $pmt->nama_pemateri; ?></option>
                        <?php endforeach; ?>
                      </select>
                        <small id="helpId" class="form-text text-danger"><?= form_error('pemateri') ?></small>
                    </div>                                       
                    <div class="form-group">
                      <label for="kelompok">Kelompok</label>
                      <select class="form-control" name="kelompok" id="kelompok">
                      <option value="<?= $row->id_kelompok; ?>"><?= $row->kelompok; ?></option>
                        <?php
                            foreach ($kelompok as $klp) :
                        ?>
                        <option value="<?= $klp->id_kelompok; ?>"><?= $klp->kelompok; ?></option>  
                        <?php endforeach; ?>
                      </select>
                      <small id="helpId" class="form-text text-danger"><?= form_error('kelompok') ?></small>
                    </div>
                    <div class="form-group">
                      <label for="jenis_kelamin">Jenis Kelamin</label>
                      <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                        <option value="<?= $row->jadwal_jenis_kelamin; ?>"><?= $row->jadwal_jenis_kelamin; ?></option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                      </select>
                      <small id="helpId" class="form-text text-danger"><?= form_error('jenis_kelamin') ?></small>
                    </div>
                    <div class="form-group">
                      <label for="hari">Hari</label>
                      <select class="form-control" name="hari" id="hari">
                      <option value="<?= $row->hari; ?>"><?= $row->hari; ?></option>
                        <option value="Senin">Senin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Kamis">Kamis</option>
                        <option value="Jumat">Jumat</option>
                        <option value="Sabtu">Sabtu</option>
                        <option value="Minggu">Minggu</option>
                      </select>
                      <small id="helpId" class="form-text text-danger"><?= form_error('hari') ?></small>
                    </div> 
                    <div class="form-group">
                      <label for="jam">Jam</label>
                      <input type="time"
                        class="form-control" name="jam" id="jam" aria-describedby="helpId" value="<?= $row->jam; ?>">
                      <small id="helpId" class="form-text text-danger"><?= form_error('jam') ?></small>
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
        
        foreach ($jadwal as $row) :
    ?>
        
    <div class="modal fade" id="<?= $row->id_jadwal; ?>delete" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Jadwal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <p>Anda Yakin Hapus Data Ini ? </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="shadow btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('Jadwal/delete/'.encrypt_url($row->id_jadwal)) ?>" class="shadow btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
    </div>

    <?php endforeach; ?>

    