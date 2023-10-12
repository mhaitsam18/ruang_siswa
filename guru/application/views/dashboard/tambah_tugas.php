<div class="content-page">
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row page-title">
                <div class="col-md-12">
                    <nav aria-label="breadcrumb" class="float-right mt-1">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Ruang Siswa</a></li>
                            <li class="breadcrumb-item"><a href="#">Tugas</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah Tugas</li>
                        </ol>
                    </nav>
                    <h4 class="mb-1 mt-0">Tambah Tugas</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mt-0">Tambahkan Tugas</h4>
                            <p class="sub-header">
                              Tambahkan tugas sesuai mata pelajaran anda!
                            </p>
                            <?= form_open_multipart('Dashboard/proses_tambah_tugas',array('method' =>'POST')) ?>
                                <div class="row">
                                    <div class="col">

                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label"
                                                for="simpleinput">Nama Tugas</label>
                                            <div class="col-lg-10">
                                                <input type="text" name="nama_tugas" class="form-control" id="simpleinput">
                                                <small class="form-text text-danger"><?= form_error('nama_tugas'); ?></small>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label">Mata Pelajaran</label>
                                            <div class="col-lg-10">
                                                <select class="form-control custom-select" name="id_mapel" id="mapel">
                                                    <option selected disabled value="">Pilih Mata Pelajaran</option>
                                                    <?php foreach ($mapel as $key): ?>
                                                        <option value="<?= $key->idm ?>"><?= $key->m ?></option>
                                                        
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div id="ctn">
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label">Kelas</label>
                                                <div class="col-lg-10">
                                                    <select class="form-control custom-select" name="id_kelas">
                                                    <option selected disabled value="">Pilih Kelas</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label">Kategori</label>
                                            <div class="col-lg-10">
                                                <select class="form-control custom-select" name="id_kategori_tugas">
                                                    <option selected disabled value="">Pilih Kategori</option>
                                                    <?php foreach ($kategori_tugas as $key): ?>
                                                        <option value="<?= $key->id_kategori_tugas ?>"><?= $key->kategori ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label"
                                                for="simpleinput">Batas pengumpulan</label>
                                            <div class="col-lg-10">
                                                <div class="row">
                                                    <div class="col">
                                                        <input type="date" name="batas_pengumpulan" class="form-control" min="<?= date('Y-m-d') ?>">
                                                    </div>
                                                    <div class="col">
                                                        <input type="time" name="batas_jam" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label"
                                                for="example-textarea">Deskripsi</label>
                                            <div class="col-lg-10">
                                                <textarea class="form-control" rows="5"
                                                    id="example-textarea" name="deskripsi"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label"
                                                for="example-fileinput">File Tugas</label>
                                            <div class="col-lg-10">
                                                <input type="file" class="form-control"
                                                    name="file_tugas" id="example-fileinput">
                                            </div>
                                        </div>
                                        <div class="form-group mb-0 text-center">
                                          <button class="btn btn-primary btn-lg" type="submit">Tambah Tugas</button>
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