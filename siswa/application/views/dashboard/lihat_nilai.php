
		<!-- ============================================================== -->
		<!-- Start Page Content here -->
		<!-- ============================================================== -->

		<div class="content-page">
			<div class="content">

				<!-- Start Content-->
				<div class="container-fluid">
					<div class="row page-title">
						<div class="col-md-12">
							<nav aria-label="breadcrumb" class="float-right mt-1">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="#">Ruang Siswa</a></li>
									<!-- <li class="breadcrumb-item"><a href="#">Tables</a></li> -->
									
								</ol>
							</nav>
							<h4 class="mb-1 mt-0">Daftar Nilai Siswa</h4>
						</div>
					</div>

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-body">
									<div class="row">
										<div class="col-md-8">
											<h4 class="header-title mt-0">Nilai Semua Tugas Mata Pelajaran </h4>
											<p class="sub-header">
												Semester Ganjil
											</p>
										</div>
										<div class="col-md-4">
											<a href="<?= base_url('Dashboard/cetakNilai') ?>" target="_blank" class="btn btn-outline-primary float-right"><i data-feather="printer" class="icon-dual-**"></i>.Cetak Nilai</a>
										</div>
									</div>
									<table id="key-datatable" class="table dt-responsive nowrap">
										<thead>
											<tr>
												<th>Mata Pelajaran</th>
												<th>Nama Guru</th>
												<th>Nama Tugas</th>
												<th>Kategori</th>
												<th>Nilai</th>
												<th>Waktu Penilaian</th>
												<th>Aksi</th>
												<th class="mb-0 text-center">Tanggal dikumpul : </th>
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
  													<td class="mb-0 text-center">
  														<a href="<?= base_url('Dashboard/komplain_nilai/'.$t->id_nilai) ?>" class="btn btn-soft-primary btn-sm"><i class="uil uil-edit mr-1"></i>Komplain</a>
  														<!-- <a href="" class="btn btn-primary btn-sm"><i class="uil uil-edit mr-1"></i>Detail</a> -->
  													</td>
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
 