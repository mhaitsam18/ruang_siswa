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
    $data['title'] = 'Login Siswa';
    $this->load->view('auth/auth_head',$data);
    $this->load->view('auth/login');
    $this->load->view('auth/auth_footer');
  }

  public function register()
  {
    $data['title'] = 'Register Siswa';
    $this->load->view('auth/auth_head',$data);
    $this->load->view('auth/register');
    $this->load->view('auth/auth_footer');
  }

  public function forgot_password()
  {
    // if ($this->session->userdata('email')) {
    //   redirect('user');
    // }
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    if ($this->form_validation->run() == false) {
      $data['title'] = 'Lupa Kata Sandi';
      $this->load->view('auth/auth_head',$data);
      $this->load->view('auth/forgot_password');
      $this->load->view('auth/auth_footer');
    } else{
      $email = $this->input->post('email');
      $user = $this->db->get_where('siswa', ['email' => $email])->row_array();
      if ($user) {
        $token = base64_encode(random_bytes(32));
        $user_token = [
          'email' => $email,
          'token' => $token,
          'date_created' => time()
        ];
        $this->db->insert('user_token', $user_token);
        $this->_sendEmail($token, 'forgot');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
          Please check your email to reset password!
          </div>');
          redirect('auth/forgot_password');
      } else{
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
          Email is not registered!
          </div>');
          redirect('auth/forgot_password');
      }
    }
    
  }

  public function validasi()
  {
    $data['title'] = 'Validasi Siswa';
    $this->load->view('auth/auth_head',$data);
    $this->load->view('auth/validasi');
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
      $siswa = $this->db->get_where('siswa', ['username' => $username])->row_array();
      $num_siswa = $this->db->get_where('siswa', ['username' => $username])->num_rows();
      if ($num_siswa < 1) {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
          Username Tidak terdaftar!
          </div>');
        redirect('auth');
      }
      
      if (password_verify($password, $siswa['password'])) {

        $cek_user	= $this->Auth_model->login($data);
        $this->session->set_userdata($siswa);
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

  private function _login()
  {
    if ($this->session->userdata('email')) {
      redirect('user');
    }
    $email = $this->input->post('email');
    $password = $this->input->post('password');

    $user = $this->db->get_where('user', ['email' => $email])->row_array();
    if ($user) {
      if ($user['is_active'] ==  1) {
        if (password_verify($password, $user['password'])) {
          $data = [
            'email' => $user['email'],
            'role_id' => $user['role_id']
          ];
          $this->session->set_userdata($data);
          if ($user['role_id'==1]) {
            redirect('admin');
          } else{
            redirect('user');
          }
        } else{
          $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Wrong password!
            </div>');
          redirect('auth');

        }
      } else{
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
          This email has not been activated! Please Check Your Email!
          </div>');
        redirect('auth');
      }
    } else{
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        Email is not registered!
        </div>');
      redirect('auth');
    }
  }

  public function proses_register()
  {
    $this->form_validation->set_rules('username','Username','required|trim|is_unique[siswa.username]',[
        'is_unique' => 'Username telah dipakai!'
    ]);
    $this->form_validation->set_rules('nama_siswa','Nama','required');
    $this->form_validation->set_rules('password1','Password','required|trim|min_length[3]|matches[password2]',[
        'matches' => 'Password tidak sesuai!',
        'min_length' => 'Password terlalu pendek!'
    ]);
    $this->form_validation->set_rules('password2','Password','required|trim|matches[password1]');
    $this->form_validation->set_rules('kelas','Kelas','required');

    if ($this->form_validation->run() == FALSE) {
      $this->register();
    }else {
      $id_siswa    = $this->Auth_model->idsiswa();
      $nama_siswa  = $this->input->post('nama_siswa');
      $username        = $this->input->post('username',true);
      $kelas           = $this->input->post('kelas',true);
      $password        = $this->input->post('password1',true);

        $data = array(
            'id_siswa'   => $id_siswa,
            'nama_siswa' => $nama_siswa,
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

  private function _sendEmail($token, $type)
  {
    $config = [
      'protocol' => 'smtp',
      'smtp_host' => 'ssl://smtp.googlemail.com',
      'smtp_user' => 'alstiara20@gmail.com',
      'smtp_pass' => 'Proyekakhir20',
      'smtp_port' => 465,
      'mailtype' => 'html',
      'chatset' => 'utf-8',
      'newline' => "\r\n"
    ];

    $this->load->library('email', $config);
    $this->email->initialize($config); 
    $this->email->from('alstiara20@gmail.com', 'Ruang Siswa');
    $this->email->to($this->input->post('email'));
    if ($type== 'verify') {
      $this->email->subject('Account Verification');
      $this->email->message('Click this link to verify your account : <a href="'.base_url('auth/verify?email=').$this->input->post('email').'&token='.urlencode($token).'">Activate</a>');
    } elseif($type== 'forgot'){
      $this->email->subject('Reset Password');
      $this->email->message('Click this link to reset your password : <a href="'.base_url('auth/resetPassword?email=').$this->input->post('email').'&token='.urlencode($token).'">Reset Password</a>');
    }
    if ($this->email->send()) {
      return true;
    } else{
      echo $this->email->print_debugger();
      die;
    }
  }

  // public function verify()
  // {
  //   $email = $this->input->get('email');
  //   $token = $this->input->get('token');

  //   $user = $this->db->get_where('siswa', ['email' => $email])->row_array();
  //   if ($user) {
  //     if ($user['is_active']!=1) {
  //       $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
  //       if ($user_token) {
  //         if (time() - $user_token['date_created'] < (60*60*24)) {
  //           $this->db->set('is_active', 1);
  //           $this->db->where('email', $email);
  //           $this->db->update('user');
  //           $this->db->delete('user_token',['email' => $email]);
  //           $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
  //           '.$email.' has been activated. Please Login! Please Check Your Email!
  //           </div>');
  //           redirect('auth');
  //         } else{
  //           $this->db->delete('user',['email' => $email]);
  //           $this->db->delete('user_token',['email' => $email]);
  //           $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
  //           Account activation failed: Token Expired!
  //           </div>');
  //           redirect('auth');
  //         }
  //       } else{
  //         $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
  //         Account activation failed: Invalid Token!
  //         </div>');
  //         redirect('auth');
  //       }
  //     } else{
  //       $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
  //       Your account has been activated!
  //       </div>');
  //       redirect('auth');
  //     }
  //   } else{
  //     $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
  //     Account activation failed: Wrong Email!
  //     </div>');
  //     redirect('auth');
  //   }
  // }

  public function resetPassword()
  {
    $email = $this->input->get('email');
    $token = $this->input->get('token');

    $user = $this->db->get_where('siswa', ['email' => $email])->row_array();
    if ($user) {
      $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
      if ($user_token) {
        if (time() - $user_token['date_created'] < (60*60*24)) {
          $this->session->set_userdata('reset_email', $email);
          $this->changePassword();
        } else{
          $this->db->delete('user_token',['email' => $email]);
          $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
          Reset Password failed: Token Expired!
          </div>');
          redirect('auth');
        }
      } else{
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        Reset Password failed: Invalid Token!
        </div>');
        redirect('auth');
      }
    } else{
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
      Reset Password failed: Wrong email!
      </div>');
      redirect('auth');
    }
  }

  public function changePassword()
  {
    if (!$this->session->userdata('reset_email')) {
      redirect('auth');
    }
    $this->form_validation->set_rules('password1','Password', 'required|trim|min_length[3]');
    $this->form_validation->set_rules('password2','Confrim Password', 'required|trim|matches[password1]');
    if ($this->form_validation->run() == false) {
      $data['title'] = 'change Password';
      $this->load->view('auth/auth_head',$data);
      $this->load->view('auth/input_password');
      $this->load->view('auth/auth_footer');
    } else{
      $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
      $email = $this->session->userdata('reset_email');

      $this->db->set('password', $password);
      $this->db->where('email', $email);
      $this->db->update('siswa');
      $this->session->unset_userdata('reset_email');
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
      Password has been change! Please login!
      </div>');
      redirect('auth');
    }
  }
}
