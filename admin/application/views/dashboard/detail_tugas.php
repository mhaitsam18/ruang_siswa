<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->

<div class="content-page">
  <div class="content">

    <!-- Start Content-->
    <div class="container-fluid">
      <div class="row page-title">
        <div class="col-sm-8 col-xl-6">
          <h4 class="mb-1 mt-0">
            <?php echo $tugas->matapelajaran ?>
            <div class="badge badge-success font-size-13 font-weight-normal">Completed</div>
          </h4>
        </div>
      </div>

      <!-- details-->
      <div class="row">
        <div class="col-xl-8">
          <div class="card">
            <div class="card-body">
              <h6 class="mt-0 header-title"><?php echo $tugas->nama_tugas ?></h6>

              <div class="text-muted mt-3">
                <p><?php echo $tugas->deskripsi ?></p>
                <ul class="pl-4 mb-4">
                  <li>Quis autem vel eum iure</li>
                  <li>Ut enim ad minima veniam</li>
                  <li>Et harum quidem rerum</li>
                  <li>Nam libero cum soluta</li>
                </ul>

                <div class="row">
                  <div class="col-lg-3 col-md-6">
                    <div class="mt-4">
                      <p class="mb-2"><i class="uil-file text-danger"></i> Kategori</p>
                      <h5 class="font-size-16"><?php echo $tugas->kategori ?></h5>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6">
                    <div class="mt-4">
                      <p class="mb-2"><i class="uil-calendar-slash text-danger"></i> Tanggal Deadline</p>
                      <h5 class="font-size-16"><?php echo $tugas->batas_pengumpulan ?></h5>
                    </div>
                  </div>

                  <div class="col-lg-3 col-md-6">
                    <div class="mt-4">
                      <p class="mb-2"><i class="uil-user text-danger"></i> Kelas</p>
                      <h5 class="font-size-16"><?php echo $tugas->kelas ?></h5>
                    </div>
                  </div>
                </div>

                <div class="mt-4">
                  <h6 class="font-weight-bold">File Tugas</h6>

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
                            <a href="<?php echo base_url('Dashboard/file_tugas/'.$tugas->id_tugas) ?>"
                              class="d-inline-block mt-2"><?php echo $tugas->file_tugas ?></a>
                          </div>
                          <div class="float-right mt-1">
                            <a href="<?php echo base_url('Dashboard/file_tugas/'.$tugas->id_tugas) ?>"
                              class="p-2"><i class="uil-download-alt font-size-18"></i></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>

            </div>
          </div>
          <!-- end card -->



        </div>
        <div class="col-xl-4">
          <div class="card">
            <div class="card-body">
              <h6 class="mt-0 header-title">Daftar yang mengumpulkan</h6>

              <ul class="list-unstyled activity-widget">
                <li class="activity-list">
                  <div class="media">
                    <div class="text-center mr-3">
                      <div class="avatar-sm">
                        <img src="<?php echo base_url() ?>assets/images/users/avatar-10.jpg" alt="" class="avatar-sm m-1 rounded-circle">
                      </div>
                    </div>
                    <div class="media-body overflow-hidden">
                      <h5 class="font-size-15 mt-2 mb-1"><a href="#" class="text-dark">Everett</a></h5>
                      <p class="text-muted font-size-13 text-truncate mb-0">Ut enim ad
                        minima veniam quis velit</p>
                    </div>
                  </div>
                </li>





              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- end row -->

    </div> <!-- container-fluid -->

  </div> <!-- content -->

              <!-- ============================================================== -->
              <!-- Start Page Content here -->
              <!-- ============================================================== -->

                  <div class="content">

                      <!-- Start Content-->
                      <div class="container-fluid">
                          <div class="row">
                              <div class="col-12">
                                  <div class="card">
                                      <div class="card-body">
                                          <h4 class="header-title mt-0 mb-1">Upload File Tugas Anda</h4>
                                          <p class="sub-header">
                                              DropzoneJS is an open source library that provides drag’n’drop file uploads with image previews.
                                          </p>
                                          <?= form_open_multipart('Dashboard/kumpul_tugas/'.$tugas->id_tugas,' id="myAwesomeDropzone"',array('method' =>'POST')) ?>
                                              <div class="fallback">
                                                  <input name="file_pengumpulan" type="file" multiple/>
                                              </div>
                                              <div class="dz-message needsclick">
                                                  <i class="h1 text-muted  uil-cloud-upload"></i>
                                                  <h3>Drop files here or click to upload.</h3>
                                              </div>
                                          <div class="clearfix text-right mt-3">
                                              <button class="btn btn-danger"> <i class="uil uil-arrow-right mr-1"></i> Submit</button>
                                          </div>
                                          <?php echo form_close() ?>
                                      </div> <!-- end card-body -->
                                  </div>
                              </div> <!-- end col-->
                          </div>
                          <!-- end row -->

                      </div> <!-- container-fluid -->

                  </div> <!-- content -->
