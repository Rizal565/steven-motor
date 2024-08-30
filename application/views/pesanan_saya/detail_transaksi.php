<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $judul ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .payment-form { padding-bottom: 50px; font-family: 'Montserrat', sans-serif; }
        .payment-form .block-heading { padding-top: 50px; margin-bottom: 40px; text-align: center; }
        .payment-form .block-heading h2 { margin-bottom: 1.2rem; color: #3b99e0; }
        .payment-form table { border-top: 2px solid #5ea4f3; box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075); background-color: #ffffff; padding: 0; max-width: 600px; margin: auto; }
        .payment-form .products { background-color: #f7fbff; padding: 25px; }
        .payment-form .products .item { margin-bottom: 1em; }
        .payment-form .products .item-name { font-weight: 600; font-size: 0.9em; }
        .payment-form .products .item-description { font-size: 0.8em; opacity: 0.6; }
        .payment-form .products .price { float: right; font-weight: 600; font-size: 0.9em; }
        .payment-form .products .total { border-top: 1px solid rgba(0, 0, 0, 0.1); margin-top: 10px; padding-top: 19px; font-weight: 600; line-height: 1; }
        .btn:hover { position: relative; background-color: white; color: blue; transition: 0.2s; }
        .btn { background-color: blue; color: white; }
        .align-items-center { display: flex; justify-content: space-between; align-items: center; }
        .button-row .btn-block { width: 100%; text-align: center; display: inline-block; }
        .custom-btn { text-align: center; width: 100%; }
    </style>
</head>
<body>
<main class="page payment-page">
    <section class="payment-form dark">
        <div class="container">
            <div class="block-heading">
                <h2>Detail Transaksi</h2>
                <?php if ($transaksi): ?>
                    <p>Terima Kasih <b><?= $user['nama']; ?></b></p>
                    <p>Berikut adalah detail transaksi Anda:</p>
                <?php endif; ?>
            </div>
            <table>
                <div class="products">
                    <h3 class="title">Checkout</h3>
                    <?php foreach ($items as $i): ?>
                        <div class="item">
                            <span class="price"><?= 'Rp ' . number_format($i->harga, 0, ',', '.'); ?></span>
                            <p class="item-name">
                                <img src="<?= base_url('assets/img/upload/' . $i->image); ?>" class="rounded" alt="No Picture" width="10%">
                            </p>
                            <p class="item-description"><?= $i->nama_barang; ?></p>
                        </div>
                    <?php endforeach; ?>
                    <div class="total">
                        Total<span class="price"><?= 'Rp ' . number_format($transaksi->total_harga, 0, ',', '.'); ?></span>
                    </div>
                </div>
            </table>
        </div>
    </section>
</main>
</body>
</html>
