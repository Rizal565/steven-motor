<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $judul ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container.pesan {
            margin-top: 50px;
        }

        .card {
            margin-bottom: 20px;
            transition: transform 0.3s;
        }

        .card:hover {
            transform: scale(1.02);
        }

        .card-img-left {
            width: 150px;
            height: 150px;
            object-fit: cover;
        }

        .card-body {
            display: flex;
            align-items: center;
        }

        .card-text {
            margin-left: 20px;
        }

        .no-data {
            text-align: center;
            font-size: 1.2em;
            color: #777;
            margin-top: 20px;
        }

        .clickable-card {
            cursor: pointer;
        }

        .card-title {
            font-size: 1.25em;
            font-weight: bold;
        }

        .card p {
            margin-bottom: 0.5em;
        }

        .status-uploaded {
            color: green;
        }

        .status-not-uploaded {
            color: red;
        }

        .delete-button {
            margin-left: auto;
            color: red;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <?php if ($this->session->flashdata('message')) : ?>
        <?= $this->session->flashdata('message') ?>
    <?php endif; ?>

    <div class="container pesan">
        <h3 class="text-center"><?= $judul ?></h3>
        <hr>
        
        
        <?php if (count($pesan) > 0) : ?>
            <h4>Pesanan Saat Ini</h4>
            <?php foreach ($pesan as $p) : ?>
                <div class="card">
                    <div class="card-body clickable-card" data-id="<?= $p->id_pesan ?>" data-bukti="<?= $p->bukti_pembayaran ?>">
                        <?php if ($p->bukti_pembayaran) : ?>
                            <img src="<?= base_url('assets/img/bukti_pembayaran/' . $p->bukti_pembayaran) ?>" class="card-img-left" alt="Bukti Pembayaran">
                        <?php else : ?>
                            <div class="card-img-left d-flex align-items-center justify-content-center bg-light">
                                <span class="status-not-uploaded">Belum di Upload</span>
                            </div>
                        <?php endif; ?>
                        <div class="card-text">
                            <h5 class="card-title">ID Pesanan: <?= $p->id_pesan ?></h5>
                            <p>Nama User: <?= $useraktif['nama'] ?></p>
                            <p>Tanggal Pesan: <?= $p->tgl_pesan ?></p>
                            <p>Total Harga: <?= 'Rp ' . number_format($p->total_harga, 0, ',', '.'); ?></p>
                            <p class="status-<?= $p->bukti_pembayaran ? 'uploaded' : 'not-uploaded' ?>">
                                Bukti Pembayaran: <?= $p->bukti_pembayaran ? 'Sudah di Upload' : 'Belum di Upload' ?>
                            </p>
                        </div>
                        <span class="delete-button" data-id="<?= $p->id_pesan ?>">Hapus</span>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>

        <?php if (count($transaksi) > 0) : ?>
            <h4>Riwayat Transaksi</h4>
            <?php foreach ($transaksi as $t) : ?>
                <div class="card">
                    <div class="card-body">
                        <div class="card-text">
                            <h5 class="card-title">No Transaksi: <?= $t->no_transaksi ?></h5>
                            <h5 class="card-title">ID Pesanan: <?= $t->id_pesan ?></h5>
                            <p>Tanggal Transaksi: <?= $t->tgl_transaksi ?></p>
                            <p>Nama User: <?= $useraktif['nama'] ?></p>
                            <p>Total Harga: <?= 'Rp ' . number_format($t->total_harga, 0, ',', '.'); ?></p>
                            <p>Status: <?= $t->status ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>

        <?php if (count($pesan) == 0 && count($transaksi) == 0) : ?>
            <p class="no-data">Tidak ada pesanan atau transaksi yang ditemukan.</p>
        <?php endif; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.clickable-card').click(function() {
                var id = $(this).data('id');
                var bukti = $(this).data('bukti');
                if (bukti !== 'Belum di Upload') {
                    window.location.href = '<?= base_url('pesan/info/') ?>' + id;
                } else {
                    window.location.href = '<?= base_url('pesan/pembayaran_berhasil/') ?>' + id;
                }
            });

            $('.delete-button').click(function(event) {
                event.stopPropagation();
                var id = $(this).data('id');
                if (confirm('Apakah Anda yakin ingin menghapus pesanan ini?')) {
                    window.location.href = '<?= base_url('pesananSaya/delete_pesan/') ?>' + id;
                }
            });
        });
    </script>
</body>

</html>
