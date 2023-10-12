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
    $data['title'] = 'Login Dosen';
    $this->load->view('auth/auth_head',$data);
    $this->load->view('auth/login');
    $this->load->view('auth/auth_footer');
  }

  public function register()
  {
    $data['title'] = 'Register Dosen';
    $this->load->view('auth/auth_head',$data);
    $this->load->view('auth/register');
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
    $this->form_validation->set_rules('username','Username','required|trim|is_unique[dosen.username]',[
        'is_unique' => 'Username telah dipakai!'
    ]);
    $this->form_validation->set_rules('nama_dosen','Nama','required|min_length[4]');
    $this->form_validation->set_rules('password1','Password','required|trim|min_length[3]|matches[password2]',[
        'matches' => 'Password tidak sesuai!',
        'min_length' => 'Password terlalu pendek!'
    ]);
    $this->form_validation->set_rules('password2','Password','required|trim|matches[password1]');

    if (empty($_FILES['dokumen']['name'])) {
      $this->form_validation->set_rules('dokumen','Dokumen','required');
    }
    if ($this->form_validation->run() == FALSE) {
      $this->register();
    }else {
      $id_dosen   = $this->Auth_model->idDosen();
      $nama_dosen = $this->input->post('nama_dosen');
      $username   = $this->input->post('username',true);
      $password   = $this->input->post('password1',true);

      $config['upload_path']          = './uploads/';
      $config['allowed_types']        = 'pdf|docx';
      $config['max_size']             = 4000;

      $this->load->library('upload', $config);

      if (! $this->upload->do_upload('dokumen')) {
        $this->session->set_flashdata('status','File gagal diupload.');
        redirect(base_url('auth/register'));
      }else {
        $dokumen = $this->upload->data('file_name');

        $data = array(
            'id_dosen'   => $id_dosen,
            'nama_dosen' => $nama_dosen,
            'username'   => $username,
            'password'   => password_hash($password, PASSWORD_DEFAULT),
            'status'     => 'Belum terverifikasi',
            'dokumen'    => $dokumen
        );

        $result = $this->Auth_model->register($data);
        if ($result) {
          redirect(base_url('auth'));
        }else {
          redirect(base_url('auth/register'));
        }
      }
    }
  }

  public function logout()
  {
    $this->session->sess_destroy();
    redirect(base_url());
  }

}
