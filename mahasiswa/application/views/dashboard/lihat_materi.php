<div class="content-page">
		<div class="content">

				<!-- Start Content-->
				<div class="container-fluid">
						<div class="row page-title align-items-center">
								<div class="col-md-3 col-xl-6">
										<h4 class="mb-1 mt-0">Daftar Materi</h4>
								</div>
								<div class="col-md-9 col-xl-6 text-md-right">
										<div class="mt-4 mt-md-0">
												<div class="btn-group mb-3 mb-sm-0">
														<button type="button" class="btn btn-primary">All</button>
												</div>
												<!-- <div class="btn-group ml-1">
														<button type="button" class="btn btn-white">Ongoing</button>
														<button type="button" class="btn btn-white">Finished</button>
												</div> -->
												<div class="btn-group ml-2 d-none d-sm-inline-block">
														<button type="button" class="btn btn-primary btn-sm"><i
																		class="uil uil-apps"></i></button>
												</div>
												<div class="btn-group d-none d-sm-inline-block">
														<button type="button" class="btn btn-white btn-sm"><i
																		class="uil uil-align-left-justify"></i></button>
												</div>
										</div>
								</div>
						</div>

		<div class="row">
			<?php foreach ($materi as $m): ?>
				<div class="col-xl-4 col-lg-6">
						<div class="card">
								<div class="card-body">
									<div class="badge badge-success float-right"><?php echo $m->kelas ?></div>
										<p class="text-success text-uppercase font-size-12 mb-2"><?php echo $m->matakuliah ?></p>
										<h5><a href="#" class="text-dark"><?php echo $m->nama_materi ?></a></h5>
										<p class="text-muted mb-4"><?php echo $m->deskripsi ?>.</p>

									<div>
										<a href="javascript: void(0);">
												<img src="<?php echo base_url() ?>assets/images/users/avatar-2.jpg" alt="" class="avatar-sm m-1 rounded-circle">
										</a>
										<a href="javascript: void(0);">
												<img src="<?php echo base_url() ?>assets/images/users/avatar-3.jpg" alt="" class="avatar-sm m-1 rounded-circle">
									</a>
									</div>
										</div>
				<div class="card-body border-top">
					<div class="row align-items-center">
						<div class="col-sm-auto">
							<ul class="list-inline mb-0">
								<li class="list-inline-item pr-2">
									<a href="#" class="text-muted d-inline-block" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tanggal upload">
										<i class="uil uil-calender mr-1"></i> <?php echo $m->tanggal_upload ?>
									</a>
								</li>
								<li class="list-inline-item pr-2">
									<a href="#" class="text-muted d-inline-block" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tasks">
										<i class="uil uil-bars mr-1"></i> 56
									</a>
								</li>
								<li class="list-inline-item">
									<a href="<?php echo base_url('Dashboard/file_materi/'.$m->id_materi) ?>" class="p-2">
										<i class="uil-download-alt font-size-18" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo $m->file_materi ?>"></i>
									</a>
									<a href="<?php echo base_url('Dashboard/file_materi/'.$m->id_materi) ?>" class="d-inline-block mt-2" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo $m->file_materi ?>">Downlod Materi</a>
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

						<div class="row mb-3 mt-2">
								<div class="col-12">
										<div class="text-center">
												<a href="javascript:void(0);" class="btn btn-white">
														<i data-feather="loader" class="icon-dual icon-xs mr-2"></i>
														Load more
												</a>
										</div>
								</div> <!-- end col-->
						</div>
						<!-- end row -->

				</div> <!-- container-fluid -->

		</div> <!-- content -->
