<?php 
class Jurusan_model extends CI_Model { 

    public function show ()
    {
        $this->db->select('*');
        return $this->db->get('jurusan');
    }
    
    public function get_by_id ($id)
    {
        $this->db->where('id_jurusan', $id);
        return $this->db->get('jurusan');
    }
    
    public function insert ($data)
    {
        return $this->db->insert('jurusan', $data);
    }
    
    public function update ($id,$data)
    {
        $this->db->where('id_jurusan', $id);
        $this->db->update('jurusan', $data);
    }
    
    public function delete ($id)
    {
        $this->db->where('id_jurusan', $id);
        $this->db->delete('jurusan');
    }
    
 }
?>