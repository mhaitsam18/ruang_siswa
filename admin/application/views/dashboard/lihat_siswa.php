
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
									<li class="breadcrumb-item"><a href="#">Home</a></li>
									<li class="breadcrumb-item"><a href="#">Tables</a></li>
									<li class="breadcrumb-item active" aria-current="page">Advanced</li>
								</ol>
							</nav>
							<h4 class="mb-1 mt-0">Daftar Siswa</h4>
						</div>
					</div>
					<?= $this->session->flashdata('message'); ?>
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-body">
									<h4 class="header-title mt-0 mb-1">Siswa</h4>
									<p class="sub-header">
										KeyTable provides Excel like cell navigation on any table. Events (focus, blur, action etc) can be assigned to individual
										cells, columns, rows or all cells.
									</p>
									<button class="btn btn-outline-primary mb-3" data-toggle="modal" data-target="#siswaModal">Tambah Data Siswa</button>
									<table id="key-datatable" class="table dt-responsive nowrap">
										<thead>
											<tr>
												<th>No.</th>
												<th>NIS</th>
						                        <th>Nama Siswa</th>
						                        <th>Kelas</th>
												<th>Status</th>
												<th class="mb-0 text-center">Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php $no=0; ?>
											<?php foreach ($siswa as $t): ?>
												<tr>
													<td><?= ++$no; ?></td>
													<td><?php echo $t->nis ?></td>
													<td><?php echo $t->nama_siswa ?></td>
													<td><?php echo $t->kelas ?></td>
													<?php if ($t->status == 'Aktif'): ?>
														<td><p class="badge badge-success font-size-13 font-weight-normal"><?php echo $t->status ?></p></td>
													<?php else: ?>
														<td><p class="badge badge-warning font-size-13 font-weight-normal"><?php echo $t->status ?></p></td>
													<?php endif; ?>
													<td class="mb-0 text-center">
														<a href="<?= base_url('Dashboard/hapus_siswa/'.$t->id_siswa) ?>" class="btn btn-soft-danger btn-sm">
															<i class="uil uil-trash mr-1"></i>Hapus
														</a>
														<button class="btn btn-soft-success btn-sm" data-toggle="modal" data-target="#siswaModal<?= $t->id_siswa ?>">
															<i class="uil uil-edit mr-1"></i>Detail
														</button>
														<?php if ($t->status != 'Aktif'): ?>
															<a href="<?= base_url('Dashboard/verifikasi_siswa/'.$t->id_siswa.'/aktif') ?>" class="btn btn-soft-primary btn-sm">
																<i class="uil uil-check mr-1"></i>Aktif
															</a>
														<?php else: ?>
															<a href="<?= base_url('Dashboard/verifikasi_siswa/'.$t->id_siswa.'/alumni') ?>" class="btn btn-soft-info btn-sm">
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
			<div class="modal fade" id="siswaModal" tabindex="-1" aria-labelledby="siswaModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="siswaModalLabel">Tambah Data Siswa</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form method="post" action="<?= base_url('Dashboard/insert_siswa') ?>" enctype="multipart/form-data">
							<div class="modal-body">
								<div class="form-group">
									<label for="username">Username</label>
									<input type="text" class="form-control" id="username" name="username" required>
                                    <?= form_error('username','<small class="text-danger pl-3">','</small>') ?>
								</div>
								<div class="form-group">
									<label for="nama_siswa">Nama Lengkap</label>
									<input type="text" class="form-control" id="nama_siswa" name="nama_siswa" required>
                                    <?= form_error('nama_siswa','<small class="text-danger pl-3">','</small>') ?>
								</div>
								<div class="form-group">
									<label for="nis">NIS</label>
									<input type="text" class="form-control" id="nis" name="nis" required>
                                    <?= form_error('nis','<small class="text-danger pl-3">','</small>') ?>
								</div>
								<div class="form-group">
									<label for="id_kelas">Kelas</label>
									<select class="form-control" name="id_kelas" id="id_kelas" required>
										<option value="" selected disabled="">Pilih Kelas</option>
										<?php foreach ($kelas as $item): ?>
											<option value="<?= $item->id_kelas ?>"><?= $item->kelas ?></option>
										<?php endforeach ?>
									</select>
                                    <?= form_error('id_kelas','<small class="text-danger pl-3">','</small>') ?>
								</div>
								<div class="form-group">
									<label for="email">Email</label>
									<input type="email" class="form-control" id="email" name="email" required>
                                    <?= form_error('email','<small class="text-danger pl-3">','</small>') ?>
								</div>
								<div class="form-group">
									<label for="jenis_kelamin">Jenis Kelamin</label>
									<select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
										<option>Pilih</option>
										<option value="Peremupuan">Peremupuan</option>
										<option value="Laki-laki">Laki-laki</option>
									</select>
                                    <?= form_error('jenis_kelamin','<small class="text-danger pl-3">','</small>') ?>
								</div>
								<div class="form-group">
									<label for="foto_siswa">Upload Foto</label>
									<input type="file" class="form-control" id="foto_siswa" name="foto_siswa" required>
                                    <?= form_error('foto_siswa','<small class="text-danger pl-3">','</small>') ?>
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
<?php foreach ($siswa as $row): ?>
	<div class="modal fade" id="siswaModal<?= $row->id_siswa ?>" tabindex="-1" aria-labelledby="siswaModalLabel<?= $row->id_siswa ?>" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="siswaModalLabel<?= $row->id_siswa ?>">Detail Data Siswa</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form method="post" action="<?= base_url('Dashboard/update_siswa') ?>" enctype="multipart/form-data">
					<div class="modal-body">
						<div class="form-group">
							<label for="id_siswa">ID Siswa</label>
							<input type="text" class="form-control" id="id_siswa" name="id_siswa" placeholder="ID Siswa" value="<?= $row->id_siswa ?>" readonly>
						</div>
						<div class="form-group">
							<label for="username">Username</label>
							<input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?= $row->username ?>" readonly>
						</div>
						<div class="form-group">
							<label for="nama_siswa">Nama Lengkap</label>
							<input type="text" class="form-control" id="nama_siswa" name="nama_siswa" placeholder="Nama Siswa" value="<?= $row->nama_siswa ?>">
						</div>
						<div class="form-group">
							<label for="nis">NIS</label>
							<input type="text" class="form-control" id="nis" name="nis" placeholder="NIS" value="<?= $row->nis ?>">
						</div>
						<div class="form-group">
							<label for="id_kelas">Kelas</label>
							<select class="form-control" name="id_kelas" id="id_kelas">
								<option value="" selected disabled="">Pilih Kelas</option>
								<?php foreach ($kelas as $item): ?>
									<?php if ($item->id_kelas == $row->id_kelas): ?>
										<option value="<?= $item->id_kelas ?>" selected><?= $item->kelas ?></option>
									<?php else: ?>
										<option value="<?= $item->id_kelas ?>"><?= $item->kelas ?></option>
									<?php endif ?>
								<?php endforeach ?>
							</select>
                            <?= form_error('id_kelas','<small class="text-danger pl-3">','</small>') ?>
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
							<label for="foto_siswa">Upload Foto</label>
							<img src="<?=base_url('assets/img/siswa/').$row->foto_siswa ?>" class="row img-thumbnail ml-3" style="height: 300px;">
							<input type="file" class="form-control" id="foto_siswa" name="foto_siswa" placeholder="Foto Siswa" value="<?= $row->foto_siswa ?>">
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