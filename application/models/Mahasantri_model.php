<?php 
class Mahasantri_model extends CI_Model { 

    public function show ()
    {
        $this->db->select('*');
        $this->db->join('jurusan', 'jurusan.id_jurusan=mahasantri.id_jurusan');
        $this->db->join('kelompok', 'kelompok.id_kelompok=mahasantri.id_kelompok');
        return $this->db->get('mahasantri');
    }
    
    public function get_by_id ($id)
    {
        $this->db->where('', $id);
        return $this->db->get('');
    }
    
    public function insert ($data)
    {
        return $this->db->insert('mahasantri', $data);
    }
    
    public function update ($id,$data)
    {
        $this->db->where('nim', $id);
        $this->db->update('mahasantri', $data);
    }
    
    public function delete ($id)
    {
        $this->db->where('nim', $id);
        $this->db->delete('mahasantri');
    }
    
 }
?>