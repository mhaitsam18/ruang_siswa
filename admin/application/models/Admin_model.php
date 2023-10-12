<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model{

  public function getSiswa()
  {
    $this->db->select('*');
    $this->db->join('kelas', 'kelas.id_kelas=siswa.id_kelas');
    return $this->db->get('siswa');
  }

  public function idsiswa()
  {
    $user  = "SSW";
    $q     = "SELECT MAX(TRIM(REPLACE(id_siswa,'SSW', ''))) as nama
             FROM siswa WHERE id_siswa LIKE '$user%'";
    $baris = $this->db->query($q);
    $akhir = $baris->row()->nama;
    $akhir++;
    $id    =str_pad($akhir, 3, "0", STR_PAD_LEFT);
    $id    = "SSW".$id;
    return $id;
  }

  public function idGuru()
  {
    $user  = "GRU";
    $q     = "SELECT MAX(TRIM(REPLACE(id_guru,'GRU', ''))) as nama
             FROM guru WHERE id_guru LIKE '$user%'";
    $baris = $this->db->query($q);
    $akhir = $baris->row()->nama;
    $akhir++;
    $id    =str_pad($akhir, 3, "0", STR_PAD_LEFT);
    $id    = "GRU".$id;
    return $id;
  }

  public function insertSiswa($data)
  {
    $query = $this->db->insert('siswa',$data);
    return $query;
  }

  public function getGuru()
  {
    return $this->db->get('guru');
  }

  public function getKelas()
  {
    return $this->db->get('kelas');
  }

  public function getMapel()
  {
    return $this->db->get('mapel');
  }

  public function getRole($id_guru)
  {
    $this->db->join('kelas', 'kelas.id_kelas=role_guru.id_kelas');
    $this->db->join('mapel', 'mapel.id_mapel=role_guru.id_mapel');
    $this->db->join('guru', 'guru.id_guru=role_guru.id_guru');
    $query = $this->db->get_where('role_guru',['role_guru.id_guru' => $id_guru]);
    return $query;
  }

  public function updateGuru($id,$data)
  {
    $this->db->where('id_guru', $id);
    return $this->db->update('guru', $data);
  }

  public function updateSiswa($id,$data)
  {
    $this->db->where('id_siswa', $id);
    return $this->db->update('siswa', $data);
  }

  public function getTugas()
  {
    $kelas = $this->session->kelas;

    $this->db->join('role_guru', 'tugas.id_role_guru=role_guru.id_role_guru');
    $this->db->join('kelas', 'kelas.id_kelas = role_guru.id_kelas');
    $this->db->join('mapel', 'mapel.id_mapel = role_guru.id_mapel');
    $this->db->join('kategori_tugas', 'tugas.id_kategori_tugas=kategori_tugas.id_kategori_tugas');
    
    $query = $this->db->get('tugas');
    return $query;
  }

  public function getNilai()
  {
    $this->db->join('pengumpulan', 'pengumpulan.id_pengumpulan = nilai.id_pengumpulan');
    $this->db->join('siswa', 'siswa.id_siswa = pengumpulan.id_siswa');
    $this->db->join('tugas', 'pengumpulan.id_tugas = tugas.id_tugas');
    $this->db->join('kategori_tugas', 'tugas.id_kategori_tugas=kategori_tugas.id_kategori_tugas');
    $this->db->join('role_guru', 'tugas.id_role_guru = role_guru.id_role_guru');
    $this->db->join('kelas', 'kelas.id_kelas = role_guru.id_kelas');
    $this->db->join('mapel', 'mapel.id_mapel = role_guru.id_mapel');
    $query = $this->db->get('nilai');
    return $query;
  }

  public function getMateri()
  {
    $this->db->join('role_guru', 'materi.id_role_guru=role_guru.id_role_guru');
    $this->db->join('kelas', 'kelas.id_kelas = role_guru.id_kelas');
    $this->db->join('mapel', 'mapel.id_mapel = role_guru.id_mapel');
    $query = $this->db->get('materi');
    return $query;
  }

}
