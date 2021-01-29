<?php 
class Kelas_model extends CI_Model { 

    public function show ()
    {
        $this->db->select('*');
        return $this->db->get('kelas');
    }
    
    public function get_by_id ($id)
    {
        $this->db->where('id_kelas', $id);
        return $this->db->get('kelas');
    }
    
    public function insert ($data)
    {
        return $this->db->insert('kelas', $data);
    }
    
    public function update ($id,$data)
    {
        $this->db->where('id_kelas', $id);
        $this->db->update('kelas', $data);
    }
    
    public function delete ($id)
    {
        $this->db->where('id_kelas', $id);
        $this->db->delete('kelas');
    }
    
 }
?>