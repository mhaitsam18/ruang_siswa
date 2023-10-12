  <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Materi_model');
    $this->load->model('Tugas_model');
    $this->load->model('Nilai_model');
  }

  public function index()
  {
    $data['title'] = 'Dashboard';
    $data['materi'] = $this->Materi_model->getMateriByLimit()->result();
    $data['tugas']  = $this->Tugas_model->getTugasByBatas()->result();
    $this->db->join('kelas', 'kelas.id_kelas = siswa.id_kelas');
    $data['siswa'] = $this->db->get_where('siswa', ['id_siswa' => $this->session->userdata('id_siswa')])->row();
    $this->load->view('layouts/header',$data);
    $this->load->view('dashboard/dashboard', $data);
    $this->load->view('layouts/footer');
  }

  public function kelas_saya()
  {
    $data['title'] = 'Dashboard';

    $this->db->join('kelas', 'siswa.id_kelas = kelas.id_kelas');
    $data['siswa'] = $this->db->get_where('siswa', ['id_siswa' => $this->session->userdata('id_siswa')])->row();
    $data['mapel'] = $this->db->get('mapel')->result();
    $this->load->view('layouts/header',$data);
    $this->load->view('dashboard/kelas_saya', $data);
    $this->load->view('layouts/footer');
  }

  public function detail_kelas($id_role_guru = null)
  {
    $data['title']  = 'Lihat Tugas';
    $this->db->join('role_guru', 'role_guru.id_role_guru=tugas.id_role_guru');
    $this->db->join('mapel', 'role_guru.id_mapel=mapel.id_mapel');
    $this->db->join('kelas', 'role_guru.id_kelas=kelas.id_kelas');
    $this->db->join('kategori_tugas', 'tugas.id_kategori_tugas=kategori_tugas.id_kategori_tugas');
    $data['tugas'] = $this->db->get_where('tugas',['role_guru.id_role_guru' => $id_role_guru])->result();

    $this->db->join('role_guru', 'role_guru.id_role_guru=materi.id_role_guru');
    $this->db->join('mapel', 'role_guru.id_mapel=mapel.id_mapel');
    $this->db->join('kelas', 'role_guru.id_kelas=kelas.id_kelas');
    $data['materi'] = $this->db->get_where('materi',['role_guru.id_role_guru' => $id_role_guru])->result();

    $this->load->view('layouts/header',$data);
    $this->load->view('dashboard/detail_kelas',$data);
    $this->load->view('layouts/footer');
  }

  public function profile()
  {
    $data['title'] = 'Dashboard';
    $data['user'] = $this->db->get_where('siswa', ['id_siswa' => $this->session->id_siswa])->row_array();
    $data['kelas'] = $this->db->get('kelas')->result_array();

    $this->form_validation->set_rules('username', 'Username', 'trim|required');
    $this->form_validation->set_rules('nama_siswa', 'Nama Lengkap', 'trim|required');
    $this->form_validation->set_rules('nis', 'NIS', 'trim|required');
    if ($this->form_validation->run() == false) {
      $this->load->view('layouts/header',$data);
      $this->load->view('dashboard/profile', $data);
      $this->load->view('layouts/footer');
    } else{
      $nama_siswa = $this->input->post('nama_siswa');
      $username = $this->input->post('username');

      //jika ada gambar
      $upload_foto_siswa = $_FILES['foto_siswa']['name'];
      if ($upload_foto_siswa) {
        $config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
        $config['upload_path'] = './assets/img/siswa';
        $config['max_size']     = '10048';
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('foto_siswa')) {
          $old_foto_siswa = $data['user']['foto_siswa'];
          if ($old_foto_siswa !='default.jpg' || $old_foto_siswa !='default.svg') {
            unlink(FCPATH.'assets/img/siswa/'.$old_foto_siswa);
          } 
          $new_foto_siswa = $this->upload->data('file_name');
          $this->db->set('foto_siswa', $new_foto_siswa);
        } else{
          $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">'.$this->upload->display_errors().'</div>');
          redirect('Dashboard/profile');
        }
      }

      $data = [
        'nama_siswa' => $this->input->post('nama_siswa'),
        'email' => $this->input->post('email'),
        'nis' => $this->input->post('nis'),
        'status' => $this->input->post('status'),
        'jenis_kelamin' => $this->input->post('jenis_kelamin'),
        'id_kelas' => $this->input->post('id_kelas')
      ];
      $this->db->where('username', $username);
      $this->db->update('siswa', $data);
      $this->session->set_flashdata('flash', 'Berhasil diubah');
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Selamat! Profil Anda berhasil diperbarui
        </div>');
      redirect('Dashboard/profile');
    }
  }

  public function ubah_kata_sandi()
  {
    $siswa = $this->db->get_where('siswa', ['id_siswa' => $this->session->id_siswa])->row_array();
    $this->form_validation->set_rules('current_password', 'Current Password', 'trim|required');
    $this->form_validation->set_rules('new_password1', 'New Password', 'trim|required|min_length[3]');
    $this->form_validation->set_rules('new_password2', 'Repeat New Password', 'trim|required|matches[new_password1]');
    if ($this->form_validation->run() ==  false) {
      $this->profile();
    } else{
      $current_password = $this->input->post('current_password');
      $new_password1 = $this->input->post('new_password1');
      $new_password2 = $this->input->post('new_password2');
      if (!password_verify($current_password, $siswa['password'])) {
        // $this->session->set_flashdata('flash_gagal', 'Password saat ini salah');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kata Sandi salah!</div>');
        redirect('Dashboard/profile');
      } else{
        if ($current_password == $new_password1) {
          // $this->session->set_flashdata('flash_gagal', 'Kata Sandi baru tidak boleh sama dengan kata sandi yang lama');
          $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kata Sandi baru tidak boleh sama dengan kata sandi yang lama!</div>');
          redirect('Dashboard/profile');
        } else{
          $password_hash = password_hash($new_password1, PASSWORD_DEFAULT);

          $this->db->set('password', $password_hash);
          $this->db->where('id_siswa', $this->session->id_siswa);
          $this->db->update('siswa');
          // $this->session->set_flashdata('flash', 'Berhasil diubah');
          $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kata Sandi berhasil diperbarui!</div>');
          redirect('Dashboard/profile');
        }
      }
    }
  }

  

// Modul Materi-----------------------------------------------------------------

  public function lihat_materi()
  {
    $data['materi'] = $this->Materi_model->getMateri()->result();
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
      $data['tugas']  = $this->Tugas_model->getTugas()->result();
      $data['title']  = 'Lihat Tugas';

      $this->load->view('layouts/header',$data);
      $this->load->view('dashboard/lihat_tugas',$data);
      $this->load->view('layouts/footer');
    }

    public function detail_tugas($id)
    {
      $data['tugas']  = $this->Tugas_model->getTugasSingle($id)->row();
      $data['title']  = 'Detail Tugas';

      $this->db->where('id_tugas',$data['tugas']->id_tugas);
      $this->db->where('id_siswa',$this->session->id_siswa);
      $data['num_pengumpulan'] = $this->db->get('pengumpulan')->num_rows();

      $this->db->where('id_tugas',$data['tugas']->id_tugas);
      $this->db->where('id_siswa',$this->session->id_siswa);
      $data['pengumpulan'] = $this->db->get('pengumpulan')->result();

      $this->load->view('layouts/header',$data);
      $this->load->view('dashboard/detail_tugas',$data);
      $this->load->view('layouts/footer');
    }

    public function file_tugas($id)
    {
      $this->load->helper('download');
      $fileinfo = $this->Tugas_model->downloadTugas($id);
      $file = '../guru/uploads/'.$fileinfo['file_tugas'];
      force_download($file, NULL);
    }

    public function kumpul_tugas($id_tugas)
    {
      if (empty($_FILES['file_pengumpulan']['name'])) {
        $this->form_validation->set_rules('file_pengumpulan','File Pengumpulan','required');
          if ($this->form_validation->run() == FALSE) {
         $this->detail_tugas($id_tugas);
        }
          }else {
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'pdf|docx|pptx|txt';
            $config['max_size']             = 5000;

            $this->load->library('upload', $config);

            if (! $this->upload->do_upload('file_pengumpulan')) {
              $this->session->set_flashdata('status','File gagal diupload.');
              redirect(base_url('Dashboard/detail_tugas/'.$id_tugas));
              }else {
                $id_siswa     = $this->session->id_siswa;
                $id_pengumpulan   = $this->Nilai_model->idPengumpulan();
                $file_pengumpulan = $this->upload->data('file_name');
                $date             = date('Y-m-d');
                $data = [
                      'id_pengumpulan'      => $id_pengumpulan,
                      'tanggal_pengumpulan' => $date,
                      'file_pengumpulan'    => $file_pengumpulan,
                      'id_siswa'            => $id_siswa,
                      'id_tugas'            => $id_tugas
                ];
                $query = $this->Nilai_model->insertPengumpulan($data);

                if ($query) {
                  redirect($_SERVER['HTTP_REFERER']);
                }
              }
            }
        }

        public function hapus_pengumpulan($id_pengumpulan)
        {
          $this->db->delete('pengumpulan', ['id_pengumpulan' => $id_pengumpulan]);
          $this->session->set_flashdata('message', '<div class="alert alert-success mt-3" role="alert">
            Berkas Pengumpulan Tugas, berhasil dihapus
            </div>');
          redirect($_SERVER['HTTP_REFERER']);
        }

// Akhir Modul Tugas------------------------------------------------------------

// Modul Nilai / Pengumpulan----------------------------------------------------

    public function lihat_nilai()
    {
      $data['nilai']  = $this->Nilai_model->getNilai()->result();
      $data['title']  = 'Detail Nilai';

      $this->load->view('layouts/header',$data);
      $this->load->view('dashboard/lihat_nilai',$data);
      $this->load->view('layouts/footer');
    }

    public function cetakNilai()
    {
      $this->db->join('kelas', 'kelas.id_kelas = siswa.id_kelas');
      $data['siswa'] = $this->db->get_where('siswa', ['id_siswa' => $this->session->userdata('id_siswa')])->row();
    
      $data['nilai']  = $this->Nilai_model->getNilai()->result();
      $this->load->view('dashboard/cetak_nilai',$data);
    }

    public function komplain_nilai($id)
    {
      $data['nilai']  = $this->Nilai_model->getNilaiSingle($id)->row();
      $data['title']  = 'Komplain Nilai';

      $this->load->view('layouts/header',$data);
      $this->load->view('dashboard/komplain_nilai',$data);
      $this->load->view('layouts/footer');
    }

    public function proses_komplain($id_pengumpulan,$id_nilai)
    {
      if (empty($_FILES['file_komplain']['name'])) {
        $this->form_validation->set_rules('file_komplain','File Komplain','required');
          if ($this->form_validation->run() == FALSE) {
         $this->komplain_nilai($id_nilai);
        }
          }else {
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'pdf|docx|pptx|txt|jpg|png|jpeg';
            $config['max_size']             = 50000000;

            $this->load->library('upload', $config);

            if (! $this->upload->do_upload('file_komplain')) {
              $this->session->set_flashdata('status','File gagal diupload.');
              redirect(base_url('Dashboard/komplain_nilai/'.$id_nilai));
              }else {
                $id_komplain      = $this->Nilai_model->idKomplain();
                $file_komplain    = $this->upload->data('file_name');
                $alasan        = $this->input->post('alasan');
                $data = [
                      'id_komplain'     => $id_komplain,
                      'id_pengumpulan'  => $id_pengumpulan,
                      'file_komplain'   => $file_komplain,
                      'alasan'          => $alasan
                ];
                $query = $this->Nilai_model->insertKomplain($data);

                if ($query) {
                  redirect('Dashboard/lihat_nilai');
                }
              }
            }
        }


  public function readAllNotification()
  {
    $user = $this->db->get_where('siswa', ['id_siswa' => $this->session->userdata('id_siswa')])->row_array();
    $this->db->where('id_user', $user['id_siswa']);
    $this->db->update('notifikasi', ['is_read' => 1]);
  }
  public function readNotification($id_notifikasi)
  {
    $user = $this->db->get_where('siswa', ['id_siswa' => $this->session->userdata('id_siswa')])->row_array();
    $this->db->where('id_notifikasi', $id_notifikasi);
    $this->db->update('notifikasi', ['is_read' => 1]);
  }
  public function notifikasi()
  {
    $data['siswa'] = $this->db->get_where('siswa', ['id_siswa' => $this->session->userdata('id_siswa')])->row_array();
    $this->load->view('layouts/notification', $data);
  }

  public function detailNotifikasi($id_notifikasi = null)
  {
    $notifikasi = $this->db->get_where('notifikasi', ['id_notifikasi' => $id_notifikasi])->row();

    $this->db->where('id_notifikasi', $id_notifikasi);
    $this->db->update('notifikasi', ['is_read' => 1]);

    switch ($notifikasi->id_kategori_notifikasi) {
      case 2: redirect('Dashboard/lihat_materi'); break;
      case 3: redirect('Dashboard/detail_tugas/'.$notifikasi->sub_id); break;
      case 4: redirect('Dashboard/lihat_nilai/'); break;
      default: redirect($_SERVER['HTTP_REFERER']); break;
    }

  }

}
