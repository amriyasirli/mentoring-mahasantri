<?php 
class Absen_model extends CI_Model { 

    public function show ()
    {
        $this->db->select('*');
        $this->db->join('kelompok', 'kelompok.id_kelompok=jadwal.id_kelompok');
        $this->db->join('materi', 'materi.id_materi=jadwal.materi');
        $this->db->join('pemateri', 'pemateri.id_pemateri=jadwal.pemateri');
        return $this->db->get('jadwal');
    }

    public function materi ($kelompok,$hari,$jenis_kelamin)
    {
        $this->db->select('*');
        $this->db->join('kelompok', 'kelompok.id_kelompok=jadwal.id_kelompok');
        $this->db->join('materi', 'materi.id_materi=jadwal.materi');
        $this->db->join('pemateri', 'pemateri.id_pemateri=jadwal.pemateri');
        $this->db->where('jadwal.id_kelompok', $kelompok);
        $this->db->where('jadwal.hari', $hari);
        $this->db->where('jadwal.jadwal_jenis_kelamin', $jenis_kelamin);
        return $this->db->get('jadwal');
    }

    public function cek ($kelompok,$hari,$jenis_kelamin)
    {
        $this->db->select('*');
        $this->db->join('jadwal', 'jadwal.id_jadwal=absen.id_jadwal');
        $this->db->where('absen.id_kelompok', $kelompok);
        $this->db->where('jadwal.hari', $hari);
        $this->db->where('jadwal.jadwal_jenis_kelamin', $jenis_kelamin);
        // $this->db->where('absen.tanggal_absen', $tanggal);
        return $this->db->get('absen');
    }

    public function absen_selesai ($jadwal,$kelompok,$jenis_kelamin)
    {   
        $this->db->where('absen.id_jadwal', $jadwal);
        $this->db->join('jadwal', 'jadwal.id_jadwal=absen.id_jadwal');
        $this->db->where('absen.id_kelompok', $kelompok);
        $this->db->where('jadwal.jadwal_jenis_kelamin', $jenis_kelamin);
        return $this->db->get('absen')->row();
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