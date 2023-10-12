<div class="account-pages my-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-10">
        <div class="card">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-6 p-5 authentication-form">
                <div class="mx-auto mb-5">
                  <a href="index.html">
                    <img src="<?php echo base_url() ?>assets/images/logo.png" alt="" height="24" />
                    <h3 class="d-inline align-middle ml-1 text-logo">Ruang Siswa Dosen</h3>
                  </a>
                </div>

                <h6 class="h5 mb-0 mt-4">Buat akun anda sekarang!</h6>
                <p class="text-muted mt-0 mb-4">Pastikan anda adalah dosen</p>

                <?= form_open_multipart('auth/proses_register',array('method' =>'POST'),'class="dropzone"') ?>
                  <div class="form-group">
                    <label class="form-control-label">Nama</label>
                    <div class="input-group input-group-merge">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="icon-dual" data-feather="user"></i>
                        </span>
                      </div>
                      <input type="text" name="nama_dosen" class="form-control" id="name" placeholder="Nama lengkap anda" autocomplete="off">
                    </div>
                    <small class="form-text text-danger"><?= form_error('nama_dosen'); ?></small>
                  </div>

                  <div class="form-group">
                    <label class="form-control-label">Username</label>
                    <div class="input-group input-group-merge">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="icon-dual" data-feather="users"></i>
                        </span>
                      </div>
                      <input type="text" name="username" class="form-control" placeholder="Masukkan username anda" autocomplete="off">
                    </div>
                    <small class="form-text text-danger"><?= form_error('username'); ?></small>
                  </div>

                  <div class="form-group">
                    <label class="form-control-label">Password</label>
                    <div class="input-group input-group-merge">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="icon-dual" data-feather="lock"></i>
                        </span>
                      </div>
                      <input type="password" name="password1" class="form-control" id="password" placeholder="Masukkan password anda">
                    </div>
                    <small class="form-text text-danger"><?= form_error('password1'); ?></small>
                  </div>

                  <div class="form-group">
                    <label class="form-control-label">Retype Password</label>
                    <div class="input-group input-group-merge">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="icon-dual" data-feather="lock"></i>
                        </span>
                      </div>
                      <input type="password" name="password2" class="form-control" id="password" placeholder="Tulis kembali password">
                    </div>
                    <small class="form-text text-danger"><?= form_error('password2'); ?></small>
                  </div>

                  <div class="form-group">
                    <label class="form-control-label">Masukkan Dokumen</label>
                    <div class="input-group input-group-merge">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="icon-dual" data-feather="file"></i>
                        </span>
                      </div>
                      <input type="file" name="dokumen" class="form-control">
                    </div>
                    <small class="form-text text-danger"><?= form_error('dokumen'); ?></small>
                  </div>

                  <div class="form-group mb-0 text-center">
                    <button class="btn btn-primary btn-block" type="submit">Sign Up</button>
                  </div>
              </div>
              <?php echo form_close() ?>


              <div class="col-lg-6 d-none d-md-inline-block">
                <div class="auth-page-sidebar">
                  <div class="overlay"></div>
                  <div class="auth-user-testimonial">
                    <p class="font-size-24 font-weight-bold text-white mb-1">I simply love it!</p>
                    <p class="lead">"It's a elegent templete. I love it very much!"
                    </p>
                    <p>- Admin User</p>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <!-- end card -->

        <div class="row mt-3">
          <div class="col-12 text-center">
            <p class="text-muted">Already have account? <a href="<?php echo base_url('Auth') ?>" class="text-primary font-weight-bold ml-1">Login</a></p>
          </div> <!-- end col -->
        </div>
        <!-- end row -->

      </div> <!-- end col -->
    </div>
    <!-- end row -->
  </div>
  <!-- end container -->
</div>
