
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
							<h4 class="mb-1 mt-0">Role Guru</h4>
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
									<!-- Button trigger modal -->
									<button type="button" class="btn btn-outline-primary mb-3" data-toggle="modal" data-target="#roleModal">
										Tambah Role Guru
									</button>
									<table id="key-datatable" class="table table-hover nowrap">
										<thead>
											<tr>
												<th>Id Guru</th>
												<th>Nama Guru</th>
												<th>Kelas</th>
												<th>Mata Pelajaran</th>
												<th class="mb-0 text-center">Aksi</th>
												<!-- <th>Dokumen : </th> -->
											</tr>
										</thead>
										<tbody>
											<?php foreach ($role as $r): ?>
												<tr>
													<td><?php echo $r->id_guru ?></td>
													<td><?php echo $r->nama_guru ?></td>
													<td><?php echo $r->kelas ?></td>
													<td><?php echo $r->mapel ?></td>
	  												<td class="mb-0 text-center">
	  													<button class="btn btn-soft-success btn-sm" data-toggle="modal" data-target="#roleModal<?= $r->id_role_guru ?>">
	  														<i class="uil uil-edit mr-1"></i> Edit
	  													</button>
	  													<a href="<?= base_url('Dashboard/hapus_role_guru/'.$r->id_role_guru) ?>" class="btn btn-soft-danger btn-sm tombol-hapus" data-hapus="Role"><i class="uil uil-trash mr-1"></i> Hapus</a>
	  												</td>
	  												<!-- <td><?php echo $r->dokumen ?></td> -->
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
			<!-- Modal -->
			<div class="modal fade" id="roleModal" tabindex="-1" aria-labelledby="roleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="roleModalLabel">Tambah Role Guru</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form action="<?= base_url('Dashboard/role_guru/'.$id_guru) ?>" method="post">
							<div class="modal-body">
								<div class="form-group">
									<label>Kelas</label>
									<select class="form-control" name="id_kelas" id="id_kelas" required>
										<option value="" selected disabled>Pilih Kelas</option>
										<?php foreach ($kelas as $item): ?>
											<option value="<?= $item->id_kelas ?>"><?= $item->kelas ?></option>
										<?php endforeach ?>
									</select>
									<?= form_error('id_kelas','<small class="text-danger pl-3">','</small>') ?>
								</div>
								<div class="form-group">
									<label>Mata Pelajaran</label>
									<select class="form-control" name="id_mapel" id="id_mapel" required>
										<option value="" selected disabled>Pilih Mata Pelajaran</option>
										<?php foreach ($mapel as $item): ?>
											<option value="<?= $item->id_mapel ?>"><?= $item->mapel ?></option>
										<?php endforeach ?>
									</select>
									<?= form_error('id_mapel','<small class="text-danger pl-3">','</small>') ?>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Tambah</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<?php foreach ($role as $rg): ?>
				<div class="modal fade" id="roleModal<?= $rg->id_role_guru ?>" tabindex="-1" aria-labelledby="roleModalLabel<?= $rg->id_role_guru ?>" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="roleModalLabel<?= $rg->id_role_guru ?>">Edit Role Guru</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<form action="<?= base_url('Dashboard/update_role_guru/') ?>" method="post">
								<div class="modal-body">
									<input type="hidden" name="id_role_guru" id="id_role_guru" value="<?= $rg->id_role_guru ?>">
									<div class="form-group">
										<label>Kelas</label>
										<select class="form-control" name="id_kelas" id="id_kelas">
											<option value="" disabled>Pilih Kelas</option>
											<?php foreach ($kelas as $item): ?>
												<?php if ($item->id_kelas == $rg->id_kelas): ?>
													<option value="<?= $item->id_kelas ?>" selected><?= $item->kelas ?></option>
												<?php else: ?>
													<option value="<?= $item->id_kelas ?>"><?= $item->kelas ?></option>
												<?php endif ?>
											<?php endforeach ?>
										</select>
										<?= form_error('id_kelas','<small class="text-danger pl-3">','</small>') ?>
									</div>
									<div class="form-group">
										<label>Mata Pelajaran</label>
										<select class="form-control" name="id_mapel" id="id_mapel">
											<option value="" disabled>Pilih Mata Pelajaran</option>
											<?php foreach ($mapel as $item): ?>
												<?php if ($item->id_mapel == $rg->id_mapel): ?>
													<option value="<?= $item->id_mapel ?>" selected><?= $item->mapel ?></option>
												<?php else: ?>
													<option value="<?= $item->id_mapel ?>"><?= $item->mapel ?></option>
												<?php endif ?>
											<?php endforeach ?>
										</select>
										<?= form_error('id_mapel','<small class="text-danger pl-3">','</small>') ?>
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									<button type="submit" class="btn btn-primary">Simpan</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			<?php endforeach ?>