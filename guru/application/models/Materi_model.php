<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materi_model extends CI_Model{

  public function idMateri()
  {
    $materi = "MTR";
    $q = "SELECT MAX(TRIM(REPLACE(id_materi,'MTR', ''))) as nama
          FROM materi WHERE id_materi LIKE '$materi%'";
    $baris = $this->db->query($q);
    $akhir = $baris->row()->nama;
    $akhir++;
    $id =str_pad($akhir, 3, "0", STR_PAD_LEFT);
    $id = "MTR".$id;
    return $id;
  }

  public function insertMateri($data)
  {
    $query = $this->db->insert('materi',$data);
    return $query;
  }

  public function getMateri()
  {
    $guru = $this->session->id_guru;
    $this->db->join('role_guru', 'materi.id_role_guru=role_guru.id_role_guru');
    $this->db->join('mapel', 'mapel.id_mapel=role_guru.id_mapel');
    $this->db->join('kelas', 'kelas.id_kelas=role_guru.id_kelas');
    $query = $this->db->get_where('materi',['id_guru' => $guru]);
    return $query;
  }

  public function getMateriSingle($id)
  {
    $guru = $this->session->id_guru;
    $this->db->where('id_guru', $guru);
    $this->db->where('id_materi', $id);
    $this->db->join('role_guru', 'materi.id_role_guru=role_guru.id_role_guru');
    $this->db->join('mapel', 'mapel.id_mapel=role_guru.id_mapel');
    $this->db->join('kelas', 'kelas.id_kelas=role_guru.id_kelas');
    $query = $this->db->get('materi');
    return $query;
  }

  public function updateMateri($id,$data)
  {
    $this->db->where('id_materi',$id);
    $query = $this->db->update('materi',$data);
    return $query;
  }

  public function deleteMateri($id)
  {
    $this->db->where('id_materi',$id);
    $q = $this->db->delete('materi');
    return $q;
  }

}
