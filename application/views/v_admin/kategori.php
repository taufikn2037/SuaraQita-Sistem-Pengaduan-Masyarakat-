<?= $this->session->flashdata('pesan'); ?>

<div class="card">
    <div class="card-header">
        <button data-toggle="modal" data-target="#tambah" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Kategori</button>
    </div>
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr class="text-center">
                    <th>Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($data_kategori as $data) : ?>
                <tr class="text-center">
                    <td><?= $data->nama_kategori ?></td>
                    <td>
                        <button data-toggle="modal" data-target="#edit<?= $data->id_kategori ?>" class="btn btn-warning btn-sm"> Edit</button>
                        <a href="<?= base_url('admin/delete_kategori/' . $data->id_kategori) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin menghapus data ini?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>


<?php foreach ($data_kategori as $data) : ?>
    <div class="modal fade" id="edit<?= $data->id_kategori ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('admin/edit_kategori/' . $data->id_kategori) ?>" method="POST">
                        <div class="form-group">
                            <label>Kategori</label>
                            <input type="text" name="nama_kategori" class="form-control" value="<?= $data->nama_kategori ?>">
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

<?php foreach ($data_kategori as $data) : ?>
    <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('admin/tambah_kategori/') ?>" method="POST">
                        <div class="form-group">
                            <label>Kategori</label>
                            <input type="text" name="nama_kategori" class="form-control">
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Tambah</button>
                            <button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>