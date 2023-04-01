<?= $this->session->flashdata('pesan'); ?>

<div class="card">
    <div class="card-header">
        <a href="<?= base_url('admin/tambah_berita') ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Berita</a>
    </div>
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr class="text-center">
                    <th>No.</th>
                    <th>Judul</th>
                    <th>Isi</th>
                    <th>Foto</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php
                foreach ($data_berita as $data) : ?>
                <tr class="text-center">
                    <th scope="row"><?= $no++; ?></th>
                    <td><?= $data->judul_berita ?></td>
                    <td><?= $data->isi_berita ?></td>
                    <td>
                        <img width="100" src="<?= base_url() ?>assets/uploads_b/<?= $data->foto_berita ?>" alt="">
                    </td>
                    <td><?= $data->tgl_berita ?></td>
                    <td>
                        <a href="<?= base_url('admin/edit_berita/' . $data->id_berita) ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="<?= base_url('admin/delete_berita/' . $data->id_berita) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin menghapus data ini?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
