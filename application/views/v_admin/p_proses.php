<?= $this->session->flashdata('pesan'); ?>

<div class="card">
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr class="text-center">
                    <th>No.</th>
                    <th>Nama</th>
                    <th>No. Telepon</th>
                    <th>Isi Laporan</th>
                    <th>Foto</th>
                    <th>Tgl. Pengaduan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($data_pengaduan as $dp) : ?>
                <tr class="text-center">
                    <th scope="row"><?= $no++; ?></th>
                    <td><?= $dp['name__user']; ?></td>
                    <td><?= $dp['no_telepon']; ?></td>
                    <td><?= $dp['isi_laporan']; ?></td>
                    <td>
                        <img width="100" src="<?= base_url() ?>assets/uploads/<?= $dp['foto']; ?>" alt="">
                    </td>
                    <td><?= $dp['tgl_pengaduan']; ?></td>
                    <td>
                        <?php
                        if ($dp['status'] == '0') {
                            echo '<span class="badge badge-secondary">Sedang di verifikasi</span>';
                        } elseif ($dp['status'] == 'proses') {
                            echo '<span class="badge badge-primary">Sedang di proses</span>';
                        } elseif ($dp['status'] == 'selesai') {
                            echo '<span class="badge badge-success">Selesai di kerjakan</span>';
                        } elseif ($dp['status'] == 'tolak') {
                            echo '<span class="badge badge-danger">Pengaduan di tolak</span>';
                        } else {
                            echo '-';
                        }
                        ?>
                    </td>
                    <td>
                        <?php if ($admins['id_role'] == '1') { ?>
                            <?= form_open('/admin/tanggapan_selesai'); ?>
                        <?php } else {  ?>
                            <?= form_open('/petugas/tanggapan_selesai'); ?>
                        <?php } ?>
                        <input type="hidden" name="id" value="<?= $dp['id_pengaduan'] ?>">
                        <button class="btn btn-success" name="selesai">Selesai</button>
                        <?= form_close(); ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>