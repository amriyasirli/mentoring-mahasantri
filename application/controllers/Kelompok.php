<?php 
class Kelompok extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('Kelompok_model');
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
            'title' => 'Data Kelompok',
            'kelompok' => $this->Kelompok_model->show()->result(),
        ];
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('kelompok/list', $data);
        $this->load->view('template/footer');
    }
    
    public function create ()
    {
        $this->form_validation->set_rules('kelompok', 'Kelompok', 'required|trim|is_unique[kelompok.kelompok]',[
            'required'=> 'Wajib diisi !',
            'is_unique'=> 'Nama kelompok sudah ada !',
        ]);

        if($this->form_validation->run() == false){
            $data = [
                'title' => 'Data Kelompok',
                'kelompok' => $this->Kelompok_model->show()->result(),
            ];
            // Beri pesan error
            $this->session->set_flashdata('pesan', '<span class="alert alert-danger mb-2">Data tidak valid, ulang kembali !</span>');

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('kelompok/list', $data);
            $this->load->view('template/footer');
        }else{
            $data = [
                'kelompok'=>$this->input->post('kelompok'),
            ];

            $this->Kelompok_model->insert($data);
            // Beri pesan sukses
            $this->session->set_flashdata('pesan', '<span class="alert alert-success mb-2">Data berhasil ditambahkan !</span>');
            redirect('Kelompok');
        }
    }
    
    public function update ($url)
    {
        $id = decrypt_url($url);
        $this->form_validation->set_rules('kelompok', 'Kelompok', 'required|trim',[
            'required'=> 'Wajib diisi !',
        ]);

        if($this->form_validation->run() == false){
            $data = [
                'title' => 'Data Kelompok',
                'kelompok' => $this->Kelompok_model->show()->result(),
            ];
            // Beri pesan error
            $this->session->set_flashdata('pesan', '<span class="alert alert-danger mb-2">Data tidak valid, ulang kembali !</span>');

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('kelompok/list', $data);
            $this->load->view('template/footer');
        }else{
            $data = [
                'kelompok'=>$this->input->post('kelompok'),
            ];

            $this->Kelompok_model->update($id,$data);
            // Beri pesan sukses
            $this->session->set_flashdata('pesan', '<span class="alert alert-info mb-2">Data berhasil diupdate !</span>');
            redirect('Kelompok');
        }
    }
    
    public function delete ($url)
    {
        $id = decrypt_url($url);
        $this->Kelompok_model->delete($id);
        $this->session->set_flashdata('pesan', '<span class="alert alert-danger mb-2">Data berhasil dihapus !</span>');
        redirect('Kelompok');
    }
    
}
?>