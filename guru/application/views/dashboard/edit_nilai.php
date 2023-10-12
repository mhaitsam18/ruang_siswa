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
                            <li class="breadcrumb-item active" aria-current="page">Edit Nilai</li>
                        </ol>
                    </nav>
                    <h4 class="mb-1 mt-0">Edit Nilai</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mt-0">Edit Nilai Siswa</h4>
                            <p class="sub-header">
                              Edit nilai siswa anda!
                            </p>
                                <div class="row">
                                    <div class="col">

                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label"
                                                for="simpleinput">Nama Siswa</label>
                                            <div class="col-lg-10">
                                                <input type="text" disabled value="<?php echo $nilai->nama_siswa ?>" class="form-control" id="simpleinput">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label"
                                                for="simpleinput">Kelas</label>
                                            <div class="col-lg-10">
                                                <input type="text" disabled value="<?php echo $nilai->kelas ?>" class="form-control" id="simpleinput">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label"
                                                for="simpleinput">Tugas</label>
                                            <div class="col-lg-10">
                                                <input type="text" disabled value="<?php echo $nilai->nama_tugas ?>" class="form-control" id="simpleinput">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label"
                                                for="simpleinput">Mata Pelajaran</label>
                                            <div class="col-lg-10">
                                                <input type="text" disabled value="<?php echo $nilai->mapel ?>" class="form-control" id="simpleinput">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label"
                                                for="simpleinput">Kategori</label>
                                            <div class="col-lg-10">
                                                <input type="text" disabled value="<?php echo $nilai->kategori ?>" class="form-control" id="simpleinput">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label"
                                                for="simpleinput">Nilai Awal</label>
                                            <div class="col-lg-10">
                                                <input type="text" disabled value="<?php echo $nilai->nilai ?>" class="form-control" id="simpleinput">
                                            </div>
                                        </div>
                           <?= form_open_multipart('Dashboard/proses_edit_nilai/'.$nilai->id_nilai,array('method' =>'POST')) ?>
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label"
                                                for="simpleinput">Nilai Baru</label>
                                            <div class="col-lg-10">
                                                <input type="text" name="nilai" class="form-control" id="simpleinput">
                                                <small class="form-text text-danger"><?= form_error('nilai'); ?></small>
                                            </div>
                                        </div>


                                        <div class="form-group mb-0 text-center">
                                          <button class="btn btn-primary btn-block" type="submit">Edit Nilai</button>
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
