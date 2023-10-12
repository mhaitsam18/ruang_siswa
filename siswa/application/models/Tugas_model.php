<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tugas_model extends CI_Model{

  public function idTugas()
  {
    $tugas = "TGS";
    $q = "SELECT MAX(TRIM(REPLACE(id_tugas,'TGS', ''))) as nama
          FROM tugas WHERE id_tugas LIKE '$tugas%'";
    $baris = $this->db->query($q);
    $akhir = $baris->row()->nama;
    $akhir++;
    $id =str_pad($akhir, 3, "0", STR_PAD_LEFT);
    $id = "TGS".$id;
    return $id;
  }

  public function insertTugas($data)
  {
    $query = $this->db->insert('tugas',$data);
    return $query;
  }

  public function getTugas()
  {
    $id_kelas = $this->session->id_kelas;
    $this->db->join('role_guru', 'role_guru.id_role_guru=tugas.id_role_guru');
    $this->db->join('mapel', 'role_guru.id_mapel=mapel.id_mapel');
    $this->db->join('kelas', 'role_guru.id_kelas=kelas.id_kelas');
    $this->db->join('kategori_tugas', 'tugas.id_kategori_tugas=kategori_tugas.id_kategori_tugas');
    $query = $this->db->get_where('tugas',['role_guru.id_kelas' => $id_kelas]);
    return $query;
  }

  public function getTugasByBatas()
  {
    $id_kelas = $this->session->id_kelas;
    $this->db->join('role_guru', 'role_guru.id_role_guru=tugas.id_role_guru');
    $this->db->join('mapel', 'role_guru.id_mapel=mapel.id_mapel');
    $this->db->join('kelas', 'role_guru.id_kelas=kelas.id_kelas');
    $this->db->join('kategori_tugas', 'tugas.id_kategori_tugas=kategori_tugas.id_kategori_tugas');
    // $this->db->where('batas_pengumpulan >=', date('Y-m-d'));
    $this->db->order_by('batas_pengumpulan', 'ASC');
    $query = $this->db->get_where('tugas',['role_guru.id_kelas' => $id_kelas]);
    return $query;
  }

  public function getTugasSingle($id)
  {
    $this->db->join('role_guru', 'role_guru.id_role_guru=tugas.id_role_guru');
    $this->db->join('guru', 'guru.id_guru=role_guru.id_guru');
    $this->db->join('mapel', 'role_guru.id_mapel=mapel.id_mapel');
    $this->db->join('kelas', 'role_guru.id_kelas=kelas.id_kelas');
    $this->db->join('kategori_tugas', 'tugas.id_kategori_tugas=kategori_tugas.id_kategori_tugas');
    return $this->db->get_where('tugas', array('id_tugas' => $id));
  }

  public function deleteTugas($id)
  {
    $this->db->where('id_tugas',$id);
    $query = $this->db->delete('tugas');
    return $query;
  }

  public function downloadTugas($id)
  {
    $query = $this->db->get_where('tugas',array('id_tugas'=>$id));
    return $query->row_array();
  }

}
