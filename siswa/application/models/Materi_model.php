<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materi_model extends CI_Model{


  public function insertMateri($data)
  {
    $query = $this->db->insert('materi',$data);
    return $query;
  }

  public function getMateri()
  {
    $id_kelas = $this->session->id_kelas;
    $this->db->join('role_guru', 'role_guru.id_role_guru=materi.id_role_guru');
    $this->db->join('mapel', 'role_guru.id_mapel=mapel.id_mapel');
    $this->db->join('kelas', 'role_guru.id_kelas=kelas.id_kelas');
    $query = $this->db->get_where('materi',['role_guru.id_kelas' => $id_kelas]);
    return $query;
  }

  public function getMateriByLimit()
  {
    $id_kelas = $this->session->id_kelas;
    $this->db->join('role_guru', 'role_guru.id_role_guru=materi.id_role_guru');
    $this->db->join('mapel', 'role_guru.id_mapel=mapel.id_mapel');
    $this->db->join('kelas', 'role_guru.id_kelas=kelas.id_kelas');
    $this->db->limit(5);
    $this->db->order_by('materi.id_materi', 'DESC');
    $query = $this->db->get_where('materi',['role_guru.id_kelas' => $id_kelas]);
    return $query;
  }

  public function downloadMateri($id)
  {
    $query = $this->db->get_where('materi',array('id_materi'=>$id));
    return $query->row_array();
  }

  public function getMateriSingle($id)
  {
    $guru = $this->session->id_guru;
    $this->db->where('id_guru', $guru);
    $this->db->where('id_materi', $id);
    $query = $this->db->get('materi');
    return $query;
  }

  public function deleteMateri($id)
  {
    $this->db->where('id_materi',$id);
    $q = $this->db->delete('materi');
    return $q;
  }

}
