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

  .payment-form form {
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
</style>

<?= $this->session->flashdata('pesan'); ?>

<!-- <div class="container mt-5">
  <center>
    <table>
      <?php foreach ($useraktif as $u) { ?>
        <tr>
          <td nowrap>Terima Kasih <b><?= $u->nama; ?></b></td>
        </tr>
        <tr>
          <td>Barang Yang Ingin Anda Beli Sebagai Berikut :</td>
        </tr>
      <?php } ?>
      <tr>
        <td>
          <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover" id="table-datatable">
              <tr>
                <th>No.</th>
                <th>Barang</th>
                <th>Harga</th>
                <th>Warna</th>
                <th>Berat</th>
              </tr>
              <?php $no = 1;
              foreach ($items as $i) { ?>
                <tr>
                  <td><?= $no; ?></td>
                  <td>
                    <img src="<?= base_url('assets/img/upload/' . $i['image']); ?>" class="rounded" alt="No Picture" width="10%">
                  </td>
                  <td nowrap><?= 'Rp ' . number_format($i['harga'], 0, ',', '.'); ?></td>
                  <td nowrap><?= $i['warna']; ?></td>
                  <td nowrap><?= $i['berat']; ?></td>
                </tr>
              <?php $no++;
              } ?>
              <tr>
                <th colspan="2">Total Harga</th>
                <th colspan="3"><?= 'Rp ' . number_format($total_harga, 0, ',', '.'); ?></th>
              </tr>
            </table>
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <div class="border p-3 mt-4">
            <h3>Pilih Pembayaran</h3>
            <table class="table">
              <tr>
                <td class="align-middle">BRI</td>
                <td class="align-middle">BCA</td>
              </tr>
              <tr>
                <td class="align-middle">
                  <div class="cart-footer d-flex">
                    <a class="btn btn-sm btn-outline-primary" href="<?= base_url('pesan/bri/'); ?>"><span class="fa fa-university"></span> BRI</a>
                  </div>
                </td>
                <td class="align-middle">
                  <div class="cart-footer d-flex">
                    <a class="btn btn-sm btn-outline-primary" href="<?= base_url('pesan/bca/'); ?>"><span class="fa fa-university"></span> BCA</a>
                  </div>
                </td>
              </tr>
            </table>
          </div>
        </td>
      </tr>

       <tr>
        <td>
          <hr>
        </td>
      </tr>
      <tr>
        <td>
          <center>
          <a class="btn btn-sm btn-outline-danger"  href="<?php echo base_url() . 'pesan/exportToPdf/' . $this->session->userdata('id_user'); ?>"><span class="far fa-lg fa-fw fa-file-pdf"></span> Pdf</a>
          </center>
        </td>
      </tr>
      <?php if (!$existingProof) { ?>
      <tr>
        <td>
          <form action="<?= base_url('pesan/uploadBuktiPembayaran'); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="bukti_pembayaran">Upload Bukti Pembayaran</label>
              <input type="file" class="form-control-file" id="bukti_pembayaran" name="bukti_pembayaran" required>
            </div>
            <button type="submit" class="btn btn-sm btn-outline-success"><span class="fas fa-lg fa-fw fa-upload"></span> Upload</button>
          </form>
        </td>
      </tr>
      <?php } else { ?>
      <tr>
        <td>
          <div class="alert alert-success" role="alert">
            Bukti pembayaran telah diunggah. Terima kasih!
          </div>
        </td>
      </tr>
      <?php } ?>
    </table>
  </center>
</div> -->

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
      <form>
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

        <div class="card-details">
          <h3 class="title">Metode Pembayaran</h3>
          <div class="row">
            <div class="form-group col-sm-6">
              <a type="button" class="btn  btn-block" href="<?= base_url('pesan/bri/' . $id_pesan); ?>">Bank BRI</a>
            </div>
            <div class="form-group col-sm-6">
              <a type="button" class="btn  btn-block" href="<?= base_url('pesan/bca/' . $id_pesan); ?>">Bank BCA</a>
            </div>
          </div>
        </div>
      </form>
    </div>
  </section>
</main>