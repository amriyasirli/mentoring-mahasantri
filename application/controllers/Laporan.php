<?php 
class Laporan extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('Laporan_model');
		if($this->session->userdata('role_id') == "")
		{
			redirect('Auth');
		}
        
        }

	public function index ()
	{
        // $id = decrypt_url($url);

        // if($data['role'] == 1){
        //     $data['user'] = $this->db->join('')->where('id_musrif', $id)->get('musrif')->row();
        // }else{
        //     $data['user'] = $this->User_model->show($id)->row();
        // }

        $data = [
            'title'=>"Laporan",
            'kelompok'=>$this->Laporan_model->kelompok()->result(),
            'materi'=>$this->Laporan_model->materi_()->result(),
            'jurusan'=>$this->db->get('jurusan')->result(),
            // 'absen'=>$this->Laporan_model->absen()->result(),
            // 'mahasantri'=>$this->Laporan_model->mahasantri()->result(),
        ];
        
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('laporan/index', $data);
        $this->load->view('template/footer');
    }
    
    public function absen ()
    {
        $pdf=new FPDF('P','mm', 'A4');

        $start = substr($this->input->get('datefilter'),0,10);
        $tgl_start = substr($this->input->get('datefilter'),8,2);
        $bulan_start = substr($this->input->get('datefilter'),5,2);
        $tahun_start = substr($this->input->get('datefilter'),0,4);

        $end = substr($this->input->get('datefilter'),11,10);
        $tgl_end = substr($this->input->get('datefilter'),19,2);
        $bulan_end = substr($this->input->get('datefilter'),16,2);
        $tahun_end = substr($this->input->get('datefilter'),11,4);

        $periode = $this->input->get('datefilter');
        $kelompok = $this->input->get('kelompok');
        $jenis_kelamin = $this->input->get('jenis_kelamin');
        // $kelompok = $this->input->post('kelas');
        // $mapel = $this->input->post('mapel');

        $k = $this->db->where('id_kelompok',$kelompok)->get('kelompok')->row();
        $nama_kelompok= $k->kelompok;
        // $nama_walikelas= $i->nama_user;
        // $nip= $i->username;

        

        $halaman = $this->db->select('absen.tanggal_absen as tanggal_absen')
                            // ->select('absen.id_jadwal as id_jadwal')
                            ->join('jadwal', 'jadwal.id_jadwal=absen.id_jadwal')
                            ->where('tanggal_absen >=', $start)
                            ->where('tanggal_absen <=',$end)
                            ->order_by('tanggal_absen ASC')
                            ->group_by('tanggal_absen')
                            ->get('absen')->result();

        $array_bulan = [
			"",
			"Januari",
			"Februari",
			"Maret",
			"April",
			"Mei",
			"Juni",
			"Juli",
			"Agustus",
			"September",
			"Oktober",
			"November",
			"Desember",
		];
        

foreach ($halaman as $key => $hal) {
    $materi = $this->db->join('materi', 'materi.id_materi=jadwal.materi')
                        // ->where('jadwal.id_jadwal',$hal->id_jadwal)
                        ->get('jadwal')->row();

    $no = 1;
            # code...
            $tgl[] = $hal->tanggal_absen;
        $pdf->AddPage();

        $pdf->Image(base_url('assets/images/logo_iain.png'),25,14,15,0,'PNG');
        // $pdf->Image(base_url('assets/img/logosumbar.png'),171,16,22,0,'PNg');
        $pdf->SetFont('Arial','',9);
		$pdf->Cell(155);
		$pdf->Cell(10,1,'Dicetak pada: '. date('d-m-Y'),0,1);
        $pdf->SetFont('Arial','B',10);
		$pdf->Cell(10,9,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(0,5,'ABSEN MENTORING',0,1,'C');
        $pdf->Cell(0,5,'MAHAD AL JAMI`AH IAIN BUKITINGGI',0,1,'C');
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(0,5,'Tahun Ajaran 2020/2021',0,1,'C');
        $pdf->Cell(10,6,'',0,1);
        $pdf->Cell(10,6,'',0,1);
        // $pdf->Cell(0,1,'_________________________________________________________________________________________________________________________________',0,1,'C');
		
        $pdf->SetFont('Arial','B',10);
        
        // Hari 
        $pdf->SetFont('Arial','',10);
        // Tanggal
        $pdf->Cell(15);
        $pdf->Cell(20,5,'Tanggal',0,0,'L');
        $pdf->Cell(3,5,':',0,0,'L');
        $pdf->Cell(15,5,$tgl[$key],0,1,'L');
        // Kelas
        $pdf->Cell(15);
        $pdf->Cell(20,5,'Kelompok',0,0,'L');
        $pdf->Cell(3,5,':',0,0,'L');
        $pdf->Cell(15,5,$nama_kelompok.' ('.$jenis_kelamin.')',0,1,'L');
        // semester
        $pdf->Cell(15);
        $pdf->Cell(20,5,'Materi',0,0,'L');
        $pdf->Cell(3,5,':',0,0,'L');
        $pdf->Cell(15,5,$materi->materi,0,1,'L');
		
        $pdf->Cell(5,6,' ',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(15);
        $pdf->Cell(8,10,'No.',1,0,'C');
        $pdf->Cell(40,10,'Nama',1,0,'C');
        $pdf->Cell(56,5,'Kehadiran',1,0,'C');
        $pdf->Cell(50,10,'Keterangan',1,0,'C');
        $pdf->Cell(25,5,'',0,1,'C');
        $pdf->Cell(63);
        $pdf->Cell(14,5,'Hadir',1,0,'C');
        $pdf->Cell(14,5,'Alfa',1,0,'C');
        $pdf->Cell(14,5,'Sakit',1,0,'C');
        $pdf->Cell(14,5,'Izin',1,1,'C');
        

        $mahasantri = $this->db->where('id_kelompok',$kelompok)->where('jenis_kelamin',$jenis_kelamin)->get('mahasantri')->result();
        $array_hadir=[];
        $array_alfa=[];
        $array_sakit=[];
        $array_izin=[];
        foreach ($mahasantri as $value) {
            
            $absen = $this->Laporan_model->tanggal($hal->tanggal_absen,$kelompok,$value->nim)->result();
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(15);
            $pdf->Cell(8,5,$no,1,0,'C');
            $pdf->Cell(40,5,$value->nama_santri,1,0,'L');
            
            foreach ($absen as $row) {
                # code...
                $hadir = "";
                $alfa = "";
                $sakit = "";
                $izin = "";
                
                if($row->kehadiran == "Hadir"){
                    $hadir = "v";
                    $array_hadir[] = 1;
                }if($row->kehadiran == "Alfa"){
                    $alfa = "-";
                    $array_alfa[] = 1;
                }if($row->kehadiran == "Sakit"){
                    $sakit = "s";
                    $array_sakit[] = 1;
                }if($row->kehadiran == "Izin"){
                    $izin = "i";
                    $array_izin[] = 1;
                }
            }
            $pdf->Cell(14,5,$hadir,1,0,'C');
            $pdf->Cell(14,5,$alfa,1,0,'C');
            $pdf->Cell(14,5,$sakit,1,0,'C');
            $pdf->Cell(14,5,$izin,1,0,'C');
            $pdf->Cell(50,5,'',1,1,'L');
        $no++;
        }

        $pdf->Cell(5,6,' ',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(15);
        $pdf->Cell(48,10,'Jumlah',1,0,'C');
        $pdf->Cell(14,5,'Hadir',1,0,'C');
        $pdf->Cell(14,5,'Alfa',1,0,'C');
        $pdf->Cell(14,5,'Sakit',1,0,'C');
        $pdf->Cell(14,5,'Izin',1,0,'C');
        $pdf->Cell(25,5,'',0,1,'C');
        $pdf->Cell(63);
        $pdf->Cell(14,5,$this->db->where('kehadiran', 'Hadir')->where('id_kelompok', $kelompok)->where('tanggal_absen', $hal->tanggal_absen)->get('absen')->num_rows(),1,0,'C');
        $pdf->Cell(14,5,$this->db->where('kehadiran', 'Alfa')->where('id_kelompok', $kelompok)->where('tanggal_absen', $hal->tanggal_absen)->get('absen')->num_rows(),1,0,'C');
        $pdf->Cell(14,5,$this->db->where('kehadiran', 'Sakit')->where('id_kelompok', $kelompok)->where('tanggal_absen', $hal->tanggal_absen)->get('absen')->num_rows(),1,0,'C');
        $pdf->Cell(14,5,$this->db->where('kehadiran', 'Izin')->where('id_kelompok', $kelompok)->where('tanggal_absen', $hal->tanggal_absen)->get('absen')->num_rows(),1,1,'C');

        $pdf->SetFont('Arial','',10);
        $pdf->AcceptPageBreak();
        $pdf->Cell(10,10,'',0,1);
        $pdf->Cell(20);
        $pdf->Cell(100,5,'Mengetahui',0,0,'L');
        $pdf->Cell(0,5,'.................., '. date('d').' '.$array_bulan[date('n')].' '.date('Y'),0,1,'L');
        $pdf->Cell(20);
        $pdf->Cell(100,5,'Ketua Mahad Al-Jami`ah',0,0,'L');
        $pdf->Cell(0,5,'Pembina,',0,1,'L');
        $pdf->Cell(10,10,'',0,1);
        $pdf->Cell(20)	;
        $pdf->SetFont('Arial','BU',10);
        $pdf->Cell(100,5,'FIRMAN RUSYDI, S.Pd, M.T',0,0,'L');
        $pdf->Cell(10,5,'(....................................)',0,1,'L');
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(20)	;
        $pdf->Cell(100,5,'NIP. 197309122005011003',0,0,'L');
        $pdf->Cell(10,5,'',0,0,'L');
        $pdf->SetFont('Arial','',10);
        
    
}
        $pdf->Output();
    }

    public function kelompok ()
    {
        $pdf=new FPDF('P','mm', 'A4');

        $kelompok = $this->input->get('kelompok');
        if($kelompok =="all"){
            
        }else{
            $kelompok_data = $this->db->where('kelompok.id_kelompok',$kelompok)->join('mahasantri', 'mahasantri.id_kelompok=kelompok.id_kelompok')->get('kelompok')->row();

        }
        $array_bulan = [
			"",
			"Januari",
			"Februari",
			"Maret",
			"April",
			"Mei",
			"Juni",
			"Juli",
			"Agustus",
			"September",
			"Oktober",
			"November",
			"Desember",
		];


            # code...
        $pdf->AddPage();

        $pdf->Image(base_url('assets/images/logo_iain.png'),25,14,15,0,'PNG');
        // $pdf->Image(base_url('assets/img/logosumbar.png'),171,16,22,0,'PNg');
        $pdf->SetFont('Arial','',9);
		$pdf->Cell(155);
		$pdf->Cell(10,1,'Dicetak pada: '. date('d-m-Y'),0,1);
        $pdf->SetFont('Arial','B',10);
		$pdf->Cell(10,9,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(0,5,'DATA MAHASANTRI',0,1,'C');
        $pdf->Cell(0,5,'MAHAD AL JAMI`AH IAIN BUKITINGGI',0,1,'C');
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(0,5,'Tahun Ajaran 2020/2021',0,1,'C');
        $pdf->Cell(10,6,'',0,1);
        $pdf->Cell(10,6,'',0,1);
        // $pdf->Cell(0,1,'_________________________________________________________________________________________________________________________________',0,1,'C');
		
        $pdf->SetFont('Arial','B',10);
        
        // Hari 
        $pdf->SetFont('Arial','',10);
        // Tanggal
        $pdf->Cell(25);
        $pdf->Cell(20,5,'Tanggal',0,0,'L');
        $pdf->Cell(3,5,':',0,0,'L');
        $pdf->Cell(15,5,date('d').' '.$array_bulan[date('n')].' '.date('Y'),0,1,'L');
        // // semester
        // $pdf->Cell(15);
        // $pdf->Cell(20,5,'Materi',0,0,'L');
        // $pdf->Cell(3,5,':',0,0,'L');
        // $pdf->Cell(15,5,'',0,1,'L');
		
        $pdf->Cell(5,6,' ',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(25);
        $pdf->Cell(8,6,'No.',1,0,'C');
        $pdf->Cell(50,6,'Mahasantri',1,0,'C');
        $pdf->Cell(25,6,'Nim',1,0,'C');
        $pdf->Cell(25,6,'Kelompok',1,0,'C');
        $pdf->Cell(30,6,'Jurusan',1,1,'C');
        // $pdf->Cell(30,6,'Status AKun',1,1,'C');
        

        if($kelompok == "all"){
            $mahasantri = $this->db
                    ->join('jurusan', 'jurusan.id_jurusan=mahasantri.id_jurusan')
                    ->join('kelompok', 'kelompok.id_kelompok=mahasantri.id_kelompok')
                    ->order_by('mahasantri.nama_santri', 'ASC')
                    ->order_by('mahasantri.id_jurusan', 'ASC')
                    ->order_by('mahasantri.id_kelompok', 'ASC')
                    ->get('mahasantri')
                    ->result();
        }else{

            $mahasantri = $this->db
                    ->where('mahasantri.id_kelompok', $kelompok)
                    ->join('jurusan', 'jurusan.id_jurusan=mahasantri.id_jurusan')
                    ->join('kelompok', 'kelompok.id_kelompok=mahasantri.id_kelompok')
                    ->order_by('mahasantri.nama_santri', 'ASC')
                    ->order_by('mahasantri.id_kelompok', 'ASC')
                    ->order_by('mahasantri.id_jurusan', 'ASC')
                    ->get('mahasantri')
                    ->result();
        }
        $no = 1;
        $pdf->SetFont('Arial','',10);
        foreach ($mahasantri as $value) {
            $pdf->Cell(25);
            $pdf->Cell(8,6,$no,1,0,'C');
            $pdf->Cell(50,6,' '.$value->nama_santri,1,0,'L');
            $pdf->Cell(25,6,' '.$value->nim,1,0,'C');
            $pdf->Cell(25,6,$value->kelompok,1,0,'C');
            $pdf->Cell(30,6,$value->jurusan,1,1,'C');
            // $pdf->Cell(30,6,$value->status_aktif,1,1,'C');
        $no++;
        }      
		
		
        $pdf->SetFont('Arial','',10);
        $pdf->AcceptPageBreak();
        $pdf->Cell(10,10,'',0,1);
        $pdf->Cell(30);
        $pdf->Cell(80,5,'Mengetahui',0,0,'L');
        if($kelompok =="all"){
            
            $pdf->Cell(0,5,'',0,1,'L');
        }else{

            $pdf->Cell(0,5,'',0,1,'L');
        }
        // $pdf->Cell(0,5,'',0,1,'L');
        $pdf->Cell(30);
        $pdf->Cell(80,5,'Ketua Pengurus',0,0,'L');
        if($kelompok =="all"){
            
            $pdf->Cell(0,5,'',0,1,'L');
        }else{

            $pdf->Cell(0,5,'',0,1,'L'); # wali kelas
        }
        $pdf->Cell(10,10,'',0,1);
        $pdf->Cell(30)	;
        $pdf->SetFont('Arial','BU',10);
        $pdf->Cell(80,5,'FIRMAN RUSYDI, S.Pd, M.T',0,0,'L');
        if($kelompok =="all"){
            
            $pdf->Cell(10,5,'',0,1,'L');
        }else{

            $pdf->Cell(10,5,'',0,1,'L');
        }
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(30)	;
        $pdf->Cell(80,5,'NIP. 197309122005011003',0,0,'L');
        if($kelompok =="all"){

        }else{

            $pdf->Cell(10,5,'',0,0,'L');
        }
        
    

        $pdf->Output();
    }

    public function jurusan ()
    {
        $pdf=new FPDF('P','mm', 'A4');

        $jurusan = $this->input->get('jurusan');
        if($jurusan =="all"){
            
        }else{
            $jurusan_data = $this->db->where('jurusan.id_jurusan',$jurusan)->join('mahasantri', 'mahasantri.id_jurusan=jurusan.id_jurusan')->get('jurusan')->row();

        }
        $array_bulan = [
			"",
			"Januari",
			"Februari",
			"Maret",
			"April",
			"Mei",
			"Juni",
			"Juli",
			"Agustus",
			"September",
			"Oktober",
			"November",
			"Desember",
		];


            # code...
        $pdf->AddPage();

        $pdf->Image(base_url('assets/images/logo_iain.png'),25,14,15,0,'PNG');
        // $pdf->Image(base_url('assets/img/logosumbar.png'),171,16,22,0,'PNg');
        $pdf->SetFont('Arial','',9);
		$pdf->Cell(155);
		$pdf->Cell(10,1,'Dicetak pada: '. date('d-m-Y'),0,1);
        $pdf->SetFont('Arial','B',10);
		$pdf->Cell(10,9,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(0,5,'DATA MAHASANTRI',0,1,'C');
        $pdf->Cell(0,5,'MAHAD AL JAMI`AH IAIN BUKITINGGI',0,1,'C');
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(0,5,'Tahun Ajaran 2020/2021',0,1,'C');
        $pdf->Cell(10,6,'',0,1);
        $pdf->Cell(10,6,'',0,1);
        // $pdf->Cell(0,1,'_________________________________________________________________________________________________________________________________',0,1,'C');
		
        $pdf->SetFont('Arial','B',10);
        
        // Hari 
        $pdf->SetFont('Arial','',10);
        // Tanggal
        $pdf->Cell(25);
        $pdf->Cell(20,5,'Tanggal',0,0,'L');
        $pdf->Cell(3,5,':',0,0,'L');
        $pdf->Cell(15,5,date('d').' '.$array_bulan[date('n')].' '.date('Y'),0,1,'L');
        // // semester
        // $pdf->Cell(15);
        // $pdf->Cell(20,5,'Materi',0,0,'L');
        // $pdf->Cell(3,5,':',0,0,'L');
        // $pdf->Cell(15,5,'',0,1,'L');
		
        $pdf->Cell(5,6,' ',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(25);
        $pdf->Cell(8,6,'No.',1,0,'C');
        $pdf->Cell(50,6,'Mahasantri',1,0,'C');
        $pdf->Cell(25,6,'Nim',1,0,'C');
        $pdf->Cell(25,6,'Kelompok',1,0,'C');
        $pdf->Cell(30,6,'Jurusan',1,1,'C');
        // $pdf->Cell(30,6,'Status AKun',1,1,'C');
        

        if($jurusan == "all"){
            $mahasantri = $this->db
                    ->join('kelompok', 'kelompok.id_kelompok=mahasantri.id_kelompok')
                    ->join('jurusan', 'jurusan.id_jurusan=mahasantri.id_jurusan')
                    ->order_by('mahasantri.nama_santri', 'ASC')
                    ->order_by('mahasantri.id_jurusan', 'ASC')
                    ->order_by('mahasantri.id_jurusan', 'ASC')
                    ->get('mahasantri')
                    ->result();
        }else{

            $mahasantri = $this->db
                    ->where('mahasantri.id_jurusan', $jurusan)
                    ->join('kelompok', 'kelompok.id_kelompok=mahasantri.id_kelompok')
                    ->join('jurusan', 'jurusan.id_jurusan=mahasantri.id_jurusan')
                    ->order_by('mahasantri.nama_santri', 'ASC')
                    ->order_by('mahasantri.id_jurusan', 'ASC')
                    ->order_by('mahasantri.id_jurusan', 'ASC')
                    ->get('mahasantri')
                    ->result();
        }
        $no = 1;
        $pdf->SetFont('Arial','',10);
        foreach ($mahasantri as $value) {
            $pdf->Cell(25);
            $pdf->Cell(8,6,$no,1,0,'C');
            $pdf->Cell(50,6,' '.$value->nama_santri,1,0,'L');
            $pdf->Cell(25,6,' '.$value->nim,1,0,'C');
            $pdf->Cell(25,6,$value->kelompok,1,0,'C');
            $pdf->Cell(30,6,$value->jurusan,1,1,'C');
            // $pdf->Cell(30,6,$value->status_aktif,1,1,'C');
        $no++;
        }      
		
		
        $pdf->SetFont('Arial','',10);
        $pdf->AcceptPageBreak();
        $pdf->Cell(10,10,'',0,1);
        $pdf->Cell(30);
        $pdf->Cell(80,5,'Mengetahui',0,0,'L');
        if($jurusan =="all"){
            
            $pdf->Cell(0,5,'',0,1,'L');
        }else{

            $pdf->Cell(0,5,'',0,1,'L');
        }
        // $pdf->Cell(0,5,'',0,1,'L');
        $pdf->Cell(30);
        $pdf->Cell(80,5,'Ketua Pengurus',0,0,'L');
        if($jurusan =="all"){
            
            $pdf->Cell(0,5,'',0,1,'L');
        }else{

            $pdf->Cell(0,5,'',0,1,'L'); # wali kelas
        }
        $pdf->Cell(10,10,'',0,1);
        $pdf->Cell(30)	;
        $pdf->SetFont('Arial','BU',10);
        $pdf->Cell(80,5,'FIRMAN RUSYDI, S.Pd, M.T',0,0,'L');
        if($jurusan =="all"){
            
            $pdf->Cell(10,5,'',0,1,'L');
        }else{

            $pdf->Cell(10,5,'',0,1,'L');
        }
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(30)	;
        $pdf->Cell(80,5,'NIP. 197309122005011003',0,0,'L');
        if($jurusan =="all"){

        }else{

            $pdf->Cell(10,5,'',0,0,'L');
        }
        
    

        $pdf->Output();
    }
    
    public function musrif ()
    {
        $pdf=new FPDF('P','mm', 'A4');

        $array_bulan = [
			"",
			"Januari",
			"Februari",
			"Maret",
			"April",
			"Mei",
			"Juni",
			"Juli",
			"Agustus",
			"September",
			"Oktober",
			"November",
			"Desember",
		];


            # code...
        $pdf->AddPage();

        $pdf->Image(base_url('assets/images/logo_iain.png'),25,14,15,0,'PNG');
        // $pdf->Image(base_url('assets/img/logosumbar.png'),171,16,22,0,'PNg');
        $pdf->SetFont('Arial','',9);
		$pdf->Cell(155);
		$pdf->Cell(10,1,'Dicetak pada: '. date('d-m-Y'),0,1);
        $pdf->SetFont('Arial','B',10);
		$pdf->Cell(10,9,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(0,5,'DATA PEMBINA',0,1,'C');
        $pdf->Cell(0,5,'MAHAD AL JAMI`AH IAIN BUKITINGGI',0,1,'C');
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(0,5,'Tahun Ajaran 2020/2021',0,1,'C');
        $pdf->Cell(10,6,'',0,1);
        $pdf->Cell(10,6,'',0,1);
        // $pdf->Cell(0,1,'_________________________________________________________________________________________________________________________________',0,1,'C');
		
        $pdf->SetFont('Arial','B',10);
        
        // Hari 
        $pdf->SetFont('Arial','',10);
        // Tanggal
        $pdf->Cell(25);
        $pdf->Cell(20,5,'Tanggal',0,0,'L');
        $pdf->Cell(3,5,':',0,0,'L');
        $pdf->Cell(15,5,date('d').' '.$array_bulan[date('n')].' '.date('Y'),0,1,'L');
        // // semester
        // $pdf->Cell(15);
        // $pdf->Cell(20,5,'Materi',0,0,'L');
        // $pdf->Cell(3,5,':',0,0,'L');
        // $pdf->Cell(15,5,'',0,1,'L');
		
        $pdf->Cell(5,6,' ',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(25);
        $pdf->Cell(8,6,'No.',1,0,'C');
        $pdf->Cell(60,6,'Nama Musrif',1,0,'C');
        $pdf->Cell(30,6,'Username',1,0,'C');
        $pdf->Cell(30,6,'Jenis Kelamin',1,1,'C');
        // $pdf->Cell(30,6,'Status AKun',1,1,'C');
        

        $musrif = $this->db
                ->order_by('nama_musrif', 'ASC')
                ->get('musrif')
                ->result();
        
        $no = 1;
        $pdf->SetFont('Arial','',10);
        foreach ($musrif as $value) {
            $pdf->Cell(25);
            $pdf->Cell(8,6,$no,1,0,'C');
            $pdf->Cell(60,6,' '.$value->nama_musrif,1,0,'L');
            $pdf->Cell(30,6,' '.$value->username,1,0,'L');
            $pdf->Cell(30,6,$value->gender_musrif,1,1,'C');
            // $pdf->Cell(30,6,$value->status_aktif,1,1,'C');
        $no++;
        }      
		
		
        $pdf->SetFont('Arial','',10);
        $pdf->AcceptPageBreak();
        $pdf->Cell(10,10,'',0,1);
        $pdf->Cell(30);
        $pdf->Cell(80,5,'Mengetahui',0,0,'L');
        $pdf->Cell(0,5,'',0,1,'L');
        // $pdf->Cell(0,5,'',0,1,'L');
        $pdf->Cell(30);
        $pdf->Cell(80,5,'Ketua Pengurus',0,0,'L');
        $pdf->Cell(0,5,'',0,1,'L');
        $pdf->Cell(10,10,'',0,1);
        $pdf->Cell(30)	;
        $pdf->SetFont('Arial','BU',10);
        $pdf->Cell(80,5,'FIRMAN RUSYDI, S.Pd, M.T',0,0,'L');
        $pdf->Cell(10,5,'',0,1,'L');
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(30)	;
        $pdf->Cell(80,5,'NIP. 197309122005011003',0,0,'L');
        $pdf->Cell(10,5,'',0,0,'L');
        
        $pdf->Output();
    }

    public function pemateri ()
    {
        $pdf=new FPDF('P','mm', 'A4');

        $array_bulan = [
			"",
			"Januari",
			"Februari",
			"Maret",
			"April",
			"Mei",
			"Juni",
			"Juli",
			"Agustus",
			"September",
			"Oktober",
			"November",
			"Desember",
		];


            # code...
        $pdf->AddPage();

        $pdf->Image(base_url('assets/images/logo_iain.png'),25,14,15,0,'PNG');
        // $pdf->Image(base_url('assets/img/logosumbar.png'),171,16,22,0,'PNg');
        $pdf->SetFont('Arial','',9);
		$pdf->Cell(155);
		$pdf->Cell(10,1,'Dicetak pada: '. date('d-m-Y'),0,1);
        $pdf->SetFont('Arial','B',10);
		$pdf->Cell(10,9,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(0,5,'DATA PEMATERI',0,1,'C');
        $pdf->Cell(0,5,'MAHAD AL JAMI`AH IAIN BUKITINGGI',0,1,'C');
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(0,5,'Tahun Ajaran 2020/2021',0,1,'C');
        $pdf->Cell(10,6,'',0,1);
        $pdf->Cell(10,6,'',0,1);
        // $pdf->Cell(0,1,'_________________________________________________________________________________________________________________________________',0,1,'C');
		
        $pdf->SetFont('Arial','B',10);
        
        // Hari 
        $pdf->SetFont('Arial','',10);
        // Tanggal
        $pdf->Cell(25);
        $pdf->Cell(20,5,'Tanggal',0,0,'L');
        $pdf->Cell(3,5,':',0,0,'L');
        $pdf->Cell(15,5,date('d').' '.$array_bulan[date('n')].' '.date('Y'),0,1,'L');
        // // semester
        // $pdf->Cell(15);
        // $pdf->Cell(20,5,'Materi',0,0,'L');
        // $pdf->Cell(3,5,':',0,0,'L');
        // $pdf->Cell(15,5,'',0,1,'L');
		
        $pdf->Cell(5,6,' ',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(45);
        $pdf->Cell(8,6,'No.',1,0,'C');
        $pdf->Cell(60,6,'Nama Pemateri',1,1,'C');
        // $pdf->Cell(30,6,'Status AKun',1,1,'C');
        

        $data = $this->db
                ->order_by('nama_pemateri', 'ASC')
                ->get('pemateri')
                ->result();
        
        $no = 1;
        $pdf->SetFont('Arial','',10);
        foreach ($data as $value) {
            $pdf->Cell(45);
            $pdf->Cell(8,6,$no,1,0,'C');
            $pdf->Cell(60,6,' '.$value->nama_pemateri,1,1,'L');
            // $pdf->Cell(30,6,$value->status_aktif,1,1,'C');
        $no++;
        }      
		
		
        $pdf->SetFont('Arial','',10);
        $pdf->AcceptPageBreak();
        $pdf->Cell(10,10,'',0,1);
        $pdf->Cell(30);
        $pdf->Cell(80,5,'Mengetahui',0,0,'L');
        $pdf->Cell(0,5,'',0,1,'L');
        // $pdf->Cell(0,5,'',0,1,'L');
        $pdf->Cell(30);
        $pdf->Cell(80,5,'Ketua Pengurus',0,0,'L');
        $pdf->Cell(0,5,'',0,1,'L');
        $pdf->Cell(10,10,'',0,1);
        $pdf->Cell(30)	;
        $pdf->SetFont('Arial','BU',10);
        $pdf->Cell(80,5,'FIRMAN RUSYDI, S.Pd, M.T',0,0,'L');
        $pdf->Cell(10,5,'',0,1,'L');
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(30)	;
        $pdf->Cell(80,5,'NIP. 197309122005011003',0,0,'L');
        $pdf->Cell(10,5,'',0,0,'L');
        
        $pdf->Output();
    }

    public function materi ()
    {
        $pdf=new FPDF('P','mm', 'A4');

        $array_bulan = [
			"",
			"Januari",
			"Februari",
			"Maret",
			"April",
			"Mei",
			"Juni",
			"Juli",
			"Agustus",
			"September",
			"Oktober",
			"November",
			"Desember",
		];


            # code...
        $pdf->AddPage();

        $pdf->Image(base_url('assets/images/logo_iain.png'),25,14,15,0,'PNG');
        // $pdf->Image(base_url('assets/img/logosumbar.png'),171,16,22,0,'PNg');
        $pdf->SetFont('Arial','',9);
		$pdf->Cell(155);
		$pdf->Cell(10,1,'Dicetak pada: '. date('d-m-Y'),0,1);
        $pdf->SetFont('Arial','B',10);
		$pdf->Cell(10,9,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(0,5,'DATA MATERI MENTORING',0,1,'C');
        $pdf->Cell(0,5,'MAHAD AL JAMI`AH IAIN BUKITINGGI',0,1,'C');
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(0,5,'Tahun Ajaran 2020/2021',0,1,'C');
        $pdf->Cell(10,6,'',0,1);
        $pdf->Cell(10,6,'',0,1);
        // $pdf->Cell(0,1,'_________________________________________________________________________________________________________________________________',0,1,'C');
		
        $pdf->SetFont('Arial','B',10);
        
        // Hari 
        $pdf->SetFont('Arial','',10);
        // Tanggal
        $pdf->Cell(25);
        $pdf->Cell(20,5,'Tanggal',0,0,'L');
        $pdf->Cell(3,5,':',0,0,'L');
        $pdf->Cell(15,5,date('d').' '.$array_bulan[date('n')].' '.date('Y'),0,1,'L');
        // // semester
        // $pdf->Cell(15);
        // $pdf->Cell(20,5,'Materi',0,0,'L');
        // $pdf->Cell(3,5,':',0,0,'L');
        // $pdf->Cell(15,5,'',0,1,'L');
		
        $pdf->Cell(5,6,' ',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(45);
        $pdf->Cell(8,6,'No.',1,0,'C');
        $pdf->Cell(60,6,'Materi',1,1,'C');
        // $pdf->Cell(30,6,'Status AKun',1,1,'C');
        

        $data = $this->db
                ->order_by('materi', 'ASC')
                ->get('materi')
                ->result();
        
        $no = 1;
        $pdf->SetFont('Arial','',10);
        foreach ($data as $value) {
            $pdf->Cell(45);
            $pdf->Cell(8,6,$no,1,0,'C');
            $pdf->Cell(60,6,' '.$value->materi,1,1,'L');
            // $pdf->Cell(30,6,$value->status_aktif,1,1,'C');
        $no++;
        }      
		
		
        $pdf->SetFont('Arial','',10);
        $pdf->AcceptPageBreak();
        $pdf->Cell(10,10,'',0,1);
        $pdf->Cell(30);
        $pdf->Cell(80,5,'Mengetahui',0,0,'L');
        $pdf->Cell(0,5,'',0,1,'L');
        // $pdf->Cell(0,5,'',0,1,'L');
        $pdf->Cell(30);
        $pdf->Cell(80,5,'Ketua Pengurus',0,0,'L');
        $pdf->Cell(0,5,'',0,1,'L');
        $pdf->Cell(10,10,'',0,1);
        $pdf->Cell(30)	;
        $pdf->SetFont('Arial','BU',10);
        $pdf->Cell(80,5,'FIRMAN RUSYDI, S.Pd, M.T',0,0,'L');
        $pdf->Cell(10,5,'',0,1,'L');
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(30)	;
        $pdf->Cell(80,5,'NIP. 197309122005011003',0,0,'L');
        $pdf->Cell(10,5,'',0,0,'L');
        
        $pdf->Output();
    }

    public function jurusan_ ()
    {
        $pdf=new FPDF('P','mm', 'A4');

        $array_bulan = [
			"",
			"Januari",
			"Februari",
			"Maret",
			"April",
			"Mei",
			"Juni",
			"Juli",
			"Agustus",
			"September",
			"Oktober",
			"November",
			"Desember",
		];


            # code...
        $pdf->AddPage();

        $pdf->Image(base_url('assets/images/logo_iain.png'),25,14,15,0,'PNG');
        // $pdf->Image(base_url('assets/img/logosumbar.png'),171,16,22,0,'PNg');
        $pdf->SetFont('Arial','',9);
		$pdf->Cell(155);
		$pdf->Cell(10,1,'Dicetak pada: '. date('d-m-Y'),0,1);
        $pdf->SetFont('Arial','B',10);
		$pdf->Cell(10,9,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(0,5,'DATA JURUSAN',0,1,'C');
        $pdf->Cell(0,5,'MAHAD AL JAMI`AH IAIN BUKITINGGI',0,1,'C');
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(0,5,'Tahun Ajaran 2020/2021',0,1,'C');
        $pdf->Cell(10,6,'',0,1);
        $pdf->Cell(10,6,'',0,1);
        // $pdf->Cell(0,1,'_________________________________________________________________________________________________________________________________',0,1,'C');
		
        $pdf->SetFont('Arial','B',10);
        
        // Hari 
        $pdf->SetFont('Arial','',10);
        // Tanggal
        $pdf->Cell(25);
        $pdf->Cell(20,5,'Tanggal',0,0,'L');
        $pdf->Cell(3,5,':',0,0,'L');
        $pdf->Cell(15,5,date('d').' '.$array_bulan[date('n')].' '.date('Y'),0,1,'L');
        // // semester
        // $pdf->Cell(15);
        // $pdf->Cell(20,5,'Materi',0,0,'L');
        // $pdf->Cell(3,5,':',0,0,'L');
        // $pdf->Cell(15,5,'',0,1,'L');
		
        $pdf->Cell(5,6,' ',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(45);
        $pdf->Cell(8,6,'No.',1,0,'C');
        $pdf->Cell(60,6,'Nama Jurusan',1,1,'C');
        // $pdf->Cell(30,6,'Status AKun',1,1,'C');
        

        $data = $this->db
                ->order_by('jurusan', 'ASC')
                ->get('jurusan')
                ->result();
        
        $no = 1;
        $pdf->SetFont('Arial','',10);
        foreach ($data as $value) {
            $pdf->Cell(45);
            $pdf->Cell(8,6,$no,1,0,'C');
            $pdf->Cell(60,6,' '.$value->jurusan,1,1,'L');
            // $pdf->Cell(30,6,$value->status_aktif,1,1,'C');
        $no++;
        }      
		
		
        $pdf->SetFont('Arial','',10);
        $pdf->AcceptPageBreak();
        $pdf->Cell(10,10,'',0,1);
        $pdf->Cell(30);
        $pdf->Cell(80,5,'Mengetahui',0,0,'L');
        $pdf->Cell(0,5,'',0,1,'L');
        // $pdf->Cell(0,5,'',0,1,'L');
        $pdf->Cell(30);
        $pdf->Cell(80,5,'Ketua Pengurus',0,0,'L');
        $pdf->Cell(0,5,'',0,1,'L');
        $pdf->Cell(10,10,'',0,1);
        $pdf->Cell(30)	;
        $pdf->SetFont('Arial','BU',10);
        $pdf->Cell(80,5,'FIRMAN RUSYDI, S.Pd, M.T',0,0,'L');
        $pdf->Cell(10,5,'',0,1,'L');
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(30)	;
        $pdf->Cell(80,5,'NIP. 197309122005011003',0,0,'L');
        $pdf->Cell(10,5,'',0,0,'L');
        
        $pdf->Output();
    }
    
    
    
}
?>