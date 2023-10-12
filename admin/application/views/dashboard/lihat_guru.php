
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
							<h4 class="mb-1 mt-0">Daftar Guru</h4>
						</div>
					</div>
					<?= $this->session->flashdata('message'); ?>
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-body">
									<h4 class="header-title mt-0 mb-1">Guru</h4>
									<p class="sub-header">
										KeyTable provides Excel like cell navigation on any table. Events (focus, blur, action etc) can be assigned to individual
										cells, columns, rows or all cells.
									</p>
									<button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#guruModal">Tambah Guru</button>
									<table id="key-datatable" class="table dt-responsive nowrap">
										<thead>
											<tr>
												<th>Id Guru</th>
												<th>Nama Guru</th>
												<th>NIP</th>
												<th>Status</th>
												<th class="mb-0 text-center">Aksi</th>
												<th>Dokumen : </th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($guru as $t): ?>
												<tr>
													<td><?php echo $t->id_guru ?></td>
													<td><?php echo $t->nama_guru ?></td>
													<td><?php echo $t->nip ?></td>
													<?php if ($t->status == 'Terverifikasi'): ?>
														<td><p class="badge badge-success font-size-13 font-weight-normal"><?php echo $t->status ?></p></td>
													<?php else: ?>
														<td><p class="badge badge-warning font-size-13 font-weight-normal"><?php echo $t->status ?></p></td>
													<?php endif; ?>
  												<td class="mb-0 text-center">
  													<a href="<?= base_url('Dashboard/role_guru/'.$t->id_guru) ?>" class="btn btn-soft-primary btn-sm"><i class="uil uil-spin mr-1"></i>Role</a>
  													<a href="<?= base_url('Dashboard/hapus_guru/'.$t->id_guru) ?>" class="btn btn-soft-danger btn-sm"><i class="uil uil-trash mr-1"></i>Hapus</a>
  													<button class="btn btn-soft-success btn-sm" data-toggle="modal" data-target="#guruModal<?= $t->id_guru ?>">
  														<i class="uil uil-edit mr-1"></i>Detail
  													</button>
  													<?php if ($t->status != "Terverifikasi"): ?>
  														<a href="<?= base_url('Dashboard/verifikasi_guru/'.$t->id_guru) ?>" class="btn btn-soft-primary btn-sm"><i class="uil uil-check mr-1"></i>verifikasi</a>
  													<?php endif; ?>
  												</td>
  												<td><?php echo $t->dokumen ?></td>
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
<?php foreach ($guru as $row): ?>
	<div class="modal fade" id="guruModal<?= $row->id_guru ?>" tabindex="-1" aria-labelledby="guruModalLabel<?= $row->id_guru ?>" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="guruModalLabel<?= $row->id_guru ?>">Detail Data Guru</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form method="post" action="<?= base_url('Dashboard/update_guru') ?>" enctype="multipart/form-data">
					<div class="modal-body">
						<div class="form-group">
							<label for="id_guru">ID guru</label>
							<input type="text" class="form-control" id="id_guru" name="id_guru" placeholder="ID guru" value="<?= $row->id_guru ?>" readonly>
						</div>
						<div class="form-group">
							<label for="username">Username</label>
							<input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?= $row->username ?>" readonly>
						</div>
						<div class="form-group">
							<label for="nama_guru">Nama Lengkap</label>
							<input type="text" class="form-control" id="nama_guru" name="nama_guru" placeholder="Nama guru" value="<?= $row->nama_guru ?>">
						</div>
						<div class="form-group">
							<label for="nip">NIP</label>
							<input type="text" class="form-control" id="nip" name="nip" placeholder="NIP" value="<?= $row->nip ?>">
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
							<label for="foto_guru">Upload Foto</label>
							<img src="<?=base_url('assets/img/guru/').$row->foto_guru ?>" class="row img-thumbnail ml-3" style="height: 300px;">
							<input type="file" class="form-control" id="foto_guru" name="foto_guru" placeholder="Foto guru" value="<?= $row->foto_guru ?>">
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
<div class="modal fade" id="guruModal" tabindex="-1" aria-labelledby="guruModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="guruModalLabel<?= $row->id_guru ?>">Tambah Data Guru</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post" action="<?= base_url('Dashboard/tambah_guru') ?>" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" class="form-control" id="username" name="username" placeholder="Username">
						<?= form_error('username','<small class="text-danger pl-3">','</small>') ?>
					</div>
					<div class="form-group row">
						<div class="col">
							<label for="username">Password</label>
							<input type="password" class="form-control" id="password1" name="password1" placeholder="Username">
							<?= form_error('password1','<small class="text-danger pl-3">','</small>') ?>
						</div>
						<div class="col">
							<label for="username">Confirm Password</label>
							<input type="password" class="form-control" id="password2" name="password2" placeholder="Username">
							<?= form_error('password2','<small class="text-danger pl-3">','</small>') ?>
						</div>
					</div>
					<div class="form-group">
						<label for="nama_guru">Nama Lengkap</label>
						<input type="text" class="form-control" id="nama_guru" name="nama_guru" placeholder="Nama guru">
						<?= form_error('nama_guru','<small class="text-danger pl-3">','</small>') ?>
					</div>
					<div class="form-group">
						<label for="nip">NIP</label>
						<input type="text" class="form-control" id="nip" name="nip" placeholder="NIP">
						<?= form_error('nip','<small class="text-danger pl-3">','</small>') ?>
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" class="form-control" id="email" name="email" placeholder="Email">
						<?= form_error('email','<small class="text-danger pl-3">','</small>') ?>
					</div>
					<div class="form-group">
						<label for="jenis_kelamin">Jenis Kelamin</label>
						<select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
							<option>Pilih</option>
							<option value="Laki-laki">Laki-laki</option>
							<option value="Perempuan">Perempuan</option>
						</select>
						<?= form_error('jenis_kelamin','<small class="text-danger pl-3">','</small>') ?>
					</div>
					<div class="form-group">
						<label for="foto_guru">Upload Foto</label>
						<input type="file" class="form-control" id="foto_guru" name="foto_guru">
					</div>
					<div class="form-group">
						<label for="foto_guru">Upload Dokumen</label>
						<input type="file" class="form-control" id="dokumen" name="dokumen">
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