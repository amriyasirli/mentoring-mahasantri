
<body>
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->

    <!-- [ navigation menu ] start -->
    <nav class="pcoded-navbar">
        <div class="navbar-wrapper">
            <div class="navbar-brand header-logo">
               <a href="index.html" class="b-brand">
                   <div class="b-bg">
                       <i class="feather icon-smartphone"></i>
                   </div>
                   <span class="b-title">E - Mentor</span>
               </a>
               <a class="mobile-menu" id="mobile-collapse" href="javascript:"><span></span></a>
           </div>
            <div class="navbar-content scroll-div">
                <ul class="nav pcoded-inner-navbar">
                    <li class="nav-item pcoded-menu-caption">
                        <label>MENU</label>
                    </li>
                    <?php if($this->session->userdata('role_id')==1){ ?>
                        <li data-username="Home" class="nav-item">
                            <a href="<?= base_url('Welcome/') ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Home</span></a>
                        </li>
                        <li data-username="Mahasantri" class="nav-item">
                            <a href="<?= base_url('Mahasantri/') ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-user"></i></span><span class="pcoded-mtext">Mahasantri</span></a>
                        </li>
                        <li data-username="Jadwal" class="nav-item">
                            <a href="<?= base_url('Jadwal/') ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-calendar"></i></span><span class="pcoded-mtext">Jadwal</span></a>
                        </li>
                        <li data-username="Absen" class="nav-item">
                            <a href="<?= base_url('Absen/') ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-check-circle"></i></span><span class="pcoded-mtext">Absen</span></a>
                        </li>
                        <li data-username="Laporan" class="nav-item">
                            <a href="<?= base_url('Laporan/') ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-printer"></i></span><span class="pcoded-mtext">Cetak</span></a>
                        </li>
                        <li class="nav-item pcoded-menu-caption">
                            <label>DATA</label>
                        </li>
                        <li data-username="master data" class="nav-item pcoded-hasmenu pcoded">
                            <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Master Data</span></a>
                            <ul class="pcoded-submenu">
                                <li class=""><a href="<?= base_url('Musrif/') ?>" class="">Musrif</a></li>
                                <li class=""><a href="<?= base_url('Pemateri/') ?>" class="">Pemateri</a></li>
                                <li class=""><a href="<?= base_url('Jurusan/') ?>" class="">Jurusan</a></li>
                                <!-- <li class=""><a href="<?= base_url('Kelas/') ?>" class="">Kelas</a></li> -->
                                <li class=""><a href="<?= base_url('Kelompok/') ?>" class="">Kelompok</a></li>
                                <li class=""><a href="<?= base_url('Materi/') ?>" class="">Materi</a></li>
                            </ul>
                        </li>
                    <?php }else{ ?>
                        <li data-username="Home" class="nav-item">
                            <a href="<?= base_url('Welcome/') ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Home</span></a>
                        </li>
                        <li data-username="Jadwal" class="nav-item">
                            <a href="<?= base_url('Jadwal/user/'.encrypt_url($this->session->userdata('id_kelompok'))) ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-calendar"></i></span><span class="pcoded-mtext">Jadwal</span></a>
                        </li>
                        <li data-username="Profil" class="nav-item">
                            <a href="<?= base_url('User/profil/'. encrypt_url($this->session->userdata('id'))) ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-user"></i></span><span class="pcoded-mtext">Profil</span></a>
                        </li>
                    <?php } ?>
                    
                </ul>
            </div>
        </div>
    </nav>

    <nav class="navbar navbar-dark navbar-expand d-md-none d-lg-none d-xl-none fixed-bottom" style="background: #ffff; box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
        <ul class="navbar-nav nav-justified w-100">
        <li class="nav-item">
            <a href="<?= base_url('Welcome/') ?>" data-placement="top" title="Home" data-toggle="tooltip" class="nav-link"><i class="feather icon-home" style="color: grey; font-size: 20px;"></i></a>
        </li>
        
        <?php if($this->session->userdata('role_id') == 1){ ?>
            <li class="nav-item">
                <a href="<?= base_url('Jadwal/') ?>" data-placement="top" title="Jadwal" data-toggle="tooltip" class="nav-link"><i class="feather icon-calendar" style="color: grey; font-size: 20px;"></i></a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('Absen/') ?>" data-placement="top" title="Absen" data-toggle="tooltip" class="nav-link"><i class="feather icon-check-circle" style="color: grey; font-size: 20px;"></i></a>
            </li>
        <?php }else{ ?>
            <li class="nav-item">
                <a href="<?= base_url('Jadwal/user/'.encrypt_url($this->session->userdata('id_kelompok'))) ?>" data-placement="top" title="Jadwal" data-toggle="tooltip" class="nav-link"><i class="feather icon-calendar" style="color: grey; font-size: 20px;"></i></a>
            </li>
        <?php } ?>
        <!-- <li class="nav-item">
            <a href="<?= base_url('Pengumuman/') ?>" data-placement="top" title="Pengumuman" data-toggle="tooltip" class="nav-link"><i class="feather icon-bell" style="color: grey; font-size: 20px;"></i></a>
        </li> -->
        <li class="nav-item">
            <a href="<?= base_url('User/profil/'. encrypt_url($this->session->userdata('id'))) ?>" data-placement="top" title="Profil" data-toggle="tooltip" class="nav-link"><i class="feather icon-user" style="color: grey; font-size: 20px;"></i></a>
        </li>
        </ul>
    </nav>
    <!-- [ navigation menu ] end -->