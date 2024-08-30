<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Barang Sparepart Online</title>
    <style type="text/css">
        .table-data {
            width: 100%;
            border-collapse: collapse;
        }

        .table-data tr th,
        .table-data tr td {
            border: 1px solid black;
            font-size: 11pt;
            padding: 10px;
        }
    </style>
</head>

<body>
    <h3 style="text-align: center;">Laporan Data Barang Sparepart Online</h3>
    <br />
    <table class="table-data">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Warna</th>
                <th>Berat/th>
                <th>Kode Part</th>
                <th>Stok</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($barang as $b) :
            ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $b['nama_barang']; ?></td>
                    <td><?= $b['harga']; ?></td>
                    <td><?= $b['warna']; ?></td>
                    <td><?= $b['berat']; ?></td>
                    <td><?= $b["kode_part"]; ?></td>
                    <td><?= $b['stok']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>