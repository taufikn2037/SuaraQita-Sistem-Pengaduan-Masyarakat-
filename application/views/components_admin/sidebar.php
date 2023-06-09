<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <?php if ($this->session->userdata('id_role') == '1') : ?>
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <span><?= $admins['name__admin']; ?> |</span>
            <a href="logout" class="btn btn-warning font-weight-bold" role="button" data-target="#logoutModal" data-toggle="modal" aria-pressed="true">Logout</a>
          </li>
        </ul>
      </nav>

      <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Yakin untuk keluar?</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">Pilih "Logout" dibawah jika kamu ingin keluar.</div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
              <a class="btn btn-danger" href="<?= base_url('ladmin/logout'); ?>">Logout</a>
            </div>
          </div>
        </div>
      </div>

      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="#" class="brand-link">
          <img src="<?php echo base_url(); ?>assets/dist/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <strong class="brand-text font-weight-bold">Suara<span class="text-warning">Qita</span></strong>
        </a>

        <div class="sidebar">
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <li class="nav-item">
                <a href="<?= base_url('/admin') ?>" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Dashboard</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?= base_url('/admin/ekspor_data') ?>" class="nav-link">
                  <i class="nav-icon fas fa-share-square"></i>
                  <p>Ekspor Data</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?= base_url('/admin/berita') ?>" class="nav-link">
                  <i class="nav-icon fas fa-window-restore"></i>
                  <p>Berita</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?= base_url('/admin/galeri') ?>" class="nav-link">
                  <i class="nav-icon fas fa-box"></i>
                  <p>Galeri</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?= base_url('/admin/kategori_p') ?>" class="nav-link">
                  <i class="nav-icon fas fa-th-list"></i>
                  <p>Kategori Pengaduan</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                    Data Pengguna
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?= base_url('/admin/data_masyarakat') ?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Masyarakat</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url('/admin/data_petugas') ?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Petugas</p>
                    </a>
                  </li>
                </ul>
              </li>

            </ul>
          </nav>
        </div>
      </aside>

      <div class="content-wrapper">
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0"><?= $title ?></h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a class="text-warning" href="#">Home</a></li>
                  <li class="breadcrumb-item active"><?= $title ?></li>
                </ol>
              </div>
            </div>
          </div>
        </div>

        <div class="content">
          <div class="container-fluid">
          <?php endif; ?>