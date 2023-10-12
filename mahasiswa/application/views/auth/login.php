<div class="account-pages my-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-10">
        <div class="card">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-md-6 p-5 authentication-form">
                <div class="mx-auto mb-5">
                  <a href="index.html">
                    <img src="<?php echo base_url() ?>assets/images/logo.png" alt="" height="24" />
                    <h3 class="d-inline align-middle ml-1 text-logo">Ruang Siswa</h3>
                  </a>
                </div>

                <h6 class="h5 mb-0 mt-4">Selamat Datang!</h6>
                <p class="text-muted mt-1 mb-4">Pastikan akun anda telah terverifikasi.</p>

                  <?php if (!empty($this->session->flashdata('status') ) ): ?>
                    <div class="alert alert-danger">
                        <?php echo $this->session->flashdata('status') ?>
                    </div>
                  <?php endif; ?>

                <?= form_open('auth/proses_login',array('method' =>'POST')) ?>
                  <div class="form-group">
                    <label class="form-control-label">Username</label>
                    <div class="input-group input-group-merge">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="icon-dual" data-feather="user"></i>
                        </span>
                      </div>
                      <input type="text" name="username" class="form-control" placeholder="Username">
                    </div>
                    <small class="form-text text-danger"><?= form_error('username'); ?></small>
                  </div>

                  <div class="form-group mt-4">
                    <label class="form-control-label">Password</label>
                    <div class="input-group input-group-merge">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="icon-dual" data-feather="lock"></i>
                        </span>
                      </div>
                      <input type="password" name="password" class="form-control" id="password" placeholder="Masukkan password anda">
                    </div>
                    <small class="form-text text-danger"><?= form_error('password'); ?></small>
                  </div>

                  <div class="form-group mb-0 text-center">
                    <button class="btn btn-primary btn-block" type="submit"> Log In
                    </button>
                  </div>
                <?php echo form_close() ?>
              </div>
              <div class="col-lg-6 d-none d-md-inline-block">
                <div class="auth-page-sidebar">
                  <div class="overlay"></div>
                  <div class="auth-user-testimonial">
                    <p class="font-size-24 font-weight-bold text-white mb-1">I simply love it!</p>
                    <p class="lead">"It's a elegent templete. I love it very much!"</p>
                    <p>- Admin User</p>
                  </div>
                </div>
              </div>
            </div>

          </div> <!-- end card-body -->
        </div>
        <!-- end card -->

        <div class="row mt-3">
          <div class="col-12 text-center">
            <p class="text-muted">Don't have an account? <a href="<?php echo base_url('Auth/register') ?>" class="text-primary font-weight-bold ml-1">Sign Up</a></p>
          </div> <!-- end col -->
        </div>
        <!-- end row -->

      </div> <!-- end col -->
    </div>
    <!-- end row -->
  </div>
  <!-- end container -->
</div>
