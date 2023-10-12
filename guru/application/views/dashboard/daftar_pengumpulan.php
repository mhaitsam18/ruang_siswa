
		<!-- ============================================================== -->
		<!-- Start Page Content here -->
		<!-- ============================================================== -->

		<div class="content-page">
			<div class="content">

				<!-- Start Content-->
				<div class="container-fluid">
					<div class="row page-title">
						<div class="col-md-12">
							<!-- <nav aria-label="breadcrumb" class="float-right mt-1">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="#">Shreyu</a></li>
									<li class="breadcrumb-item"><a href="#">Tables</a></li>
									<li class="breadcrumb-item active" aria-current="page">Advanced</li>
								</ol>
							</nav> -->
							<h4 class="mb-1 mt-0">Daftar Pengumpulan</h4>
						</div>
					</div>

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-body">
									<h4 class="header-title mt-0 mb-1">Siswa yang mengumpulkan</h4>
									<p class="sub-header">
										Berikut adalah daftar siswa yang sudah mengumpulkan tugas!
									</p>

									<table id="key-datatable" class="table dt-responsive nowrap">
										<thead>
											<tr>
											  <th>Nama Siswa</th>
											  <th>Kelas</th>
											  <th>Mata Kuliah</th>
											  <th>Tugas</th>
											  <th>Pengumpulan</th>
												<th class="mb-0 text-center">Aksi</th>
											  <th>Deadline :</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($pengumpulan as $m): ?>
												<tr>
												  <td><?php echo $m->nama_siswa ?></td>
												  <td><?php echo $m->kelas ?></td>
												  <td><?php echo $m->mapel ?></td>
												  <td><?php echo $m->nama_tugas ?></td>
												  <td><?php echo $m->tanggal_pengumpulan ?></td>
												  <td class="mb-0 text-center">
												    <a href="<?= base_url('Dashboard/input_nilai/'.$m->id_pengumpulan) ?>"
												      class="btn btn-soft-primary btn-sm"><i class="uil uil-edit mr-1"></i>Detail</a>
												  </td>
												  <td><?php echo $m->batas_pengumpulan ?></td>
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
