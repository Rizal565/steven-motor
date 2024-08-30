<style>
    .payment-form {
        padding-bottom: 50px;
        font-family: 'Montserrat', sans-serif;
    }

    .payment-form.dark {
        background-color: #f6f6f6;
    }

    .payment-form .content {
        box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
        background-color: white;
    }

    .payment-form .block-heading {
        padding-top: 50px;
        margin-bottom: 40px;
        text-align: center;
    }

    .payment-form .block-heading p {
        text-align: center;
        max-width: 420px;
        margin: auto;
        opacity: 0.7;
    }

    .payment-form.dark .block-heading p {
        opacity: 0.8;
    }

    .payment-form .block-heading h1,
    .payment-form .block-heading h2,
    .payment-form .block-heading h3 {
        margin-bottom: 1.2rem;
        color: #3b99e0;
    }

    .payment-form table {
        border-top: 2px solid #5ea4f3;
        box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
        background-color: #ffffff;
        padding: 0;
        max-width: 600px;
        margin: auto;
    }

    .payment-form .title {
        font-size: 1em;
        border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        margin-bottom: 0.8em;
        font-weight: 600;
        padding-bottom: 8px;
    }

    .payment-form .products {
        background-color: #f7fbff;
        padding: 25px;
    }

    .payment-form .products .item {
        margin-bottom: 1em;
    }

    .payment-form .products .item-name {
        font-weight: 600;
        font-size: 0.9em;
    }

    .payment-form .products .item-description {
        font-size: 0.8em;
        opacity: 0.6;
    }

    .payment-form .products .item p {
        margin-bottom: 0.2em;
    }

    .payment-form .products .price {
        float: right;
        font-weight: 600;
        font-size: 0.9em;
    }

    .payment-form .products .total {
        border-top: 1px solid rgba(0, 0, 0, 0.1);
        margin-top: 10px;
        padding-top: 19px;
        font-weight: 600;
        line-height: 1;
    }

    .payment-form .card-details {
        padding: 25px 25px 15px;
    }

    .payment-form .card-details label {
        font-size: 12px;
        font-weight: 600;
        margin-bottom: 15px;
        color: #79818a;
        text-transform: uppercase;
    }

    .payment-form .card-details button {
        margin-top: 0.6em;
        padding: 12px 0;
        font-weight: 600;
    }

    .payment-form .date-separator {
        margin-left: 10px;
        margin-right: 10px;
        margin-top: 5px;
    }

    @media (min-width: 576px) {
        .payment-form .title {
            font-size: 1.2em;
        }

        .payment-form .products {
            padding: 40px;
        }

        .payment-form .products .item-name {
            font-size: 1em;
        }

        .payment-form .products .price {
            font-size: 1em;
        }

        .payment-form .card-details {
            padding: 40px 40px 30px;
        }

        .payment-form .card-details button {
            margin-top: 2em;
        }
    }

    .btn:hover {
        position: relative;
        background-color: white;
        color: blue;
        transition: 0.2s;
    }

    .btn {
        background-color: blue;
        color: white;
    }

    .align-items-center {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .button-row .btn-block {
        width: 100%;
        text-align: center;
        display: inline-block;
    }

    .custom-btn {
        text-align: center;
        width: 100%;
    }
</style>
<?= $this->session->flashdata('pesan'); ?>



<main class="page payment-page">
    <section class="payment-form dark">
        <div class="container">
            <div class="block-heading">
                <h2>Pembayaran</h2>
                <?php foreach ($useraktif as $u) { ?>
                    <p>Terima Kasih <b><?= $u->nama; ?></b></p>
                    <p>Barang Yang Ingin Anda Beli Sebagai Berikut :</p>
                <?php } ?>
            </div>
            <table>
                <div class="products">
                    <h3 class="title">Checkout</h3>
                    <?php $no = 1;
                    foreach ($items as $i) { ?>
                        <div class="item">
                            <span class="price"><?= 'Rp ' . number_format($i['harga'], 0, ',', '.'); ?></span>
                            <p class="item-name">
                                <img src="<?= base_url('assets/img/upload/' . $i['image']); ?>" class="rounded" alt="No Picture" width="10%">
                            </p>
                            <p class="item-description"><?= $i['nama_barang']; ?></p>
                        </div>
                    <?php $no++;
                    } ?>
                    <div class="total">
                        Total<span class="price"><?= 'Rp ' . number_format($i['total_harga'], 0, ',', '.'); ?></span>
                    </div>
                </div>
                <?php if (!$existingProof) { ?>
                    <div class="card-details">
                        <h3 class="title">Metode Pembayaran</h3>
                        <div class="col-md-6">
                            <h3 class="mb-2">BRI</h3>
                            <h6 class="mb-4">12983921901</h6>
                        </div>
                        <form action="<?= base_url('pesan/uploadBuktiPembayaran'); ?>" method="post" enctype="multipart/form-data" class="wrapper d-flex align-items-center">
                            <input type="hidden" name="id_pesan" value="<?= $id_pesan; ?>">
                            <div class="col-sm-12 mb-4">
                                <div class="custom-file">
                                    <input type="file" class="form-file" id="bukti_pembayaran" name="bukti_pembayaran" required onchange="updateFileName()">
                                    <label class="custom-file-label" for="bukti_pembayaran" id="fileLabel">Masukan Bukti Pembayaran</label>
                                </div>
                            </div>
                            <div class="row button-row align-items-center">
                                <div class="form-group col-sm-6">
                                    <button type="submit" class="btn btn-block custom-btn">Bayar</button>
                                </div>
                                <div class="form-group col-sm-6">
                                    <button type="button" class="btn btn-block custom-btn" onclick="window.location.href='<?= base_url('pesan/exportToPdf/' . $id_pesan); ?>'">Bukti Pemesanan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                <?php } else { ?>
                    <div class="alert alert-success" role="alert">
                        Bukti pembayaran telah diunggah. Terima kasih!
                    </div>
                <?php } ?>
            </table>
        </div>
    </section>
</main>

<script>
    function updateFileName() {
        const fileInput = document.getElementById('bukti_pembayaran');
        const fileLabel = document.getElementById('fileLabel');
        if (fileInput.files.length > 0) {
            const fileName = fileInput.files[0].name;
            fileLabel.textContent = fileName;
        }
    }
</script>