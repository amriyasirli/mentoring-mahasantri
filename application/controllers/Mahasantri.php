<?php 
class Mahasantri extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('Mahasantri_model');
        if($this->session->userdata('role_id') == "")
			{
				redirect('Auth');
			}
        }

    public function index ()
    {
        // $t = "Amri";
        // $u = "OWZ3VkU0MExXYmdvaDV1ZnVZTzc1QT09";
        $data = [
            'title' => 'Mahasantri',
            'mahasantri' => $this->Mahasantri_model->show()->result(),
            'jurusan' => $this->db->get('jurusan')->result(),
            'kelompok' => $this->db->get('kelompok')->result(),
            // 'text' => encrypt_url($t),
            // 'text2' => decrypt_url($u),
        ];
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('mahasantri/list', $data);
        $this->load->view('template/footer');
    }
    
    public function create ()
    {
        $this->form_validation->set_rules('nim', 'Nim', 'required|trim|is_unique[mahasantri.nim]|min_length[7]|numeric',[
            'numeric'=> 'Hanya angka !',
            'min_length'=> 'Minimal 7 angka !',
            'required'=> 'Wajib diisi !',
            'is_unique'=> 'Nim ini sudah ada sebelumnya !',
        ]);
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim',[
            'required'=> 'Wajib diisi !',
        ]);
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim',[
            'required'=> 'Wajib diisi !',
        ]);
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required|trim',[
            'required'=> 'Wajib diisi !',
        ]);
        $this->form_validation->set_rules('kelompok', 'Kelompok', 'required|trim',[
            'required'=> 'Wajib diisi !',
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]',[
            'required'=> 'Wajib diisi !',
            'min_length'=> 'Minimal 8 karakter !',
        ]);

        if($this->form_validation->run() == false){
            $data = [
                'title' => 'Mahasantri',
                'mahasantri' => $this->Mahasantri_model->show()->result(),
                'jurusan' => $this->db->get('jurusan')->result(),
                'kelompok' => $this->db->get('kelompok')->result(),
            ];
            // Beri pesan error
            $this->session->set_flashdata('pesan', '<span class="alert alert-danger mb-2">Data tidak valid, ulang kembali !</span>');

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('mahasantri/list', $data);
            $this->load->view('template/footer');
        }else{
            $data = [
                'nim'=>$this->input->post('nim'),
                'nama_santri'=>$this->input->post('nama'),
                'jenis_kelamin'=>$this->input->post('jenis_kelamin'),
                'id_jurusan'=>$this->input->post('jurusan'),
                'id_kelompok'=>$this->input->post('kelompok'),
                'password'=>password_hash($this->input->post('password'),PASSWORD_DEFAULT),
                'role_id'=>2,
            ];

            $this->Mahasantri_model->insert($data);
            // Beri pesan sukses
            $this->session->set_flashdata('pesan', '<span class="alert alert-success mb-2">Data berhasil ditambahkan !</span>');
            redirect('Mahasantri');
        }
    }
    
    public function update ($url)
    {
        $id = decrypt_url($url);
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim',[
            'required'=> 'Wajib diisi !',
        ]);
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim',[
            'required'=> 'Wajib diisi !',
        ]);
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required|trim',[
            'required'=> 'Wajib diisi !',
        ]);
        $this->form_validation->set_rules('kelompok', 'Kelompok', 'required|trim',[
            'required'=> 'Wajib diisi !',
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]',[
            'required'=> 'Wajib diisi !',
            'min_length'=> 'Minimal 8 karakter !',
        ]);

        if($this->form_validation->run() == false){
            $data = [
                'title' => 'Mahasantri',
                'mahasantri' => $this->Mahasantri_model->show()->result(),
                'jurusan' => $this->db->get('jurusan')->result(),
                'kelompok' => $this->db->get('kelompok')->result(),
            ];
            // Beri pesan error
            $this->session->set_flashdata('pesan', '<span class="alert alert-danger mb-2">Data tidak valid, ulang kembali !</span>');

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('mahasantri/list', $data);
            $this->load->view('template/footer');
        }else{
            $data = [
                'nama_santri'=>$this->input->post('nama'),
                'jenis_kelamin'=>$this->input->post('jenis_kelamin'),
                'id_jurusan'=>$this->input->post('jurusan'),
                'id_kelompok'=>$this->input->post('kelompok'),
                'password'=>password_hash($this->input->post('password'),PASSWORD_DEFAULT),
            ];

            $this->Mahasantri_model->update($id,$data);
            // Beri pesan sukses
            $this->session->set_flashdata('pesan', '<span class="alert alert-info mb-2">Data berhasil diupdate !</span>');
            redirect('Mahasantri');
        }
    }
    
    public function delete ($url)
    {
        $id = decrypt_url($url);
        $this->Mahasantri_model->delete($id);
        $this->session->set_flashdata('pesan', '<span class="alert alert-danger mb-2">Data berhasil dihapus !</span>');
        redirect('Mahasantri');
    }
    
}
?>