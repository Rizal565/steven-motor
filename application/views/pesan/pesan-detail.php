<div class="container">
    <center>
        <table>
            <?php foreach ($agt_pesan as $ab) { ?>
                <tr>
                    <td>Data User</td>
                    <td>:</td>
                    <th><?= $ab['nama']; ?></th>
                </tr>
                <tr>
                    <td>ID Pesan</td>
                    <td>:</td>
                    <th><?= $ab['id_pesan']; ?></th>
                </tr>
            <?php } ?>
            <tr>
                <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="3">
                    <hr>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <div class="table-responsive full-width">
                        <table class="table table-bordered table-striped tablehover" id="table-datatable">
                            <tr>
                                <th>No.</th>
                                <th>ID barang</th>
                                <th>Nama Barang</th>
                                <th>Harga</th>
                                <th>Warna</th>
                                <th>Berat</th>
                            </tr>
                            <?php
                            $no = 1;
                            foreach ($detail as $d) {
                            ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $d['id_barang']; ?></td>
                                    <td><?= $d['nama_barang']; ?></td>
                                    <td><?= $d['harga']; ?></td>
                                    <td><?= $d['warna']; ?></td>
                                    <td><?= $d['berat']; ?></td>
                                </tr>
                            <?php $no++;
                            } ?>
                        </table>
                    </div>
                </td>
            </tr>
            <tr>
                <td align="center" colspan="3"><a href="#" onclick="window.history.go(-1)" class="btn btn-outline-dark"><i class="fas fa-fw fa-reply"></i> Kembali</a></td>
            </tr>
        </table>
    </center>
</div>
