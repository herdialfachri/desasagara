<?= $this->extend('template/template_admin') ?>

<?= $this->section('title') ?>Edit Pengeluaran<?= $this->endSection() ?>

<?= $this->section('page_heading') ?>Edit Pengeluaran<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Pengeluaran</h6>
            </div>
            <div class="card-body">
                <form action="<?= base_url('pengeluaran/update/'.$pengeluaran['id']) ?>" method="post">
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= esc($pengeluaran['tanggal']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?= esc($pengeluaran['jumlah']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="id_kategori">Kategori</label>
                        <select class="form-control" id="id_kategori" name="id_kategori" required>
                            <?php foreach ($kategori as $kat): ?>
                                <option value="<?= esc($kat['id']); ?>" <?= $kat['id'] == $pengeluaran['id_kategori'] ? 'selected' : '' ?>>
                                    <?= esc($kat['nama']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea class="form-control" id="keterangan" name="keterangan" rows="3" required><?= esc($pengeluaran['keterangan']); ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
