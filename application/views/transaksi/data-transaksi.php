<?= $this->session->flashdata('pesan'); ?>
<div class="container">
    <center>
        <table>
            <tr>
                <td>
                    <div class="table-responsive full-width">
                        <table class="table table-bordered table-striped table-hover" id="table-datatable">
                            <thead>
                                <tr>
                                    <th>No Transaksi</th>
                                    <th>Tanggal Transaksi</th>
                                    <th>ID User</th>
                                    <th>ID Barang</th>
                                    <th>Tanggal Barang Diambil</th>
                                    <th>Status</th>
                                    <th>Total Harga</th>
                                    <th>Pilihan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($transaksi as $p) { ?>
                                    <tr>
                                        <td><?= $p['no_transaksi']; ?></td>
                                        <td><?= $p['tgl_transaksi']; ?></td>
                                        <td><?= $p['id_user']; ?></td>
                                        <td><?= $p['id_barang']; ?></td>
                                        <td><?= $p['tgl_pengambilan'] != '0000-00-00' ? $p['tgl_pengambilan'] : 'Belum Diambil'; ?></td>
                                        <?php $statusClass = $p['status'] == "transaksi" ? "warning" : "secondary"; ?>
                                        <td><i class="btn btn-outline-<?= $statusClass; ?> btn-sm"><?= $p['status']; ?></i></td>
                                        <td><?= 'Rp ' . number_format($p['total_harga'], 0, ',', '.'); ?></td>
                                        <td nowrap>
                                            <?php if ($p['status'] == "diambil") { ?>
                                                <i class="btn btn-sm btn-outline-secondary"><i class="fas fa-fw fa-edit"></i> Ubah Status</i>
                                            <?php } else { ?>
                                                <a class="btn btn-sm btn-outline-info" href="<?= base_url('transaksi/ubahStatus/' . $p['no_transaksi']); ?>"><i class="fas fa-fw fa-edit"></i> Ubah Status</a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </td>
            </tr>
        </table>
    </center>
</div>