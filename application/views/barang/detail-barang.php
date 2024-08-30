<style>
    .button:hover {
        position: relative;
        background-color: black;
        color: white;
        transition: 0.2s;
    }
</style>
<div class="product_image_area container mt-5">
    <div class="container">
        <div class="row s_product_inner">
            <div class="col-lg-6">
                <div class="s_Product_carousel">
                    <div class="single-prd-item">
                        <img class="img-fluid" src="<?php echo base_url(); ?>assets/img/upload/<?= $image; ?>" style="width: 400px" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1">
                <div class="s_product_text">
                    <h2 nowrap><?= $nama_barang; ?></h2>
                    <ul class="list">
                        <li><a class="active">Kategori: <?= $kategori ?></a></li>
                        <li><a>warna : <?= $warna ?></a></li>
                        <li><a>berat :<?= substr($berat, 0, 10) ?></a></li>
                        <li><a>kode part : <?= $kode_part ?></a></li>
                        <li><a>tersedia : <?= $stok ?></a></li>
                    </ul>
                    <h3>harga : <?= 'Rp ' . number_format($harga, 0, ',', '.'); ?></h3>
                    <div class="card_area d-flex align-items-center">
                        <a class="button btn btn-danger btn-lg btn-block" style="margin:10px;" href="<?= base_url('pesan/tambahPesan/' . $id); ?>"> Keranjang</a>
                        <span class="btn btn-outline-dark btn-lg" onclick="window.history.go(-1)"> Kembali</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>