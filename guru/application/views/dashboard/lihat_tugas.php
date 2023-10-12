
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
								<a href="<?php echo base_url('Dashboard/tambah_tugas') ?>" <button class="btn btn-primary btn-block" type="submit" > + Tambah Tugas</button> </a>
								
								<!-- <ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="#">Shreyu</a></li>
									<li class="breadcrumb-item"><a href="#">Tables</a></li>
									<li class="breadcrumb-item active" aria-current="page">Advanced</li>
								</ol> -->
							</nav>
							<h2 class="mb-1 mt-0">Daftar tugas</h2>
						</div>
					</div>

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-body">
									<h4 class="header-title mt-0 mb-1">Daftar tugas yang tersedia</h4>
									<p class="sub-header">
										Daftar tugas yang sudah anda input :
									</p>

									<table id="key-datatable" class="table dt-responsive nowrap">
										<thead>
											<tr>
												<th>Mata Pelajaran</th>
												<th>Nama Tugas</th>
												<th>Kelas</th>
												<!-- <th>Guru</th> -->
                        <th>Kategori</th>
												<th class="mb-0 text-center">Aksi</th>
												<th>Deadline :</th>
											</tr>
										</thead>
										<tbody>
                      <?php foreach ($tugas as $t): ?>
                        <tr>
  												<td><?php echo $t->mapel ?></td>
  												<td><?php echo $t->nama_tugas ?></td>
  												<td><?php echo $t->kelas ?></td>
  												<!-- <td><?php echo $this->session->nama_guru ?></td> -->
                          <td><?php echo $t->kategori ?></td>
  												<td class="mb-0 text-center">
  							<!-- <a href="<?= base_url('Dashboard/edit_tugas/') ?>"
                              class="btn btn-soft-primary btn-sm"><i class="uil uil-edit mr-1"></i></a> -->
                            <a href="<?= base_url('Dashboard/hapus_tugas/'.$t->id_tugas) ?>"
                              class="btn btn-soft-danger btn-sm"><i class="uil uil-trash-alt mr-1"></i>Delete</a>
                          </td>
  												<td><?= cari_waktu($t->batas_pengumpulan) ?></td>
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
