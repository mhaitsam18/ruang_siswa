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
    if ($this->session->userdata('username')) {
      redirect('Dashboard');
    }
    $data['title'] = 'Login Guru';
    $this->load->view('auth/auth_head',$data);
    $this->load->view('auth/login');
    $this->load->view('auth/auth_footer');
  }

  public function register()
  {
    if ($this->session->userdata('username')) {
      redirect('Dashboard');
    }
    $data['title'] = 'Register Guru';
    $this->load->view('auth/auth_head',$data);
    $this->load->view('auth/register');
    $this->load->view('auth/auth_footer');
  }

  public function proses_login()
  {
    $this->form_validation->set_rules('username','Username','required');
    $this->form_validation->set_rules('password','Password','required');

    if ($this->form_validation->run() == FALSE) {
      $this->index();
    }else {
      $username = $this->input->post('username',true);
      $password = $this->input->post('password',true);
      $guru = $this->db->get_where('guru', ['username' => $username])->row_array();
      $num_guru = $this->db->get_where('guru', ['username' => $username])->num_rows();
      if ($num_guru < 1) {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
          Username Tidak terdaftar!
          </div>');
        redirect('auth');
      }
      
      if (password_verify($password, $guru['password'])) {

        $cek_user = $this->Auth_model->login($data);
        $this->session->set_userdata($guru);
        $this->session->set_flashdata('flash',$this->session->username);
        redirect('Dashboard');
      } else{
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
          Wrong password!
          </div>');
        redirect('auth');
      }
    }
  }

  public function proses_register()
  {
    $this->form_validation->set_rules('username','Username','required|trim|is_unique[guru.username]',[
        'is_unique' => 'Username telah dipakai!'
    ]);
    $this->form_validation->set_rules('nama_guru','Nama','required|min_length[4]');
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
      $id_guru   = $this->Auth_model->idGuru();
      $nama_guru = $this->input->post('nama_guru');
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
            'id_guru'   => $id_guru,
            'nama_guru' => $nama_guru,
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
    redirect();
  }

}
