<!DOCTYPE html>
<html>

<head>
  <title>Daftar SuaraQita</title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="dicoding:email" content="mordiansyah13th@gmail.com">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/dist/img/logo.png" rel="icon">
  <link rel="stylesheet" href="<?= base_url('assets') ?> /dist/css/auth.css">
  <script defer src="<?= base_url('assets') ?> /dist/js/pages/hiddenElement.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
</head>

<body>
  <section class="text-lg-start h-100 hidden fade-down" id="daftar">
    <div class="card mb-3 h-100">
    <div class="row g-0 d-flex align-items-center h-100">
      <div class="col-lg-4 d-none d-lg-flex">
        <img src="<?php echo base_url();?>assets/dist/img/auth-image.png" alt="SuaraQita logo"
          class="w-100 daftar-image" />
      </div>
      <div class="col-lg-8">
        <div class="card-body py-5 px-md-5">

        <form class="user" method="POST" action="<?= base_url('login/daftar'); ?>">
          <div class="title">
            <h1>Daftar</h1>
          </div>
          <div class="form-group row py-2">
            <label for="name__user" class="col-sm-4 col-form-label">Nama Lengkap</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="name__user" name="name__user" placeholder="Nama lengkap Anda" value="<?= set_value('name__user'); ?>">
            </div>
            <?= form_error('name__user', '<small class="text-danger pl-3">', '</small>') ?>
          </div>

          <div class="form-group row py-2">
            <label for="email__user" class="col-sm-4 col-form-label">Alamat Email</label>
            <div class="col-sm-8">
              <input type="email" class="form-control" id="email__user" name="email__user" placeholder="Email aktif Anda" value="<?= set_value('email__user'); ?>">
            </div>
            <?= form_error('email__user', '<small class="text-danger pl-3">', '</small>') ?>
          </div>

          <div class="form-group row py-2">
            <label for="username__user" class="col-sm-4 col-form-label">Username</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="username__user" name="username__user" placeholder="Username yang akan Anda gunakan" value="<?= set_value('username__user'); ?>">
            </div>
            <?= form_error('username__user', '<small class="text-danger pl-3">', '</small>') ?>
          </div>

          <div class="form-group row py-2">
            <label for="nik__user" class="col-sm-4 col-form-label">NIK</label>
            <div class="col-sm-8">
              <input type="number" class="form-control" id="nik__user" name="nik__user" placeholder="Nomor Induk Kewarganegaraan" value="<?= set_value('nik__user'); ?>">
            </div>
            <?= form_error('nik__user', '<small class="text-danger pl-3">', '</small>') ?>
          </div>

          <div class="form-group row py-2">
            <label for="no_telepon" class="col-sm-4 col-form-label">No. Telepon</label>
            <div class="col-sm-8">
              <input type="number" class="form-control" id="no_telepon" name="no_telepon" placeholder="Nomor Telepon Aktif" value="<?= set_value('no_telepon'); ?>">
            </div>
            <?= form_error('no_telepon', '<small class="text-danger pl-3">', '</small>') ?>
          </div>

          <div class="form-group row py-2">
            <label for="password__user" class="col-sm-4 col-form-label">Password</label>
            <div class="col-sm-8">
              <input type="password" class="form-control" id="password__user" name="password__user" placeholder="Password yang akan Anda gunakan">
            </div>
            <?= form_error('password__user', '<small class="text-danger pl-3">', '</small>') ?>
          </div>

          <div class="form-group row py-2">
            <label for="rpassword__user" class="col-sm-4 col-form-label">Ulangi Password</label>
            <div class="col-sm-8">
              <input type="password" class="form-control" id="rpassword__user" name="rpassword__user" placeholder="Ketikkan kembali Password Anda">
            </div>
          </div>

          <div class="form-group row py-2">
            <div class="col-sm-12">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                <label class="form-check-label" for="invalidCheck">
                  <small>Pastikan semua data yang Anda masukkan sudah benar.</small>
                </label>
              </div>
            </div>
          </div>

          <div class="form-group row py-2">
            <div class="col-sm-12">
              <a href="<?= base_url('login') ?>" id="tombol_batal" class="btn btn-primary">Batal</a>
              <button id="tombol_daftar" type="submit" class="btn btn-primary">Daftar</button>
            </div>
          </div>

          <div class="form-group row py-2">
            <div class="col-sm-12">
              <a id="link_login" href="<?= base_url('login') ?>"> Sudah memiliki akun?</a>
            </div>
          </div>

        </form>

        </div>
      </div>
    </div>
  </div>
</section>

</body>


</html>