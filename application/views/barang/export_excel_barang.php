<?php

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");

?>

<h3>
    <center>Laporan Data Barang Sparepart Online</center>
</h3> <br />

<table class="table-data">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Warna</th>
            <th>Berat</th>
            <th>Kode Part</th>
            <th>Stok</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($barang as $b) {
        ?>
            <tr>
                <th scope="row"><?= $no++; ?></th>
                <td><?= $b['nama_barang']; ?></td>
                <td><?= $b['harga']; ?></td>
                <td><?= $b['warna']; ?></td>
                <td><?= $b['berat']; ?></td>
                <td><?= $b['kode_part']; ?></td>
                <td><?= $b['stok']; ?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>