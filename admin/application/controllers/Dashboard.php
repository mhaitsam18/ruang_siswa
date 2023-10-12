<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Admin_model');
  }

  public function index()
  {
    $data['title'] = 'Dashboard Admin';
    $data['jumlah'] = $this->db->query('
      SELECT COUNT(id_siswa) AS siswa, 
      (SELECT COUNT(id_guru) FROM guru) AS guru, 
      (SELECT COUNT(id_mapel) FROM mapel) AS mapel,  
      (SELECT COUNT(id_kelas) FROM kelas) AS kelas FROM siswa
      ')->row();
    $this->load->view('layouts/header',$data);
    $this->load->view('dashboard/dashboard');
    $this->load->view('layouts/footer');
  }

  public function lihat_siswa()
  {
    $data['siswa'] = $this->Admin_model->getSiswa()->result();
    $data['kelas'] = $this->db->get('kelas')->result();
    $data['title'] = 'Lihat Siswa';

    $this->load->view('layouts/header',$data);
    $this->load->view('dashboard/lihat_siswa',$data);
    $this->load->view('layouts/footer');
  }

  public function insert_siswa()
  {
    $this->form_validation->set_rules('username','Username','required|trim|is_unique[siswa.username]',[
        'is_unique' => 'Username telah dipakai!'
    ]);
    $this->form_validation->set_rules('nama_siswa','Nama','required|min_length[4]');
    // $this->form_validation->set_rules('password1','Password','required|trim|min_length[3]|matches[password2]',[
    //     'matches' => 'Password tidak sesuai!',
    //     'min_length' => 'Password terlalu pendek!'
    // ]);
    // $this->form_validation->set_rules('password2','Password','required|trim|matches[password1]');
    $this->form_validation->set_rules('id_kelas','Kelas','required');

    if ($this->form_validation->run() == FALSE) {
      $this->lihat_siswa();
    }else {
      $upload_image = $_FILES['foto_siswa']['name'];
      if ($upload_image) {
        $config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
        $config['upload_path'] = './assets/img/siswa';
        $config['max_size']     = '2048';
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('foto_siswa')) {
          $new_image = $this->upload->data('file_name');
        } else{
          $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">'.$this->upload->display_errors().'</div>');
          redirect('Dashboard/lihat_siswa');
        }
      }
      $data = array(
          'id_siswa'        => $this->Admin_model->idsiswa(),
          'nama_siswa'      => $this->input->post('nama_siswa'),
          'nis'             => $this->input->post('nis'),
          'email'           => $this->input->post('email'),
          'jenis_kelamin'   => $this->input->post('jenis_kelamin'),
          'username'        => $this->input->post('username'),
          'id_kelas'        => $this->input->post('id_kelas'),
          'password'        => password_hash(1234, PASSWORD_DEFAULT),
          // 'status'       => 'Belum terverifikasi',
          'foto_siswa'          => $new_image,
          'status'          => 'Aktif',
      );

      $result = $this->Admin_model->insertSiswa($data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data Siswa Berhasil ditambahkan.
        </div>');
      redirect('Dashboard/lihat_siswa');
      
    }
  }

  public function hapus_siswa($id_siswa)
  {
    $this->db->delete('siswa', ['id_siswa' => $id_siswa]);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
      Data Siswa Berhasil dihapus.
      </div>');
    redirect('Dashboard/lihat_siswa');
  }


  public function lihat_guru()
  {
    $data['guru'] = $this->Admin_model->getGuru()->result();
    $data['title']  = 'Lihat Guru';

    $this->load->view('layouts/header',$data);
    $this->load->view('dashboard/lihat_guru',$data);
    $this->load->view('layouts/footer');
  }

  public function hapus_guru($id_guru)
  {
    $this->db->delete('guru', ['id_guru' => $id_guru]);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
      Data Guru Berhasil dihapus.
      </div>');
    redirect('Dashboard/lihat_guru');
  }

  public function tambah_guru()
  {
    $this->form_validation->set_rules('password1','Password','required|trim',[
        'matches' => 'Password tidak sesuai!'
    ]);
    $this->form_validation->set_rules('password2','Confirm Password','required|trim|matches[password1]');
    if ($this->form_validation->run() == false) {
      $this->lihat_guru();
    } else {
      $upload_foto = $_FILES['foto_guru']['name'];
      if ($upload_foto) {
        $config['allowed_types'] = 'gif|jpg|png|svg|jpeg|pdf';
        $config['upload_path'] = './assets/img/guru';
        $config['max_size']     = '2000000';
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('foto_guru')) {
          $foto_guru = $this->upload->data('file_name');
        } else{
          $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">'.$this->upload->display_errors().'</div>');
          redirect('Dashboard/lihat_guru');
        }
      }
      $upload_dokumen = $_FILES['dokumen']['name'];
      if ($upload_dokumen) {
        $config['allowed_types'] = 'gif|jpg|png|svg|jpeg|pdf';
        $config['upload_path'] = './uploads';
        $config['max_size']     = '2000000';
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('dokumen')) {
          $dokumen = $this->upload->data('file_name');
        } else{
          $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">'.$this->upload->display_errors().'</div>');
          redirect('Dashboard/lihat_guru');
        }
      }
      $id_guru = $this->Admin_model->idGuru();
      $this->db->insert('guru', [
        'id_guru' => $id_guru,
        'username' => $this->input->post('username'),
        'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
        'nama_guru' => $this->input->post('nama_guru'),
        'nip' => $this->input->post('nip'),
        'email' => $this->input->post('email'),
        'jenis_kelamin' => $this->input->post('jenis_kelamin'),
        'foto_guru' => $foto_guru,
        'dokumen' => $dokumen,
      ]);

      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        guru updated!
        </div>');
      redirect('Dashboard/lihat_guru');
    }
  }

  public function role_guru($id_guru = null)
  {
    $data['role'] = $this->Admin_model->getRole($id_guru)->result();
    $data['kelas'] = $this->db->get('kelas')->result();
    $data['mapel'] = $this->db->get('mapel')->result();
    $data['title']  = 'Role Guru';
    $data['id_guru']  = $id_guru;
    $this->form_validation->set_rules('id_kelas', 'Kelas', 'trim|required');
    $this->form_validation->set_rules('id_mapel', 'Mata Pelajaran', 'trim|required');
    if ($this->form_validation->run() == false) {
      $this->load->view('layouts/header',$data);
      $this->load->view('dashboard/role_guru',$data);
      $this->load->view('layouts/footer');
    } else{
      $this->db->insert('role_guru', [
        'id_guru' => $id_guru,
        'id_kelas' => $this->input->post('id_kelas'),
        'id_mapel' => $this->input->post('id_mapel')
      ]);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Role Guru Berhasil ditambahkan.
        </div>');
      redirect($_SERVER['HTTP_REFERER']);
    }
  }

  public function hapus_role_guru($id_role_guru = null)
  {
    $this->db->delete('role_guru', ['id_role_guru' => $id_role_guru]);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
      Role Guru Berhasil dihapus.
      </div>');
    redirect($_SERVER['HTTP_REFERER']);
  }

  public function update_role_guru()
  {
    $this->db->where('id_role_guru', $this->input->post('id_role_guru'));
    $this->db->update('role_guru', [
      'id_kelas' => $this->input->post('id_kelas'),
      'id_mapel' => $this->input->post('id_mapel')
    ]);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
      Role Guru Berhasil diubah.
      </div>');
    redirect($_SERVER['HTTP_REFERER']);
  }

  public function verifikasi_siswa($id, $status = '')
  {
    $data = [
        'status' => $status
    ];
    $result = $this->Admin_model->updateSiswa($id,$data);
    redirect('Dashboard/lihat_siswa');
  }

  public function verifikasi_guru($id)
  {
    $data = [
        'status' => 'Terverifikasi'
    ];
    $result = $this->Admin_model->updateGuru($id,$data);
    redirect('Dashboard/lihat_guru');
  }

// Modul Materi-----------------------------------------------------------------

  public function lihat_materi()
  {
    $data['materi'] = $this->Admin_model->getMateri()->result();
    $data['title']  = 'Lihat Materi';

    $this->load->view('layouts/header',$data);
    $this->load->view('dashboard/lihat_materi',$data);
    $this->load->view('layouts/footer');
  }

  public function file_materi($id)
  {
    $this->load->helper('download');
    $fileinfo = $this->Materi_model->downloadMateri($id);
    $file = '../guru/uploads/'.$fileinfo['file_materi'];
    force_download($file, NULL);
  }

// Akhir Modul Materi-----------------------------------------------------------

// Modul Tugas------------------------------------------------------------------

    public function lihat_tugas()
    {
      $data['tugas']  = $this->Admin_model->getTugas()->result();
      $data['title']  = 'Lihat Tugas';

      $this->load->view('layouts/header',$data);
      $this->load->view('dashboard/lihat_tugas',$data);
      $this->load->view('layouts/footer');
    }


    public function file_tugas($id)
    {
      $this->load->helper('download');
      $fileinfo = $this->Tugas_model->downloadTugas($id);
      $file = '../guru/uploads/'.$fileinfo['file_tugas'];
      force_download($file, NULL);
    }


// Akhir Modul Tugas------------------------------------------------------------

// Modul Nilai / Pengumpulan----------------------------------------------------

  public function lihat_nilai()
  {
    $data['nilai']  = $this->Admin_model->getNilai()->result();
    $data['title']  = 'Detail Nilai';

    $this->load->view('layouts/header',$data);
    $this->load->view('dashboard/lihat_nilai',$data);
    $this->load->view('layouts/footer');
  }

  public function update_siswa()
  {
    $upload_image = $_FILES['foto_siswa']['name'];
      if ($upload_image) {
        $config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
        $config['upload_path'] = './assets/img/siswa';
        $config['max_size']     = '2048';
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('foto_siswa')) {
          $old_image = $siswa['foto_siswa'];
          if ($old_image !='default.jpg') {
            unlink(FCPATH.'assets/img/siswa/'.$old_image);
          } 
          $new_image = $this->upload->data('file_name');
          $this->db->set('foto_siswa', $new_image);
        } else{
          $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">'.$this->upload->display_errors().'</div>');
          redirect('Dashboard/lihat_siswa');
        }
      }
      $this->db->where('id_siswa', $this->input->post('id_siswa'));
      $this->db->update('siswa', [
        'username' => $this->input->post('username'),
        'nama_siswa' => $this->input->post('nama_siswa'),
        'nis' => $this->input->post('nis'),
        'id_kelas' => $this->input->post('id_kelas'),
        'email' => $this->input->post('email'),
        'jenis_kelamin' => $this->input->post('jenis_kelamin')
      ]);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Siswa updated!
        </div>');
      redirect('Dashboard/lihat_siswa');
  }
  public function update_guru()
  {
    $upload_image = $_FILES['foto_guru']['name'];
      if ($upload_image) {
        $config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
        $config['upload_path'] = './assets/img/guru';
        $config['max_size']     = '2048';
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('foto_guru')) {
          $old_image = $guru['foto_guru'];
          if ($old_image !='default.jpg') {
            unlink(FCPATH.'assets/img/guru/'.$old_image);
          } 
          $new_image = $this->upload->data('file_name');
          $this->db->set('foto_guru', $new_image);
        } else{
          $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">'.$this->upload->display_errors().'</div>');
          redirect('Dashboard/lihat_guru');
        }
      }
      $this->db->where('id_guru', $this->input->post('id_guru'));
      $this->db->update('guru', [
        'username' => $this->input->post('username'),
        'nama_guru' => $this->input->post('nama_guru'),
        'nip' => $this->input->post('nip'),
        'email' => $this->input->post('email'),
        'jenis_kelamin' => $this->input->post('jenis_kelamin')
      ]);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        guru updated!
        </div>');
      redirect('Dashboard/lihat_guru');
  }

  public function lihat_kelas()
  {
    $data['kelas'] = $this->Admin_model->getKelas()->result();
    $data['title']  = 'Lihat Kelas';

    $this->form_validation->set_rules('kelas', 'Kelas', 'trim|required');
    if ($this->form_validation->run() == false) {
      $this->load->view('layouts/header',$data);
      $this->load->view('dashboard/lihat_kelas',$data);
      $this->load->view('layouts/footer');
    } else{
      $this->db->insert('kelas', [
        'kelas' => $this->input->post('kelas')
      ]);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data Kelas, berhasil ditambahkan!
        </div>');
      redirect('Dashboard/lihat_kelas');
    }
  }

  public function lihat_mapel()
  {
    $data['mapel'] = $this->Admin_model->getMapel()->result();
    $data['title']  = 'Lihat Mata Pelajaran';

    $this->form_validation->set_rules('mapel', 'Mata Pelajaran', 'trim|required');
    if ($this->form_validation->run() == false) {
      $this->load->view('layouts/header',$data);
      $this->load->view('dashboard/lihat_mapel',$data);
      $this->load->view('layouts/footer');
    } else{
      $this->db->insert('mapel', [
        'mapel' => $this->input->post('mapel')
      ]);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data Mata Pelajaran, berhasil ditambahkan!
        </div>');
      redirect('Dashboard/lihat_mapel');
    }
  }
  
  public function hapus_kelas($id_kelas)
  {
    $this->db->delete('kelas', ['id_kelas' => $id_kelas]);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
      Data Kelas Berhasil dihapus.
      </div>');
    redirect('Dashboard/lihat_kelas');
  }

  public function hapus_mapel($id_mapel)
  {
    $this->db->delete('mapel', ['id_mapel' => $id_mapel]);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
      Data Mata Pelajaran Berhasil dihapus.
      </div>');
    redirect('Dashboard/lihat_mapel');
  }

  public function update_kelas()
  {
    $this->form_validation->set_rules('kelas', 'Kelas', 'trim|required');
    if ($this->form_validation->run() == false) {
      $this->lihat_kelas();
    } else{
      $this->db->where('id_kelas', $this->input->post('id_kelas'));
      $this->db->update('kelas', [
        'kelas' => $this->input->post('kelas')
      ]);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data Kelas, berhasil diubah!
        </div>');
      redirect('Dashboard/lihat_kelas');
    }
  }

  public function update_mapel()
  {
    $this->form_validation->set_rules('mapel', 'mapel', 'trim|required');
    if ($this->form_validation->run() == false) {
      $this->lihat_mapel();
    } else{
      $this->db->where('id_mapel', $this->input->post('id_mapel'));
      $this->db->update('mapel', [
        'mapel' => $this->input->post('mapel')
      ]);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data mapel, berhasil diubah!
        </div>');
      redirect('Dashboard/lihat_mapel');
    }
  }

  



  

}
