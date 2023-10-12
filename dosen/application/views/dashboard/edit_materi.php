<div class="content-page">
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row page-title">
                <div class="col-md-12">
                    <nav aria-label="breadcrumb" class="float-right mt-1">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Ruang Siswa</a></li>
                            <li class="breadcrumb-item"><a href="#">materi</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah Materi</li>
                        </ol>
                    </nav>
                    <h4 class="mb-1 mt-0">Edit Materi</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mt-0">Tambahkan Materi</h4>
                            <p class="sub-header">
                              Tambahkan materi sesuai mata kuliah anda!
                            </p>
                            <?= form_open_multipart('Dashboard/proses_edit_materi/'.$materi->id_materi,array('method' =>'POST')) ?>
                                <div class="row">
                                    <div class="col">

                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label"
                                                for="simpleinput">Nama Materi</label>
                                            <div class="col-lg-10">
                                                <input type="text" name="nama_materi" class="form-control" id="simpleinput" value="<?php echo $materi->nama_materi ?>">
                                                <small class="form-text text-danger"><?= form_error('nama_materi'); ?></small>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label"
                                                for="simpleinput">Mata Kuliah</label>
                                            <div class="col-lg-10">
                                                <input type="text" style="background-color:#e8e8e8" class="form-control" id="simpleinput" value="<?php echo $materi->matakuliah ?>" disabled>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label">Mata Kuliah</label>
                                            <div class="col-lg-10">
                                                <select class="form-control custom-select" name="matakuliah">
                                                  <option value="Pemrograman Basis Data">Pemrograman Basis Data</option>
                                                  <option value="Pemrograman Web Lanjut">Pemrograman Web Lanjut</option>
                                                  <option value="Analisis Perancangan Sistem Informasi">Analisis Perancangan Sistem Informasi</option>
                                                  <option value="Algoritma Pemrograman">Algoritma Pemrograman</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label"
                                                for="simpleinput">Kelas</label>
                                            <div class="col-lg-10">
                                                <input type="text" style="background-color:#e8e8e8" class="form-control" id="simpleinput" value="<?php echo $materi->kelas ?>" disabled>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label">Kelas</label>
                                            <div class="col-lg-10">
                                                <select class="form-control custom-select" name="kelas">
                                                  <option value="D3SI-42-01">D3SI-42-01</option>
                                                  <option value="D3SI-42-02">D3SI-42-02</option>
                                                  <option value="D3SI-42-03">D3SI-42-03</option>
                                                  <option value="D3SI-42-04">D3SI-42-04</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label"
                                                for="example-textarea">Deskripsi</label>
                                            <div class="col-lg-10">
                                                <textarea class="form-control" rows="5"
                                                    id="example-textarea" name="deskripsi"><?php echo $materi->deskripsi ?></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label"
                                                for="simpleinput">Nama File</label>
                                            <div class="col-lg-10">
                                                <input type="text" style="background-color:#e8e8e8" class="form-control" id="simpleinput" value="<?php echo $materi->file_materi ?>" disabled>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label"
                                                for="example-fileinput">File Materi</label>
                                            <div class="col-lg-10">
                                                <input type="file" class="form-control"
                                                    name="file_materi" id="example-fileinput">
                                            </div>
                                        </div>
                                        <div class="form-group mb-0 text-center">
                                          <button class="btn btn-primary btn-lg" type="submit">Update Materi</button>
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
