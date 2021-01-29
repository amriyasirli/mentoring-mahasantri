<?php 
class Laporan_model extends CI_Model { 

    public function kelompok ()
    {
        $this->db->select('*');
        return $this->db->get('kelompok');
    }

    public function materi_ ()
    {
        $this->db->select('*');
        return $this->db->get('materi');
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
    
    public function tanggal ($tanggal,$kelompok,$id)
    {
        $this->db->select('*');
        $this->db->join('mahasantri', 'mahasantri.nim=absen.nim');
        $this->db->join('jadwal', 'jadwal.id_jadwal=absen.id_jadwal');
        $this->db->join('kelompok', 'kelompok.id_kelompok=absen.id_kelompok');
        $this->db->where('absen.tanggal_absen',$tanggal);
        // $this->db->distinct();
        $this->db->where('absen.id_kelompok',$kelompok);
        $this->db->where('absen.nim',$id);
        // $this->db->where('absen.mapel',$mapel);
        return $this->db->get('absen');
    }
    
 }
?>