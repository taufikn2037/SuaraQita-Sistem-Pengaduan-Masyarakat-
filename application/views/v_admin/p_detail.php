<div class="container-fluid mb-2">
    <?php if ($admins['id_role'] == '1') { ?>
        <a href="<?= base_url('/admin/pengaduan_masuk') ?>" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a>
    <?php } else {  ?>
        <a href="<?= base_url('/petugas/pengaduan_masuk') ?>" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a>
    <?php } ?>
    <?= validation_errors('<div class="alert alert-danger alert-dismissible fade show" role="alert">', '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  </div>') ?>
    <?= $this->session->flashdata('msg'); ?>

    <div class="row">

        <div class="col-lg-6">
            <div class="card mb-3" style="max-width: 540px;">
                <img src="<?= base_url() ?>assets/uploads/<?= $data_pengaduan['foto'] ?>" alt="" class="mt-2 mb-2 card-img-top" width="100">
                <div class="card-body">
                    <h5 class="card-title">Laporan : <?= $data_pengaduan['isi_laporan'] ?></h5>
                    <br>
                    <h6 class="card-text"><small class="text-muted">Nama : <?= $data_pengaduan['name__user']; ?></small></h6>
                    <h6 class="card-text"><small class="text-muted">Status : <?= $data_pengaduan['status'] == 0 ? 'Belum di verifikasi' : ''; ?></small></h6>
                    <h6 class="card-text"><small class="text-muted">Kategori : <?= $data_pengaduan['nama_kategori']; ?></small></h6>
                    <h6 class="card-text"><small class="text-muted">Tanggal Pengaduan : <?= $data_pengaduan['tgl_pengaduan']; ?></small></h6>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <?php if ($admins['id_role'] == '1') { ?>
                <?= form_open('/admin/tambah_tanggapan'); ?>
            <?php } else {  ?>
                <?= form_open('/petugas/tambah_tanggapan'); ?>
            <?php } ?>

            <input type="hidden" name="id" value="<?= $data_pengaduan['id_pengaduan']; ?>">
            <label for="">Status Tanggapan</label>
            <div class="form-group">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="status-setuju" value="proses" checked="">
                    <label class="form-check-label" for="status-setuju">Setuju</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="status-tolak" value="tolak">
                    <label class="form-check-label" for="status-tolak">Tolak</label>
                </div>
            </div>

            <div class="form-group">
                <label for="tanggapan">Tanggapan</label>
                <textarea name="tanggapan" class="form-control" id="tanggapan" cols="30" rows="11"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <?= form_close(); ?>
        </div>
    </div>
</div>