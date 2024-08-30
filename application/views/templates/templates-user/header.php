<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Steven-Motor | <?= $judul; ?></title>
    <link rel="icon" type="image/png" href="<?= base_url('assets/img/logo/'); ?>logo-pb.png">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>user/css/bootstrap.css">
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/'); ?>datatable/datatables.css" rel="stylesheet" type="text/css">
    <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/'); ?>user/js/bootstrap.bundle.min.js"></script>
    <style>
        html {
            scroll-behavior: smooth;
        }

        .navbar {
            top: 0;
            z-index: 3;
            position: sticky;
        }

        .navbar .navbar-nav .nav-link {
            padding: 1em;
        }

        .navbar .navbar-nav .nav-item {
            position: relative;
        }

        .navbar .navbar-nav .nav-item::after {
            position: absolute;
            bottom: 5px;
            left: 0;
            right: 0;
            content: '';
            background-color: white;
            width: 0%;
            height: 2px;
            transition: all .5s;
        }

        .navbar .navbar-nav .nav-item:hover::after {
            width: 50%;
        }

        .dropdown-menu {
            background-color: #dc3545;
            /* Bootstrap danger color */
            border: none;
        }

        .dropdown-item {
            color: #ffffff;
        }

        .dropdown-item:hover {
            background-color: #c82333;
            /* Darker shade of danger */
        }

        .dropdown-divider {
            border-color: rgba(255, 255, 255, 0.15);
        }

        .text {
            color: black;
        }

        .cart-icon {
            position: relative;
        }

        .cart-count {
            position: absolute;
            top: -10px;
            right: -10px;
            background: white;
            color: red;
            border-radius: 50%;
            padding: 2px 6px;
            font-size: 12px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg text-light bg-danger">
        <div class="container">
            <a class="navbar-brand text-light" href="<?= base_url(); ?>">Steven Motor</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <a class="nav-item nav-link active text-light" href="<?= base_url(''); ?>">Beranda <span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link active text-light" href="<?= base_url('Home'); ?>">Produk <span class="sr-only">(current)</span></a>
                    <?php if (!empty($this->session->userdata('email'))) : ?>
                        <a class="nav-item nav-link active text-light cart-icon" href="<?= base_url('pesan'); ?>">
                            <i class="fas fa-shopping-cart"></i>
                            <?= htmlspecialchars($this->ModelPesan->getDataWhere('keranjang', ['email_user' => $this->session->userdata('email')])->num_rows()); ?>
                        </a>
                        <div class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-user"></i> Akun
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?= base_url('member/myprofil'); ?>"><i class="fas fa-user-circle"></i> Profil Saya</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?= base_url('PesananSaya'); ?>"><i class="fas fa-money-circle"></i> Pesanan Saya</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?= base_url('member/logout'); ?>"><i class="fas fa-sign-out-alt"></i> Log out</a>
                            </div>
                        </div>
                    <?php else : ?>
                        <a class="nav-item nav-link active text-light" href="<?= base_url('autentifikasi'); ?>"><i class="fas fa-sign-in-alt"></i> Log in</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>
    <div>
        <!-- Content goes here -->
    </div>
</body>

</html>