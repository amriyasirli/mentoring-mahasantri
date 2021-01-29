<?php 
class Auth_model extends CI_Model { 

    public function mahasantri ($username)
    {
        $this->db->select('*');
        $this->db->join('kelompok', 'kelompok.id_kelompok=mahasantri.id_kelompok');
        $this->db->join('jurusan', 'jurusan.id_jurusan=mahasantri.id_jurusan');
        $this->db->where('mahasantri.nim', $username);
        return $this->db->get('mahasantri');
    }

    public function musrif ($username)
    {
        $this->db->select('*');
        $this->db->where('username', $username);
        return $this->db->get('musrif');
    }
    
 }
?>