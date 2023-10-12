<div class="left-side-menu">
  <div class="media user-profile mt-2 mb-2">
    <img src="<?php echo base_url() ?>assets/images/users/avatar-7.jpg" class="avatar-sm rounded-circle mr-2" alt="Shreyu" />
    <img src="<?php echo base_url() ?>assets/images/users/avatar-7.jpg" class="avatar-xs rounded-circle mr-2" alt="Shreyu" />

    <div class="media-body">
      <h6 class="pro-user-name mt-0 mb-0">Admin</h6>
      <span class="pro-user-desc">Admin</span>
    </div>
    <div class="dropdown align-self-center profile-dropdown-menu">
      <a class="dropdown-toggle mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
        <span data-feather="chevron-down"></span>
      </a>
      <div class="dropdown-menu profile-dropdown">
        <a href="<?php echo base_url('Dashboard/profile') ?>" class="dropdown-item notify-item">
          <i data-feather="user" class="icon-dual icon-xs mr-2"></i>
          <span>My Account</span>
        </a>
        <div class="dropdown-divider"></div>

        <a href="<?php echo base_url('Auth/logout') ?>" class="dropdown-item notify-item">
          <i data-feather="log-out" class="icon-dual icon-xs mr-2"></i>
          <span>Logout</span>
        </a>
      </div>
    </div>
  </div>
  <div class="sidebar-content">
    <!--- Sidemenu -->
    <div id="sidebar-menu" class="slimscroll-menu">
      <ul class="metismenu" id="menu-bar">
        <li class="menu-title">Navigation</li>

        <li>
          <a href="<?php echo base_url('Dashboard') ?>">
            <i data-feather="home"></i>
            <span class="badge badge-success float-right"></span>
            <span> Dashboard </span>
          </a>
        </li>

        <li class="menu-title">Daftar User</li>
        <li>
          <a href="<?php echo base_url('Dashboard/lihat_siswa') ?>">
            <i data-feather="file-text"></i>
            <span> Manajemen Siswa </span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url('Dashboard/lihat_guru') ?>">
            <i data-feather="file-text"></i>
            <span> Manajemen Guru </span>
          </a>
        </li>

        <li class="menu-title">Data Master</li>
        <li>
          <a href="<?php echo base_url('Dashboard/lihat_kelas') ?>">
            <i data-feather="file-text"></i>
            <span> Manajemen Kelas </span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url('Dashboard/lihat_mapel') ?>">
            <i data-feather="file-text"></i>
            <span> Manajemen Mata Pelajaran </span>
          </a>
        </li>

        <li class="menu-title">Materi</li>
        <li>
          <a href="<?php echo base_url('Dashboard/lihat_materi') ?>">
            <i data-feather="file-text"></i>
            <span> Manajemen Materi </span>
          </a>
        </li>

        <li class="menu-title">Tugas</li>
        <li>
          <a href="<?php echo base_url('Dashboard/lihat_tugas') ?>">
            <i data-feather="folder"></i>
            <span> Manajemen Tugas </span>
          </a>
        </li>

        <li class="menu-title">Nilai</li>
        <li>
          <a href="<?php echo base_url('Dashboard/lihat_nilai') ?>">
            <i data-feather="archive"></i>
            <span> Manajemen Nilai </span>
          </a>
        </li>

      </ul>
    </div>
    <!-- End Sidebar -->

    <div class="clearfix"></div>
  </div>
  <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->
