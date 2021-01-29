<?php 
class Jadwal_model extends CI_Model { 

    public function show ()
    {
        $this->db->select('*');
        $this->db->join('kelompok', 'kelompok.id_kelompok=jadwal.id_kelompok');
        $this->db->join('materi', 'materi.id_materi=jadwal.materi');
        $this->db->join('pemateri', 'pemateri.id_pemateri=jadwal.pemateri');
        return $this->db->get('jadwal');
    }

    public function user ($kelompok,$jenis_kelamin)
    {
        $this->db->select('*');
        $this->db->where('jadwal.id_kelompok',$kelompok);
        $this->db->where('jadwal.jadwal_jenis_kelamin',$jenis_kelamin);
        $this->db->join('kelompok', 'kelompok.id_kelompok=jadwal.id_kelompok');
        $this->db->join('materi', 'materi.id_materi=jadwal.materi');
        $this->db->join('pemateri', 'pemateri.id_pemateri=jadwal.pemateri');
        $this->db->order_by('id_jadwal ASC');
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
    
 }
?>