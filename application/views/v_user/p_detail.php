<a href="<?= base_url('/user/data_pengaduan') ?>" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a>

<div class="row mx-auto">
    <div class="col-lg-4">
        <div class="card mb-3" style="max-width: 540px;">
            <img src="<?= base_url() ?>assets/uploads/<?= $data_pengaduan['foto'] ?>" alt="" class="mt-2 mb-2 card-img-top" width="100">
            <div class="card-body">
                <p class="card-text"><small class="text-muted">Status : <?php
                                                                        if ($data_pengaduan['status'] == '0') {
                                                                            echo 'Sedang Diverifikasi';
                                                                        } elseif ($data_pengaduan['status'] == 'proses') {
                                                                            echo 'Sedang Diproses';
                                                                        } elseif ($data_pengaduan['status'] == 'tolak') {
                                                                            echo 'Pengaduan Ditolak';
                                                                        } elseif ($data_pengaduan['status'] == 'selesai') {
                                                                            echo 'Pengaduan Selesai';
                                                                        } else {
                                                                            echo 'Status tidak valid';
                                                                        }    
                                                                        ?></small></p>
                <p class="card-text"><small class="text-muted">Tanggal Pengaduan : <?= $data_pengaduan['tgl_pengaduan']; ?></small></p>
                <p class="card-text"><small class="text-muted">Tanggal Tanggapan : <?= $data_pengaduan['tgl_tanggapan']; ?></small></p>
            </div>
        </div>
    </div>
    <div class="col mx-auto">
        <div class="col-lg-7">
            <div class="form-group">
                <label for="tanggapan">Isi Laporan</label>
                <textarea name="tanggapan" class="form-control" id="tanggapan" cols="30" rows="5" readonly><?= $data_pengaduan['isi_laporan'] ?></textarea>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="form-group">
                <label for="tanggapan">Tanggapan</label>
                <textarea name="tanggapan" class="form-control" id="tanggapan" cols="30" rows="5" readonly><?= $data_pengaduan['tanggapan']; ?></textarea>
            </div>
        </div>
    </div>
</div>