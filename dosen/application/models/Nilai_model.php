<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai_model extends CI_Model{

  public function idNilai()
  {
    $nilai = "NL";
    $q = "SELECT MAX(TRIM(REPLACE(id_nilai,'NL', ''))) as nama
          FROM nilai WHERE id_nilai LIKE '$nilai%'";
    $baris = $this->db->query($q);
    $akhir = $baris->row()->nama;
    $akhir++;
    $id =str_pad($akhir, 3, "0", STR_PAD_LEFT);
    $id = "NL".$id;
    return $id;
  }

  public function filePengumpulan($id)
  {
    $query = $this->db->get_where('pengumpulan',array('id_tugas'=>$id));
    return $query->row_array();
  }

  public function fileKomplain($id)
  {
    $query = $this->db->get_where('komplain',array('id_komplain'=>$id));
    return $query->row_array();
  }

  public function getPengumpulan()
  {
    $dosen = $this->session->id_dosen;
    $this->db->select('pengumpulan.*,mahasiswa.*,tugas.*');
    $this->db->from('pengumpulan');
    $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = pengumpulan.id_mahasiswa');
    $this->db->join('tugas', 'tugas.id_tugas = pengumpulan.id_tugas');
    $this->db->where('tugas.id_dosen',$dosen);
    $query = $this->db->get();
    return $query;
  }

  public function getPengumpulanSingle($id)
  {
    $dosen = $this->session->id_dosen;
    $this->db->select('pengumpulan.*,mahasiswa.*,tugas.*');
    $this->db->from('pengumpulan');
    $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = pengumpulan.id_mahasiswa');
    $this->db->join('tugas', 'tugas.id_tugas = pengumpulan.id_tugas');
    $this->db->where('tugas.id_dosen',$dosen);
    $this->db->where('pengumpulan.id_pengumpulan',$id);
    $query = $this->db->get();
    return $query;
  }

  public function insertNilai($data)
  {
    return $this->db->insert('nilai', $data);
  }

  public function getNilai()
  {
    $dosen = $this->session->id_dosen;
    $this->db->select('nilai.*,mahasiswa.*,pengumpulan.*,tugas.*');
    $this->db->from('nilai');
    $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = nilai.id_mahasiswa');
    $this->db->join('pengumpulan', 'pengumpulan.id_pengumpulan = nilai.id_pengumpulan');
    $this->db->join('tugas', 'pengumpulan.id_tugas = tugas.id_tugas');
    $this->db->where('tugas.id_dosen',$dosen);
    $query = $this->db->get();
    return $query;
  }

  public function getNilaiSingle($id)
  {
    $dosen = $this->session->id_dosen;
    $this->db->select('nilai.*,mahasiswa.*,pengumpulan.*,tugas.*');
    $this->db->from('nilai');
    $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = nilai.id_mahasiswa');
    $this->db->join('pengumpulan', 'pengumpulan.id_pengumpulan = nilai.id_pengumpulan');
    $this->db->join('tugas', 'pengumpulan.id_tugas = tugas.id_tugas');
    $this->db->where('tugas.id_dosen',$dosen);
    $this->db->where('nilai.id_nilai',$id);
    $query = $this->db->get();
    return $query;
  }

  public function updateNilai($id,$data)
  {
    $this->db->where('id_nilai',$id);
    $query = $this->db->update('nilai',$data);
    return $query;
  }

  public function getKomplain()
  {
    $dosen = $this->session->id_dosen;
    $this->db->select('komplain.*,mahasiswa.*,pengumpulan.*,tugas.*');
    $this->db->from('komplain');
    $this->db->join('pengumpulan', 'pengumpulan.id_pengumpulan = komplain.id_pengumpulan');
    $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = pengumpulan.id_mahasiswa');
    $this->db->join('tugas', 'pengumpulan.id_tugas = tugas.id_tugas');
    $this->db->where('tugas.id_dosen',$dosen);
    $query = $this->db->get();
    return $query;
  }

  public function getKomplainSingle($id)
  {
    $dosen = $this->session->id_dosen;
    $this->db->select('komplain.*,mahasiswa.*,pengumpulan.*,tugas.*');
    $this->db->from('komplain');
    $this->db->join('pengumpulan', 'pengumpulan.id_pengumpulan = komplain.id_pengumpulan');
    $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = pengumpulan.id_mahasiswa');
    $this->db->join('tugas', 'pengumpulan.id_tugas = tugas.id_tugas');
    $this->db->where('tugas.id_dosen',$dosen);
    $this->db->where('komplain.id_komplain',$id);
    $query = $this->db->get();
    return $query;
  }

}
