<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>

<body>
    <style type="text/css">
        .table-data {
            width: 100%;
            border-collapse: collapse;
        }

        .table-data tr th,
        .table-data tr td {
            border: 1px solid black;
            font-size: 11pt;
            font-family: Verdana;
            padding: 10px 10px 10px 10px;
        }

        .table-data th {
            background-color: grey;
        }

        h3 {
            font-family: Verdana;
        }
    </style>
    <h3>
        <center>LAPORAN DATA TRANSAKSI</center>
    </h3>
    <br />
    <table class="table-data">
        <thead>
            <tr>
                <th>No</th>
                <th>No Transaksi</th>
                <th>Nama Pembeli</th>
                <th>Nama Barang</th>
                <th>Tanggal Transaksi</th>
                <th>Tanggal Diambil</th>
                <th>Total Harga</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($laporan as $l) {
            ?>
                <tr>
                    <td scope="row"><?= $no++; ?></td>
                    <td><?= $l['no_transaksi']; ?></td>
                    <td><?= $l['nama']; ?></td>
                    <td><?= $l['nama_barang']; ?></td>
                    <td><?= $l['tgl_transaksi']; ?></td>
                    <td><?= $l['tgl_pengambilan']; ?></td>
                    <td><?= 'Rp' . number_format($l['total_harga'], 0, ',', '.'); ?></td>
                    <td><?= $l['status']; ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <p><?= date('d M Y H:i:s'); ?></p>
</body>

</html>