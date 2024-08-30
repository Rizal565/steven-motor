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

        h3 {
            font-family: Verdana;
        }
    </style>
    <h3>
        <center>Laporan Data Barang Sparepart Motor Online</center>
    </h3>
    <br />
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
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>