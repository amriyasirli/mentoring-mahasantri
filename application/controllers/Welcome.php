<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct(){
		parent::__construct();
			if($this->session->userdata('role_id') == "")
			{
				redirect('Auth');
			}
		}

	public function index()
	{
		$data = [
			'title'=>"Dashboard",
			'mahasantri'=>$this->db->get('mahasantri')->num_rows(),
			'musrif'=>$this->db->get('musrif')->num_rows(),
			'materi'=>$this->db->get('materi')->num_rows(),
			'pemateri'=>$this->db->get('pemateri')->num_rows(),
			'jurusan'=>$this->db->get('jurusan')->num_rows(),
			'kelompok'=>$this->db->get('kelompok')->num_rows(),
			'jadwal'=>$this->db->select('*')
								->join('kelompok', 'kelompok.id_kelompok=jadwal.id_kelompok')
								->join('materi', 'materi.id_materi=jadwal.materi')
								->join('pemateri', 'pemateri.id_pemateri=jadwal.pemateri')
								->limit(5)
								->order_by('jadwal.id_jadwal DESC')
								->get('jadwal')->result(),
		];
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('template/topbar');
		$this->load->view('index', $data);
		$this->load->view('template/footer');
	}
}
