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
            <?php echo $pengumpulan->nama_tugas ?>
            <div class="badge badge-success font-size-13 font-weight-normal">Completed</div>
          </h4>
        </div>
      </div>

      <!-- details-->
      <div class="row">
        <div class="col-xl-8">
          <div class="card">
            <div class="card-body">
              <h6 class="mt-0 header-title"><?php echo $pengumpulan->nama_tugas ?></h6>

              <div class="text-muted mt-3">
                <p><?php echo $pengumpulan->deskripsi ?></p>

                <div class="row">
                  <div class="col-lg-3 col-md-6">
                    <div class="mt-4">
                      <p class="mb-2"><i class="uil-file text-danger"></i> Kategori</p>
                      <h5 class="font-size-16"><?php echo $pengumpulan->kategori ?></h5>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6">
                    <div class="mt-4">
                      <p class="mb-2"><i class="uil-calender text-danger"></i> Tanggal Pengumpulan</p>
                      <h5 class="font-size-16"><?php echo $pengumpulan->tanggal_pengumpulan ?></h5>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6">
                    <div class="mt-4">
                      <p class="mb-2"><i class="uil-calendar-slash text-danger"></i> Tanggal Deadline</p>
                      <h5 class="font-size-16"><?php echo $pengumpulan->batas_pengumpulan ?></h5>
                    </div>
                  </div>

                  <div class="col-lg-3 col-md-6">
                    <div class="mt-4">
                      <p class="mb-2"><i class="uil-user text-danger"></i> Nama Siswa</p>
                      <h5 class="font-size-16"><?php echo $pengumpulan->nama_siswa ?></h5>
                    </div>
                  </div>
                </div>

                <div class="assign team mt-4">
                  <h6 class="font-weight-bold">Assign To</h6>
                  <a href="javascript: void(0);">
                    <img src="<?php echo base_url() ?>assets/images/users/avatar-10.jpg" alt="" class="avatar-sm m-1 rounded-circle">
                  </a>
                </div>

                <div class="mt-4">
                  <h6 class="font-weight-bold">File Pengumpulan</h6>

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
                            <a href="<?php echo base_url('Dashboard/file_pengumpulan/'.$pengumpulan->id_tugas) ?>"
                              class="d-inline-block mt-2"><?php echo $pengumpulan->file_pengumpulan ?></a>
                          </div>
                          <div class="float-right mt-1">
                            <a href="<?php echo base_url('Dashboard/file_pengumpulan/'.$pengumpulan->id_tugas) ?>"
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

        <?= form_open_multipart('Dashboard/proses_input_nilai/'.$pengumpulan->id_pengumpulan,array('method' =>'POST')) ?>
          <input type="text" name="id_siswa" value="<?php echo $pengumpulan->id_siswa ?>" hidden>
          <div class="card">
            <div class="card-body">
              <h6 class="mt-0 header-title">Input Nilai</h6>
              <div class="row">
                <div class="col">
                  <div class="form-group row">
                      <label class="col-lg-2 col-form-label"
                          for="simpleinput">Nilai</label>
                      <div class="col-lg-10">
                          <input type="text" name="nilai" class="form-control" id="simpleinput" placeholder="70.5">
                          <small class="form-text text-danger"><?= form_error('nilai'); ?></small>
                      </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="form-group row">
                      <label class="col-lg-2 col-form-label"
                          for="simpleinput">Keterangan</label>
                      <div class="col-lg-10">
                          <input type="text" name="keterangan" class="form-control" id="simpleinput" placeholder="Tugas 1 / Asessment 1">
                          <small class="form-text text-danger"><?= form_error('keterangan'); ?></small>
                      </div>
                  </div>
                </div>
              </div>
              <div class="form-group mb-0 text-center">
                <button class="btn btn-primary btn-block" type="submit">Input Nilai</button>
              </div>
            </div>
          </div>
        <?php echo form_close() ?>

          <!-- end card -->
         <!--  <div class="card">
            <div class="card-body">
              <div class="">
                <ul class="nav nav-pills navtab-bg">
                  <li class="nav-item">
                    <a href="#comments" data-toggle="tab" aria-expanded="true" class="nav-link active">
                      Discussions
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#attac-file" data-toggle="tab" aria-expanded="false" class="nav-link">
                      Files/Resources
                    </a>
                  </li>
                </ul>
                <div class="tab-content text-muted">
                  <div class="tab-pane show active" id="comments">
                    <h5 class="mb-4 pb-1 header-title">Comments (6)</h5>
                    <div class="media mb-4 font-size-14">
                      <div class="mr-3">
                        <a href="#"> <img class="media-object rounded-circle avatar-sm" alt="" src="assets/images/users/avatar-2.jpg"> </a>
                      </div>
                      <div class="media-body">
                        <h5 class="mt-0 font-size-15">John Cooks</h5>
                        <p class="text-muted mb-1">
                          <a href="#" class="text-danger">@Rick Perry</a>
                          Their separate existence is a myth.
                        </p>
                        <a href="#" class="text-primary">Reply</a>
                      </div>
                    </div>
                    <div class="media mb-4 font-size-14">
                      <div class="mr-3">
                        <a href="#"> <img class="media-object rounded-circle avatar-sm" alt="" src="assets/images/users/avatar-3.jpg"> </a>
                      </div>
                      <div class="media-body">
                        <h5 class="mt-0 font-size-15">Jayden Dowie</h5>
                        <p class="text-muted mb-1">
                          <a href="#" class="text-danger">@Rick Perry</a>
                          It will be as simple as occidental in fact be Occidental
                          will seem like simplified.
                        </p>
                        <a href="#" class="text-primary">Reply</a>

                        <div class="media mt-3 font-size-14">
                          <div class="d-flex mr-3">
                            <a href="#">
                              <div class="avatar-sm font-weight-bold d-inline-block m-1">
                                <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                  R
                                </span>
                              </div>
                            </a>
                          </div>
                          <div class="media-body">
                            <h5 class="mt-0 font-size-15">Ray Roberts</h5>
                            <p class="text-muted mb-0">
                              <a href="#" class="text-danger">@Rick Perry</a>
                              Cras sit amet nibh libero.
                            </p>
                            <a href="#" class="text-primary">Reply</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="media mb-4 font-size-14">
                      <div class="mr-3">
                        <a href="#"> <img class="media-object rounded-circle avatar-sm" alt="" src="assets/images/users/avatar-2.jpg"> </a>
                      </div>
                      <div class="media-body">
                        <h5 class="mt-0 font-size-15">John Cooks</h5>
                        <p class="text-muted">
                          <a href="#" class="text-danger">@Rick Perry</a>
                          Itaque earum rerum hic
                        </p>
                        <div class="p-2 border rounded mb-2">
                          <div class="media">
                            <div class="avatar-sm font-weight-bold mr-3">
                              <span class="avatar-title rounded bg-soft-primary text-primary">
                                <i class="uil-file-plus-alt font-size-18"></i>
                              </span>
                            </div>
                            <div class="media-body">
                              <a href="#" class="d-inline-block mt-2">Landing
                                1.psd</a>
                            </div>
                            <div class="float-right mt-1">
                              <a href="#" class="p-2"><i class="uil-download-alt font-size-18"></i></a>
                            </div>
                          </div>
                        </div>
                        <a href="#" class="text-primary">Reply</a>
                      </div>
                    </div>
                    <div class="media">
                      <div class="d-flex mr-3">
                        <a href="#"> <img class="media-object rounded-circle avatar-sm" alt="" src="assets/images/users/avatar-1.jpg"> </a>
                      </div>
                      <div class="media-body">
                        <input type="text" class="form-control input-sm" placeholder="Some text value...">
                      </div>
                    </div>

                  </div>
                  <div class="tab-pane" id="attac-file">
                    <h5 class="mb-3">Attached Files:</h5>
                    <div>
                      <div class="p-2 border rounded mb-3">
                        <div class="media">
                          <div class="avatar-sm font-weight-bold mr-3">
                            <span class="avatar-title rounded bg-soft-primary text-primary">
                              <i class="uil-file-plus-alt font-size-18"></i>
                            </span>
                          </div>
                          <div class="media-body">
                            <a href="#" class="d-inline-block mt-2">Landing
                              1.psd</a>
                          </div>
                          <div class="float-right mt-1">
                            <a href="#" class="p-2"><i class="uil-download-alt font-size-18"></i></a>
                          </div>
                        </div>
                      </div>
                      <div class="p-2 border rounded mb-3">
                        <div class="media">
                          <div class="avatar-sm font-weight-bold mr-3">
                            <span class="avatar-title rounded bg-soft-primary text-primary">
                              <i class="uil-file-plus-alt font-size-18"></i>
                            </span>
                          </div>
                          <div class="media-body">
                            <a href="#" class="d-inline-block mt-2">Landing
                              2.psd</a>
                          </div>
                          <div class="float-right mt-1">
                            <a href="#" class="p-2"><i class="uil-download-alt font-size-18"></i></a>
                          </div>
                        </div>
                      </div>

                      <div class="p-2 border rounded mb-3">
                        <div>
                          <a href="#" class="d-inline-block m-1"><img src="assets/images/small/img-2.jpg" alt="" class="avatar-lg rounded"></a>
                          <a href="#" class="d-inline-block m-1"><img src="assets/images/small/img-3.jpg" alt="" class="avatar-lg rounded"></a>
                          <a href="#" class="d-inline-block m-1"><img src="assets/images/small/img-4.jpg" alt="" class="avatar-lg rounded"></a>
                        </div>
                      </div>

                      <div class="p-2 border rounded mb-3">
                        <div class="media">
                          <div class="avatar-sm font-weight-bold mr-3">
                            <span class="avatar-title rounded bg-soft-primary text-primary">
                              <i class="uil-file-plus-alt font-size-18"></i>
                            </span>
                          </div>
                          <div class="media-body">
                            <a href="#" class="d-inline-block mt-2">Logo.psd</a>
                          </div>
                          <div class="float-right mt-1">
                            <a href="#" class="p-2"><i class="uil-download-alt font-size-18"></i></a>
                          </div>
                        </div>
                      </div>
                      <div class="p-2 border rounded mb-3">
                        <div>
                          <a href="#" class="d-inline-block m-1"><img src="assets/images/small/img-7.jpg" alt="" class="avatar-lg rounded"></a>
                          <a href="#" class="d-inline-block m-1"><img src="assets/images/small/img-6.jpg" alt="" class="avatar-lg rounded"></a>
                        </div>
                      </div>

                      <div class="p-2 border rounded mb-3">
                        <div class="media">
                          <div class="avatar-sm font-weight-bold mr-3">
                            <span class="avatar-title rounded bg-soft-primary text-primary">
                              <i class="uil-file-plus-alt font-size-18"></i>
                            </span>
                          </div>
                          <div class="media-body">
                            <a href="#" class="d-inline-block mt-2">Clients.psd</a>
                          </div>
                          <div class="float-right mt-1">
                            <a href="#" class="p-2"><i class="uil-download-alt font-size-18"></i></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
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
                </li> -->





              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- end row -->

    </div> <!-- container-fluid -->

  </div> <!-- content -->
