<div class="content-page">
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row page-title">
                <div class="col-md-12">
                    <nav aria-label="breadcrumb" class="float-right mt-1">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Ruang Siswa</a></li>
                            <li class="breadcrumb-item"><a href="#">Nilai</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Komplain Nilai</li>
                        </ol>
                    </nav>
                    <h4 class="mb-1 mt-0">Komplain Nilai</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mt-0">Komplain Nilai Siswa</h4>
                            <p class="sub-header">
                              Cek deskripsi siswa!
                            </p>
                                <div class="row">
                                    <div class="col">

                                      <div class="form-group row">
                                          <label class="col-lg-2 col-form-label"
                                              for="simpleinput">Nama Siswa</label>
                                          <div class="col-lg-10">
                                              <input type="text" disabled value="<?php echo $komplain->nama_siswa?>" class="form-control" id="simpleinput">
                                          </div>
                                      </div>

                                      <div class="form-group row">
                                          <label class="col-lg-2 col-form-label"
                                              for="simpleinput">Kelas</label>
                                          <div class="col-lg-10">
                                              <input type="text" disabled value="<?php echo $komplain->kelas ?>" class="form-control" id="simpleinput">
                                          </div>
                                      </div>

                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label"
                                                for="simpleinput">Nama Tugas</label>
                                            <div class="col-lg-10">
                                                <input type="text" disabled value="<?php echo $komplain->nama_tugas ?>" class="form-control" id="simpleinput">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label"
                                                for="simpleinput">Mata Pelajaran</label>
                                            <div class="col-lg-10">
                                                <input type="text" disabled value="<?php echo $komplain->mapel ?>" class="form-control" id="simpleinput">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label"
                                                for="simpleinput">Deskripsi</label>
                                            <div class="col-lg-10">
                                                <input type="text" disabled value="<?php echo $komplain->alasan ?>" class="form-control" id="simpleinput">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label"
                                                for="simpleinput">Download File Komplain</label>
                                            <div class="col-lg-10">
                                              <div class="media">
                                                <div class="avatar-sm font-weight-bold mr-3">
                                                  <span class="avatar-title rounded bg-soft-primary text-primary">
                                                    <a href="<?php echo base_url('Dashboard/file_komplain/'.$komplain->id_komplain) ?>"
                                                      class="p-2"><i class="uil-download-alt font-size-18"></i></a>
                                                  </span>
                                                </div>
                                                <div class="media-body">
                                                  <a href="<?php echo base_url('Dashboard/file_komplain/'.$komplain->id_komplain) ?>"
                                                    class="d-inline-block mt-2"><?php echo $komplain->file_komplain ?></a>
                                                </div>
                                              </div>
                                            </div>
                                        </div>



                                    </div>
                                </div>

                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div><!-- end col -->
            </div>
            <!-- end row -->
        </div> <!-- container-fluid -->

    </div> <!-- content -->
