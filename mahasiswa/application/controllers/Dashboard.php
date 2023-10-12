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
    $this->load->view('layouts/header',$data);
    $this->load->view('dashboard/dashboard');
    $this->load->view('layouts/footer');
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
    $file = '../dosen/uploads/'.$fileinfo['file_materi'];
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
      $data['num_pengumpulan'] = $this->db->get('pengumpulan')->num_rows();

      $this->load->view('layouts/header',$data);
      $this->load->view('dashboard/detail_tugas',$data);
      $this->load->view('layouts/footer');
    }

    public function file_tugas($id)
    {
      $this->load->helper('download');
      $fileinfo = $this->Tugas_model->downloadTugas($id);
      $file = '../dosen/uploads/'.$fileinfo['file_tugas'];
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
                $id_mahasiswa     = $this->session->id_mahasiswa;
                $id_pengumpulan   = $this->Nilai_model->idPengumpulan();
                $file_pengumpulan = $this->upload->data('file_name');
                $date             = date('Y-m-d');
                $data = [
                      'id_pengumpulan'      => $id_pengumpulan,
                      'tanggal_pengumpulan' => $date,
                      'file_pengumpulan'    => $file_pengumpulan,
                      'id_mahasiswa'        => $id_mahasiswa,
                      'id_tugas'            => $id_tugas
                ];
                $query = $this->Nilai_model->insertPengumpulan($data);

                if ($query) {
                  redirect(base_url('Dashboard'));
                }
              }
            }
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
            $config['allowed_types']        = 'pdf|docx|pptx|txt';
            $config['max_size']             = 5000;

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
                  redirect(base_url('Dashboard/lihat_nilai'));
                }
              }
            }
        }

}
