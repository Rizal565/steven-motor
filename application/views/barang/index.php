<!-- Begin Page Content -->
<div class="container-fluid">

    <?= $this->session->flashdata('pesan'); ?>
    <div class="row">
        <div class="col-lg-12">
            <?php if (validation_errors()) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php } ?>
            <?= $this->session->flashdata('pesan'); ?>
            <a href="" class="btn btn-danger mb-3" data-toggle="modal" data-target="#barangBaruModal"><i class="fas fa-plus"></i> Sparepart</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Warna</th>
                        <th scope="col">Berat</th>
                        <th scope="col">Kode Part</th>
                        <th scope="col">Stok</th>
                        <th scope="col">DiBeli</th>
                        <th scope="col">DiPesan</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Kategori</th> <!-- Kolom Kategori baru -->
                        <th scope="col">Pilihan</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $a = 1;
                    foreach ($barang as $b) { ?>
                        <tr>
                            <th scope="row"><?= $a++; ?></th>
                            <td><?= $b['nama_barang']; ?></td>
                            <td><?= 'Rp' . number_format($b['harga'], 0, ',', '.'); ?></td>
                            <td><?= $b['warna']; ?></td>
                            <td><?= $b['berat']; ?></td>
                            <td><?= $b['kode_part']; ?></td>
                            <td><?= $b['stok']; ?></td>
                            <td><?= $b['ditransaksi']; ?></td>
                            <td><?= $b['dipesan']; ?></td>
                            <td>
                                <picture>
                                    <source srcset="" type="image/svg+xml">
                                    <img src="<?= base_url('assets/img/upload/') . $b['image']; ?>" class="img-fluid img-thumbnail" style="width: 70px; height: auto;" alt="...">
                                </picture>
                            </td>
                            </td>
                            <td><?= $b['id_kategori']; ?></td>
                            <td>
                                <a href="<?= base_url('barang/ubahbarang/') . $b['id']; ?>" class="badge badge-info"><i class="fas fa-edit"></i> Ubah</a>
                                <a href="<?= base_url('barang/hapusbarang/') . $b['id']; ?>" onclick="return confirm('Kamu yakin akan menghapus <?= $judul . ' ' . $b['nama_barang']; ?> ?');" class="badge badge-danger"><i class="fas fa-trash"></i> Hapus</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal Tambah barang baru-->
<div class="modal fade" id="barangBaruModal" tabindex="-1" role="dialog" aria-labelledby="barangBaruModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="barangBaruModalLabel">Tambah Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('barang'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="nama_barang" name="nama_barang" placeholder="Masukkan Nama Barang">
                    </div>
                    <div class="form-group">
                        <select name="id_kategori" class="form-control form-control-user">
                            <option value="">Pilih Kategori</option>
                            <?php
                            foreach ($kategori as $k) { ?>
                                <option value="<?= $k['id']; ?>"><?= $k['kategori']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="harga" name="harga" placeholder="Masukkan Harga">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="warna" name="warna" placeholder="Masukkan Warna Barang">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="berat" name="berat" placeholder="Masukkan Berat Barang">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="kode_part" name="kode_part" placeholder="Masukkan Kode Part">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="stok" name="stok" placeholder="Masukkan nominal stok">
                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control form-control-user" id="image" name="image">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban"></i> Close</button>
                    <button type="submit" class="btn btn-danger"><i class="fas fa-plus-circle"></i> Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End of Modal Tambah Mneu -->