        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url(); ?>">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-tools"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Steven Motor</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider">



            <!-- Looping Menu-->
            <div class="sidebar-heading">
                Home
            </div>
            <li class="nav-item active">
                <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link pb-0" href="<?= base_url('admin'); ?>">
                    <i class="fa fa-fw fa-home"></i>
                    <span>Dashboard</span></a>
            </li>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider mt-3">

            <!-- Heading -->
            <div class="sidebar-heading">
                Master Data
            </div>
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link pb-0" href="<?= base_url('barang/kategori'); ?>">
                    <i class="fa fa-fw fa-box"></i>
                    <span>Kategori Sparepart</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link pb-0" href="<?= base_url('barang'); ?>">
                    <i class="fa fa-fw fa-box-open"></i>
                    <span>Data Sparepart</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link pb-0" href="<?= base_url('user/anggota'); ?>">
                    <i class="fa fa-fw fa-users"></i>
                    <span>Data Admin</span></a>
            </li>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider mt-3">

            <!--Heading -->
            <div class="sidebar-heading">Transaksi</div>
            <!-- Nav Item Dashbord -->
            <li class="nav-item active">
                <!-- Nav Item Dashbord -->
            <li class="nav-item">
                <a class="nav-link pb-0" href="<?= base_url('transaksi'); ?>">
                    <i class="fa fa-fw fa-shopping-cart"></i>
                    <span>Data Transaksi</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link pb-0" href="<?= base_url('transaksi/daftarPesan'); ?>">
                    <i class="fa fa-fw fa-list"></i>
                    <span>Data Pesan</span></a>
            </li>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider mt-3">
            <!--Heading -->
            <div class="sidebar-heading">Laporan</div>
            <!-- Nav Item Dashbord -->
            <li class="nav-item active">
                <!-- Nav Item Dashbord -->
            <li class="nav-item">
                <a class="nav-link pb-0" href="<?= base_url('laporan/laporan_barang'); ?>">
                    <i class="fa fa-fw fa-address-book"></i>
                    <span>Laporan Data Barang</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link pb-0" href="<?= base_url('laporan/laporan_transaksi'); ?>">
                    <i class="fa fa-fw fa-address-book"></i>
                    <span>Laporan Data Transaksi</span></a>
            </li>
            </li>

            <!-- divider -->
            <hr class="sidebar-divider mt-3">


            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar --   > 
        
        