<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Auth_model');
  }

  public function index()
  {
    $data['title'] = 'Login Mahasiswa';
    $this->load->view('auth/auth_head',$data);
    $this->load->view('auth/login');
    $this->load->view('auth/auth_footer');
  }

  public function register()
  {
    $data['title'] = 'Register Mahasiswa';
    $this->load->view('auth/auth_head',$data);
    $this->load->view('auth/register');
    $this->load->view('auth/auth_footer');
  }

  public function validasi()
  {
    $data['title'] = 'Validasi Mahasiswa';
    $this->load->view('auth/auth_head',$data);
    $this->load->view('auth/validasi');
    $this->load->view('auth/auth_footer');
  }

  public function proses_login()
  {
    $this->form_validation->set_rules('username','Username','required|min_length[4]');
    $this->form_validation->set_rules('password','Password','required');

    if ($this->form_validation->run() == FALSE) {
      $this->index();
    }else {
      $username = $this->input->post('username',true);
      $password = $this->input->post('password',true);
      $data = array(
              'username' => $username,
              'password' => password_verify($password)
          );

      $cek_user	= $this->Auth_model->login($data);
      if ($cek_user->num_rows() > 0) {
        $this->session->set_userdata($cek_user->row_array());
        $this->session->set_flashdata('flash',$this->session->username);
        redirect('Dashboard');

      }else {
        $this->session->set_flashdata('status','Akun tidak ditemukan atau belum terverifikasi');
        redirect(base_url('auth'));
      }
    }
  }

  public function proses_register()
  {
    $this->form_validation->set_rules('username','Username','required|trim|is_unique[mahasiswa.username]',[
        'is_unique' => 'Username telah dipakai!'
    ]);
    $this->form_validation->set_rules('nama_mahasiswa','Nama','required|min_length[4]');
    $this->form_validation->set_rules('password1','Password','required|trim|min_length[3]|matches[password2]',[
        'matches' => 'Password tidak sesuai!',
        'min_length' => 'Password terlalu pendek!'
    ]);
    $this->form_validation->set_rules('password2','Password','required|trim|matches[password1]');
    $this->form_validation->set_rules('kelas','Kelas','required');

    if ($this->form_validation->run() == FALSE) {
      $this->register();
    }else {
      $id_mahasiswa    = $this->Auth_model->idMahasiswa();
      $nama_mahasiswa  = $this->input->post('nama_mahasiswa');
      $username        = $this->input->post('username',true);
      $kelas           = $this->input->post('kelas',true);
      $password        = $this->input->post('password1',true);

        $data = array(
            'id_mahasiswa'   => $id_mahasiswa,
            'nama_mahasiswa' => $nama_mahasiswa,
            'username'       => $username,
            'kelas'          => $kelas,
            'password'       => password_hash($password, PASSWORD_DEFAULT),
            // 'status'         => 'Belum terverifikasi',
            'status'         => 'Aktif',
        );

        $result = $this->Auth_model->register($data);
        if ($result) {
          redirect(base_url('auth/validasi'));
        }else {
          redirect(base_url('auth/register'));
        }
    }
  }

  public function logout()
  {
    $this->session->sess_destroy();
    redirect(base_url());
  }

}
