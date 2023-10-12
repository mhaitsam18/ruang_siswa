<div class="content-page">
  <div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

      <div class="row page-title">
        <div class="col-md-12">
          <nav aria-label="breadcrumb" class="float-right mt-1">
            <ol class="breadcrumb">

                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
          </nav>
          <!-- <h4 class="mb-1 mt-0">Jadwal Pelajaran</h4> -->
        </div>
      </div>
      <!-- <div class="row" >
        <div class="col-4" >
          <div class="card" >
            <div class="card-body" >
              <h4 class="header-title mt-0 mb-1">Bahasa Indonesia</h4>
              <p class="sub-header">
                SENIN : 08.00 - 09.30
              </p>
      
            </div>
          </div>
        </div>
        <div class="col-4">
          <div class="card" >
            <div class="card-body" >
              <h4 class="header-title mt-0 mb-1">Bahasa Inggris</h4>
              <p class="sub-header">
                SELASA : 09.00 - 11.00
              </p>
            </div>
          </div>
        </div>
        <div class="col-4" >
          <div class="card" >
            <div class="card-body" >
              <h4 class="header-title mt-0 mb-1">Matematika</h4>
              <p class="sub-header">
                RABU : 07.00 - 09.00
              </p>
            </div>
          </div>
        </div>
        <div class="col-4" >
          <div class="card" >
            <div class="card-body" >
              <h4 class="header-title mt-0 mb-1">Fisika</h4>
              <p class="sub-header">
                SENIN : 09.30 - 11.30
              </p>
            </div>
          </div>
        </div>
        <div class="col-4" >
          <div class="card" >
            <div class="card-body" >
              <h4 class="header-title mt-0 mb-1">Biologi</h4>
              <p class="sub-header">
                SELASA : 13.00 - 15.00
              </p>

          </div>
          </div>
        </div>
        <div class="col-4" >
          <div class="card" >
            <div class="card-body" >
              <h4 class="header-title mt-0 mb-1">Kimia</h4>
              <p class="sub-header">
                RABU : 09.00 - 11.00
              </p>
            </div>
          </div>
        </div>
        <div class="col-4" >
          <div class="card" >
            <div class="card-body" >
              <h4 class="header-title mt-0 mb-1">PKN</h4>
              <p class="sub-header">
                SENIN : 13.00 - 14.30
              </p>
            </div>
          </div>
        </div>
        <div class="col-4" >
          <div class="card" >
            <div class="card-body" >
              <h4 class="header-title mt-0 mb-1">Sejarah Indonesia</h4>
              <p class="sub-header">
                KAMIS : 07.00 - 09.00
              </p>
            </div>
          </div>
        </div>
          <div class="col-4" >
          <div class="card" >
            <div class="card-body" >
              <h4 class="header-title mt-0 mb-1">Agama</h4>
              <p class="sub-header">
                JUMAT : 09.00 - 11.00
              </p>
            </div>
          </div>
        </div>

      </div> -->
   

          <h4 class="mb-1 mt-0">Home</h4>
        </div>
      </div>

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-xl-2 col-lg-3 col-6">
                  <img src="assets/images/cal.png" class="mr-4 align-self-center img-fluid " alt="cal" />
                </div>
                <div class="col-xl-10 col-lg-9">
                  <div class="mt-4 mt-lg-0">
                    <h5 class="mt-0 mb-1 font-weight-bold">Selamat Datang <?= $siswa->nama_siswa ?>, di Kelas <?= $siswa->kelas ?></h5>
                    <!-- <p class="text-muted mb-2">Dibawah ini terdapat kalender kegiatanmu yang akan datang. Silahkan di cek!</p> -->

                  </div>
                </div>
              </div>

            </div> <!-- end card body-->
          </div> <!-- end card -->
        </div>
        <!-- end col-12 -->
      </div> <!-- end row -->

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="row">
                
              <div class="col-lg-8">
              <h4 class="card-title">Materi</h4>
              <?php foreach ($materi as $m): ?>
                <div class="row">
                  <div class="col-md-6">
                    <h6 class="mt-0 header-title"><?= $m->mapel ?></h6>
                    <p class="card-text"><?= $m->nama_materi ?></p>
                      <div class="text-muted mt-3">
                        <p><?= $m->deskripsi ?></p>
                      </div>
                  </div>
                  <div class="col-md-6">
                    <div class="text-muted mt-3">
                      <div class="mt-4">
                        <h6 class="font-weight-bold">Attached Files</h6>

                        <div class="row">
                          <div class="col-xl-4 col-md-6">
                            <div class="p-2 border rounded mb-2">
                              <div class="media">
                                <div class="avatar-sm font-weight-bold mr-3">
                                  <span class="avatar-title rounded bg-soft-primary text-primary">
                                    <i class="uil-file-plus-alt font-size-18"></i>
                                  </span>
                                </div>
                                <div class="media-body">
                                  <!-- <a href="<?php echo base_url('Dashboard/file_materi/'.$m->id_materi) ?>" class="p-2">
                                    <i class="uil-download-alt font-size-18" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo $m->file_materi ?>"></i>
                                  </a> -->
                                  <a href="<?php echo base_url('Dashboard/file_materi/'.$m->id_materi) ?>" class="d-inline-block mt-2">Download Materi</a>
                                </div>
                                <div class="float-right mt-1">
                                  <a href="<?php echo base_url('Dashboard/file_materi/'.$m->id_materi) ?>" class="p-2"><i class="uil-download-alt font-size-18"></i></a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                  <hr>
              <?php endforeach ?>
              </div>
              <div class="col-lg-4">
                
              <h4 class="card-title">Tugas</h4>
                <ul class="list-unstyled activity-widget">
                  <?php foreach ($tugas as $t): ?>
                    <?php 
                    $bg = '';
                    $pengumpulan = $this->db->get_where('pengumpulan', ['id_tugas' => $t->id_tugas])->num_rows();
                    $batas_pengumpulan = strtotime($t->batas_pengumpulan);
                    if ($pengumpulan > 0) {
                      $bg = 'bg-soft-success';
                    } elseif (date('Y-m-d H:i:s') > date('Y-m-d H:i:s', strtotime($t->batas_pengumpulan))) {
                      $bg = 'bg-soft-danger';
                    } elseif(date('Y-m-d H:i:s') >= date('Y-m-d H:i:s', strtotime('-3 day', $batas_pengumpulan))) {
                      $bg = 'bg-soft-warning';
                    }
                    ?>
                    <li class="activity-list <?= $bg ?>">
                      <div class="media">
                        <!-- <div class="text-center mr-3">
                          <div class="avatar-sm">
                            <span class="avatar-title rounded-circle bg-soft-primary text-primary"><?= date('d', strtotime($t->batas_pengumpulan)); ?></span>
                          </div>
                          <p class="text-muted font-size-13 mb-0"><?= date('M', strtotime($t->batas_pengumpulan)); ?></p>
                        </div> -->
                        <div class="media-body overflow-hidden ml-3">
                            <!-- <?= strtotime($t->batas_pengumpulan) ?> -->
                          <h5 class="font-size-15 mt-2 mb-1"><a href="#" class="text-dark"><?= $t->mapel ?></a>
                            <?php if ($pengumpulan > 0): ?>
                              <span class="badge badge-success">Complated</span>
                            <?php elseif (date('Y-m-d H:i:s') > date('Y-m-d H:i:s', strtotime($t->batas_pengumpulan))): ?>
                              <span class="badge badge-danger">Waktu habis</span>
                            <?php elseif (date('Y-m-d H:i:s') >= date('Y-m-d H:i:s', strtotime('-3 day', $batas_pengumpulan))): ?>
                              <span class="badge badge-warning">Mendekati Deadline</span>
                            <?php endif ?>
                          </h5>

                          <p class="text-muted font-size-13 text-truncate mb-0"><?= $t->nama_tugas ?></p>
                          <a href="<?php echo base_url('Dashboard/detail_tugas/'.$t->id_tugas) ?>" class="p-2"><i class="uil-file-search-alt font-size-18"></i> Detail Tugas</a>
                          <p class="card-text">
                            <strong>Batas Pengumpulan: <?= cari_waktu2($t->batas_pengumpulan) ?></strong>
                          </p>
                        </div>
                      </div>
                    </li>
                    <hr>
                  <?php endforeach ?>
              </ul>
              </div>
              </div>
            </div> <!-- end card body-->
          </div> <!-- end card -->
        </div>
        <!-- end col-12 -->
      </div> <!-- end row -->
      <!-- end modal-->
    </div> <!-- container-fluid -->

  </div> <!-- content -->
