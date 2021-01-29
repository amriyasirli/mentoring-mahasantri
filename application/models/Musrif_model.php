<?php 
class Musrif_model extends CI_Model { 

    public function show ()
    {
        $this->db->select('*');
        return $this->db->get('musrif');
    }
    
    public function get_by_id ($id)
    {
        $this->db->where('id_musrif', $id);
        return $this->db->get('musrif');
    }
    
    public function insert ($data)
    {
        return $this->db->insert('musrif', $data);
    }
    
    public function update ($id,$data)
    {
        $this->db->where('id_musrif', $id);
        $this->db->update('musrif', $data);
    }
    
    public function delete ($id)
    {
        $this->db->where('id_musrif', $id);
        $this->db->delete('musrif');
    }
    
 }
?>