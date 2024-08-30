<!-- Begin Page Content -->
<style>
    .card:hover {
        color: red;
        box-shadow: 0 0 10px 2px red;
        transform: scale(1.05);
    }

    .card {
        transition: box-shadow .3s, transform .3s;
        width: 300px;
        height: 300px;
        background: white;
        border-radius: 15px;
    }

    .card .card-border-top {
        width: 60%;
        height: 3%;
        background: red;
        margin: auto;
        border-radius: 0px 0px 15px 15px;
    }

    .card span {
        font-weight: 600;
        color: black;
        text-align: center;
        display: block;
        padding-top: 10px;
        font-size: 16px;
    }

    .card .job {
        font-weight: 400;
        color: black;
        display: block;
        text-align: center;
        padding-top: 3px;
        font-size: 12px;
    }

    .card img {
        width: 70px;
        height: 80px;
        background: #6b64f3;
        border-radius: 15px;
        margin: auto;
        margin-top: 25px;
    }

    .card a {
        padding: 8px 25px;
        display: block;
        margin: auto;
        border-radius: 8px;
        border: none;
        margin-top: 30px;
        background: red;
        color: white;
        font-weight: 600;
    }

    .card a:hover {
        background: black;
    }
</style>
<div>

<p class="titik text-light">haloooooooo</p>
    <center>
        <div class="card">
            <div class="card-border-top">
            </div>
            <div class="img">
                <img src="<?= base_url('assets/img/profile/') . $image; ?>" alt="">
            </div>
            <span> <?= $user; ?></span>
            <p class="job"><?= $email; ?></p>
            <a href="<?= base_url('member/ubahprofil'); ?>"> Click
            </a>
        </div>
    </center>

</div>