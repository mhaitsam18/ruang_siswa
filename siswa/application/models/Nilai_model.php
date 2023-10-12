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
    $siswa = $this->session->id_siswa;
    $this->db->join('pengumpulan', 'pengumpulan.id_pengumpulan = nilai.id_pengumpulan');
    $this->db->join('siswa', 'siswa.id_siswa = pengumpulan.id_siswa');
    $this->db->join('tugas', 'tugas.id_tugas = pengumpulan.id_tugas');
    $this->db->join('kategori_tugas', 'tugas.id_kategori_tugas = kategori_tugas.id_kategori_tugas');
    $this->db->join('role_guru', 'tugas.id_role_guru=role_guru.id_role_guru');
    $this->db->join('guru', 'guru.id_guru=role_guru.id_guru');
    $this->db->join('kelas', 'kelas.id_kelas = role_guru.id_kelas');
    $this->db->join('mapel', 'mapel.id_mapel = role_guru.id_mapel');
    $this->db->where('pengumpulan.id_siswa',$siswa);
    // $this->db->group_by('role_guru.id_mapel');
    $query = $this->db->get('nilai');
    return $query;
  }

  public function getNilaiSingle($id)
  {
    $siswa = $this->session->id_siswa;
    $this->db->select('*');
    $this->db->from('nilai');
    $this->db->join('pengumpulan', 'pengumpulan.id_pengumpulan = nilai.id_pengumpulan');
    $this->db->join('siswa', 'siswa.id_siswa = pengumpulan.id_siswa');
    $this->db->join('tugas', 'tugas.id_tugas = pengumpulan.id_tugas');
    $this->db->join('kategori_tugas', 'tugas.id_kategori_tugas = kategori_tugas.id_kategori_tugas');
    $this->db->join('role_guru', 'tugas.id_role_guru=role_guru.id_role_guru');
    $this->db->join('kelas', 'kelas.id_kelas = role_guru.id_kelas');
    $this->db->join('mapel', 'mapel.id_mapel = role_guru.id_mapel');
    $this->db->where('pengumpulan.id_siswa',$siswa);
    $this->db->where('nilai.id_nilai',$id);
    $query = $this->db->get();
    return $query;
  }

}
