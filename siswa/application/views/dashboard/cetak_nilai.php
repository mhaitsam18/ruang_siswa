<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from shreyu.coderthemes.com/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Apr 2020 12:34:37 GMT -->

<head>
	<meta charset="utf-8" />
	<title><?php echo $title ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
	<meta content="Coderthemes" name="author" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />

	<!-- App favicon -->
	<link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/logos.png">

	<!-- plugins -->
	<link href="<?php echo base_url() ?>assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />

	<!-- App css -->
	<link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>assets/css/app.min.css" rel="stylesheet" type="text/css" />

	<!-- Plugin css -->
	<link href="<?php echo base_url() ?>assets/libs/fullcalendar-core/main.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>assets/libs/fullcalendar-daygrid/main.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>assets/libs/fullcalendar-bootstrap/main.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>assets/libs/fullcalendar-timegrid/main.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>assets/libs/fullcalendar-list/main.min.css" rel="stylesheet" type="text/css" />

	<link href="<?php echo base_url() ?>assets/libs/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>assets/libs/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>assets/libs/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>assets/libs/datatables/select.bootstrap4.min.css" rel="stylesheet" type="text/css" />

	<link href="<?php echo base_url() ?>assets/libs/dropzone/dropzone.min.css" rel="stylesheet" type="text/css" />

</head>
<body>
	<!-- Begin page -->
	<div id="wrapper">
		<!-- ============================================================== -->
		<!-- Start Page Content here -->
		<!-- ============================================================== -->
		<div class="">
			<div class="content">

				<!-- Start Content-->
				<div class="container-fluid">
					<div class="row page-title">
						<div class="col-md-12">
							<h4 class="mb-1 mt-0">Daftar Nilai Siswa</h4>
						</div>
					</div>

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-body">
									<div class="row">
										<div class="col-md-8">
											<h4 class="header-title mt-0">Nilai Semua Mata Pelajaran </h4>
											<p class="sub-header">
												Nama Siswa : <?= $siswa->nama_siswa ?>
												<br>
												Nama Kelas : <?= $siswa->kelas ?>
											</p>
										</div>
									</div>
									<table class="table dt-responsive nowrap table-bordered">
										<thead>
											<tr>
												<th>Mata Pelajaran</th>
												<th>Nama Guru</th>
												<th>Nama Tugas</th>
												<th>Kategori</th>
												<th>Nilai</th>
												<th>Waktu Penilaian</th>
												<th>Tanggal dikumpul</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($nilai as $t): ?>
												<tr>
													<td><?php echo $t->mapel ?></td>
													<td><?php echo $t->nama_guru ?></td>
													<td><?php echo $t->nama_tugas ?></td>
													<td><?php echo $t->kategori ?></td>
													<td><?php echo $t->nilai ?></td>
													<td><?php echo cari_waktu($t->waktu_penilaian) ?></td>
													<td><?php echo cari_tanggal($t->tanggal_pengumpulan) ?></td>
												</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
								</div> <!-- end card body-->
							</div> <!-- end card -->
						</div><!-- end col-->
					</div>
					<!-- end row-->
				</div> <!-- container-fluid -->

			</div> <!-- content -->
		</div>
			<!-- Footer Start -->
	  	<div class="card">
	  		<div class="card-body">
	  			Waktu Cetak: <?= date('d-m-Y H:i:s') ?>
	  		</div>
	  	</div>
			<!-- end Footer -->
		<!-- ============================================================== -->
		<!-- End Page content -->
		<!-- ============================================================== -->
	</div>
	<!-- END wrapper -->
	<!-- Right Sidebar -->
	<div class="right-bar">
		<div class="rightbar-title">
			<a href="javascript:void(0);" class="right-bar-toggle float-right">
				<i data-feather="x-circle"></i>
			</a>
			<h5 class="m-0">Customization</h5>
		</div>
	</div>
	<!-- /Right-bar -->
	<!-- Right bar overlay-->
	<div class="rightbar-overlay"></div>

	<!-- Vendor js -->
	<script src="<?php echo base_url() ?>assets/js/vendor.min.js"></script>

	<!-- optional plugins -->
	<script src="<?php echo base_url() ?>assets/libs/moment/moment.min.js"></script>
	<script src="<?php echo base_url() ?>assets/libs/apexcharts/apexcharts.min.js"></script>
	<script src="<?php echo base_url() ?>assets/libs/flatpickr/flatpickr.min.js"></script>

	<!-- page js -->
	<script src="<?php echo base_url() ?>assets/js/pages/dashboard.init.js"></script>

	<!-- App js -->
	<script src="<?php echo base_url() ?>assets/js/app.min.js"></script>


	<!-- plugin js -->
	<script src="<?php echo base_url() ?>assets/libs/fullcalendar-core/main.min.js"></script>
	<script src="<?php echo base_url() ?>assets/libs/fullcalendar-bootstrap/main.min.js"></script>
	<script src="<?php echo base_url() ?>assets/libs/fullcalendar-daygrid/main.min.js"></script>
	<script src="<?php echo base_url() ?>assets/libs/fullcalendar-timegrid/main.min.js"></script>
	<script src="<?php echo base_url() ?>assets/libs/fullcalendar-list/main.min.js"></script>
	<script src="<?php echo base_url() ?>assets/libs/fullcalendar-interaction/main.min.js"></script>

	<!-- Calendar init -->
	<script src="<?php echo base_url() ?>assets/js/pages/calendar.init.js"></script>

	<!-- Tabel init -->
	<script src="<?php echo base_url() ?>assets/libs/datatables/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url() ?>assets/libs/datatables/dataTables.bootstrap4.min.js"></script>
	<script src="<?php echo base_url() ?>assets/libs/datatables/dataTables.responsive.min.js"></script>
	<script src="<?php echo base_url() ?>assets/libs/datatables/responsive.bootstrap4.min.js"></script>

	<script src="<?php echo base_url() ?>assets/libs/datatables/dataTables.buttons.min.js"></script>
	<script src="<?php echo base_url() ?>assets/libs/datatables/buttons.bootstrap4.min.js"></script>
	<script src="<?php echo base_url() ?>assets/libs/datatables/buttons.html5.min.js"></script>
	<script src="<?php echo base_url() ?>assets/libs/datatables/buttons.flash.min.js"></script>
	<script src="<?php echo base_url() ?>assets/libs/datatables/buttons.print.min.js"></script>

	<script src="<?php echo base_url() ?>assets/libs/datatables/dataTables.keyTable.min.js"></script>
	<script src="<?php echo base_url() ?>assets/libs/datatables/dataTables.select.min.js"></script>

	<!-- Datatables init -->
	<script src="<?php echo base_url() ?>assets/js/pages/datatables.init.js"></script>

	<script src="<?php echo base_url() ?>assets/libs/dropzone/dropzone.min.js"></script>
	<!-- Optional: include a polyfill for ES6 Promises for IE11 -->
	<script src="<?= base_url('assets/') ?>dist/sweetalert2.all.js"></script>
	<script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
	<script type="text/javascript">
		window.print();
	</script>
</body>


</html>
