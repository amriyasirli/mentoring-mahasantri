<?php 
class Materi extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('Materi_model');
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
            'title' => 'Data Materi',
            'materi' => $this->Materi_model->show()->result(),
        ];
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('materi/list', $data);
        $this->load->view('template/footer');
    }
    
    public function create ()
    {
        $this->form_validation->set_rules('materi', 'Materi', 'required|trim|is_unique[materi.materi]',[
            'required'=> 'Wajib diisi !',
            'is_unique'=> 'Materi sudah ada !',
        ]);

        if($this->form_validation->run() == false){
            $data = [
                'title' => 'Data Materi',
                'materi' => $this->Materi_model->show()->result(),
            ];
            // Beri pesan error
            $this->session->set_flashdata('pesan', '<span class="alert alert-danger mb-2">Data tidak valid, ulang kembali !</span>');

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('materi/list', $data);
            $this->load->view('template/footer');
        }else{
            $data = [
                'materi'=>$this->input->post('materi'),
            ];

            $this->Materi_model->insert($data);
            // Beri pesan sukses
            $this->session->set_flashdata('pesan', '<span class="alert alert-success mb-2">Data berhasil ditambahkan !</span>');
            redirect('Materi');
        }
    }
    
    public function update ($url)
    {
        $id = decrypt_url($url);
        $this->form_validation->set_rules('materi', 'Materi', 'required|trim',[
            'required'=> 'Wajib diisi !',
        ]);

        if($this->form_validation->run() == false){
            $data = [
                'title' => 'Data Materi',
                'materi' => $this->Materi_model->show()->result(),
            ];
            // Beri pesan error
            $this->session->set_flashdata('pesan', '<span class="alert alert-danger mb-2">Data tidak valid, ulang kembali !</span>');

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('materi/list', $data);
            $this->load->view('template/footer');
        }else{
            $data = [
                'materi'=>$this->input->post('materi'),
            ];

            $this->Materi_model->update($id,$data);
            // Beri pesan sukses
            $this->session->set_flashdata('pesan', '<span class="alert alert-info mb-2">Data berhasil diupdate !</span>');
            redirect('Materi');
        }
    }
    
    public function delete ($url)
    {
        $id = decrypt_url($url);
        $this->Materi_model->delete($id);
        $this->session->set_flashdata('pesan', '<span class="alert alert-danger mb-2">Data berhasil dihapus !</span>');
        redirect('Materi');
    }
    
}
?>