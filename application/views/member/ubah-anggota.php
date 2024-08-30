<style>
    .btn:hover {
        position: relative;
        background-color: white;
        color: red;
        transition: 0.2s;
    }
</style>
<div class="container container mt-5">
    <div class="row gutters">
        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
            <?= form_open_multipart('member/ubahprofil'); ?>
            <div class="card h-100">
                <div class="card-body">
                    <div class="account-settings">
                        <div class="user-profile">
                            <div class="user-avatar">
                                <img src="<?= base_url('assets/img/profile/') . $image; ?>" class="img-thumbnail" alt="">
                            </div>
                            <label for="">Nama Lengkap</label>
                            <h5 class="user-name"><?= $user; ?></h5>
                            <hr>
                            <label for="">Email</label>
                            <h6 class="user-email"><?= $email; ?></h6>
                            <hr>
                            <label for="">Bergabung Sejak</label>
                            <h5><?= date('d F Y', $tanggal_input); ?></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h6 class="mb-2 text-danger">Anggota</h6>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="fullName">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="<?= $user; ?>">
                                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="eMail">Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="<?= $email; ?>" readonly>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <p>Pilih File</p>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label" for="image">Pilih file</label>
                            </div>
                        </div>

                    </div>
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="margin: 10px;">
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-danger">Ubah</button>
                                    <button class="btn btn-dark" onclick="window.history.go(-1)"> Kembali</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>