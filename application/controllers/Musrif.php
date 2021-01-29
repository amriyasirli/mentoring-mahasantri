<?php 
class Musrif extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('Musrif_model');
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
            'title' => 'Data Musrif',
            'musrif' => $this->Musrif_model->show()->result(),
        ];
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('musrif/list', $data);
        $this->load->view('template/footer');
    }
    
    public function create ()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim',[
            'required'=> 'Wajib diisi !',
        ]);
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[musrif.username]',[
            'required'=> 'Wajib diisi !',
            'is_unique'=> 'Username telah digunakan !',
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]',[
            'required'=> 'Wajib diisi !',
            'min_length'=> 'Minimal 8 karakter !',
        ]);

        if($this->form_validation->run() == false){
            $data = [
                'title' => 'Data Musrif',
                'musrif' => $this->Musrif_model->show()->result(),
            ];
            // Beri pesan error
            $this->session->set_flashdata('pesan', '<span class="alert alert-danger mb-2">Data tidak valid, ulang kembali !</span>');

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('musrif/list', $data);
            $this->load->view('template/footer');
        }else{
            $data = [
                'nama_musrif'=>$this->input->post('nama'),
                'gender_musrif'=>$this->input->post('gender'),
                'username'=>$this->input->post('username'),
                'password'=>password_hash($this->input->post('password'),PASSWORD_DEFAULT),
                'role_id'=>1,
            ];

            $this->Musrif_model->insert($data);
            // Beri pesan sukses
            $this->session->set_flashdata('pesan', '<span class="alert alert-success mb-2">Data berhasil ditambahkan !</span>');
            redirect('Musrif');
        }
    }
    
    public function update ($url)
    {
        $id = decrypt_url($url);
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim',[
            'required'=> 'Wajib diisi !',
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]',[
            'required'=> 'Wajib diisi !',
            'min_length'=> 'Minimal 8 karakter !',
        ]);

        if($this->form_validation->run() == false){
            $data = [
                'title' => 'Data Musrif',
                'musrif' => $this->Musrif_model->show()->result(),
            ];
            // Beri pesan error
            $this->session->set_flashdata('pesan', '<span class="alert alert-danger mb-2">Data tidak valid, ulang kembali !</span>');

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('musrif/list', $data);
            $this->load->view('template/footer');
        }else{
            $data = [
                'nama_musrif'=>$this->input->post('nama'),
                'gender_musrif'=>$this->input->post('gender'),
                'password'=>password_hash($this->input->post('password'),PASSWORD_DEFAULT),
            ];

            $this->Musrif_model->update($id,$data);
            // Beri pesan sukses
            $this->session->set_flashdata('pesan', '<span class="alert alert-info mb-2">Data berhasil diupdate !</span>');
            redirect('Musrif');
        }
    }
    
    public function delete ($url)
    {
        $id = decrypt_url($url);
        $this->Musrif_model->delete($id);
        $this->session->set_flashdata('pesan', '<span class="alert alert-danger mb-2">Data berhasil dihapus !</span>');
        redirect('Musrif');
    }

    
    
}
?>