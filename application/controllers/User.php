<?php 
class User extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Mahasantri_model');
        $this->load->model('Musrif_model');
		if($this->session->userdata('role_id') == "")
		{
			redirect('Auth');
		}
        
        }

	public function profil ($url)
	{
        $id = decrypt_url($url);
        $data['role'] = $this->session->userdata('role_id');
        $data['jurusan'] = $this->db->get('jurusan')->result();

        if($data['role'] == 1){
            $data['user'] = $this->db->where('id_musrif', $id)->get('musrif')->row();
        }else{
            $data['user'] = $this->User_model->show($id)->row();
        }

        $data['title'] = 'Profil';
        
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('user/profil', $data);
        $this->load->view('template/footer');
    }
    
    public function update_profil ($url)
    {
        $id = decrypt_url($url);
        $data['role'] = $this->session->userdata('role_id');
        if($data['role'] == 1){
            $this->form_validation->set_rules('nama', 'Nama', 'required|trim',[
                'required'=> 'Wajib diisi !',
            ]);
            $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim',[
                'required'=> 'Wajib diisi !',
            ]);
        }else{
            $this->form_validation->set_rules('nama', 'Nama', 'required|trim',[
                'required'=> 'Wajib diisi !',
            ]);
            $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim',[
                'required'=> 'Wajib diisi !',
            ]);
            $this->form_validation->set_rules('jurusan', 'Jurusan', 'required|trim',[
                'required'=> 'Wajib diisi !',
            ]);
        }
        

        if($this->form_validation->run() == false){
            $data['role'] = $this->session->userdata('role_id');

            if($data['role'] == 1){
                $data['user'] = $this->db->where('id_musrif', $id)->get('musrif')->row();
            }else{
                $data['user'] = $this->User_model->show($id)->row();
            }

            $data['title'] = 'Profil';
            
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('user/profil', $data);
            $this->load->view('template/footer');
        }else{
            if($data['role'] == 1){
                $data = [
                    'nama_musrif'=>$this->input->post('nama'),
                    'gender_musrif'=>$this->input->post('jenis_kelamin'),
                ];
                $this->Musrif_model->update($id,$data);
            }else{
                $data = [
                    'nama_santri'=>$this->input->post('nama'),
                    'jenis_kelamin'=>$this->input->post('jenis_kelamin'),
                    'id_jurusan'=>$this->input->post('jurusan'),
                ];
                $this->Mahasantri_model->update($id,$data);
            }
            

            // Beri pesan sukses
            $this->session->set_flashdata('pesan', '<span class="alert alert-info mb-2">Data berhasil diupdate !</span>');
            redirect('User/profil/'.encrypt_url($id));
        }
    }

    public function ganti_password ($url)
    {
        $id = decrypt_url($url);
        // var_dump($id);
        // die();
        $data['role'] = $this->session->userdata('role_id');
        $this->form_validation->set_rules('password_lama', 'Password Lama', 'required|trim',[
            'required'=> 'Wajib diisi !',
        ]);
        $this->form_validation->set_rules('password1', 'Password 1', 'required|trim|min_length[8]|matches[password2]',[
            'required'=> 'Wajib diisi !',
            'min_length'=> 'Minimal 8 karakter!',
            'matches'=> 'Password tidak cocok !',
        ]);
        $this->form_validation->set_rules('password2', 'Password 2', 'required|trim',[
            'required'=> 'Wajib diisi !',
        ]);

        if($this->form_validation->run() == false){
            $data['role'] = $this->session->userdata('role_id');

            if($data['role'] == 1){
                $data['user'] = $this->db->where('id_musrif', $id)->get('musrif')->row();
            }else{
                $data['user'] = $this->User_model->show($id)->row();
            }

            $data['title'] = 'Profil';
            // Beri pesan error
            $this->session->set_flashdata('pesan', '<p class="alert alert-danger mb-2">Data tidak valid, ulang kembali !</p>');
            
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('user/profil', $data);
            $this->load->view('template/footer');
        }else{
            $password = $this->input->post('password_lama');
            // $password2 = $this->input->post('password2');
            // var_dump($password2);
            // die();
            
            if($data['role'] == 1){
                $musrif = $this->User_model->musrif($id)->row();
                if (password_verify($password, $musrif->password)) {
                    $data_musrif = [
                        'password'=>password_hash($this->input->post('password2'),PASSWORD_DEFAULT),
                    ];
                    $this->Musrif_model->update($id,$data_musrif);
    
                    $this->session->set_flashdata('pesan', '<p class="alert alert-success">Password Berhasil Di Ubah</p>');
                    redirect('User/profil/'.encrypt_url($id));
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Password Salah !</div>');
                    redirect('User/profil/'.encrypt_url($id));
                }
            }else{
                $mahasantri = $this->User_model->mahasantri($id)->row();
            //     var_dump(password_verify($password, $mahasantri->password));
            // die();
                if (password_verify($password, $mahasantri->password)) {
                    $data_santri = [
                        'password'=>password_hash($this->input->post('password2'),PASSWORD_DEFAULT),
                    ];
                    $this->Mahasantri_model->update($id,$data_santri);
    
                    $this->session->set_flashdata('pesan', '<p class="alert alert-success">Password Berhasil Di Ubah</p>');
                    redirect('User/profil/'.encrypt_url($id));
                    
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Password Salah !</div>');
                    redirect('User/profil/'.encrypt_url($id));
                }
            }
            // Beri pesan sukses
            
        }
    }
    
    
    
    
}
?>