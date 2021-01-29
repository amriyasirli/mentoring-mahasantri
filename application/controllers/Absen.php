<?php 
class Absen extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('Absen_model');
        $this->load->model('Kelompok_model');
		$this->load->model('Materi_model');
		if($this->session->userdata('role_id') == "")
		{
			redirect('Auth');
		}
        
        }

	public function index ()
	{
		$data = [
            'title' => 'Absen',
            'ikhwan' => 'Laki-Laki',
            'akhwat' => 'Perempuan',
            'jml_ikhwan' => $this->db->where('jenis_kelamin', 'Laki-Laki')->get('mahasantri')->num_rows(),
            'jml_akhwat' => $this->db->where('jenis_kelamin', 'Perempuan')->get('mahasantri')->num_rows(),
        ];
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('absen/jenis_kelamin', $data);
        $this->load->view('template/footer');
	}
    public function kelompok ($url)
    {
        // $t = "Amri";
		// $u = "OWZ3VkU0MExXYmdvaDV1ZnVZTzc1QT09";
		
		$jenis_kelamin = decrypt_url($url);
		$hari = [
			'Minggu',
			'Senin',
			'Selasa',
			'Rabu',
			'Kamis',
			'Jumat',
			'Sabtu',
		];
        $data = [
            'title' => 'Absen',
            'kelompok' => $this->Kelompok_model->show()->result(),
			'hari' => $hari[date('w')],
			'jenis_kelamin'=> $jenis_kelamin,
			'tanggal'=> date('Y-m-d'),
        ];
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('absen/kelompok', $data);
        $this->load->view('template/footer');
    }
    
    public function ambil_absen ()
	{
		date_default_timezone_set('Asia/Jakarta'); 
		$tanggal = date('Y-m-d');
		$nim = $this->input->post('nim[]');
		$nama_santri = $this->input->post('nama[]');
		$kelompok = $this->input->post('kelompok[]');
		$jadwal = $this->input->post('jadwal');
		$kehadiran = $this->input->post('kehadiran[]');
		if(count($nim) == 0){
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert"> Tidak ada anggota kelompok!</div>');
			redirect('Absen');		
		}else{
			for ($i=0; $i < count($nim); $i++) { 

				$data = [
					'tanggal_absen' =>$tanggal,
					'nim' =>$nim[$i],
					'id_kelompok' =>$kelompok[$i],
					'id_jadwal' => $jadwal,
					'kehadiran' =>$kehadiran[$i],
				];
				$this->db->insert('absen', $data);
			}
	
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"> Pengambilan Absen Berhasil!</div>');
			redirect('Absen');
		}
		
	}
    
    
    
}
?>