<div class="content-page">
  <div class="content">
    <!-- Start Content-->
    <div class="container-fluid">
      <div class="row page-title">
        <div class="col-md-12">
          <nav aria-label="breadcrumb" class="float-right mt-1">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active" aria-current="page">Akun Saya</li>
            </ol>
          </nav>
          <!-- <h4 class="mb-1 mt-0">Jadwal Pelajaran</h4> -->
        </div>
      </div>
      <?= $this->session->flashdata('message'); ?>
      <h4 class="mb-1 mt-0">Profile</h4>
      <!-- end col-12 -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Akun Saya</h4>
              <div class="row">
                <div class="col-md-7">
                  <form action="<?= base_url('Dashboard/profile') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group row">
                      <label for="username" class="col-sm-2 col-form-label">Username</label>
                      <div class="col-sm-10">
                        <input type="email" class="form-control" id="username" name="username" value="<?= $user['username'] ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="email" class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email" value="<?= $user['email'] ?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="nis" class="col-sm-2 col-form-label">NIS</label>
                      <div class="col-sm-10">
                        <input type="number" class="form-control" id="nis" name="nis" value="<?= $user['nis'] ?>">
                        <?= form_error('nis','<small class="text-danger pl-3">','</small>') ?>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="nama_siswa" class="col-sm-2 col-form-label">Nama Lengkap</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" value="<?= $user['nama_siswa'] ?>">
                        <?= form_error('nama_siswa','<small class="text-danger pl-3">','</small>') ?>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="status" class="col-sm-2 col-form-label">Status</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="" name="status" value="<?= $user['status'] ?>" readonly>
                        <?= form_error('status','<small class="text-danger pl-3">','</small>') ?>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                      <div class="col-sm-10">
                        <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                          <option>Select Gender</option>
                          <?php if ($user['jenis_kelamin'] == 'Laki-laki'): ?>
                            <option value="Laki-laki" selected>Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                          <?php elseif ($user['jenis_kelamin'] == 'Perempuan'): ?>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan" selected>Perempuan</option>
                          <?php endif ?>
                        </select>
                        <?= form_error('jenis_kelamin','<small class="text-danger pl-3">','</small>') ?>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="id_kelas" class="col-sm-2 col-form-label">Kelas</label>
                      <div class="col-sm-10">
                        <select class="form-control" name="id_kelas" id="id_kelas">
                          <option value="">Pilih Kelas</option>
                          <?php foreach ($kelas as $row): ?>
                            <?php if ($row['id_kelas']== $user['id_kelas']): ?>
                              <option value="<?= $row['id_kelas'] ?>" selected>
                                <?= $row['kelas']; ?>
                              </option>
                            <?php else: ?>
                              <option value="<?= $row['id_kelas'] ?>">
                                <?= $row['kelas']; ?>
                              </option>
                            <?php endif ?>
                          <?php endforeach ?>
                        </select>
                        <?= form_error('id_kelas','<small class="text-danger pl-3">','</small>') ?>
                      </div>
                    </div>
                    <!-- <script type="text/javascript" src="lib/jquery-1.10.1.min.js"></script> -->
                    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/gumby/2.6.0/js/libs/jquery-1.10.1.min.js"></script>
                    <!-- <script type="text/javascript" src="source/jquery.fancybox.js?v=2.1.5" media="screen"></script> -->
                    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.js" media="screen"></script>
                    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.css">
                    <script type="text/javascript">
                      $(document).ready(function() {
                        $(".perbesar").fancybox();
                      });
                    </script>
                    <div class="form-group row">
                      <div class="col-sm-2">Foto Siswa</div>
                      <div class="col-sm-10">
                        <div class="row">
                          <div class="col-sm-3">
                            <?php 
                            if(file_exists("./assets/img/siswa/$user[foto_siswa]")){
                              $foto_siswa = base_url("assets/img/siswa/$user[foto_siswa]");
                            }else{
                              $foto_siswa = base_url2("assets/img/siswa/$user[foto_siswa]");
                            }
                            ?>
                            <a href="<?= $foto_siswa ?>" class="perbesar">
                              <img src="<?= $foto_siswa ?>" class="img-thumbnail">
                            </a>
                          </div>
                          <div class="col-sm-9">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="foto_siswa" name="foto_siswa">
                              <label class="custom-file-label" for="foto_siswa">Upload Foto Disini....</label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm">
                        <button type="submit" class="btn btn-primary float-right">Simpan</button>
                      </div>
                    </div>
                    <!-- <button type="button" class="btn btn-outline-danger btn-block" data-toggle="modal" data-target="#deleteAccountModal">Delete Account</button> -->
                  </form>
                </div>


                
                <div class="col-md-5">
                  <form action="<?= base_url('Dashboard/ubah_kata_sandi') ?>" method="post">
                    <div class="form-group">
                      <label for="current_password">Kata Sandi Saat ini</label>
                      <input type="password" class="form-control" id="current_password" name="current_password">
                      <?= form_error('current_password','<small class="text-danger pl-3">','</small>') ?>
                    </div>
                    <div class="form-group">
                      <label for="new_password1">Kata Sandi Baru</label>
                      <input type="password" class="form-control" id="new_password1" name="new_password1">
                      <?= form_error('new_password1','<small class="text-danger pl-3">','</small>') ?>
                    </div>
                    <div class="form-group">
                      <label for="new_password2">Ulangi Kata Sandi</label>
                      <input type="password" class="form-control" id="new_password2" name="new_password2">
                      <?= form_error('new_password2','<small class="text-danger pl-3">','</small>') ?>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary">
                        Simpan
                      </button>
                    </div>
                  </form>
                </div>
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
