<?= $this->session->flashdata('msg'); ?>
<div class="card">
    <div class="card-body">

        <?= form_open_multipart('user/edit/' . $pengaduan['id_pengaduan']); ?>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Kategori</label>

            <select name="id_kategori" class="form-control" id="exampleFormControlSelect1">
                <option value="">- Pilih -</option>
                <?php foreach ($data_kategori as $data): ?>
                <option value="<?php echo $data->id_kategori ?>"><?php echo $data->nama_kategori ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="form-group">
            <label for="isi_laporan">Isi Laporan</label>
            <textarea class="form-control" name="isi_laporan" id="isi_laporan" rows="5"><?= $pengaduan['isi_laporan'] ?></textarea>
        </div>
        <div class="form-group">
            <label for="foto">Foto</label>
            <input type="file" class="form-control-file border border-secondary rounded" name="foto" id="foto">
        </div>
        <button type="reset" value="reset" class="btn btn-danger">Reset</button>
        <a href="/suaraQita/user/data_pengaduan" class="btn btn-warning">Kembali</a>
        <button type="submit" value="submit" class="btn btn-primary">Simpan</button>
        <?php form_close(); ?>
    </div>
</div>