<?php $this->load->view('layouts/head'); ?>
<body>
	<!-- Begin page -->
	<div id="wrapper">

		<!-- Topbar Start -->
		<div class="navbar navbar-expand flex-column flex-md-row navbar-custom">
			<div class="container-fluid">
				<!-- LOGO -->
				<a href="<?php echo base_url('Dashboard') ?>" class="navbar-brand mr-0 mr-md-2 logo">
					<span class="logo-lg">
						<img src="<?php echo base_url() ?>assets/images/sman17.jpg" alt="" height="24" />
						<span class="d-inline h5 ml-1 text-logo">Ruang Siswa</span>
					</span>
					<span class="logo-sm">
						<img src="<?php echo base_url() ?>assets/images/sman17.jpg" alt="" height="24">
					</span>
				</a>

				<ul class="navbar-nav bd-navbar-nav flex-row list-unstyled menu-left mb-0">
					<li class="">
						<button class="button-menu-mobile open-left disable-btn">
							<i data-feather="menu" class="menu-icon"></i>
							<i data-feather="x" class="close-icon"></i>
						</button>
					</li>
				</ul>

				<!-- <ul class="navbar-nav flex-row ml-auto d-flex list-unstyled topnav-menu float-right mb-0">
					<li class="d-none d-sm-block">
						<div class="app-search">
							<form>
								<div class="input-group">
									<input type="text" class="form-control" placeholder="Search...">
									<span data-feather="search"></span>
								</div>
							</form>
						</div>
					</li> -->


					<div id="show">
						<?php 
							$user = $this->db->get_where('siswa', ['id_siswa' => $this->session->userdata('id_siswa')])->row_array();
	                        
	                        $this->db->order_by('id_notifikasi', 'DESC');
	                        $this->db->join('kategori_notifikasi', 'kategori_notifikasi.id_kategori_notifikasi = notifikasi.id_kategori_notifikasi');
	                        $notifikasi = $this->db->get_where('notifikasi', ['id_user' => $user['id_siswa']], 5)->result_array();
	                        
	                        $notifikasi_unread = $this->db->get_where('notifikasi', ['id_user' => $user['id_siswa'], 'is_read' => 0])->num_rows();
	                    ?>
						<li class="dropdown notification-list" data-toggle="tooltip" data-placement="left" title="
	                    <?php if ($notifikasi_unread > 8): ?>
	                    	8+ new unread notifications
	                    <?php else: ?>
	                    	<?= $notifikasi_unread ?> new unread notifications
	                    <?php endif ?>
						">
							<?php 
							$user = $this->db->get_where('siswa', ['id_siswa' => $this->session->userdata('id_siswa')])->row_array();
	                        
	                        $this->db->order_by('id_notifikasi', 'DESC');
	                        $this->db->join('kategori_notifikasi', 'kategori_notifikasi.id_kategori_notifikasi = notifikasi.id_kategori_notifikasi');
	                        $notifikasi = $this->db->get_where('notifikasi', ['id_user' => $user['id_siswa']], 5)->result_array();
	                        
	                        $notifikasi_unread = $this->db->get_where('notifikasi', ['id_user' => $user['id_siswa'], 'is_read' => 0])->num_rows();
	                    ?>
							<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
								<i data-feather="bell"></i>
								<?php if ($notifikasi_unread > 0): ?>
									<span class="noti-icon-badge"></span>
								<?php endif ?>
							</a>
							<div class="dropdown-menu dropdown-menu-right dropdown-lg">

								<!-- item-->
								<div class="dropdown-item noti-title border-bottom">
									<h5 class="m-0 font-size-16">
										<span class="float-right" onclick="notifikasi()">
											<a href="#" class="text-dark">
												<small>Tandai semua sudah dibaca</small>
											</a>
										</span>Notification
									</h5>
								</div>

								<div class="slimscroll noti-scroll">

									<?php $icon = ''; ?>
	                                <?php $bg = ''; ?>
	                                <?php if (!$notifikasi): ?>
	                                	<span class="dropdown-item notify-item border-bottom">
	                                		Notifikasi Tidak Tersedia
	                                	</span>
	                                <?php endif ?>
	                                <?php foreach ($notifikasi as $key): ?>
	                                    <?php 
	                                    switch ($key['id_kategori_notifikasi']) {
	                                         case 1: $bg = 'bg-warning'; $icon = 'uil uil-comment-message'; break;
	                                         case 2: $bg = 'bg-info'; $icon = 'uil uil-comment-message'; break;
	                                         case 3: $bg = 'bg-danger'; $icon = 'uil uil-comment-message'; break;
	                                         case 4: $bg = 'bg-success'; $icon = 'uil uil-comment-message'; break;
	                                         default: $bg = 'bg-secondary'; $icon = 'uil uil-comment-message'; break;
	                                    } ?>
	                                    <!-- item-->
	                                    <a href="<?= base_url("Dashboard/detailNotifikasi/".$key['id_notifikasi']) ?>" class="dropdown-item notify-item border-bottom <?php if ($key['is_read'] == 0): echo "active"; endif ?>">
	                                    	<div class="notify-icon <?= $bg ?>"><i class="<?= $icon ?>"></i> </div>
	                                    	<p class="notify-details"><?= $key['pesan'] ?><small class="text-muted"><?= cari_waktu($key['waktu_notifikasi']) ?></small></p>
	                                    </a>
	                                <?php endforeach ?>
								</div>

								<!-- All-->
								<a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all border-top">
									View all
									<i class="fi-arrow-right"></i>
								</a>

							</div>
						</li>
					</div>
				</ul>
			</div>

		</div>
    <?php $this->load->view('layouts/sidebar'); ?>
