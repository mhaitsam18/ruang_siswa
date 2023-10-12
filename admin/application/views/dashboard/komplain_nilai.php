<div class="content-page">
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row page-title">
                <div class="col-md-12">
                    <nav aria-label="breadcrumb" class="float-right mt-1">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Ruang Siswa</a></li>
                            <li class="breadcrumb-item"><a href="#">Komplain</a></li>
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
                            <h4 class="header-title mt-0">Komplain Nilai</h4>
                            <p class="sub-header">
                              Jika nilai tidak sesuai, komplain disini!
                            </p>

                                <div class="row">
                                    <div class="col">

                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label"
                                                for="simpleinput">Mata Pelajaran</label>
                                            <div class="col-lg-10">
                                                <input type="text" value="<?php echo $nilai->matapelajaran ?>" class="form-control" disabled id="simpleinput">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label"
                                                for="simpleinput">Nama Tugas</label>
                                            <div class="col-lg-10">
                                                <input type="text" value="<?php echo $nilai->nama_tugas ?>" class="form-control" disabled id="simpleinput">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label"
                                                for="simpleinput">Kategori</label>
                                            <div class="col-lg-10">
                                                <input type="text" value="<?php echo $nilai->kategori ?>" class="form-control" disabled id="simpleinput">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label"
                                                for="simpleinput">Nilai</label>
                                            <div class="col-lg-10">
                                                <input type="text" value="<?php echo $nilai->nilai ?>" class="form-control" disabled id="simpleinput">
                                            </div>
                                        </div>


                                        <h4 class="header-title mt-0">Isi komplain disini!</h4>

                                      <?= form_open_multipart('Dashboard/proses_komplain/'.$nilai->id_pengumpulan.'/'.$nilai->id_nilai,array('method' =>'POST')) ?>
                                      <input type="text" name="id_pengumpulan" value="<?php echo $nilai->id_pengumpulan ?>" hidden>
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label"
                                                for="example-textarea">Deskripsi</label>
                                            <div class="col-lg-10">
                                                <textarea class="form-control" rows="5"
                                                    id="example-textarea" name="alasan"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label"
                                                for="example-fileinput">File Komplain</label>
                                            <div class="col-lg-10">
                                                <input type="file" class="form-control"
                                                    name="file_komplain" id="example-fileinput">
                                            </div>
                                        </div>
                                        <div class="form-group mb-0 text-center">
                                          <button class="btn btn-primary btn-block" type="submit">Komplain Nilai</button>
                                        </div>
                                    </div>
                                </div>
                            <?php echo form_close() ?>
                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div><!-- end col -->
            </div>
            <!-- end row -->
        </div> <!-- container-fluid -->

    </div> <!-- content -->
