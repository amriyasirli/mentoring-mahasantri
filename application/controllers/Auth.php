<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');

    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim',
        [
            'required' => 'Wajib diisi!',
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[5]',
        [
            'min_length' => 'Password terlalu pendek!',
            'required' => 'Password wajib diisi!',
        ]);

        if ($this->form_validation->run() == false) {

            $data['title'] = 'Login';
            $this->load->view('template/header',$data);
            $this->load->view('auth/login');

        } else {
            $this->_login();
        }
    }


    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $mahasantri = $this->Auth_model->mahasantri($username)->row();
        $musrif = $this->Auth_model->musrif($username)->row();

        if ($mahasantri) {
            if (password_verify($password, $mahasantri->password)) {
                $data = [
                    'id' => $mahasantri->nim,
                    'nama' => $mahasantri->nama_santri,
                    'jenis_kelamin' => $mahasantri->jenis_kelamin,
                    'jurusan' => $mahasantri->jurusan,
                    'id_kelompok' => $mahasantri->id_kelompok,
                    'kelompok' => $mahasantri->kelompok,
                    'role_id' => $mahasantri->role_id,
                ];
                $this->session->set_userdata($data);

                $this->session->set_flashdata('pesan', '<p class="alert alert-success">Selamat Datang, '. $this->session->userdata('nama') . '</p>');
                redirect('Welcome');
                
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Password Salah !</div>');
                redirect('Auth');
            }
        } if($musrif){
            if (password_verify($password, $musrif->password)) {
                $data = [
                    'id' => $musrif->id_musrif,
                    'nama' => $musrif->nama_musrif,
                    'jenis_kelamin' => $musrif->gender_musrif,
                    'username' => $musrif->username,
                    'password' => $musrif->password,
                    'role_id' => $musrif->role_id,
                ];
                $this->session->set_userdata($data);

                $this->session->set_flashdata('pesan', '<p class="alert alert-success">Selamat Datang, '. $this->session->userdata('nama') . '</p>');
                redirect('Welcome');
                
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Password Salah !</div>');
                redirect('Auth');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Username tidak terdaftar !</div>');
            redirect('Auth');
        }
        
    }


    public function register()
	{
        $this->form_validation->set_rules('nama_user', 'Nama User','required|trim',
        [
            'required' => 'Nama Wajib diisi!'
        ]);
        $this->form_validation->set_rules('posisi', 'Poisi','required|trim',
        [
            'required' => 'Posisi Wajib diisi!'
        ]);
		$this->form_validation->set_rules('username', 'Username','required|trim|is_unique[user.username]', [
			'is_unique' => 'Nomor Hp ini sudah digunakan!',
			'required' => 'No Hp/Wa Wajib diisi!'
		]);
		$this->form_validation->set_rules('password1', 'Password','required|trim|min_length[8]|matches[password2]', [
			'matches'=>'Kata sandi tidak cocok!',
            'min_length' => 'Kata sandi terlalu pendek!',
            'required' => 'Kata sandi Wajib diisi!'
        ]);
        $this->form_validation->set_rules('perusahaan', 'Perusahaan','required|trim', [
            'required' => 'Pilih perusahaan tempat bekerja!'
		]);
		$this->form_validation->set_rules('password2', 'Password','required|trim|matches[password1]');


		if($this->form_validation->run() == false)
		{
			$data['title'] = 'Daftar Akun';
			$this->load->view('auth/register', $data);

		} else { 
			$data = [
				'id_user' => rand(10,500),
				'nama_user' => htmlspecialchars($this->input->post('nama_user', true)),
				'username' => htmlspecialchars($this->input->post('username', true)),
				'foto_user' => 'default/default.jpg',
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'id_perusahaan' => $this->input->post('perusahaan'),
				'id_posisi' => $this->input->post('posisi'),
				'level'=> 3,
				'is_active' => 0,
				'date_created' => time()
			]; 
			$this->Pengguna_model->insert($data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"> Selamat, akun sudah terdaftar! Namun admin perlu memverifikasi akun anda terlebih dahulu </div>');
            redirect('Auth');
		}
	}

    public function register_action ()
    {
        $id_user = rand(10,500);
        $nama_user = $this->input->post('nama_user');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        $this->form_validation->set_rules(
            'email', 'Email',
            'required|is_unique[user.email_user]',
            array(
                    'required'      => 'Wajib Diisi!.',
                    'is_unique'     => 'email ini sudah terdaftar!.'
            )
        );
        if ($this->form_validation->run() == true) {
            $upload_image = $_FILES['foto'];
            //pengaturan upload foto
            $config['file_name']        = 'Foto_'.$nip;
            $config['allowed_types'] = 'svg|jpg|png|jpeg';
            $config['max_size']     = '2048';
            $config['upload_path'] = './assets/img/';
            
            //upload foto dan data
            // $this->upload->initialize($config);
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('foto')) {
                $foto = $this->upload->data('file_name');   

                $data = [
                    'id_pembimbing' => $id_pembimbing,
                    'nip' => $nip,
                    'nama_pembimbing' => $nama,
                    'email_pembimbing' => $email,
                    'password_pembimbing' => $password,
                    'foto_pembimbing' => $foto,
                ];

                $data_user = [
                    'id_user'=>$nip,
                    'email_user' => $email,
                    'nama_user' => $nama,
                    'password_user' => $password,
                    'level' => 2
                ];

                $this->Pembimbing_model->insert($data);
                $this->db->insert('user', $data_user);
                $this->session->set_flashdata('pesan', '<div class="text-center"><div class="text text-success mb-2" role="text">Registrasi Berhasil !</div></div>');
                redirect('Auth');
            } else {
                echo $this->upload->display_errors();
            }
        }else{
            $this->session->set_flashdata('pesan', '<h5 class="text text-danger mb-2">Email ini sudah terdaftar, silahkan gunakan email lain!</h5>');
            redirect('Auth/reg_guru');
        }
    }


    public function logout()
    {
        $this->session->unset_userdata('id_musrif');
        $this->session->unset_userdata('nim');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('kelompok');
        $this->session->unset_userdata('jenis_kelamin');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('password');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('pesan', '<div class="text text-success text-center mb-2" role="text">Silahkan login kembali !</div>');
        redirect('Auth');
    }


    public function blocked()
    {
        $data['title'] = 'Ooops... !';

        $this->load->view('auth/blocked', $data);
    }
}
