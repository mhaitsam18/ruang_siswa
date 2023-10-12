<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru_model extends CI_Model{

  public function getPelajaran($id_guru)
  {
    $this->db->join('kelas', 'kelas.id_kelas=role_guru.id_kelas');
    $this->db->join('mapel', 'mapel.id_mapel=role_guru.id_mapel');
    $query = $this->db->get_where('role_guru',['id_guru' => $id_guru]);
    return $query;
  }

}
