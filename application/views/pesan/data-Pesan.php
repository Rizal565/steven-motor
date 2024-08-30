<style>
    .btn:hover {
        position: relative;
        background-color: white;
        color: red;
        transition: 0.2s;
    }
</style>
<section class="h-100 gradient-custom">
    <div class="container py-5">
        <div class="row d-flex justify-content-center my-2">
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h5 class="mb-3"><a href="<?= base_url(); ?>" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i> Lanjut Berbelanja</a></h5>
                    </div>
                    <div class="card-body">
                        <!-- Products Table -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Produk</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Hapus</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- First Product -->
                                <?php
                                $no = 1;
                                $total_harga = 0;
                                foreach ($keranjang as $t) {
                                    $total_harga += $t['harga'];
                                ?>
                                    <tr>
                                        <td>
                                            <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                                                <img src="<?= base_url('assets/img/upload/' . $t['image']); ?>" class="rounded" alt="No Picture" width="70%">
                                                <a href="#!">
                                                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <p><strong><?= $t['nama_barang']; ?></strong></p>
                                            <p></p>

                                        </td>
                                        <td>
                                            <p class="text-start text-md-center">
                                                <strong><?= 'Rp ' . number_format($t['harga'], 0, ',', '.'); ?></strong>
                                            </p>
                                        </td>
                                        <td>

                                            <a href="<?= base_url('pesan/hapuspesan/' . $t['id']); ?>" onclick="return confirm('Yakin hapus Barang <?= $t['nama_barang']; ?>?')" class="btn btn-danger fas fa-times"></a>

                                            </button>

                                        </td>
                                    </tr>
                                <?php $no++;
                                } ?>
                                <!-- Second Product -->
                            </tbody>
                        </table>
                        <!-- Products Table -->
                    </div>
                </div>
                <div class="card mb-4 mb-lg-0">
                    <div class="card-body">
                        <p><strong>Terima Pembayaran</strong></p>
                        <img class="me-2" width="45px" src="assets\img\upload\bca.webp" alt="Visa" />
                        <img class="me-2" width="45px" src="assets\img\upload\d4b9f5e496dafa4fe2138980446f3dd1.jpg" alt="American Express" />
                        <p></p>
                        <h5 class="text-danger"></h5>
                        <!-- <pre><?php print_r($keranjang); ?></pre> -->

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header py-4">
                        <h5 class="mb-0">Total</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">

                                <span></span>
                            </li>

                            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                <div>
                                    <strong>Total harga</strong>
                                    <strong>

                                    </strong>
                                </div>
                                <span><strong><?= 'Rp ' . number_format($total_harga, 0, ',', '.'); ?></strong></span>
                            </li>
                        </ul>
                        <a class="btn btn-danger btn-lg btn-block" href="<?= base_url('pesan/pesanSelesai/' . $this->session->userdata('id_user')); ?>">Konfirmasi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>