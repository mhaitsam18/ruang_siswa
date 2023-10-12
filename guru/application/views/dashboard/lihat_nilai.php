
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
									<li class="breadcrumb-item"><a href="#">Menu</a></li>
									<li class="breadcrumb-item"><a href="#">Tables</a></li>
									<li class="breadcrumb-item active" aria-current="page">Advanced</li>
								</ol>
							</nav>
							<h4 class="mb-1 mt-0">Daftar Nilai Siswa</h4>
						</div>
					</div>

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-body">
									<h4 class="header-title mt-0 mb-1">Nilai nilai siswa</h4>
									<p class="sub-header">
										KeyTable provides Excel like cell navigation on any table. Events (focus, blur, action etc) can be assigned to individual
										cells, columns, rows or all cells.
									</p>

									<table id="key-datatable" class="table dt-responsive nowrap">
										<thead>
											<tr>
												<th>Nama Siswa</th>
                       						    <th>Kelas</th>
												<th>Mata Pelajaran</th>
												<th>Nama Tugas</th>
                       						    <th>Kategori</th>
												<th>Nilai</th>
												<th class="mb-0 text-center">Aksi</th>
												<th>Nis : </th>
											</tr>
										</thead>
										<tbody>
                      <?php foreach ($nilai as $t): ?>
                        <tr>
  												<td><?php echo $t->nama_siswa ?></td>
                          <td><?php echo $t->kelas ?></td>
													<td><?php echo $t->mapel ?></td>
  												<td><?php echo $t->nama_tugas ?></td>
                          <td><?php echo $t->kategori ?></td>
  												<td><?php echo $t->nilai ?></td>
  												<td class="mb-0 text-center">
                            <a href="<?= base_url('Dashboard/edit_nilai/'.$t->id_nilai) ?>"
                              class="btn btn-soft-primary btn-sm"><i class="uil uil-edit mr-1"></i>Edit Nilai</a>
                          </td>
  												<td><?php echo $t->nis ?></td>
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
