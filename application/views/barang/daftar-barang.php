<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $judul; ?></title>
    <style>
        body {
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .controller-daftar {
            max-width: 1200px;
            margin: 20px auto;
            padding: 15px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .search-bar {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .search-bar input[type="text"],
        .search-bar select,
        .search-bar button {
            margin-right: 10px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .search-bar button {
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .search-bar button:hover {
            background-color: #0056b3;
        }

        .product-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s, transform 0.3s;
            margin: 10px;
            width: 220px;
        }

        .card:hover {
            box-shadow: 0 0 5px 1px black;
            transform: scale(1.05);
        }

        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .card-body {
            padding: 10px;
            text-align: center;
        }

        .card-body p {
            margin: 5px 0;
        }

        .product-name {
            font-weight: bold;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .no-products {
            text-align: center;
            padding: 20px;
            font-size: 18px;
            color: #777;
        }

        .card a {
            text-decoration: none;
            color: inherit;
            display: block;
        }

        .card a:hover {
            color: inherit;
        }
    </style>
</head>

<body>
    <?= $this->session->flashdata('pesan'); ?>

    <div class="controller-daftar">
        <div class="search-bar">
            <form action="<?= base_url('home'); ?>" method="get">
                <input type="text" name="search" placeholder="Mencari Produk" value="<?= $this->input->get('search'); ?>">

                <select name="category">
                    <option value="">Kategori</option>
                    <!-- Add category options dynamically -->
                    <?php foreach ($categories as $category) { ?>
                        <option value="<?= $category->id ?>" <?= $this->input->get('category') == $category->id ? 'selected' : ''; ?>><?= $category->kategori ?></option>
                    <?php } ?>
                </select>

                <button type="submit">Telusuri</button>
            </form>
        </div>

        <div class="product-list">
            <!-- Looping through products -->
            <?php if (!empty($barang)) {
                foreach ($barang as $item) { ?>
                    <div class="card">
                        <a href="<?= base_url('home/detailBarang/' . $item->id); ?>">
                            <img src="<?= base_url('assets/img/upload/' . $item->image); ?>" class="card-img-top" alt="Product Image">
                            <div class="card-body">
                                <p class="product-name"><?= $item->nama_barang ?></p>
                                <p><?= $item->warna ?></p>
                                <p><?= 'Rp ' . number_format($item->harga, 0, ',', '.') ?></p>
                            </div>
                        </a>
                    </div>
                <?php }
            } else { ?>
                <p class="no-products">No products found.</p>
            <?php } ?>
            <!-- End looping -->
        </div>
    </div>
</body>

</html>
