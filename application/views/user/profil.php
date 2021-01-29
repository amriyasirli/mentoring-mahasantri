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
                                        <h5 class="m-b-10">Profil</h5>
                                    </div>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?= base_url('Welcome/') ?>"><i class="feather icon-home"></i></a></li>
                                        <li class="breadcrumb-item"><a href="javascript:">User</a></li>
                                        <li class="breadcrumb-item"><a href="javascript:">Profil</a></li>
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
                            <div class="col-md-12 col-xl-12">
                                    <div class="card card-social">
                                        <div class="card-block border-bottom">
                                            <div class="row align-items-center justify-content-center">
                                                <div class="col-auto">
                                                <?php if($this->session->userdata('jenis_kelamin') == "Laki-Laki"){ ?>
                                                    <img class="rounded-circle  m-r-10" style="width:80px;" src="<?= base_url('assets/template/') ?>assets/images/user/avatar-2.jpg" alt="activity-user">
                                                <?php }else{ ?>
                                                    <img class="rounded-circle  m-r-10" style="width:80px;" src="<?= base_url('assets/template/') ?>assets/images/user/avatar-6.jpg" alt="activity-user">
                                                <?php } ?>
                                                </div>
                                                <div class="col text-right">
                                                <?php if($role == 1){?>
                                                    <h4><?= $user->nama_musrif; ?></h4>
                                                <?php }else{ ?>
                                                    <h4><?= $user->nama_santri; ?></h4>
                                                    <h5 class="text-c-green mb-0"> <span class="text-muted"><?= $user->nim ?></span></h5>
                                                    
                                                <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php if($this->session->userdata('role_id')==1){ ?>
                                            <div class="card-block">
                                                <div class="row align-items-center justify-content-center card-active">
                                                    <div class="col-6">
                                                        <h5 class="text-c-green mb-0"> <span class="text-muted">Username </span></h5>
                                                        <h5 class="text-c-green mb-0"> <span class="text-muted">J. Kelamin </span></h5>
                                                        <h5 class="text-c-green mb-0"> <span class="text-muted">Status </span></h5>
                                                    </div>
                                                    <div class="col-6">
                                                        <h5 class="text-c-green mb-0"> <span class="text-muted">: <?= $user->username ?></span></h5>
                                                        <h5 class="text-c-green mb-0"> <span class="text-muted">: <?= $user->gender_musrif ?></span></h5>
                                                        <h5 class="text-c-green mb-0"> <span class="text-muted">: Musrif</span></h5>
                                                    </div>
                                                    <div class="col-6 mt-3 text-center">
                                                        
                                                        <a href="#" class="act-btn3" data-placement="top" title="Ganti Password" data-toggle="modal" data-target="#musrif_ubah">
                                                            Ubah Profil
                                                        </a>
                                                        <a href="#" class="act-btn2" data-placement="top" title="Ganti Password" data-toggle="modal" data-target="#musrif_ganti">
                                                            Ganti Password
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php }else{ ?>
                                            <div class="card-block">
                                                <div class="row align-items-center justify-content-center card-active">
                                                    <div class="col-6">
                                                        <h5 class="text-c-green mb-0"> <span class="text-muted">Username </span></h5>
                                                        <h5 class="text-c-green mb-0"> <span class="text-muted">J. Kelamin </span></h5>
                                                        <h5 class="text-c-green mb-0"> <span class="text-muted">Jurusan </span></h5>
                                                        <h5 class="text-c-green mb-0"> <span class="text-muted">Kelompok </span></h5>
                                                        <h5 class="text-c-green mb-0"> <span class="text-muted">Status </span></h5>
                                                    </div>
                                                    <div class="col-6">
                                                        <h5 class="text-c-green mb-0"> <span class="text-muted">: <?= $user->nim ?></span></h5>
                                                        <h5 class="text-c-green mb-0"> <span class="text-muted">: <?= $user->jenis_kelamin ?></span></h5>
                                                        <h5 class="text-c-green mb-0"> <span class="text-muted">: <?= $user->jurusan ?></span></h5>
                                                        <h5 class="text-c-green mb-0"> <span class="text-muted">: <?= $user->kelompok ?></span></h5>
                                                        <h5 class="text-c-green mb-0"> <span class="text-muted">: Mahasantri</span></h5>
                                                    </div>
                                                    <div class="col-6 mt-3 text-center">
                                                        
                                                        <a href="#" class="act-btn3" data-placement="top" title="Ganti Password" data-toggle="modal" data-target="#mahasantri_ubah">
                                                            Ubah Profil
                                                        </a>
                                                        <a href="#" class="act-btn2" data-placement="top" title="Ganti Password" data-toggle="modal" data-target="#mahasantri_ganti">
                                                            Ganti Password
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
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


    <!-- musrif -->
    <div class="modal fade" id="musrif_ubah" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ubah Profil</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <form action="<?= base_url('User/update_profil/'.encrypt_url($user->id_musrif)) ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text"
                            class="form-control" name="nama" id="nama" aria-describedby="helpId" value="<?= $user->nama_musrif ?>">
                        <small id="helpId" class="form-text text-danger"><?= form_error('nama') ?></small>
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="custom-select" name="jenis_kelamin" id="jenis_kelamin" required>
                            <option value="<?= $user->gender_musrif; ?>"><?= $user->gender_musrif; ?></option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    <small id="helpId" class="form-text text-danger"><?= form_error('jenis_kelamin') ?></small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- musrif -->
    <div class="modal fade" id="musrif_ganti" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ganti Password</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <form action="<?= base_url('User/ganti_password/'.encrypt_url($user->id_musrif)) ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text"
                            class="form-control" readonly aria-describedby="helpId" value="<?= $user->username; ?>">
                    </div>
                    <div class="form-group">
                        <label for="password_lama">Password Lama</label>
                        <input type="password"
                            class="form-control" name="password_lama" id="password_lama" aria-describedby="helpId" placeholder="Masukan password lama">
                        <small id="helpId" class="form-text text-danger"><?= form_error('password_lama') ?></small>
                    </div>
                    <div class="form-group">
                        <label for="password1">Password Baru</label>
                        <input type="password"
                            class="form-control" name="password1" id="password1" aria-describedby="helpId" placeholder="Masukan password baru">
                        <small id="helpId" class="form-text text-danger"><?= form_error('password1') ?></small>
                    </div>
                    <div class="form-group">
                        <label for="password2">Ulangi Password</label>
                        <input type="password"
                            class="form-control" name="password2" id="password2" aria-describedby="helpId" placeholder="Ulangi Password">
                        <small id="helpId" class="form-text text-danger"><?= form_error('password2') ?></small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- mahasantri -->
    <div class="modal fade" id="mahasantri_ubah" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ubah Profil</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <form action="<?= base_url('User/update_profil/'.encrypt_url($user->nim)) ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text"
                            class="form-control" name="nama" id="nama" aria-describedby="helpId" value="<?= $user->nama_santri ?>">
                        <small id="helpId" class="form-text text-danger"><?= form_error('nama') ?></small>
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="custom-select" name="jenis_kelamin" id="jenis_kelamin" required>
                            <option value="<?= $user->jenis_kelamin; ?>"><?= $user->jenis_kelamin; ?></option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    <small id="helpId" class="form-text text-danger"><?= form_error('jenis_kelamin') ?></small>
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <select class="custom-select" name="jurusan" id="jurusan" required>
                            <option value="<?= $user->id_jurusan; ?>"><?= $user->jurusan; ?></option>
                            <?php
                                foreach ($jurusan as $j) :
                            ?>
                            <option value="<?= $j->id_jurusan; ?>"><?= $j->jurusan; ?></option>
                            <?php endforeach; ?>
                        </select>
                      <small id="helpId" class="form-text text-danger"><?= form_error('jurusan') ?></small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- mahasantri -->
    <div class="modal fade" id="mahasantri_ganti" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ganti Password</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <form action="<?= base_url('User/ganti_password/'.encrypt_url($user->nim)) ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text"
                            class="form-control" readonly aria-describedby="helpId" value="<?= $user->nim; ?>">
                    </div>
                    <div class="form-group">
                        <label for="password_lama">Password Lama</label>
                        <input type="password"
                            class="form-control" name="password_lama" id="password_lama" aria-describedby="helpId" placeholder="Masukan password lama">
                        <small id="helpId" class="form-text text-danger"><?= form_error('password_lama') ?></small>
                    </div>
                    <div class="form-group">
                        <label for="password1">Password Baru</label>
                        <input type="password"
                            class="form-control" name="password1" id="password1" aria-describedby="helpId" placeholder="Masukan password baru">
                        <small id="helpId" class="form-text text-danger"><?= form_error('password1') ?></small>
                    </div>
                    <div class="form-group">
                        <label for="password2">Ulangi Password</label>
                        <input type="password"
                            class="form-control" name="password2" id="password2" aria-describedby="helpId" placeholder="Ulangi Password">
                        <small id="helpId" class="form-text text-danger"><?= form_error('password2') ?></small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
                </form>
            </div>
        </div>
    </div>