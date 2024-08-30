<!-- Begin Page Content -->
<div class="container-fluid">
    <?= $this->session->flashdata('pesan'); ?>
    <div class="row">
        <div class="col-lg-12">
            <?php if (validation_errors()) { ?>

                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php } ?>
            <?= $this->session->flashdata('pesan'); ?>
            <a href="<?= base_url('laporan/cetak_laporan_barang'); ?>" class="btn btn-primary mb-3"><i class="fas fa-print"></i></a>
            <a href="<?= base_url('laporan/laporan_barang_pdf'); ?>" class="btn btn-danger mb-3"><i class="far fa-file-pdf"></i></a>
            <a href="<?= base_url('laporan/export_excel'); ?>" class="btn btn-success mb-3"><i class="far fa-file-excel"></i></a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama barang</th>
                        <th scope="col">harga</th>
                        <th scope="col">warna</th>
                        <th scope="col">Berat</th>
                        <th scope="col">Kode Part</th>
                        <th scope="col">Stok</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $a = 1;
                    foreach ($barang as $b) { ?>
                        <tr>
                            <th scope="row"><?= $a++; ?></th>
                            <td><?= $b['nama_barang']; ?></td>
                            <td><?= 'Rp' . number_format($b['harga'], 0, ',', '.'); ?></td>
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
<!-- /.container-fluid -->
</div>