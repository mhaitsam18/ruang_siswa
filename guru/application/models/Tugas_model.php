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
    $guru = $this->session->id_guru;
    $this->db->join('role_guru', 'tugas.id_role_guru=role_guru.id_role_guru');
    $this->db->join('mapel', 'mapel.id_mapel=role_guru.id_mapel');
    $this->db->join('kelas', 'kelas.id_kelas=role_guru.id_kelas');
    $this->db->join('kategori_tugas', 'tugas.id_kategori_tugas=kategori_tugas.id_kategori_tugas');
    $query = $this->db->get_where('tugas',['id_guru' => $guru]);
    return $query;
  }

  public function getWhereTugas($where)
  {
    $query = $this->db->get_where('tugas',$where);
    return $query;
  }

  public function deleteTugas($id)
  {
    $this->db->where('id_tugas',$id);
    $query = $this->db->delete('tugas');
    return $query;
  }

}
