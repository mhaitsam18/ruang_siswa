<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model{

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

  public function register($data)
  {
    $query = $this->db->insert('guru',$data);
    return $query;
  }

  public function login($data)
  {
    $this->db->where('username',$data['username']);
    $this->db->where('password',$data['password']);
    $this->db->where('status','Terverifikasi');
    $query  = $this->db->get('guru');
    return $query;
  }

}
