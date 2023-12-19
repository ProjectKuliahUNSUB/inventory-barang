<?php
$role = strtolower(session('user')['role'] ?? '');
$profile = session('user');
?>
<div class="brand-link  ">
  <img src="<?= base_url('assets/logo-2.png') ?>" alt="Inventory Barang Logo" class="brand-image img-circle  "
    style="opacity: .8">
  <span class="brand-text ">Inventory Barang</span>
</div>


<div class="sidebar">

  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
      <img src="<?= 'data:image/png;base64,' . $profile['img'] ?>" height="1500px" class="img-circle elevation-2"
        alt="User Image">
    </div>
    <div class="info">
      <div class="d-block">
        <?= $profile['nama'] ?>
      </div>
    </div>
  </div>
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <li class="nav-item">
        <a href="<?= base_url($role . '/dashboard'); ?>" class="nav-link">
          <i class="nav-icon fas  fa-solid fa-chart-line"></i>

          <p>
            Dashboard
            <!-- <span class="right badge badge-danger">New</span> -->
          </p>
        </a>
      </li>

      <li class="nav-item">
        <a href="<?= base_url($role . '/master-barang'); ?>" class="nav-link">
          <i class="nav-icon fas fa-sharp fa-solid fa-boxes-stacked"></i>

          <p>
            Master Barang
            <!-- <span class="right badge badge-danger">New</span> -->
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?= base_url($role . '/satuan'); ?>" class="nav-link">
          <i class="nav-icon fas fa-solid fa-scale-balanced"></i>

          <p>
            Satuan
            <!-- <span class="right badge badge-danger">New</span> -->
          </p>
        </a>
      </li>
      <li class="nav-item  ">
        <a href="#" class="nav-link  ">
          <i class="nav-icon fas fa-solid fa-handshake"></i>

          <p>
            Transaksi
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview pl-4">
          <li class="nav-item">
            <a href="<?= base_url($role . '/transaksi/barang-masuk'); ?>" class="nav-link">
              <i class="far fa-solid fa-circle-down nav-icon"></i>
              <p>Barang Masuk </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url($role . '/transaksi/barang-keluar'); ?>" class="nav-link  ">
              <i class="far fa-solid fa-circle-up nav-icon"></i>
              <p>Barang Keluar</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a href="<?= base_url($role . '/laporan'); ?>" class="nav-link">
          <i class="nav-icon fas  fa-print"></i>

          <p>
            Laporan
            <!-- <span class="right badge badge-danger">New</span> -->
          </p>
        </a>
      </li>

      <?php if (strtolower(session('user')['role'] ?? '') === 'admin'): ?>
        <li class="nav-item">
          <a href="<?= base_url('admin/users'); ?>" class="nav-link">
            <i class="nav-icon fas fa-solid fa-users-gear"></i>
            <p>
              User
            </p>
          </a>
        </li>
      <?php endif; ?>
    </ul>
  </nav>
</div>