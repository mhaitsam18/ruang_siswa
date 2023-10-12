<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model{

  public function idMahasiswa()
  {
    $user  = "MHS";
    $q     = "SELECT MAX(TRIM(REPLACE(id_mahasiswa,'MHS', ''))) as nama
             FROM mahasiswa WHERE id_mahasiswa LIKE '$user%'";
    $baris = $this->db->query($q);
    $akhir = $baris->row()->nama;
    $akhir++;
    $id    =str_pad($akhir, 3, "0", STR_PAD_LEFT);
    $id    = "MHS".$id;
    return $id;
  }

  public function register($data)
  {
    $query = $this->db->insert('mahasiswa',$data);
    return $query;
  }

  public function login($data)
  {
    $this->db->where('username',$data['username']);
    $this->db->where('password',$data['password']);
    // $this->db->where('status','Terverifikasi');
    $query  = $this->db->get('mahasiswa');
    return $query;
  }

}
