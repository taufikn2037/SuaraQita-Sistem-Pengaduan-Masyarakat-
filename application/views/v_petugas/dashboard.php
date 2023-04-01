<div class="row">
    <div class="col-lg-3 col-6">
        <div class="small-box bg-dark">
            <div class="inner">
                <h3><?= number_format($pengaduan) ?></h3>
                <p class="text-warning">Data Pengaduan Masuk</p>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-dark">
            <div class="inner">
                <h3><?= number_format($pengaduan_proses) ?></h3>
                <p class="text-warning">Pengaduan Dalam Proses</p>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-dark">
            <div class="inner">
                <h3><?= number_format($pengaduan_tolak) ?></h3>
                <p class="text-warning">Pengaduan Ditolak</p>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-dark">
            <div class="inner">
                <h3><?= number_format($pengaduan_selesai) ?></h3>
                <p class="text-warning">Pengaduan Selesai</p>
            </div>
        </div>
    </div>
</div>