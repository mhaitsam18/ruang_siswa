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
    $kelas = $this->session->kelas;
    $query = $this->db->get_where('materi',['kelas' => $kelas]);
    return $query;
  }

  public function downloadMateri($id)
  {
    $query = $this->db->get_where('materi',array('id_materi'=>$id));
    return $query->row_array();
  }

  public function getMateriSingle($id)
  {
    $dosen = $this->session->id_dosen;
    $this->db->where('id_dosen', $dosen);
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
