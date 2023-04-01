<!DOCTYPE html>
<html>

<head>
  <title>Admin</title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="dicoding:email" content="mordiansyah13th@gmail.com">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
  <link href="<?php echo base_url();?>assets/dist/img/logo.png" rel="icon">
  <link rel="stylesheet" href="<?= base_url('assets') ?> /dist/css/auth.css">
  <script defer src="<?= base_url('assets') ?> /dist/js/pages/hiddenElement.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
</head>

<body>
  <section class="text-lg-start h-100 hidden fade-down" id="login">
    <div class="card mb-3 h-100">
      <div class="row g-0 d-flex align-items-center h-100">
        <div class="col-lg-4 d-none d-lg-flex">
          <img src="<?php echo base_url();?>assets/dist/img/auth-image.png" alt="SuaraQita logo"
            class="w-100 login-image" />
        </div>
        <div class="col-lg-8">
          <div class="card-body py-5 px-md-5">
            <form class="admin" method="POST" action="<?= base_url('ladmin'); ?>">
              <div class="title">
                <h1>Login Admin</h1>
              </div>
              <?= $this->session->flashdata('message'); ?>
              
              <div class="form-group row">
                <label for="username__admin" class="col-sm-4 col-form-label">Username</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="username__admin" name="username__admin" placeholder="Username yang Admin gunakan" value="<?= set_value('username__admin'); ?>">
                </div>
                <?= form_error('username__admin', '<small class="text-danger pl-3">', '</small>') ?>
              </div>

              <div class="form-group row">
                <label for="password__admin" class="col-sm-4 col-form-label">Password</label>
                <div class="col-sm-8">
                  <input type="password" class="form-control" id="password__admin" name="password__admin" placeholder="Password yang Admin gunakan">
                </div>
                <?= form_error('password__admin', '<small class="text-danger pl-3">', '</small>') ?>
              </div>

              <div class="form-group row">
                <div class="col-sm-12">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                    <label class="form-check-label" for="invalidCheck">
                      <small>Pastikan semua data yang Anda masukkan sudah benar.</small>
                    </label>
                  </div>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-sm-12">
                  <a href="<?= base_url('beranda') ?>" id="tombol_batal" class="btn btn-primary">Batal</a>
                  <button id="tombol_login" type="submit" value="submit" class="btn btn-primary">Login</button>
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