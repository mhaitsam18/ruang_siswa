<div class="left-side-menu">
  <div class="media user-profile mt-2 mb-2">
    <img src="<?php echo base_url() ?>assets/images/users/avatar-7.jpg" class="avatar-sm rounded-circle mr-2" alt="Shreyu" />
    <img src="<?php echo base_url() ?>assets/images/users/avatar-7.jpg" class="avatar-xs rounded-circle mr-2" alt="Shreyu" />

    <div class="media-body">
      <h6 class="pro-user-name mt-0 mb-0"><?php echo $this->session->nama_mahasiswa?></h6>
      <span class="pro-user-desc">Mahasiswa</span>
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
        <li class="menu-title">Materi</li>
        <li>
          <a href="<?php echo base_url('Dashboard/lihat_materi') ?>">
            <i data-feather="file-text"></i>
            <span> Lihat Materi </span>
          </a>
        </li>

        <li class="menu-title">Tugas</li>
        <li>
          <a href="<?php echo base_url('Dashboard/lihat_tugas') ?>">
            <i data-feather="folder"></i>
            <span> Lihat Tugas </span>
          </a>
        </li>

        <li class="menu-title">Nilai</li>
        <li>
          <a href="<?php echo base_url('Dashboard/lihat_nilai') ?>">
            <i data-feather="archive"></i>
            <span> Lihat Nilai </span>
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
