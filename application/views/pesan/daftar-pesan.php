<div class="container container mt-5">
    <center>
        <table>
            <tr>
                <td>
                    <div class="table-responsive full-width">
                        <table class="table table-bordered table-striped table-hover" id="table-datatable">
                            <tr>
                                <th>No.</th>
                                <th>ID Pesan</th>
                                <th>Tanggal Pesan</th>
                                <th>ID User</th>
                                <th>Total Harga</th>
                                <th>Bukti Pembayaran</th>
                                <th>Aksi</th>
                            </tr>
                            <?php
                            $no = 1;
                            foreach ($transaksi as $p) {
                            ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><a class="btn btn-link" href="<?= base_url('transaksi/pesanDetail/' . $p['id_pesan']); ?>"><?= $p['id_pesan']; ?></a></td>
                                    <td><?= $p['tgl_pesan']; ?></td>
                                    <td><?= $p['id_user']; ?></td>
                                    <td><?= 'Rp ' . number_format($p['total_harga'], 0, ',', '.'); ?></td>
                                    <td>
                                        <?php if (!empty($p['bukti_pembayaran'])) { ?>
                                            <a href="#" data-toggle="modal" data-target="#imageModal<?= $no; ?>">
                                                <img src="<?= base_url('assets/img/bukti_pembayaran/') . $p['bukti_pembayaran']; ?>" class="img-fluid img-thumbnail" style="width: 150px; height: auto;" alt="Bukti Pembayaran">
                                            </a>
                                            <!-- Modal -->
                                            <div class="modal fade" id="imageModal<?= $no; ?>" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel<?= $no; ?>" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="imageModalLabel<?= $no; ?>">Bukti Pembayaran</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <img src="<?= base_url('assets/img/bukti_pembayaran/') . $p['bukti_pembayaran']; ?>" class="img-fluid" alt="Bukti Pembayaran">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } else { ?>
                                            <span>Belum di-upload</span>
                                        <?php } ?>
                                    </td>
                                    <td nowrap>
                                        <form action="<?= base_url('transaksi/transaksiAct/' . $p['id_pesan']); ?>" method="post">
                                            <?php if (!empty($p['bukti_pembayaran'])) { ?>
                                                <button type="submit" class="btn btn-sm btn-outline-info"><i class="fas fa-fw fa-cart-plus"></i> Konfirmasi Pembayaran</button>
                                            <?php } else { ?>
                                                <button type="button" class="btn btn-sm btn-outline-secondary" disabled><i class="fas fa-fw fa-cart-plus"></i> Konfirmasi Pembayaran</button>
                                                <br><small>Tunggu Upload bukti pembayaran</small>
                                            <?php } ?>
                                        </form>
                                    </td>
                                </tr>
                            <?php $no++;
                            } ?>
                        </table>
                    </div>
                </td>
            </tr>
            <tr>
                <td align="center"><a href="<?= base_url('transaksi/daftarPesan'); ?>" class="btn btn-link"><i class="fas fa-fw fa-refresh"></i> Refresh</a></td>
            </tr>
        </table>
    </center>
</div>