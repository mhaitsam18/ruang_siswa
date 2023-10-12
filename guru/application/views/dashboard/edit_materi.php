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
                              Tambahkan materi sesuai mata pelajaran anda!
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
                                            <label class="col-lg-2 col-form-label">Mata Pelajaran</label>
                                            <div class="col-lg-10">
                                                <select class="form-control custom-select" name="id_mapel" id="mapel">
                                                    <option disabled value="">Pilih Mata Pelajaran</option>
                                                    <?php foreach ($mapel as $key): ?>
                                                        <?php if ($key->id_mapel == $materi->id_mapel): ?>
                                                            <option value="<?= $key->id_mapel ?>" selected><?= $key->mapel ?></option>
                                                        <?php else: ?>
                                                            <option value="<?= $key->id_mapel ?>"><?= $key->mapel ?></option>
                                                        <?php endif ?>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div id="ctn">
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label">Kelas</label>
                                                <div class="col-lg-10">
                                                    <select class="form-control custom-select" name="id_kelas">
                                                        <option disabled value="">Pilih Kelas</option>
                                                        <?php foreach ($kelas as $key): ?>
                                                            <?php if ($key->id_kelas == $materi->id_kelas): ?>
                                                                <option value="<?= $key->id_kelas ?>" selected><?= $key->kelas ?></option>
                                                            <?php else: ?>
                                                                <option value="<?= $key->id_kelas ?>"><?= $key->kelas ?></option>
                                                            <?php endif ?>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>
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
<script type="text/javascript">
    // ambil elements yg di buutuhkan
    var keyword = document.getElementById('mapel');

    var container = document.getElementById('ctn');

    // tambahkan event ketika keyword ditulis

    keyword.addEventListener('change', function () {


        //buat objek ajax
        var xhr = new XMLHttpRequest();

        // cek kesiapan ajax
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                container.innerHTML = xhr.responseText;
            }
        }

        xhr.open('GET', '<?= base_url('Dashboard/getKelasByMapel/') ?>' + keyword.value, true);
        xhr.send();
    })
</script>