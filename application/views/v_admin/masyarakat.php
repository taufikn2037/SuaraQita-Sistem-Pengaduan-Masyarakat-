<?= $this->session->flashdata('pesan'); ?>

<div class="card">
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr class="text-center">
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>No. Telepon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($data_masyarakat as $data) : ?>
                <tr>
                    <td><?= $data->nik__user ?></td>
                    <td><?= $data->name__user ?></td>
                    <td><?= $data->username__user ?></td>
                    <td><?= $data->email__user ?></td>
                    <td><?= $data->no_telepon ?></td>
                    <td>
                        <a href="<?= base_url('admin/delete_masyarakat/' . $data->id_user) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin menghapus data ini?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>