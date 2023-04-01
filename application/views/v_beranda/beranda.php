<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="dicoding:email" content="mordiansyah13th@gmail.com">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="<?php echo base_url();?>assets/dist/img/logo.png" rel="icon">
    <link rel="stylesheet" href="<?= base_url('assets') ?> /dist/css/beranda.css">
    <link rel="stylesheet" href="<?= base_url('assets') ?> /dist/css/beranda_responsif.css">
    <script defer src="<?= base_url('assets') ?> /dist/js/pages/hiddenElement.js"></script>
    <title>Homepage SuaraQita</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
        <img class="navbar-brand" src="<?= base_url('assets') ?> /dist/img/logo-image.png">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#jumbotron">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#content-1">Tentang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#content-2">Alur</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#content-3">Berita</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#content-4">Galeri</a>
                </li>
                <a href="<?= base_url('login') ?>" class="btn btn-warning nav-link mx-2" type="button">Login</a>
            </ul>
        </div>
    </nav>

    <!-- Jumbotron -->
    <div class="jumbotron" id="jumbotron">
        <div class="jumbotron-text d-flex flex-column justify-content-center align-items-center">
            <h1 tabindex="0" class="display-4 p-4 fw-bold">Selamat Datang <br>Di <span>Suara</span>Qita</h1>
            <p tabindex="0" class="lead border-3 border-top border-light">Sistem Pengaduan Masyarakat Kota Bandar Lampung.</p>
        </div>
    </div>

    <section class="py-5" id="content-1">
        <div class="container py-5">
            <div class="row g-4 py-2">
                <div class="col-md-6 hidden fade-left">
                    <h2 tabindex="0" class="pb-2">Apa itu website Suara<span>Qita</span>?</h2>
                    <p tabindex="0">Aplikasi SuaraQita merupakan aplikasi yang dapat
                        digunakan oleh masyarakat untuk menyampaikan
                        pengaduan atau keluhan dari pelayanan publik yang
                        ada.</p>

                    <p tabindex="0">Aplikasi ini dapat diakses melalui website sehingga dapat
                        digunakan di perangkat apapun dan masyarakat dapat
                        melakukan pengaduan atau keluhan dimanapun dan
                        kapanpun.</p>
                </div>
                <div class="col-md-6 hidden text-center fade-right">
                    <img class="about-image mx-auto" src="<?= base_url('assets') ?> /dist/img/about-image.png" alt="About Image">
                </div>
            </div>
        </div>
    </section>

    <section class="py-5" id="content-2">
        <div class="container pb-4">
            <h3 tabindex="0" class="text-center py-5 fw-bold">Alur Pengaduan</h3>
            <div class="row row-cols-2 row-cols-xs-3 row-cols-lg-5 g-4 text-center">
                <div class="col-sm hidden fade-up">
                    <div tabindex="0" class="box mx-auto hover-able">
                        <img class="pb-3" src="<?= base_url('assets') ?>/dist/img/alur-1.png" alt="Langkah Pertama">
                        <h5 class="fw-bold">Daftar/Masuk</h5>
                        <p> Daftar/Masuk terlebih
                            dahulu untuk melaporkan
                            keluhan atau pengaduan
                            Anda</p>
                    </div>
                </div>

                <div class="col-sm hidden fade-down">
                    <div tabindex="0" class="box mx-auto hover-able">
                        <img class="pb-3" src="<?= base_url('assets') ?> /dist/img/alur-2.png" alt="Langkah Kedua">
                        <h5 class="fw-bold">Tulis Laporan</h5>
                        <p> Laporkan keluhan atau
                            aduan Anda dengan
                            jelas dan lengkap</p>
                    </div>
                </div>

                <div class="col-sm hidden fade-up">
                    <div tabindex="0" class="box mx-auto hover-able">
                        <img class="pb-3" src="<?= base_url('assets') ?> /dist/img/alur-3.png" alt="Langkah Ketiga">
                        <h5 class="fw-bold">Tindak Lanjut</h5>
                        <p> Laporan Anda akan
                            diverifikasi dan diteruskan
                            kepada pihak berwenang</p>
                    </div>
                </div>

                <div class="col-sm hidden fade-down">
                    <div tabindex="0" class="box mx-auto hover-able">
                        <img class="pb-3" src="<?= base_url('assets') ?> /dist/img/alur-4.png" alt="Langkah Keempat">
                        <h5 class="fw-bold">Tanggapan</h5>
                        <p> Anda akan mendapatkan
                            tanggapan atau balasan
                            dari petugas</p>
                    </div>
                </div>

                <div class="col-sm hidden fade-up">
                    <div tabindex="0" class="box mx-auto hover-able">
                        <img class="pb-3" src="<?= base_url('assets') ?> /dist/img/alur-5.png" alt="Langkah Kelima">
                        <h5 class="fw-bold">Selesai</h5>
                        <p> Laporan Anda akan terus
                            ditindaklanjuti hingga
                            terselesaikan</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="py-5" id="content-3">
        <div class="container-lg py-3">
            <h3 tabindex="0" class="text-center py-4 fw-bold">Berita Instansi</h3>
            
            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-5">
                <?php foreach ($data_berita as $value): ?>
                    <div class="col-md-4 hidden fade-left">
                        <div class="card h-100 shadow-sm hover-able">
                            <img class="card-img-top" src="<?= base_url() ?>assets/uploads_b/<?= $value->foto_berita ?>" alt="">
                            <div class="card-body">
                                <h5 tabindex="0" class="card-title"><?= $value->judul_berita ?></h5>
                                <h6 class="card-subtitle py-2 text-muted"><?= $value->tgl_berita ?></h6>
                                <p class="card-text">
                                    <?php if ($value->isi_berita === null ) {
                                            echo 'Klik tombol "Read More" dibawah untuk membaca lanjut mengenai ' 
                                            . $value->judul_berita;
                                        } {
                                            echo $value->isi_berita;
                                        }; 
                                    ?>
                                </p>
                                <a data-toggle="modal" data-target="#read<?= $value->id_berita ?>" class="float-end" role="button"> Read More</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
                <?php foreach ($data_berita as $data) : ?>
                    <div class="modal fade" id="read<?= $data->id_berita ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Detail Berita</h5>
                                    <a type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </a>
                                </div>
                                <div class="modal-body">
                                    <img src="<?= base_url() ?>assets/uploads_b/<?= $data->foto_berita ?>" alt="" class="mt-2 mb-2 card-img-top" width="100">
                                    <div class="card-body">
                                        <h4><?= $data->judul_berita ?></h4>
                                        <h6 class="card-text"><small class="text-muted"><?= $data->tgl_berita ?></small></h6>
                                        <h6><small><?= $data->isi_berita ?></small></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </section>

    <section class="py-5" id="content-3">
        <div class="container-lg py-3">
            <h3 tabindex="0" class="text-center py-4 fw-bold">Berita Terbaru</h3>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-5">

                <?php $i = 0;
                foreach ($articles as $value) { ?>

                    <div class="col-md-4 hidden fade-left">
                        <div class="card h-100 shadow-sm hover-able">
                            <img class="card-img-top" src="<?= $value['urlToImage'] ?>" onerror="this.src='<?= base_url('assets'); ?> /dist/img/berita-default.png'" alt="Preview Gambar Berita">
                            <div class="card-body">
                                <h5 tabindex="0" class="card-title"><?= $value['title']  ?></h5>
                                <h6 class="card-subtitle py-2 text-muted">
                                    <?php  
                                        $publishedAt = explode("T", $value['publishedAt']);
                                        $newDateFormat = date('d-m-Y',strtotime($publishedAt[0]));
                                        echo $newDateFormat;
                                    ?>
                                </h6>
                                <p class="card-text">
                                    <?php if ($value['description'] === null ) {
                                            echo 'Klik tombol "Read More" dibawah untuk membaca lanjut mengenai ' 
                                            . $value['title'];
                                        } {
                                            echo $value['description'];
                                        }; 
                                    ?>
                                </p>
                                <a href="<?= $value['url']  ?>" class="float-end" aria-label="Read More" role="button" target="_blank">Read More</a>
                            </div>
                        </div>
                    </div>
                <?php
                    if (++$i > 5) break;
                } ?>

            </div>
        </div>
    </section>

    <section class="py-5" id="content-4">
        <div class="container-lg pb-4">
            <h3 tabindex="0" class="text-center py-4 fw-bold">Galeri</h3>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">
                <?php foreach ($data_galeri as $value): ?>
                    <div tabindex="0" class="col-md-4 hidden fade-right hover-able">
                        <img src="<?= base_url() ?>assets/uploads_g/<?= $value->foto_galeri ?>" alt="Galeri">
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </section>

    <footer>
        <div class="text-center">
            <img src="<?= base_url('assets') ?> /dist/img/logo-image.png" alt="logo image">
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>