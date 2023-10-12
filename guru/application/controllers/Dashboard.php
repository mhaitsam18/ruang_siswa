<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Materi_model');
    $this->load->model('Tugas_model');
    $this->load->model('Guru_model');
    $this->load->model('Nilai_model');
    is_logged_in();
  }

  public function index()
  {
    $data['title'] = 'Dashboard';
    // $where = [
    //   'id_guru' => $this->session->id_guru,
    //   'id_guru' => '>'.time()
    // ];
    $data['tugas'] = $this->Tugas_model->getTugas()->result();
    $data['pelajaran'] = $this->Guru_model->getPelajaran($this->session->id_guru)->result();
    $data['role_guru'] = $this->db->get_where('role_guru', ['id_guru' => $this->session->id_guru])->result();
    $this->load->view('layouts/header',$data);
    $this->load->view('dashboard/dashboard', $data);
    $this->load->view('layouts/footer');
  }

// Modul Materi-----------------------------------------------------------------
  public function tambah_materi()
  {
    $data['title'] = 'Tambah Materi';


    $this->db->distinct();
    $this->db->select('mapel.id_mapel AS idm, mapel.mapel AS m');
    $this->db->join('role_guru', 'mapel.id_mapel=role_guru.id_mapel');
    $data['mapel'] = $this->db->get_where('mapel', ['id_guru' => $this->session->id_guru])->result();

    // $this->db->select('*, kelas.id_kelas AS idk');
    $this->db->join('role_guru', 'kelas.id_kelas=role_guru.id_kelas');
    $data['kelas'] = $this->db->get_where('kelas', ['id_guru' => $this->session->id_guru])->result();
    $this->load->view('layouts/header',$data);
    $this->load->view('dashboard/tambah_materi');
    $this->load->view('layouts/footer');
  }

  public function getKelasByMapel($id_mapel = null)
  {
    $this->db->join('role_guru', 'kelas.id_kelas=role_guru.id_kelas');
    $data['kelas'] = $this->db->get_where('kelas', [
      'id_guru' => $this->session->id_guru,
       'id_mapel' => $id_mapel])->result();
    $this->load->view('crop/kelas-select', $data);
  }

  public function lihat_materi()
  {
    $data['materi'] = $this->Materi_model->getMateri()->result();
    $data['title']  = 'Lihat Materi';

    $this->load->view('layouts/header',$data);
    $this->load->view('dashboard/lihat_materi',$data);
    $this->load->view('layouts/footer');
  }

  public function edit_materi($id)
  {
    $data['materi'] = $this->Materi_model->getMateriSingle($id)->row();
    $data['title']  = 'Edit Materi';
    // $this->db->select('*, mapel.id_mapel AS idm');
    $this->db->join('role_guru', 'mapel.id_mapel=role_guru.id_mapel');
    $data['mapel'] = $this->db->get_where('mapel', ['id_guru' => $this->session->id_guru])->result();

    // $this->db->select('*, kelas.id_kelas AS idk');
    $this->db->join('role_guru', 'kelas.id_kelas=role_guru.id_kelas');
    $data['kelas'] = $this->db->get_where('kelas', ['id_guru' => $this->session->id_guru])->result();

    $this->load->view('layouts/header',$data);
    $this->load->view('dashboard/edit_materi',$data);
    $this->load->view('layouts/footer');
  }

  public function proses_tambah_materi()
    {
      $this->form_validation->set_rules('nama_materi','Nama Materi','required');
      $this->form_validation->set_rules('deskripsi','Deskripsi','required');
      $this->form_validation->set_rules('id_kelas','Kelas','required');

      if (empty($_FILES['file_materi']['name'])) {
        $this->form_validation->set_rules('file_materi','file materi','required');
      }
      if ($this->form_validation->run() == FALSE) {
        $this->tambah_materi();
      }else {
        $nama_materi       = $this->input->post('nama_materi');
        $deskripsi         = $this->input->post('deskripsi');
        $id_kelas          = $this->input->post('id_kelas');
        $id_mapel          = $this->input->post('id_mapel');

        $config['upload_path']    = './uploads/';
        $config['allowed_types']  = 'pdf|docx|pptx|ppt';
        $config['max_size']       = 50000000;

        $this->load->library('upload', $config);

        if (! $this->upload->do_upload('file_materi')) {
          $this->session->set_flashdata('status','File gagal diupload.');
          redirect(base_url('Dashboard/tambah_materi'));
        }else {

          $id_guru    = $this->session->id_guru;
          if ($id_kelas != "All") {
            $role_guru = $this->db->get_where('role_guru', ['id_guru' => $id_guru, 'id_kelas' => $id_kelas, 'id_mapel' => $id_mapel])->row();
          }
          $file_materi = $this->upload->data('file_name');
          $date        = date('Y-m-d');

          if ($id_kelas == "All") {
            $this->db->join('role_guru', 'kelas.id_kelas=role_guru.id_kelas');
            $kelas = $this->db->get_where('kelas', [
              'id_guru' => $this->session->id_guru,
              'id_mapel' => $id_mapel])->result();
            foreach ($kelas as $key) {
              $id_materi   = $this->Materi_model->idMateri();
              $data = array(
                  'id_materi'     => $id_materi,
                  'nama_materi'   => $nama_materi,
                  'deskripsi'     => $deskripsi,
                  'tanggal_upload'=> $date,
                  'file_materi'   => $file_materi,
                  'id_role_guru'      => $key->id_role_guru
              );
              $q = $this->Materi_model->insertMateri($data);

              $siswa = $this->db->get_where('siswa', ['id_kelas' => $key->id_kelas])->result();

              foreach ($siswa as $s) {
                $this->db->insert('notifikasi', [
                  'id_user' => $s->id_siswa,
                  'id_kategori_notifikasi' => 2,
                  'sub_id' => $id_materi,
                  // 'waktu_notifikasi' => date('Y-m-d H:i:s'),
                  'subjek' => 'Materi',
                  'pesan' => 'Pak/Bu '.$this->session->userdata('nama_guru').' memberikan materi baru',
                  'is_read' => 0,
                  'id_creator' => $this->session->userdata('id_guru')
                ]);
              }

            }
          } else{
            $id_materi   = $this->Materi_model->idMateri();
            $data = array(
                'id_materi'     => $id_materi,
                'nama_materi'   => $nama_materi,
                'deskripsi'     => $deskripsi,
                'tanggal_upload'=> $date,
                'file_materi'   => $file_materi,
                'id_role_guru'      => $role_guru->id_role_guru
            );

            $q = $this->Materi_model->insertMateri($data);

            $siswa = $this->db->get_where('siswa', ['id_kelas' => $id_kelas])->result();
            foreach ($siswa as $s) {
              $this->db->insert('notifikasi', [
                'id_user' => $s->id_siswa,
                'id_kategori_notifikasi' => 2,
                'sub_id' => $id_materi,
                // 'waktu_notifikasi' => date('Y-m-d H:i:s'),
                'subjek' => 'Materi',
                'pesan' => 'Pak/Bu '.$this->session->userdata('nama_guru').' memberikan materi baru',
                'is_read' => 0,
                'id_creator' => $this->session->userdata('id_guru')
              ]);
            }
          }

          if ($q) {
            redirect(base_url('Dashboard/lihat_materi'));
          }
        }
      }
    }

    public function proses_edit_materi($id)
    {
      $upload_file = $_FILES['file_materi']['name'];
      if ($upload_file) {
        $config['allowed_types'] = 'pdf|docx|pptx|ppt';
        $config['upload_path'] = './uploads/';
        $config['max_size']     = 5000000;
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('file_materi')) {
          $file_materi = $this->upload->data('file_name');
          $this->db->set('file_materi', $file_materi);
        } else{
          redirect(base_url('Dashboard/lihat_materi'));
        }
      }
      $role_guru = $this->db->get_where('role_guru', ['id_guru' => $this->session->id_guru, 'id_kelas' => $this->input->post('id_kelas'), 'id_mapel' => $this->input->post('id_mapel')])->row();

      $data  = [
        'nama_materi' => $this->input->post('nama_materi'),
        'id_role_guru' => $role_guru->id_role_guru,
        'deskripsi' => $this->input->post('deskripsi')
      ];
      $query = $this->Materi_model->updateMateri($id,$data);
      if ($query) {   
        return redirect(base_url('Dashboard/lihat_materi'));
      }
    }

    public function hapus_materi($id)
    {
      $query = $this->Materi_model->deleteMateri($id);
      if ($query) {
        return redirect(base_url('Dashboard/lihat_materi'));
      }
    }
// Akhir Modul Materi-----------------------------------------------------------

// Modul Tugas------------------------------------------------------------------
    public function tambah_tugas()
    {
      $data['title'] = 'Tambah tugas';


      $this->db->distinct();
      $this->db->select('mapel.id_mapel AS idm, mapel.mapel AS m');
      $this->db->join('role_guru', 'mapel.id_mapel=role_guru.id_mapel');
      $data['mapel'] = $this->db->get_where('mapel', ['id_guru' => $this->session->id_guru])->result();

      // $this->db->select('*, kelas.id_kelas AS idk');
      $this->db->join('role_guru', 'kelas.id_kelas=role_guru.id_kelas');
      $data['kelas'] = $this->db->get_where('kelas', ['id_guru' => $this->session->id_guru])->result();

      $data['kategori_tugas'] = $this->db->get('kategori_tugas')->result();
      $this->load->view('layouts/header',$data);
      $this->load->view('dashboard/tambah_tugas');
      $this->load->view('layouts/footer');
    }

    public function lihat_tugas()
    {
      $data['tugas']  = $this->Tugas_model->getTugas()->result();
      $data['title']  = 'Lihat Tugas';

      $this->load->view('layouts/header',$data);
      $this->load->view('dashboard/lihat_tugas',$data);
      $this->load->view('layouts/footer');
    }

    public function proses_tambah_tugas()
    {

      $this->form_validation->set_rules('nama_tugas','nama tugas','required');
      $this->form_validation->set_rules('deskripsi','deskripsi','required');
      $this->form_validation->set_rules('batas_pengumpulan','batas','required');
      $this->form_validation->set_rules('batas_jam','batas jam','required');
      $this->form_validation->set_rules('id_kelas','Kelas','required');
      $this->form_validation->set_rules('id_mapel','Mata Pelajaran','required');
      $this->form_validation->set_rules('id_kategori_tugas','Kategori','required');

      if (empty($_FILES['file_tugas']['name'])) {
        $this->form_validation->set_rules('file_tugas','file tugas','required');
      }
      if ($this->form_validation->run() == FALSE) {
        $this->tambah_tugas();
      }else {
        $nama_tugas        = $this->input->post('nama_tugas');
        $deskripsi         = $this->input->post('deskripsi');
        $batas_pengumpulan = $this->input->post('batas_pengumpulan').' '.$this->input->post('batas_jam');
        
        $id_kategori_tugas          = $this->input->post('id_kategori_tugas');

        $id_kelas          = $this->input->post('id_kelas');
        $id_mapel          = $this->input->post('id_mapel');

        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'pdf|docx|pptx|ppt';
        $config['max_size']             = 50000000;

        $this->load->library('upload', $config);

        if (! $this->upload->do_upload('file_tugas')) {
          $this->session->set_flashdata('status','File gagal diupload.');
          redirect(base_url('Dashboard/tambah_tugas'));
        }else {
          $id_guru    = $this->session->id_guru;
          if ($id_kelas != "All") {
            $role_guru = $this->db->get_where('role_guru', ['id_guru' => $id_guru, 'id_kelas' => $id_kelas, 'id_mapel' => $id_mapel])->row();
          }
          $file_tugas = $this->upload->data('file_name');
          if ($id_kelas == "All") {
            $this->db->join('role_guru', 'kelas.id_kelas=role_guru.id_kelas');
            $kelas = $this->db->get_where('kelas', [
              'id_guru' => $this->session->id_guru,
              'id_mapel' => $id_mapel])->result();
            foreach ($kelas as $key) {
              $id_tugas   = $this->Tugas_model->idTugas();
              $data = array(
                  'id_tugas'          => $id_tugas,
                  'nama_tugas'        => $nama_tugas,
                  'deskripsi'         => $deskripsi,
                  'batas_pengumpulan' => $batas_pengumpulan,
                  'file_tugas'        => $file_tugas,
                  'id_kategori_tugas' => $id_kategori_tugas,
                  'id_role_guru'      => $key->id_role_guru
              );
              $query = $this->Tugas_model->insertTugas($data);
              $siswa = $this->db->get_where('siswa', ['id_kelas' => $key->id_kelas])->result();
              foreach ($siswa as $s) {
                $this->db->insert('notifikasi', [
                  'id_user' => $s->id_siswa,
                  'id_kategori_notifikasi' => 3,
                  'sub_id' => $id_tugas,
                  // 'waktu_notifikasi' => date('Y-m-d H:i:s'),
                  'subjek' => 'Tugas',
                  'pesan' => 'Pak/Bu '.$this->session->userdata('nama_guru').' memberikan tugas baru',
                  'is_read' => 0,
                  'id_creator' => $this->session->userdata('id_guru')
                ]);
              }
            }
          } else{
            $id_tugas   = $this->Tugas_model->idTugas();
            $data = array(
                'id_tugas'          => $id_tugas,
                'nama_tugas'        => $nama_tugas,
                'deskripsi'         => $deskripsi,
                'batas_pengumpulan' => $batas_pengumpulan,
                'file_tugas'        => $file_tugas,
                'id_kategori_tugas' => $id_kategori_tugas,
                  'id_role_guru'      => $role_guru->id_role_guru
            );
            $query = $this->Tugas_model->insertTugas($data);
            $siswa = $this->db->get_where('siswa', ['id_kelas' => $id_kelas])->result();
            foreach ($siswa as $s) {
              $this->db->insert('notifikasi', [
                'id_user' => $s->id_siswa,
                'id_kategori_notifikasi' => 3,
                'sub_id' => $id_tugas,
                // 'waktu_notifikasi' => date('Y-m-d H:i:s'),
                'subjek' => 'Tugas',
                'pesan' => 'Pak/Bu '.$this->session->userdata('nama_guru').' memberikan tugas baru',
                'is_read' => 0,
                'id_creator' => $this->session->userdata('id_guru')
              ]);
            }
          }

          if ($query) {
            redirect(base_url('Dashboard/lihat_tugas'));
          }
        }
      }
    }

    public function hapus_tugas($id)
    {
      $query = $this->Tugas_model->deleteTugas($id);
      if ($query) {
        return redirect(base_url('Dashboard/lihat_tugas'));
      }
    }
// Akhir Modul Tugas------------------------------------------------------------

// Modul Nilai / Pengumpulan----------------------------------------------------
    public function file_pengumpulan($id)
    {
      $this->load->helper('download');
      $fileinfo = $this->Nilai_model->filePengumpulan($id);
      $file = '../siswa/uploads/'.$fileinfo['file_pengumpulan'];
      force_download($file, NULL);
    }

    public function daftar_pengumpulan()
    {
      $data['pengumpulan'] = $this->Nilai_model->getPengumpulan()->result();
      $data['title']       = 'Lihat Pengumpulan';

      $this->load->view('layouts/header',$data);
      $this->load->view('dashboard/daftar_pengumpulan',$data);
      $this->load->view('layouts/footer');
    }

    public function lihat_nilai()
    {
      $data['nilai']  = $this->Nilai_model->getNilai()->result();
      $data['title']  = 'Lihat Nilai';

      $this->load->view('layouts/header',$data);
      $this->load->view('dashboard/lihat_nilai',$data);
      $this->load->view('layouts/footer');
    }

    public function edit_nilai($id)
    {
      $data['nilai']  = $this->Nilai_model->getNilaiSingle($id)->row();
      $data['title']  = 'Edit Nilai';

      $this->load->view('layouts/header',$data);
      $this->load->view('dashboard/edit_nilai',$data);
      $this->load->view('layouts/footer');
    }

    public function proses_edit_nilai($id)
    {
      $this->form_validation->set_rules('nilai','Nilai','required|numeric');
      if ($this->form_validation->run() == FALSE) {
        $this->edit_nilai($id);
      }else {
        $nilai          = $this->input->post('nilai');
        $data = array(
            'nilai'  => $nilai,
        );
        $result = $this->Nilai_model->updateNilai($id,$data);
        $siswa = $this->db->get_where('siswa', ['id_kelas' => $id_kelas])->result();
        foreach ($siswa as $s) {
          $this->db->insert('notifikasi', [
            'id_user' => $s->id_siswa,
            'id_kategori_notifikasi' => 4,
            'sub_id' => $id,
            // 'waktu_notifikasi' => date('Y-m-d H:i:s'),
            'subjek' => 'Tugas',
            'pesan' => 'Pak/Bu '.$this->session->userdata('nama_guru').' mengubah Nilai Anda',
            'is_read' => 0,
            'id_creator' => $this->session->userdata('id_guru')
          ]);
        }
        redirect(base_url('Dashboard/lihat_nilai'));
      }
    }

    public function input_nilai($id)
    {
      $data['pengumpulan'] = $this->Nilai_model->getPengumpulanSingle($id)->row();
      $data['title']       = 'Input Nilai';

      $this->load->view('layouts/header',$data);
      $this->load->view('dashboard/input_nilai',$data);
      $this->load->view('layouts/footer');
    }

    public function proses_input_nilai($id)
    {
      $this->form_validation->set_rules('nilai','Nilai','required|numeric');
      if ($this->form_validation->run() == FALSE) {
        $this->input_nilai($id);
      }else {
        $id_nilai       = $this->Nilai_model->idNilai();
        $nilai          = $this->input->post('nilai');
        $keterangan     = $this->input->post('keterangan');
        $id_pengumpulan = $id;
        $data = array(
            'id_nilai'       => $id_nilai,
            'nilai'          => $nilai,
            'keterangan'     => $keterangan,
            'id_pengumpulan' => $id_pengumpulan,
        );
        $result = $this->Nilai_model->insertNilai($data);
        redirect(base_url('Dashboard/lihat_nilai'));
      }
    }

    public function lihat_komplain()
    {
      $data['komplain']  = $this->Nilai_model->getKomplain()->result();
      $data['title']     = 'Lihat Komplain';

      $this->load->view('layouts/header',$data);
      $this->load->view('dashboard/lihat_komplain',$data);
      $this->load->view('layouts/footer');
    }

    public function komplain_nilai($id)
    {
      $data['komplain']  = $this->Nilai_model->getKomplainSingle($id)->row();
      $data['title']     = 'Detail Komplain';

      $this->load->view('layouts/header',$data);
      $this->load->view('dashboard/komplain_nilai',$data);
      $this->load->view('layouts/footer');
    }

    public function file_komplain($id)
    {
      $this->load->helper('download');
      $fileinfo = $this->Nilai_model->fileKomplain($id);
      $file = '../siswa/uploads/'.$fileinfo['file_komplain'];
      force_download($file, NULL);
    }

    public function nilai($id_role_guru = null)
    {
      $data['komplain']  = $this->Nilai_model->getKomplainSingle($id)->row();
      $data['title']     = 'Detail Komplain';

      $this->load->view('layouts/header',$data);
      $this->load->view('dashboard/nilai',$data);
      $this->load->view('layouts/footer');
    }
}
