
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
							<h4 class="mb-1 mt-0">Daftar Kelas</h4>
						</div>
					</div>
					<?= $this->session->flashdata('message'); ?>
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-body">
									<h4 class="header-title mt-0 mb-1">Kelas</h4>
									<p class="sub-header">
										KeyTable provides Excel like cell navigation on any table. Events (focus, blur, action etc) can be assigned to individual
										cells, columns, rows or all cells.
									</p>
									<button class="btn btn-outline-primary" data-toggle="modal" data-target="#kelasModal">Tambah Data Kelas</button>
									<table id="key-datatable" class="table table-hover nowrap">
										<thead>
											<tr>
												<th>Id Kelas</th>
												<th>Nama Kelas</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($kelas as $k): ?>
												<tr>
													<td><?php echo $k->id_kelas ?></td>
													<td><?php echo $k->kelas ?></td>
  												<td class="mb-0 text-center">
  													<a href="<?= base_url('Dashboard/hapus_kelas/'.$k->id_kelas) ?>" class="btn btn-soft-danger btn-sm tombol-hapus"><i class="uil uil-trash mr-1"></i>Hapus</a>
  													<button class="btn btn-soft-success btn-sm" data-toggle="modal" data-target="#kelasModal<?= $k->id_kelas ?>">
  														<i class="uil uil-edit mr-1"></i>Detail
  													</button>
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
<?php foreach ($kelas as $row): ?>
	<div class="modal fade" id="kelasModal<?= $row->id_kelas ?>" tabindex="-1" aria-labelledby="kelasModalLabel<?= $row->id_kelas ?>" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="kelasModalLabel<?= $row->id_kelas ?>">Detail Data Kelas</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form method="post" action="<?= base_url('Dashboard/update_kelas') ?>" enctype="multipart/form-data">
					<div class="modal-body">
						<div class="form-group">
							<label for="id_kelas">ID kelas</label>
							<input type="text" class="form-control" id="id_kelas" name="id_kelas" placeholder="ID kelas" value="<?= $row->id_kelas ?>" readonly>
						</div>
						<div class="form-group">
							<label for="kelas">Kelas</label>
							<input type="text" class="form-control" id="kelas" name="kelas" placeholder="Kelas" value="<?= $row->kelas ?>">
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

<div class="modal fade" id="kelasModal" tabindex="-1" aria-labelledby="kelasModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="kelasModalLabel">Tambah Data Kelas</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post" action="<?= base_url('Dashboard/lihat_kelas') ?>" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="form-group">
						<label for="kelas">Kelas</label>
						<input type="text" class="form-control" id="kelas" name="kelas" placeholder="Kelas" required>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-primary">Tambah</button>
				</div>
			</form>
		</div>
	</div>
</div>