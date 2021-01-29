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
                                <!-- [ tabs ] start -->
                                <div class="col-sm-12">
                                    <h5 class="mt-4">Absen <?= $jenis_kelamin?></h5>
                                    <hr>
                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                        <?php
                                            
                                            foreach ($kelompok as $kel) :
                                                $materi = $this->Absen_model->materi($kel->id_kelompok,$hari,$jenis_kelamin);
                                                $cek = $this->Absen_model->cek($kel->id_kelompok,$hari,$jenis_kelamin)->result();
                                                if($cek){
                                                    $notif = '';
                                                    $badge = '';
                                                    
                                                }else{
                                                    
                                                    $notif = 'notif';
                                                    $badge = '<span class="badgee"> </span>';
                                                }
                                                    
                                        ?>
                                            
                                        <li class="nav-item">
                                            <a class="nav-link <?= $notif ?>" id="pills-<?= $kel->id_kelompok; ?>-tab" data-toggle="pill" href="#pills-<?= $kel->id_kelompok; ?>" role="tab" aria-controls="pills-<?= $kel->id_kelompok; ?>" aria-selected="true">
                                                <span>Kelompok <?= $kel->kelompok; ?></span>
                                                
                                                <?php
                                                        if($materi->num_rows() > 0){
                                                            echo $badge;
                                                           
                                                        }else{

                                                        }
                                                        
                                                        ?>
                                            </a>
                                        </li>
                                            
                                        <?php endforeach; ?>
                                    </ul>
                                    <div class="tab-content" id="pills-tabContent">
                                        <?= $this->session->flashdata('pesan') ?>
                                        <?php
                                            $no = 1;
                                            foreach ($kelompok as $row) :
                                                $materi = $this->Absen_model->materi($row->id_kelompok,$hari,$jenis_kelamin);
                                                
                                                ?>
                                        
                                            
                                        <div class="tab-pane fade show" id="pills-<?= $row->id_kelompok; ?>" role="tabpanel" aria-labelledby="pills-<?= $row->id_kelompok; ?>-tab">
                                                <form action="<?= base_url('Absen/ambil_absen') ?>" method="post">
                                                <div class="form-group">
                                                  <label for="materi">Pilih Materi</label>
                                                  <select required class="form-control" oninvalid="this.setCustomValidity('Materi Tidak Tersedia !')" name="jadwal">
                                                <?php
                                                    // $cek = $this->Absen_model->cek($row->id_kelompok,$hari,$jenis_kelamin,$tanggal);
                                                    // if($cek->num_rows() > 0 ){
                                                        //     echo '  <select class="form-control" name="" required>
                                                        //                 <option value="">Absen Sudah di Ambil</option>';
                                                        // }else{
                                                    if($materi->num_rows() > 0){
                                                        echo '
                                                        <option value="">Pilih</option>';
                                                        foreach ($materi->result() as $mt) :
                                                            $cek_absen = $this->Absen_model->absen_selesai($mt->id_jadwal,$mt->id_kelompok,$jenis_kelamin);
                                                            if($cek_absen){?>
                                                            <option disabled><?= $mt->materi; ?> (<?= $mt->nama_pemateri ?>)</option>  
                                                <?php }else {?> 
                                                        <option value="<?= $mt->id_jadwal; ?>"><?= $mt->materi; ?> (<?= $mt->nama_pemateri ?>)</option>  
                                                <?php } endforeach; ?>
                                                        <?php }else{
                                                            echo '<option value="">Tidak Ada Materi Hari Ini</option>';
                                                        }   
                                                    // }  
                                                ?>
                                                  </select>
                                                </div>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Nim</th>
                                                        <th>Nama</th>
                                                        <th width="300px">Kehadiran</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $no=1;
                                                    $mahasantri = $this->db->where('id_kelompok', $row->id_kelompok)->where('jenis_kelamin', $jenis_kelamin)->get('mahasantri');
                                                    foreach ($mahasantri->result() as $m) :
                                                ?>
                                                    <tr>
                                                        <td><?= $no; ?></td>
                                                        <td>
                                                            <input  type="hidden" class="form-control" id="nim" name="nim[]" value="<?= $m->nim; ?> ">
                                                            <?= $m->nim; ?></td>
                                                        <td>
                                                            <input  type="hidden" class="form-control" id="nama" name="nama[]" value="<?= $m->nama_santri; ?> ">
                                                            <input  type="hidden" class="form-control" id="kelompok" name="kelompok[]" value="<?= $m->id_kelompok; ?> ">
                                                            <?= $m->nama_santri; ?></td>
                                                        <td>
                                                            <div class="form-group">
                                                              <select class="form-control" name="kehadiran[]" id="">
                                                                <option value="Hadir">Hadir</option>
                                                                <option value="Alfa">Alfa</option>
                                                                <option value="Izin">Izin</option>
                                                                <option value="Sakit">Sakit</option>
                                                              </select>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php $no++; endforeach; ?>
                                                </tbody>
                                            </table>
                                                
                                                
                                                    <button type="submit" class="btn btn-primary btn-lg btn-block">Ambil Absen</button>
                                        </form>
                                        </div>
                                        <?php endforeach; ?>
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