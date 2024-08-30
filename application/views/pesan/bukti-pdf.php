<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Receipt</title>
    <style>
        .receipt-container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            font-family: Arial, sans-serif;
        }

        .receipt-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .receipt-header h2 {
            margin: 0;
        }

        .receipt-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .receipt-table th,
        .receipt-table td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        .receipt-table th {
            background-color: #f5f5f5;
        }

        .total-row th,
        .total-row td {
            border: none;
        }

        .total-row td {
            text-align: right;
            font-weight: bold;
        }

        .footer {
            text-align: center;
            font-size: 12px;
            color: #666;
        }

        .btn-pdf {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            color: #fff;
            background-color: #d9534f;
            border: none;
            border-radius: 5px;
            text-decoration: none;
        }

        .btn-pdf:hover {
            background-color: #c9302c;
        }
    </style>
</head>

<body>
    <div class="receipt-container">
        <div class="receipt-header">
            <h2>Bukti Pemesanan</h2>
            <?php foreach ($useraktif as $u) { ?>
                <p>Nama Anggota: <b><?= $u->nama; ?></b></p>
            <?php } ?>
            <p>Barang Yang Sudah Dibeli:</p>
        </div>

        <div class="table-responsive">
            <table class="receipt-table">
                <tr>
                    <th>No.</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Warna</th>
                    <th>Berat</th>
                </tr>
                <?php
                $no = 1;
                $total_harga = 0;
                foreach ($items as $i) {
                    $total_harga += $i['harga'];
                ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $i['nama_barang']; ?></td>
                        <td><?= 'Rp ' . number_format($i['harga'], 0, ',', '.'); ?></td>
                        <td><?= $i['warna']; ?></td>
                        <td><?= $i['berat']; ?></td>
                    </tr>
                <?php
                    $no++;
                } ?>
                <tr class="total-row">
                    <td colspan="4">Total Harga</td>
                    <td><?= 'Rp ' . number_format($total_harga, 0, ',', '.'); ?></td>
                </tr>
            </table>
        </div>

        <div class="footer">
            <hr>
            <p><?= date('d M Y H:i:s'); ?></p>
            <h4><?= $id_pesan; ?></h4> <!-- Add this line to display the ID Pesan -->
        </div>
    </div>
</body>

</html>
