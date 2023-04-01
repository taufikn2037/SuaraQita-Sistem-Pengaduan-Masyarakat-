<?= $this->session->flashdata('pesan'); ?>

<div class="card">
    <div class="card-header">
        <?php echo form_open_multipart('admin/tambah_galeri/'); ?>
        <div class="row g-3">
            <div class="col-1">
                <label>Foto</label>
            </div>

            <div class="col-4">
                <input type="file" size="20" class="form-control-file border border-secondary rounded" name="foto_galeri" require="">
            </div>

            <div class="col">
                <button type="submit" value="upload" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Galeri</button>
            </div>
        </div>
        <?php form_close(); ?>
    </div>
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr class="text-center">
                    <th>No.</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php
                foreach ($data_galeri as $data) : ?>
                <tr class="text-center">
                    <th scope="row"><?= $no++; ?></th>
                    <td>
                        <img width="50" src="<?= base_url() ?>assets/uploads_g/<?= $data->foto_galeri ?>" alt="">
                    </td>
                    <td>
                        <a href="<?= base_url('admin/delete_galeri/' . $data->id_galeri) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin menghapus data ini?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
