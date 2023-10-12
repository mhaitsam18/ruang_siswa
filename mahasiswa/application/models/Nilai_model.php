<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai_model extends CI_Model{

  public function idPengumpulan()
  {
    $pengumpulan = "PGN";
    $q = "SELECT MAX(TRIM(REPLACE(id_pengumpulan,'PGN', ''))) as nama
          FROM pengumpulan WHERE id_pengumpulan LIKE '$pengumpulan%'";
    $baris = $this->db->query($q);
    $akhir = $baris->row()->nama;
    $akhir++;
    $id =str_pad($akhir, 3, "0", STR_PAD_LEFT);
    $id = "PGN".$id;
    return $id;
  }

  public function idKomplain()
  {
    $komplain = "KMP";
    $q = "SELECT MAX(TRIM(REPLACE(id_komplain,'KMP', ''))) as nama
          FROM komplain WHERE id_komplain LIKE '$komplain%'";
    $baris = $this->db->query($q);
    $akhir = $baris->row()->nama;
    $akhir++;
    $id =str_pad($akhir, 3, "0", STR_PAD_LEFT);
    $id = "KMP".$id;
    return $id;
  }

  public function insertPengumpulan($data)
  {
    $query = $this->db->insert('pengumpulan',$data);
    return $query;
  }

  public function insertKomplain($data)
  {
    $query = $this->db->insert('komplain',$data);
    return $query;
  }

  public function getNilai()
  {
    $mahasiswa = $this->session->id_mahasiswa;
    $this->db->select('nilai.*,mahasiswa.*,pengumpulan.*,tugas.*');
    $this->db->from('nilai');
    $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = nilai.id_mahasiswa');
    $this->db->join('pengumpulan', 'pengumpulan.id_pengumpulan = nilai.id_pengumpulan');
    $this->db->join('tugas', 'tugas.id_tugas = pengumpulan.id_tugas');
    $this->db->where('nilai.id_mahasiswa',$mahasiswa);
    $this->db->group_by('matakuliah');
    $query = $this->db->get();
    return $query;
  }

  public function getNilaiSingle($id)
  {
    $mahasiswa = $this->session->id_mahasiswa;
    $this->db->select('nilai.*,mahasiswa.*,pengumpulan.*,tugas.*');
    $this->db->from('nilai');
    $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = nilai.id_mahasiswa');
    $this->db->join('pengumpulan', 'pengumpulan.id_pengumpulan = nilai.id_pengumpulan');
    $this->db->join('tugas', 'tugas.id_tugas = pengumpulan.id_tugas');
    $this->db->where('nilai.id_mahasiswa',$mahasiswa);
    $this->db->where('nilai.id_nilai',$id);
    $query = $this->db->get();
    return $query;
  }

}
