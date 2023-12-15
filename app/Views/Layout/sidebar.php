<?php
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->


  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= base_url() ?>/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?= session()->get('user')['cusNama'] ?? "Admin" ?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
            <a href="<?= base_url() ?>Home/dashboard" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
        <?php
        if (session()->get('user')['namaRole'] == "admin") :
        ?>
          
          <li class="nav-item">
            <a href="<?= base_url() ?>Admin/barang" class="nav-link">
              <i class="nav-icon fas fa-warehouse"></i>
              <p>
                Barang
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url() ?>Admin/customer" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Data Customer
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tools"></i>
              <p>
                Data Service
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url() ?>Admin/tabelService" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Item Service</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url() ?>Admin/riwayat" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Riwayat</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url() ?>Admin/pencarian" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pencarian</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?= base_url() ?>Admin/aduan" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Kotak Aduan
              </p>
            </a>
          </li>
        <?php endif ?>

        <?php
        if (session()->get('user')['namaRole'] == "user") :
        ?>
          <li class="nav-header">User</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tools"></i>
              <p>
                Service
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url()?>Customer/index" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Riwayat</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-header">Kritik dan Saran</li>
          <li class="nav-item">
            <a href="<?=base_url()?>Customer/aduan" class="nav-link">
              <i class="nav-icon fas fa-flag"></i>
              <p>Kotak Aduan</p>
            </a>
          </li>
        <?php endif ?>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>