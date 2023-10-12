<div class="content-page">
	<div class="content">

		<!-- Start Content-->
		<div class="container-fluid">
			<div class="row page-title align-items-center">
				<div class="col-md-3 col-xl-6">
					<h4 class="mb-1 mt-0">Daftar Tugas</h4>
				</div>
				<!-- <div class="col-md-9 col-xl-6 text-md-right">
					<div class="mt-4 mt-md-0">
						<div class="btn-group mb-3 mb-sm-0">
							<button type="button" class="btn btn-primary">All</button>
						</div>
						<div class="btn-group ml-1">
							<button type="button" class="btn btn-white">Ongoing</button>
							<button type="button" class="btn btn-white">Finished</button>
						</div> 
						<div class="btn-group ml-2 d-none d-sm-inline-block">
							<button type="button" class="btn btn-primary btn-sm"><i class="uil uil-apps"></i></button>
						</div>
						<div class="btn-group d-none d-sm-inline-block">
							<button type="button" class="btn btn-white btn-sm"><i class="uil uil-align-left-justify"></i></button>
						</div>
					</div>
				</div> -->
			</div>
			<div class="row">
				<?php foreach ($tugas as $m): ?>
					<div class="col-xl-4 col-lg-6">
						<div class="card">
							<div class="card-body">
								<?php 
								$bg = '';
								$pengumpulan = $this->db->get_where('pengumpulan', ['id_tugas' => $m->id_tugas])->num_rows();
								$batas_pengumpulan = strtotime($m->batas_pengumpulan);
								?>
								<?php if ($pengumpulan > 0): ?>
									<div class="badge badge-success float-right mr-1">Sudah dikumpul</div>
	                            <?php elseif (date('Y-m-d H:i:s') > date('Y-m-d H:i:s', strtotime($m->batas_pengumpulan))): ?>
									<div class="badge badge-danger float-right mr-1">Waktu Habis</div>
	                            <?php elseif (date('Y-m-d H:i:s') >= date('Y-m-d H:i:s', strtotime('-3 day', $batas_pengumpulan))): ?>
									<div class="badge badge-warning float-right mr-1">Mendekati Deadline</div>
	                            <?php endif ?>
								<div class="badge badge-primary float-right mr-1"><?php echo $m->kelas ?></div>
								<p class="text-success text-uppercase font-size-12 mb-2"><?php echo $m->mapel ?></p>
								<h5><a href="#" class="text-dark"><?php echo $m->nama_tugas ?></a></h5>
								<p class="text-muted mb-4"><?php echo $m->deskripsi ?>.</p>
								<!-- <div>
									<a href="javascript: void(0);">
										<img src="<?php echo base_url() ?>assets/images/users/avatar-2.jpg" alt="" class="avatar-sm m-1 rounded-circle">
									</a>
									<a href="javascript: void(0);">
										<img src="<?php echo base_url() ?>assets/images/users/avatar-3.jpg" alt="" class="avatar-sm m-1 rounded-circle">
									</a>
								</div> -->
							</div>
							<div class="card-body border-top">
								<div class="row align-items-center">
									<div class="col-sm-auto">
										<ul class="list-inline mb-0">
											<li class="list-inline-item pr-2">
												<strong>Batas Pengumpulan</strong>
												<a href="#" class="text-muted d-inline-block" data-toggle="tooltip" data-placement="top" title="" data-original-title="Deadline">
													<i class="uil uil-calender mr-1"></i> <?php echo cari_waktu($m->batas_pengumpulan) ?>
												</a>
											</li>
											<!-- <li class="list-inline-item pr-2">
												<a href="#" class="text-muted d-inline-block" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tasks">
													<i class="uil uil-bars mr-1"></i> 56
												</a>
											</li> -->
											<li class="list-inline-item">
												<a href="<?php echo base_url('Dashboard/detail_tugas/'.$m->id_tugas) ?>" class="p-2"><i class="uil-file-search-alt font-size-18"></i></a>
												<a href="<?php echo base_url('Dashboard/detail_tugas/'.$m->id_tugas) ?>" class="d-inline-block mt-2">Detail Tugas</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<!-- end card -->
					</div>
				<?php endforeach; ?>
			</div>
			<!-- end row -->
			<!-- <div class="row mb-3 mt-2">
				<div class="col-12">
					<div class="text-center">
						<a href="javascript:void(0);" class="btn btn-white">
							<i data-feather="loader" class="icon-dual icon-xs mr-2"></i>
							Load more
						</a>
					</div>
				</div>
			</div>  -->
			<!-- end row -->
		</div> <!-- container-fluid -->
	</div> <!-- content -->
</div>

