<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai_model extends CI_Model{


  

  public function getNilaiSingle($id)
  {
    $siswa = $this->session->id_siswa;
    $this->db->select('nilai.*,siswa.*,pengumpulan.*,tugas.*');
    $this->db->from('nilai');
    $this->db->join('siswa', 'siswa.id_siswa = nilai.id_siswa');
    $this->db->join('pengumpulan', 'pengumpulan.id_pengumpulan = nilai.id_pengumpulan');
    $this->db->join('tugas', 'tugas.id_tugas = pengumpulan.id_tugas');
    $this->db->where('nilai.id_siswa',$siswa);
    $this->db->where('nilai.id_nilai',$id);
    $query = $this->db->get();
    return $query;
  }

}
