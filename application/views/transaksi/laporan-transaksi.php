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
            <a href="<?= base_url('laporan/cetak_laporan_transaksi'); ?>" class="btn btn-primary mb-3"><i class="fas fa-print"></i> </a>
            <a href="<?= base_url('laporan/laporan_transaksi_pdf'); ?>" class="btn btn-danger mb-3"><i class="far fa-file-pdf"></i> </a>
            <a href="<?= base_url('laporan/export_excel_transaksi'); ?>" class="btn btn-success mb-3"><i class="far fa-file-excel"></i> </a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">No Transaksi</th>
                        <th scope="col">Nama Anggota</th>
                        <th scope="col">Nama Sparepart</th>
                        <th scope="col">Tanggal Transaksi</th>
                        <th scope="col">Tanggal Diambil</th>
                        <th scope="col">Total Harga</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $a = 1;
                    foreach ($laporan as $l) { ?>
                        <tr>
                            <th scope="row"><?= $a++; ?></th>
                            <td><?= $l['no_transaksi']; ?></td>
                            <td><?= $l['nama']; ?></td>
                            <td><?= $l['nama_barang']; ?></td>
                            <td><?= $l['tgl_transaksi']; ?></td>
                            <td><?= $l['tgl_pengambilan']; ?></td>
                            <td><?= 'Rp' . number_format($l['total_harga'], 0, ',', '.'); ?></td>
                            <td><?= $l['status']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<p><?= date('d M Y H:i:s'); ?></p>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->