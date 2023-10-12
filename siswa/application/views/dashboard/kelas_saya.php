<div class="content-page">
	<div class="content">
		<!-- Start Content-->
		<div class="container-fluid">
			<div class="row page-title">
				<div class="col-md-12">
					<nav aria-label="breadcrumb" class="float-right mt-1">
						<ol class="breadcrumb">
							<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
						</ol>
					</nav>
					<!-- <h4 class="mb-1 mt-0">Jadwal Pelajaran</h4> -->
				</div>
			</div>
			<h4 class="mb-1 mt-0">Kelas Saya</h4>
			<div class="row">
				<?php foreach ($mapel as $key): ?>
					<?php 
					$this->db->join('guru', 'role_guru.id_guru = guru.id_guru');
					$role_guru = $this->db->get_where('role_guru', [
						'id_mapel' => $key->id_mapel,
						'id_kelas' => $siswa->id_kelas
					])->row();
					?>
					<?php if ($role_guru): ?>
						<div class="card mr-3" style="width: 18rem;">
							<div class="card-body">
								<span class="badge badge-primary float-right"><?= $siswa->kelas ?></span>
								<h5 class="card-title"><?= $key->mapel ?></h5>
								<h6 class="card-subtitle mb-2 text-muted">Nama Guru : <?= $role_guru->nama_guru ?></h6>
								<a href="<?= base_url('Dashboard/detail_kelas/'.$role_guru->id_role_guru) ?>" class="card-link">Buka Kelas</a>
							</div>
							<!-- <div class="card-body">
								<span class="badge badge-primary float-right"><?= $siswa->kelas ?></span>
								<h5 class="card-title"><?= $key->mapel ?></h5>
								<?php 
								$this->db->join('guru', 'role_guru.id_guru = guru.id_guru');
								$role_guru = $this->db->get_where('role_guru', [
									'id_mapel' => $key->id_mapel,
									'id_kelas' => $siswa->id_kelas
								])->row();
								?>
								<?php if ($role_guru): ?>
									<h6 class="card-subtitle mb-2 text-muted">Guru: <?= $role_guru->nama_guru ?></h6>
									<a href="<?= base_url('Dashboard/detail_kelas/'.$role_guru->id_role_guru) ?>" class="card-link">Buka Kelas</a>
								<?php else: ?>
									<h6 class="card-subtitle mb-2 text-muted">Guru: Tidak terdaftar</h6>
									<span class="card-link">Kelas tidak tersedia</span>
								<?php endif ?>
							</div> -->
						</div>
					<?php endif ?>
				<?php endforeach ?>
			</div> <!-- container-fluid -->
		</div>
	</div>

</div> <!-- content -->