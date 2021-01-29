<?php 
class Kelas extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('Kelas_model');
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
            'title' => 'Data Kelas',
            'kelas' => $this->Kelas_model->show()->result(),
        ];
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('kelas/list', $data);
        $this->load->view('template/footer');
    }
    
    public function create ()
    {
        $this->form_validation->set_rules('kelas', 'Kelas', 'required|trim|is_unique[kelas.kelas]',[
            'required'=> 'Wajib diisi !',
            'is_unique'=> 'Kelas sudah ada !',
        ]);

        if($this->form_validation->run() == false){
            $data = [
                'title' => 'Data Kelas',
                'kelas' => $this->Kelas_model->show()->result(),
            ];
            // Beri pesan error
            $this->session->set_flashdata('pesan', '<span class="alert alert-danger mb-2">Data tidak valid, ulang kembali !</span>');

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('kelas/list', $data);
            $this->load->view('template/footer');
        }else{
            $data = [
                'kelas'=>$this->input->post('kelas'),
            ];

            $this->Kelas_model->insert($data);
            // Beri pesan sukses
            $this->session->set_flashdata('pesan', '<span class="alert alert-success mb-2">Data berhasil ditambahkan !</span>');
            redirect('Kelas');
        }
    }
    
    public function update ($url)
    {
        $id = decrypt_url($url);
        $this->form_validation->set_rules('kelas', 'Kelas', 'required|trim',[
            'required'=> 'Wajib diisi !',
        ]);

        if($this->form_validation->run() == false){
            $data = [
                'title' => 'Data Kelas',
                'kelas' => $this->Kelas_model->show()->result(),
            ];
            // Beri pesan error
            $this->session->set_flashdata('pesan', '<span class="alert alert-danger mb-2">Data tidak valid, ulang kembali !</span>');

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('kelas/list', $data);
            $this->load->view('template/footer');
        }else{
            $data = [
                'kelas'=>$this->input->post('kelas'),
            ];

            $this->Kelas_model->update($id,$data);
            // Beri pesan sukses
            $this->session->set_flashdata('pesan', '<span class="alert alert-info mb-2">Data berhasil diupdate !</span>');
            redirect('Kelas');
        }
    }
    
    public function delete ($url)
    {
        $id = decrypt_url($url);
        $this->Kelas_model->delete($id);
        $this->session->set_flashdata('pesan', '<span class="alert alert-danger mb-2">Data berhasil dihapus !</span>');
        redirect('Kelas');
    }
    
}
?>