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
    $data['title'] = 'Login Admin';
    $this->load->view('auth/auth_head',$data);
    $this->load->view('auth/login');
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
              'password' => $password
          );

      $cek_user	= $this->Auth_model->login($data);
      if ($cek_user->num_rows() > 0) {
        $this->session->set_userdata($cek_user->row_array());
        $this->session->set_flashdata('flash',$this->session->username);
        redirect('Dashboard');

      }else {
        $this->session->set_flashdata('status','Salah Password / Username');
        redirect(base_url('auth'));
      }
    }
  }

  public function logout()
  {
    $this->session->sess_destroy();
    redirect(base_url());
  }

}
