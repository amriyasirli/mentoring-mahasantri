<?php 
class Pemateri_model extends CI_Model { 

    public function show ()
    {
        $this->db->select('*');
        return $this->db->get('pemateri');
    }
    
    public function get_by_id ($id)
    {
        $this->db->where('id_pemateri', $id);
        return $this->db->get('pemateri');
    }
    
    public function insert ($data)
    {
        return $this->db->insert('pemateri', $data);
    }
    
    public function update ($id,$data)
    {
        $this->db->where('id_pemateri', $id);
        $this->db->update('pemateri', $data);
    }
    
    public function delete ($id)
    {
        $this->db->where('id_pemateri', $id);
        $this->db->delete('pemateri');
    }
    
 }
?>