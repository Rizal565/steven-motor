<style>
  .carousel-item {
    height: 35rem;
    background: black;
    color: white;
    position: relative;
    background-position: center;
    background-size: cover;
    height: 100vh;

  }

  .image {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    opacity: 0.5;
  }

  .hero {
    position: absolute;
    bottom: 10px;
    left: 200px;
    right: 200px;
    padding-bottom: 50px;
  }

  .wrapper {
    background-color: black;
    color: white;
  }

  .btn:hover {
    position: relative;
    background-color: white;
    color: red;
    transition: 0.2s;
  }

  .card {
    padding: 10px;
    margin: 35px;
  }
</style>

<div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active" data-interval="2000">
      <img src="assets\img\upload\suspensi.jpg" alt="tidak" class="image">
      <div class="hero">
        <h1>Tips cara merawat motor</h1>
        <p>anda bingung cara merawat motor? baca artikel ini saja...</p>
        <a href="#tips" class="btn btn-lg btn-danger">Lihat</a>
      </div>
    </div>
    <div class="carousel-item" data-interval="1000">
      <img src="assets\img\upload\dan-burton-zckf8yaZl9o-unsplash.jpg" alt="tidak" class="image">
      <div class="hero">
        <h1>Tentang Kami</h1>
        <p>Mau tau tentang kami? klik dibawah ya...</p>
        <a href="#about" class="btn btn-lg btn-danger">Lihat</a>
      </div>
    </div>
    <div class="carousel-item" data-interval="500">
      <img src="assets\img\upload\louismoto-9ehmPYBJkyU-unsplash.jpg" alt="tidak" class="image">
      <div class="hero">
        <h1>Produk kami</h1>
        <p>Kami menyediakan berbagai produk mulai dari yang biasa sampai yang luar biasa...</p>
        <a href="<?= base_url('home'); ?>" class="btn btn-lg btn-danger">Lihat</a>
      </div>
    </div>
  </div>
  <a href="#myCarousel" class="carousel-control-prev" role="button" data-slide="prev">
    <span class="sr-only">previous</span>
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
  </a>
  <a href="#myCarousel" class="carousel-control-next" role="button" data-slide="next">
    <span class="sr-only">next</span>
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
  </a>
</div>

<section class="wrapper">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 text-center d-flex align-self-stretch ftco-animate">
        <div class="media block-6 services p-4 py-md-5">
          <div class="icon d-flex justify-content-center align-items-center mb-4">
            <span class="flaticon-bag"></span>
          </div>
          <div class="media-body">
            <p class="icon fa fa-thumbs-up fa-5x text-danger"></p>
            <h3 class="heading">kualitas terbaik</h3>
            <p>Kami menawarkan kualitas unggul, inovasi terkini, keandalan maksimal, dan tentunya yang terbaik</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 text-center d-flex align-self-stretch ftco-animate">
        <div class="media block-6 services p-4 py-md-5">
          <div class="icon d-flex justify-content-center align-items-center mb-4">
            <span class="flaticon-customer-service"></span>
          </div>
          <div class="media-body">
            <p class="icon fa fa-tools fa-5x text-danger"></p>
            <h3 class="heading">melayani dengan cepat</h3>
            <p>Melayani barang dengan cepat memastikan pemesanan dilakukan secara efisien.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 text-center d-flex align-self-stretch ftco-animate">
        <div class="media block-6 services p-4 py-md-5">
          <div class="icon d-flex justify-content-center align-items-center mb-4 ">
            <span class="flaticon-payment-security"></span>
          </div>
          <div class="media-body">
            <p class="icon fa fa-shopping-cart fa-5x text-danger"></p>
            <h3 class="heading">belanja dengan mudah</h3>
            <p>proses berbelanja yang cepat, nyaman, dan efisien.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<hr id="tips" class="featurette-divider" style="margin: 50px;">

<div class="container">
  <div class="row h-100 g-0">
    <div class="col-md-6">
      <div class="bg-300 p-4 h-100 d-flex flex-column justify-content-center">
        <h1 class="fw-semi-bold lh-sm fs-4 fs-lg-5 fs-xl-6">Tips</h1>
        <p class="mb-5 fs-1">Merawat motor secara rutin sangat penting untuk memastikan performa tetap optimal dan umur kendaraan lebih panjang. Berikut adalah beberapa tips untuk merawat motor.
        </p>
        <div class="d-grid gap-2 d-md-block"><a class="btn btn-lg btn-dark" href="<?= base_url('beranda/artikel'); ?>" role="button">See More</a></div>
      </div>
    </div>
    <div class="col-md-6">
      <div class=" card-span text-white"><img class="card-img " src="assets\img\upload\1.jpg" alt="..." />></div>
    </div>
  </div>
</div>

<hr id="about" class="featurette-divider" style="margin: 50px;">

<div class="container">
  <div class="row h-100 g-0">
    <div class="col-md-6">
      <div class=" card-span text-white"><img class="card-img" src="assets\img\upload\rumah.jpg" alt="..." />></div>
    </div>
    <div class="col-md-6">
      <div class="bg-300 p-4 h-100 d-flex flex-column justify-content-center">
        <h1 class="fw-semi-bold lh-sm fs-4 fs-lg-5 fs-xl-6">Tentang <span class="text-danger">Kami</span></h1>
        <p class="mb-5 fs-1">Bengkel Steven Motor, yang berlokasi di Jalan dolar Cengkareng indah, Jakarta Barat, telah melayani pelanggan sejak tahun 2022. Bengkel ini menyediakan berbagai suku cadang motor yang berkualitas tinggi. Bengkel Steven Motor beroperasi setiap hari pada pukul 08:00 WIB sampai 20:00 WIB. </p>
      </div>
    </div>
  </div>
</div>

<hr class="featurette-divider" style="margin: 50px;">