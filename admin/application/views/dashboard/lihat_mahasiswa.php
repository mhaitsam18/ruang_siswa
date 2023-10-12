
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
									<li class="breadcrumb-item"><a href="#">Shreyu</a></li>
									<li class="breadcrumb-item"><a href="#">Tables</a></li>
									<li class="breadcrumb-item active" aria-current="page">Advanced</li>
								</ol>
							</nav>
							<h4 class="mb-1 mt-0">Daftar Mahasiswa</h4>
						</div>
					</div>

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-body">
									<h4 class="header-title mt-0 mb-1">Mahasiswa</h4>
									<p class="sub-header">
										KeyTable provides Excel like cell navigation on any table. Events (focus, blur, action etc) can be assigned to individual
										cells, columns, rows or all cells.
									</p>

									<table id="key-datatable" class="table dt-responsive nowrap">
										<thead>
											<tr>
												<th>No.</th>
												<th>NIM</th>
						                        <th>Nama Mahasiswa</th>
						                        <th>Kelas</th>
												<th>Status</th>
												<th class="mb-0 text-center">Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php $no=0; ?>
											<?php foreach ($mahasiswa as $t): ?>
												<tr>
													<td><?= ++$no; ?></td>
													<td><?php echo $t->nim ?></td>
													<td><?php echo $t->nama_mahasiswa ?></td>
													<td><?php echo $t->kelas ?></td>
													<?php if ($t->status == 'Aktif'): ?>
														<td><p class="badge badge-success font-size-13 font-weight-normal"><?php echo $t->status ?></p></td>
													<?php else: ?>
														<td><p class="badge badge-warning font-size-13 font-weight-normal"><?php echo $t->status ?></p></td>
													<?php endif; ?>
													<td class="mb-0 text-center">
														<a href="<?= base_url('Dashboard/hapus_mahasiswa/'.$t->id_mahasiswa) ?>" class="btn btn-soft-danger btn-sm">
															<i class="uil uil-trash mr-1"></i>Hapus
														</a>
														<button class="btn btn-soft-success btn-sm" data-toggle="modal" data-target="#mahasiswaModal<?= $t->id_mahasiswa ?>">
															<i class="uil uil-edit mr-1"></i>Detail
														</button>
														<?php if ($t->status != 'Aktif'): ?>
															<a href="<?= base_url('Dashboard/verifikasi_mahasiswa/'.$t->id_mahasiswa.'/aktif') ?>" class="btn btn-soft-primary btn-sm">
																<i class="uil uil-check mr-1"></i>Aktif
															</a>
														<?php else: ?>
															<a href="<?= base_url('Dashboard/verifikasi_mahasiswa/'.$t->id_mahasiswa.'/alumni') ?>" class="btn btn-soft-info btn-sm">
																<i class="uil uil-check mr-1"></i>Alumni
															</a>
														<?php endif; ?>
													</td>
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
<!-- Modal -->
<?php foreach ($mahasiswa as $row): ?>
	<div class="modal fade" id="mahasiswaModal<?= $row->id_mahasiswa ?>" tabindex="-1" aria-labelledby="mahasiswaModalLabel<?= $row->id_mahasiswa ?>" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="mahasiswaModalLabel<?= $row->id_mahasiswa ?>">Detail Data Mahasiswa</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form method="post" action="<?= base_url('Dashboard/update_mahasiswa') ?>" enctype="multipart/form-data">
					<div class="modal-body">
						<div class="form-group">
							<label for="id_mahasiswa">ID Mahasiswa</label>
							<input type="text" class="form-control" id="id_mahasiswa" name="id_mahasiswa" placeholder="ID Mahasiswa" value="<?= $row->id_mahasiswa ?>" readonly>
						</div>
						<div class="form-group">
							<label for="username">Username</label>
							<input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?= $row->username ?>" readonly>
						</div>
						<div class="form-group">
							<label for="nama_mahasiswa">Nama Lengkap</label>
							<input type="text" class="form-control" id="nama_mahasiswa" name="nama_mahasiswa" placeholder="Nama Mahasiswa" value="<?= $row->nama_mahasiswa ?>">
						</div>
						<div class="form-group">
							<label for="nim">NIM</label>
							<input type="text" class="form-control" id="nim" name="nim" placeholder="NIM" value="<?= $row->nim ?>">
						</div>
						<div class="form-group">
							<label for="kelas">Kelas</label>
							<input type="text" class="form-control" id="kelas" name="kelas" placeholder="Kelas" value="<?= $row->kelas ?>">
						</div>
						<div class="form-group">
							<label for="email">Email</label>
							<input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?= $row->email ?>">
						</div>
						<div class="form-group">
							<label for="jenis_kelamin">Jenis Kelamin</label>
							<select class="form-control" id="jenis_kelamin" name="jenis_kelamin" Value="<?= $row->jenis_kelamin ?>">
								<option>Pilih</option>
								<?php if ($row->jenis_kelamin == 'Laki-laki'): ?>
									<option value="Laki-laki" selected>Laki-laki</option>
									<option value="Peremupuan">Peremupuan</option>
								<?php else: ?>
									<option value="Laki-laki">Laki-laki</option>
									<option value="Peremupuan" selected>Peremupuan</option>
								<?php endif ?>
							</select>
						</div>
						<div class="form-group">
							<label for="foto_mahasiswa">Upload Foto</label>
							<img src="<?=base_url('assets/img/mahasiswa/').$row->foto_mahasiswa ?>" class="row img-thumbnail ml-3" style="height: 300px;">
							<input type="file" class="form-control" id="foto_mahasiswa" name="foto_mahasiswa" placeholder="Foto Mahasiswa" value="<?= $row->foto_mahasiswa ?>">
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
<?php endforeach ?>