<?= $this->session->flashdata('pesan'); ?>

<div class="card">
    <div class="card-body">
        <?php echo form_open_multipart('admin/tambah_berita_aksi'); ?>
            <div class="form-group">
                <label>Judul Berita</label>
                <input type="text" name="judul_berita" class="form-control" require="">
            </div>

            <div class="form-group">
                <label>Isi Berita</label>
                <textarea class="form-control" name="isi_berita" rows="5" require=""></textarea>
            </div>

            <div class="form-group">
                <label>Foto</label>
                <input type="file" size="20" class="form-control-file border border-secondary rounded" name="foto_berita" require="">
            </div>

            <div class="modal-footer">
                <button type="submit" value="upload" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Tambah</button>
                <button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Reset</button>
                <a href="<?= base_url('admin/berita') ?>" class="btn btn-warning btn-sm">Batal</a>
            </div>
        <?php form_close(); ?>
    </div>
</div>