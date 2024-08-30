<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                Jumlah Admin
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $this->ModelUser->getUserWhere(['role_id' => 1])->num_rows(); ?></div>
            </div>
            <div class="col-auto">
              <a href="<?= base_url('user/anggota'); ?>"><i class="fas fa-users fa-2x text-gray-300"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                Stok Barang Yang Tersedia
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php $where = ['stok != 0'];
                                                                    $totalstok = $this->ModelBarang->total('stok', $where);
                                                                    echo $totalstok;
                                                                    ?></div>
            </div>
            <div class="col-auto">
              <a href="<?= base_url('barang'); ?>"><i class="fas fa-box-open fa-2x text-gray-300"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Barang Yang Telah Dibeli
              </div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php $where = ['ditransaksi!= 0'];
                                                                            $totalditransaksi = $this->ModelBarang->total('ditransaksi', $where);
                                                                            echo $totalditransaksi; ?></div>
                </div>

              </div>
            </div>
            <div class="col-auto">
              <a href="<?= base_url('transaksi'); ?>"><i class="fas fa-hand-holding-usd fa-2x text-gray-300"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                Barang yang dipesan
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
                                                                  $where = ['dipesan !=0'];
                                                                  $totaldipesan = $this->ModelBarang->total('dipesan', $where);
                                                                  echo $totaldipesan;
                                                                  ?></div>
            </div>
            <div class="col-auto">
              <a href="<?= base_url('transaksi/daftarPesan'); ?>"><i class="fas fa-shopping-cart fa-2x text-gray-300"></i><a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- row table-->
  <div class="row">
    <div class="table-responsive table-bordered col-sm-5 ml-auto mr-auto mt-2">
      <div class="page-header">
        <span class="fas fa-users text-primary mt-2 "> Data User</span>
        <a class="text-danger" href="<?php echo base_url('user/anggota'); ?>"><i class="fas fa-search mt-2 float-right"> Tampilkan</i></a>
      </div>
      <table class="table mt-3">
        <thead>
          <tr>
            <th>#</th>
            <th>Nama Anggota</th>
            <th>Email</th>
            <th>Role ID</th>
            <th>Aktif</th>
            <th>Member Sejak</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $i = 1;
          foreach ($anggota as $a) { ?>
            <tr>
              <td><?= $i++; ?></td>
              <td><?= $a['nama']; ?></td>
              <td><?= $a['email']; ?></td>
              <td><?= $a['role_id']; ?></td>
              <td><?= $a['is_active']; ?></td>
              <td><?= date('Y', $a['tanggal_input']); ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>


    <div class="table-responsive table-bordered col-sm-5 ml-auto mr-auto mt-2">
      <div class="page-header">
        <span class="fas fa-box-open text-success mt-2"> Data Sparepart</span>
        <a href="<?= base_url('barang'); ?>"><i class="fas fa-search text-primary mt-2 float-right"> Tampilkan</i></a>
      </div>
      <div class="table-responsive">
        <table class="table mt-3" id="table-datatable">
          <thead>
            <tr>
              <th>#</th>
              <th>Nama Barang</th>
              <th>Harga</th>
              <th>Warna</th>
              <th>Berat</th>
              <th>Kode Barang</th>
              <th>Stok</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $i = 1;
            foreach ($barang as $b) { ?>
              <tr>
                <td><?= $i++; ?></td>
                <td><?= $b['nama_barang']; ?></td>
                <td><?= $b['harga']; ?></td>
                <td><?= $b['warna']; ?></td>
                <td><?= $b['berat']; ?></td>
                <td><?= $b['kode_part']; ?></td>
                <td><?= $b['stok']; ?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>


  </div>
  <!-- end of row table-->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->