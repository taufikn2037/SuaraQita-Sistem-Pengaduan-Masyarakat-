<?= $this->session->flashdata('msg'); ?>

<div class="card">
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr class="text-center">
                    <th>No.</th>
                    <th>Foto</th>
                    <th>Tanggal</th>
                    <th>Kategori</th>
                    <th>Isi Laporan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                    <th>Rating</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($data_pengaduan as $dp) : ?>
                <tr class="text-center">
                    <td><?= $no++; ?></td>
                    <td>
                        <img width="100" src="<?= base_url() ?>assets/uploads/<?= $dp['foto']; ?>" alt="">
                    </td>
                    <td><?= $dp['tgl_pengaduan']; ?></td>
                    <td><?= $dp['nama_kategori']; ?></td>
                    <td><?= $dp['isi_laporan']; ?></td>
                    <td>
                        <?php
                        if ($dp['status'] == '0') {
                            echo '<span class="badge badge-secondary">Sedang Diverifikasi</span>';
                        } elseif ($dp['status'] == 'proses') {
                            echo '<span class="badge badge-primary">Sedang Diproses</span>';
                        } elseif ($dp['status'] == 'selesai') {
                            echo '<span class="badge badge-success">Selesai Dikerjakan</span>';
                        } elseif ($dp['status'] == 'tolak') {
                            echo '<span class="badge badge-danger">Pengaduan Ditolak</span>';
                        } else {
                            echo '-';
                        }
                        ?>
                    </td>
                       
                    <td class="text-center">
                        <a href="<?= base_url('user/pengaduan_detail/' . $dp['id_pengaduan']) ?>" class="btn btn-success mb-1">Detail</a>
                        <?php if ($dp['status'] == '0') { ?>
                            <a href="<?= base_url('user/pengaduan_batal/' . $dp['id_pengaduan']) ?>" class="btn btn-danger mb-1">Hapus</a>
                            <a href="<?= base_url('user/edit/' . $dp['id_pengaduan']) ?>" class="btn btn-warning mb-1">Edit</a>
                        <?php } ?>
                    </td>
                    <td class="text-center">
                        <?php if ($dp['status'] == 'selesai' && $dp['rating'] == '0') { ?>
                            <button data-toggle="modal" data-target="#rating<?= $dp['id_pengaduan'] ?>" class="btn btn-warning mb-1">Rating</button>
                        <?php } ?>
                        <?php if ($dp['status'] == 'selesai' && $dp['rating'] !== '0') { ?>
                            <?= $dp['rating']; ?>
                        <?php } ?>   
                        <?php if ($dp['status'] !== 'selesai') { ?>
                            -
                        <?php } ?>
                    </td> 
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<?php foreach ($data_pengaduan as $dp) : ?>
    <div class="modal fade" id="rating<?= $dp['id_pengaduan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Rating Kepuasan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('user/pengaduan_rating/' . $dp['id_pengaduan'])?>" method="POST">
                        <div class="form-group">
                            <select name="rating" class="form-control" aria-label="Default select example">
                                <option selected>- Pilih -</option>
                                <option value="tidak puas">Tidak Puas</option>
                                <option value="puas">Puas</option>
                                <option value="sangat puas">Sangat Puas</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" value="upload" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>