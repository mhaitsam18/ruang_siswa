
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
							<h4 class="mb-1 mt-0">Daftar Mata Pelajaran</h4>
						</div>
					</div>
					<?= $this->session->flashdata('message'); ?>
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-body">
									<h4 class="header-title mt-0 mb-1">Mata Pelajaran</h4>
									<p class="sub-header">
										KeyTable provides Excel like cell navigation on any table. Events (focus, blur, action etc) can be assigned to individual
										cells, columns, rows or all cells.
									</p>
									<button class="btn btn-outline-primary" data-toggle="modal" data-target="#mapelModal">Tambah Data Mapel</button>
									<table id="key-datatable" class="table table-hover nowrap">
										<thead>
											<tr>
												<th>Id Mapel</th>
												<th>Nama Mapel</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($mapel as $k): ?>
												<tr>
													<td><?php echo $k->id_mapel ?></td>
													<td><?php echo $k->mapel ?></td>
  												<td class="mb-0 text-center">
  													<a href="<?= base_url('Dashboard/hapus_mapel/'.$k->id_mapel) ?>" class="btn btn-soft-danger btn-sm tombol-hapus"><i class="uil uil-trash mr-1"></i>Hapus</a>
  													<button class="btn btn-soft-success btn-sm" data-toggle="modal" data-target="#mapelModal<?= $k->id_mapel ?>">
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
<?php foreach ($mapel as $row): ?>
	<div class="modal fade" id="mapelModal<?= $row->id_mapel ?>" tabindex="-1" aria-labelledby="mapelModalLabel<?= $row->id_mapel ?>" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="mapelModalLabel<?= $row->id_mapel ?>">Detail Data mapel</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form method="post" action="<?= base_url('Dashboard/update_mapel') ?>" enctype="multipart/form-data">
					<div class="modal-body">
						<div class="form-group">
							<label for="id_mapel">ID Mapel</label>
							<input type="text" class="form-control" id="id_mapel" name="id_mapel" placeholder="ID mapel" value="<?= $row->id_mapel ?>" readonly>
						</div>
						<div class="form-group">
							<label for="mapel">Mata Pelajaran</label>
							<input type="text" class="form-control" id="mapel" name="mapel" placeholder="mapel" value="<?= $row->mapel ?>">
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

<div class="modal fade" id="mapelModal" tabindex="-1" aria-labelledby="mapelModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="mapelModalLabel">Tambah Data Mapel</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post" action="<?= base_url('Dashboard/lihat_mapel') ?>" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="form-group">
						<label for="mapel">Mata Pelajaran</label>
						<input type="text" class="form-control" id="mapel" name="mapel" placeholder="mapel" required>
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