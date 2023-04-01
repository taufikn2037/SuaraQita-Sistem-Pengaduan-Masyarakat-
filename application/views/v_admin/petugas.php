<?= $this->session->flashdata('pesan'); ?>

<div class="card">
    <div class="card-header">
        <a href="<?= base_url('admin/tambah_petugas') ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Data</a>
    </div>
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr class="text-center">
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($data_petugas as $data) : ?>
                <tr class="text-center">
                    <td><?= $data->name__admin ?></td>
                    <td><?= $data->username__admin ?></td>
                    <td>
                        <?php if ($data->id_role == '3') { ?>
                            <button data-toggle="modal" data-target="#edit<?= $data->id_admin ?>" class="btn btn-warning btn-sm"> Edit</button>
                            <a href="<?= base_url('admin/delete_petugas/' . $data->id_admin) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin menghapus data ini?')">Hapus</a>
                        <?php } ?>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>


<?php foreach ($data_petugas as $data) : ?>
    <div class="modal fade" id="edit<?= $data->id_admin ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('admin/edit_petugas/' . $data->id_admin) ?>" method="POST">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="name__admin" class="form-control" value="<?= $data->name__admin ?>">
                        </div>

                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username__admin" class="form-control" value="<?= $data->username__admin ?>">
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password__admin" class="form-control" value="<?= $data->password__admin ?>">
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