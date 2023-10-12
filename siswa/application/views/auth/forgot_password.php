<div class="account-pages my-5">
	<div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-6 p-5">
                                <div class="mx-auto mb-5">
                                    <a href="index.html">
                                        <img src="assets/images/logo.png" alt="" height="24" />
                                        <h3 class="d-inline align-middle ml-1 text-logo">Ruang Siswa</h3>
                                    </a>
                                </div>

                                <h6 class="h5 mb-0 mt-4">Reset Password</h6>
                                <?= $this->session->flashdata('message'); ?>
                                <p class="text-muted mt-1 mb-5">
                                    Masukkan kembali email yang telah terdaftar dan nantinya akan ada pemberitahuan lebih lanjut.
                                </p>

                                <form  method="post" action="<?= base_url('auth/forgot_password') ?>" class="authentication-form">
                                    <div class="form-group">
                                        <label class="form-control-label">Email Address</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="icon-dual" data-feather="mail"></i>
                                                </span>
                                            </div>
                                            <input type="email" class="form-control" id="email" name="email" value="<?= set_value('email') ?>">
                                            <?= form_error('email','<small class="text-danger pl-3">','</small>') ?>
                                        </div>
                                    </div>

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary btn-block" type="submit"> Submit</button>
                                    </div>
                                </form>
                            </div>
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
                        
                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->

                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <p class="text-muted">Back to <a href="<?= base_url('Auth') ?>" class="text-primary font-weight-bold ml-1">Login</a></p>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end page -->