<a href="index3.html" class="brand-link">
  <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
    style="opacity: .8">
  <span class="brand-text font-weight-light">Inventory</span>
</a>


<div class="sidebar">

  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
      <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
      <a href="#" class="d-block">Egie</a>
    </div>
  </div>



  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <li class="nav-item">
        <a href="/dashboard" class="nav-link">
          <i class="nav-icon fas  fa-solid fa-chart-line"></i>

          <p>
            Dashboard
            <!-- <span class="right badge badge-danger">New</span> -->
          </p>
        </a>
      </li>
      <li class="nav-item  ">
        <a href="#" class="nav-link  ">
          <i class="nav-icon fas fa-sharp fa-solid fa-boxes-stacked"></i>
          <p>
            Master Barang
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="<?= base_url('master-barang/jenis'); ?>" class="nav-link">
              <i class="far fa-solid fa-list nav-icon"></i>
              <p>Jenis </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('master-barang/satuan'); ?>" class="nav-link  ">
              <i class="far fa-solid fa-scale-unbalanced-flip nav-icon"></i>
              <p>Satuan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('master-barang/merk'); ?>" class="nav-link">
              <i class="far fa-brands fa-shopify nav-icon"></i>
              <p>Merk</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('master-barang/barang'); ?>" class="nav-link">
              <i class="far fa-solid fa-box nav-icon"></i>
              <p>Barang</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a href="pages/widgets.html" class="nav-link">
          <i class="nav-icon fas  fa-solid fa-users-line"></i>

          <p>
            Customer
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
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="./index.html" class="nav-link">
              <i class="far fa-solid fa-circle-up nav-icon"></i>
              <p>Barang Masuk </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./index2.html" class="nav-link  ">
              <i class="far fa-solid fa-circle-down nav-icon"></i>
              <p>Barang Keluar</p>
            </a>
          </li>

        </ul>
      </li>
      <li class="nav-item  ">
        <a href="#" class="nav-link  ">
          <i class="nav-icon fas fa-print"></i>
          <p>
            Laporan
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="./index.html" class="nav-link">
              <i class="far  fa-solid fa-circle-up nav-icon"></i>
              <p>Barang Masuk </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./index2.html" class="nav-link  ">
              <i class="far  fa-solid fa-circle-down nav-icon"></i>
              <p>Barang Keluar</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./index2.html" class="nav-link  ">
              <i class="far  fa-solid fa-bag-shopping nav-icon"></i>
              <p>Stok Barang</p>
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </nav>

</div>