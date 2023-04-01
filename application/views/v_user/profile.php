<?= $this->session->flashdata('pesan'); ?>

<div class="main-body">

    <div class="col-md-5">
        <div class="card mb-3">
            <div class="card-body">
                <div class="d-flex flex-column align-items-center text-center mb-4">
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Username</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <?= $users['username__user'] ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Nama</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <?= $users['name__user'] ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <?= $users['email__user'] ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Telepon</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <?= $users['no_telepon'] ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">NIK</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <?= $users['nik__user'] ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Bergabung Pada</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <?= $users['date_created'] ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-12">
                        <button data-toggle="modal" data-target="#edit<?= $users['id_user'] ?>" class="btn btn-warning btn-sm"> Edit</button>
                        <button data-toggle="modal" data-target="#gantipw<?= $users['id_user'] ?>" class="btn btn-info btn-sm"> Ganti Password</button>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<?php foreach ($data_masyarakat as $data) : ?>
    <div class="modal fade" id="edit<?= $data->id_user ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Profil</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('user/edit_profile/' . $data->id_user) ?>" method="POST">

                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="name__user" class="form-control" value="<?= $data->name__user ?>">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email__user" class="form-control" value="<?= $data->email__user ?>">
                        </div>

                        <div class="form-group">
                            <label>NIK</label>
                            <input type="text" name="nik__user" class="form-control" value="<?= $data->nik__user ?>">
                        </div>

                        <div class="form-group">
                            <label>No. Telepon</label>
                            <input type="text" name="no_telepon" class="form-control" value="<?= $data->no_telepon ?>">
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
                            <button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>

<?php foreach ($data_masyarakat as $data) : ?>
    <div class="modal fade" id="gantipw<?= $data->id_user ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ganti Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('user/edit_password/' . $data->id_user) ?>" method="POST">
                        <div class="form-group row py-2">
                            <label for="password__user" class="col-sm-4 col-form-label">Password Baru</label>
                            <div class="col-sm-8">
                            <input type="password" class="form-control" name="password__user" placeholder="Password Baru">
                            </div>
                            <?= form_error('password__user', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>

                        <div class="form-group row py-2">
                            <div class="col-sm-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" required>
                                <label class="form-check-label">
                                <small>Yakin ingin mengganti password?</small>
                                </label>
                            </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
                            <button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>