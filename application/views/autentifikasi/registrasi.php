<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-6 mx-auto bg-gradient-danger">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-light mb-4">Daftar Menjadi Member!</h1>
                        </div>
                        <form class="user" method="post" action="<?= base_url('autentifikasi/registrasi') ?>">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Nama Lengkap" value="<?= set_value('nama'); ?>">
                                <?= form_error('name', '<small class="text-light pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Alamat email" value="<?= set_value('email'); ?>">
                                <?= form_error('email', '<small class="text-light pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                                    <?= form_error('password1', '<small class="text-light pl-3">', '</small>'); ?>
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Ulangi Password">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-light btn-user btn-block">
                                Daftar Jadi member
                            </button>
                        </form>
                        <hr>

                        <div class="text-center">
                            <a class="small text-light" href="<?= base_url('autentifikasi'); ?>">Sudah Menjadi Anggota?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>