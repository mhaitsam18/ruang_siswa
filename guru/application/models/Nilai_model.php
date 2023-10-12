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
    $guru = $this->session->id_guru;
    $this->db->select('*');
    $this->db->from('pengumpulan');
    $this->db->join('siswa', 'siswa.id_siswa = pengumpulan.id_siswa');
    $this->db->join('tugas', 'tugas.id_tugas = pengumpulan.id_tugas');
    $this->db->join('role_guru', 'tugas.id_role_guru = role_guru.id_role_guru');
    $this->db->join('kategori_tugas', 'tugas.id_kategori_tugas = kategori_tugas.id_kategori_tugas');
    $this->db->join('kelas', 'kelas.id_kelas = role_guru.id_kelas');
    $this->db->join('mapel', 'mapel.id_mapel = role_guru.id_mapel');
    $this->db->where('id_guru',$guru);
    $query = $this->db->get();
    return $query;
  }

  public function getPengumpulanSingle($id)
  {
    $guru = $this->session->id_guru;
    $this->db->select('*');
    $this->db->from('pengumpulan');
    $this->db->join('siswa', 'siswa.id_siswa = pengumpulan.id_siswa');
    $this->db->join('tugas', 'tugas.id_tugas = pengumpulan.id_tugas');
    $this->db->join('role_guru', 'tugas.id_role_guru = role_guru.id_role_guru');
    $this->db->join('kategori_tugas', 'tugas.id_kategori_tugas = kategori_tugas.id_kategori_tugas');
    $this->db->join('kelas', 'kelas.id_kelas = role_guru.id_kelas');
    $this->db->join('mapel', 'mapel.id_mapel = role_guru.id_mapel');
    $this->db->where('id_guru',$guru);
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
    $guru = $this->session->id_guru;
    $this->db->select('*');
    $this->db->from('nilai');
    $this->db->join('pengumpulan', 'pengumpulan.id_pengumpulan = nilai.id_pengumpulan');
    $this->db->join('siswa', 'siswa.id_siswa = pengumpulan.id_siswa');
    $this->db->join('tugas', 'pengumpulan.id_tugas = tugas.id_tugas');
    $this->db->join('kategori_tugas', 'tugas.id_kategori_tugas = kategori_tugas.id_kategori_tugas');
    $this->db->join('role_guru', 'tugas.id_role_guru = role_guru.id_role_guru');
    $this->db->join('kelas', 'kelas.id_kelas = role_guru.id_kelas');
    $this->db->join('mapel', 'mapel.id_mapel = role_guru.id_mapel');
    $this->db->where('id_guru',$guru);
    $query = $this->db->get();
    return $query;
  }

  public function getNilaiSingle($id)
  {
    $guru = $this->session->id_guru;
    $this->db->select('*');
    $this->db->from('nilai');
    $this->db->join('pengumpulan', 'pengumpulan.id_pengumpulan = nilai.id_pengumpulan');
    $this->db->join('siswa', 'siswa.id_siswa = pengumpulan.id_siswa');
    $this->db->join('tugas', 'pengumpulan.id_tugas = tugas.id_tugas');
    $this->db->join('kategori_tugas', 'tugas.id_kategori_tugas = kategori_tugas.id_kategori_tugas');
    $this->db->join('role_guru', 'tugas.id_role_guru=role_guru.id_role_guru');
    $this->db->join('kelas', 'kelas.id_kelas = role_guru.id_kelas');
    $this->db->join('mapel', 'mapel.id_mapel = role_guru.id_mapel');
    $this->db->where('id_guru',$guru);
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
    $guru = $this->session->id_guru;
    $this->db->select('*');
    $this->db->from('komplain');
    $this->db->join('pengumpulan', 'pengumpulan.id_pengumpulan = komplain.id_pengumpulan');
    $this->db->join('siswa', 'siswa.id_siswa = pengumpulan.id_siswa');
    $this->db->join('tugas', 'pengumpulan.id_tugas = tugas.id_tugas');
    $this->db->join('role_guru', 'tugas.id_role_guru=role_guru.id_role_guru');
    $this->db->join('kelas', 'kelas.id_kelas = role_guru.id_kelas');
    $this->db->join('mapel', 'mapel.id_mapel = role_guru.id_mapel');
    $this->db->where('id_guru',$guru);
    $query = $this->db->get();
    return $query;
  }

  public function getKomplainSingle($id)
  {
    $guru = $this->session->id_guru;
    $this->db->select('*');
    $this->db->from('komplain');
    $this->db->join('pengumpulan', 'pengumpulan.id_pengumpulan = komplain.id_pengumpulan');
    $this->db->join('siswa', 'siswa.id_siswa = pengumpulan.id_siswa');
    $this->db->join('tugas', 'pengumpulan.id_tugas = tugas.id_tugas');
    $this->db->join('role_guru', 'tugas.id_role_guru=role_guru.id_role_guru');
    $this->db->join('kelas', 'kelas.id_kelas = role_guru.id_kelas');
    $this->db->join('mapel', 'mapel.id_mapel = role_guru.id_mapel');
    $this->db->where('id_guru',$guru);
    $this->db->where('komplain.id_komplain',$id);
    $query = $this->db->get();
    return $query;
  }

}
