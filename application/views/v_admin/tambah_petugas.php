<form action="<?= base_url('admin/tambah_petugas_aksi') ?>" method="POST">

    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="name__admin" class="form-control">
    </div>

    <div class="form-group">
        <label>Username</label>
        <input type="text" name="username__admin" class="form-control">
    </div>

    <div class="form-group">
        <label>Password</label>
        <input type="password" name="password__admin" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i>Simpan</button>
    <button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>Reset</button>
    <a href="<?= base_url('admin/data_petugas') ?>" class="btn btn-warning btn-sm">Batal</a>
</form>