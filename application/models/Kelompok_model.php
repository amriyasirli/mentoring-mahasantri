<?php 
class Kelompok_model extends CI_Model { 

    public function show ()
    {
        $this->db->select('*');
        $this->db->order_by('kelompok.kelompok ASC');
        return $this->db->get('kelompok');
    }
    
    public function get_by_id ($id)
    {
        $this->db->where('id_kelompok', $id);
        return $this->db->get('kelompok');
    }
    
    public function insert ($data)
    {
        return $this->db->insert('kelompok', $data);
    }
    
    public function update ($id,$data)
    {
        $this->db->where('id_kelompok', $id);
        $this->db->update('kelompok', $data);
    }
    
    public function delete ($id)
    {
        $this->db->where('id_kelompok', $id);
        $this->db->delete('kelompok');
    }
    
 }
?>