<?php 
class Jadwal extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('Jadwal_model');
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
            'title' => 'Jadwal',
            'jadwal' => $this->Jadwal_model->show()->result(),
            'materi' => $this->db->get('materi')->result(),
            'pemateri' => $this->db->get('pemateri')->result(),
            'kelompok' => $this->db->get('kelompok')->result(),
            // 'text' => encrypt_url($t),
            // 'text2' => decrypt_url($u),
        ];
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('jadwal/list', $data);
        $this->load->view('template/footer');
    }

    public function user ($url)
    {
        $kelompok = decrypt_url($url);
        $jenis_kelamin = $this->session->userdata('jenis_kelamin');
        $data = [
            'title' => 'Jadwal',
            'jadwal'=> $this->Jadwal_model->user($kelompok,$jenis_kelamin)->result(),
        ];

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('jadwal/user', $data);
        $this->load->view('template/footer');
    }
    
    public function create ()
    {
        $this->form_validation->set_rules('kelompok', 'Kelompok', 'required|trim',[
            'required'=> 'Wajib diisi !',
        ]);
        $this->form_validation->set_rules('pemateri', 'Pemateri', 'required|trim',[
            'required'=> 'Wajib diisi !',
        ]);
        $this->form_validation->set_rules('materi', 'Materi', 'required|trim',[
            'required'=> 'Wajib diisi !',
        ]);
        $this->form_validation->set_rules('hari', 'Hari', 'required|trim',[
            'required'=> 'Wajib diisi !',
        ]);
        $this->form_validation->set_rules('jam', 'Jam', 'required|trim',[
            'required'=> 'Wajib diisi !',
        ]);
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim',[
            'required'=> 'Wajib diisi !',
        ]);

        if($this->form_validation->run() == false){
            $data = [
                'title' => 'Jadwal',
                'jadwal' => $this->Jadwal_model->show()->result(),
                'materi' => $this->db->get('materi')->result(),
                'pemateri' => $this->db->get('pemateri')->result(),
                'kelompok' => $this->db->get('kelompok')->result(),
            ];
            // Beri pesan error
            $this->session->set_flashdata('pesan', '<span class="alert alert-danger mb-2">Data tidak valid, ulang kembali !</span>');

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('jadwal/list', $data);
            $this->load->view('template/footer');
        }else{
            // $this->form_validation->set_rules('hari', 'Hari', 'is_unique[jadwal.hari]',[
            //     'is_unique'=> 'Jadwal bentrok !',
            // ]);
            // if($this->form_validation->run() == false){

            // }
            $query = $this->db->get('jadwal')->result();
            foreach($query as $row){
                if($row->hari == $this->input->post('hari'))
                {
                    // var_dump($this->input->post('jam'));
                    // var_dump(substr($row->jam,0,5));
                    // die();
                    if(substr($row->jam,0,5) == $this->input->post('jam'))
                    {
                        $data = [
                            'title' => 'Jadwal',
                            'jadwal' => $this->Jadwal_model->show()->result(),
                            'materi' => $this->db->get('materi')->result(),
                            'pemateri' => $this->db->get('pemateri')->result(),
                            'kelompok' => $this->db->get('kelompok')->result(),
                        ];
                        
                        $this->session->set_flashdata('pesan', 
                        '<span class="alert alert-danger mb-2">
                        Jadwal Bentrok !</span>');
                        
                        redirect('Jadwal');

                        break;

                    }if(substr($row->jam,0,5) != $this->input->post('jam')){
                        $data = [
                            'id_kelompok'=>$this->input->post('kelompok'),
                            'materi'=>$this->input->post('materi'),
                            'pemateri'=>$this->input->post('pemateri'),
                            'hari'=>$this->input->post('hari'),
                            'jam'=>$this->input->post('jam'),
                            'jadwal_jenis_kelamin'=>$this->input->post('jenis_kelamin'),
                        ];
                        $this->Jadwal_model->insert($data);
                        // Beri pesan sukses
                        $this->session->set_flashdata('pesan', '<span class="alert alert-warning mb-2">Data berhasil ditambahkan !</span>');
                        redirect('Jadwal');

                        break;
                    }
                }
            }
            $data = [
                'id_kelompok'=>$this->input->post('kelompok'),
                'materi'=>$this->input->post('materi'),
                'pemateri'=>$this->input->post('pemateri'),
                'hari'=>$this->input->post('hari'),
                'jam'=>$this->input->post('jam'),
                'jadwal_jenis_kelamin'=>$this->input->post('jenis_kelamin'),
            ];

            $this->Jadwal_model->insert($data);
            // Beri pesan sukses
            $this->session->set_flashdata('pesan', '<span class="alert alert-success mb-2">Data berhasil ditambahkan !</span>');
            redirect('Jadwal');
        }
    }
    
    public function update ($url)
    {
        $id = decrypt_url($url);
        $this->form_validation->set_rules('kelompok', 'Kelompok', 'required|trim',[
            'required'=> 'Wajib diisi !',
        ]);
        $this->form_validation->set_rules('materi', 'Materi', 'required|trim',[
            'required'=> 'Wajib diisi !',
        ]);
        $this->form_validation->set_rules('pemateri', 'Pemateri', 'required|trim',[
            'required'=> 'Wajib diisi !',
        ]);
        $this->form_validation->set_rules('hari', 'Hari', 'required|trim',[
            'required'=> 'Wajib diisi !',
        ]);
        $this->form_validation->set_rules('jam', 'Jam', 'required|trim',[
            'required'=> 'Wajib diisi !',
        ]);
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim',[
            'required'=> 'Wajib diisi !',
        ]);

        if($this->form_validation->run() == false){
            $data = [
                'title' => 'Jadwal',
                'jadwal' => $this->Jadwal_model->show()->result(),
                'kelompok' => $this->db->get('kelompok')->result(),
                'materi' => $this->db->get('materi')->result(),
                'pemateri' => $this->db->get('pemateri')->result(),
            ];
            // Beri pesan error
            $this->session->set_flashdata('pesan', '<span class="alert alert-danger mb-2">Data tidak valid, ulang kembali !</span>');

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('jadwal/list', $data);
            $this->load->view('template/footer');
        }else{
            $data = [
                'id_kelompok'=>$this->input->post('kelompok'),
                'materi'=>$this->input->post('materi'),
                'pemateri'=>$this->input->post('pemateri'),
                'hari'=>$this->input->post('hari'),
                'jam'=>$this->input->post('jam'),
                'jadwal_jenis_kelamin'=>$this->input->post('jenis_kelamin'),
            ];

            $this->Jadwal_model->update($id,$data);
            // Beri pesan sukses
            $this->session->set_flashdata('pesan', '<span class="alert alert-info mb-2">Data berhasil diupdate !</span>');
            redirect('Jadwal');
        }
    }
    
    public function delete ($url)
    {
        $id = decrypt_url($url);
        $this->Jadwal_model->delete($id);
        $this->session->set_flashdata('pesan', '<span class="alert alert-danger mb-2">Data berhasil dihapus !</span>');
        redirect('Jadwal');
    }
    
}
?>