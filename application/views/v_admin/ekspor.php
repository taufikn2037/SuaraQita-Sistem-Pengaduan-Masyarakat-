<div class="card">
    <div class="card-header">
        <button data-toggle="modal" data-target="#filter" class="btn btn-warning btn-sm"><i class="fas fa-file"></i> Print/PDF</button>
    </div>
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr class="text-center">
                    <th>No.</th>
                    <th>Nama</th>
                    <th>NIK</th>
                    <th>Laporan</th>
                    <th>Tgl. Pengaduan</th>
                    <th>Status</th>
                    <th>Tanggapan</th>
                    <th>Tgl. Tanggapan</th>
                    <th>Rating</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
				<?php foreach($data_masyarakat as $dp) : ?>
                    <tr style="text-align: center;">
                        <th scope="row"><?= $no++; ?></th>
						<td><?= $dp['name__user'] ?></td>
                        <td><?= $dp['nik__user'] ?></td>
                        <td><?= $dp['isi_laporan'] ?></td>
                        <td><?= $dp['tgl_pengaduan'] ?></td>
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
                        <td><?= $dp['tanggapan'] ?></td>
                        <td><?= $dp['tgl_tanggapan'] ?></td>
                        <td class="text-center">
                            <?php if ($dp['status'] == 'selesai' && $dp['rating'] !== '0') { ?>
                                <?= $dp['rating']; ?>
                            <?php } ?>   
                            <?php if ($dp['status'] !== 'selesai') { ?>
                                -
                            <?php } ?>
                        </td> 
                    </tr>
                <?php endforeach; ?>    
            </tbody>
        </table>
    </div>
</div>

<?php foreach ($data_masyarakat as $data) : ?>
    <div class="modal fade" id="filter" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Filter Data Pengaduan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('admin/pdf') ?>" method="POST">
                        <div class="form-group">
                            <label>Dari Tanggal</label>
                            <input type="date" name="tgl_awal" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Sampai Tanggal</label>
                            <input type="date" name="tgl_akhir" class="form-control">
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-file"></i> Print/PDF</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>