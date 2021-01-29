<?php 
class User_model extends CI_Model { 

    public function show ($id)
    {
        $this->db->select('*');
        $this->db->where('mahasantri.nim', $id);
        $this->db->join('kelompok', 'kelompok.id_kelompok=mahasantri.id_kelompok');
        $this->db->join('jurusan', 'jurusan.id_jurusan=mahasantri.id_jurusan');
        return $this->db->get('mahasantri');
    }

    public function materi ($kelompok,$hari)
    {
        $this->db->select('*');
        $this->db->where('jadwal.id_kelompok', $kelompok);
        $this->db->where('jadwal.hari', $hari);
        $this->db->join('kelompok', 'kelompok.id_kelompok=jadwal.id_kelompok');
        $this->db->join('materi', 'materi.id_materi=jadwal.materi');
        $this->db->join('pemateri', 'pemateri.id_pemateri=jadwal.pemateri');
        return $this->db->get('jadwal');
    }
    
    public function get_by_id ($id)
    {
        $this->db->where('id_jadwal', $id);
        return $this->db->get('jadwal');
    }
    
    public function insert ($data)
    {
        return $this->db->insert('jadwal', $data);
    }
    
    public function update ($id,$data)
    {
        $this->db->where('id_jadwal', $id);
        $this->db->update('jadwal', $data);
    }
    
    public function delete ($id)
    {
        $this->db->where('id_jadwal', $id);
        $this->db->delete('jadwal');
    }

    public function mahasantri ($id)
    {
        $this->db->select('*');
        $this->db->join('kelompok', 'kelompok.id_kelompok=mahasantri.id_kelompok');
        $this->db->join('jurusan', 'jurusan.id_jurusan=mahasantri.id_jurusan');
        $this->db->where('mahasantri.nim', $id);
        return $this->db->get('mahasantri');
    }

    public function musrif ($id)
    {
        $this->db->select('*');
        $this->db->where('id_musrif', $id);
        return $this->db->get('musrif');
    }
    
 }
?>