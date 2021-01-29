<?php 
class Materi_model extends CI_Model { 

    public function show ()
    {
        $this->db->select('*');
        return $this->db->get('materi');
    }
    
    public function get_by_id ($id)
    {
        $this->db->where('id_materi', $id);
        return $this->db->get('materi');
    }
    
    public function insert ($data)
    {
        return $this->db->insert('materi', $data);
    }
    
    public function update ($id,$data)
    {
        $this->db->where('id_materi', $id);
        $this->db->update('materi', $data);
    }
    
    public function delete ($id)
    {
        $this->db->where('id_materi', $id);
        $this->db->delete('materi');
    }
    
 }
?>