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
    $dosen = $this->session->id_dosen;
    $query = $this->db->get_where('materi',['id_dosen' => $dosen]);
    return $query;
  }

  public function getMateriSingle($id)
  {
    $dosen = $this->session->id_dosen;
    $this->db->where('id_dosen', $dosen);
    $this->db->where('id_materi', $id);
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
