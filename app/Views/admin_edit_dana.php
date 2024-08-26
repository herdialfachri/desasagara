<?= $this->extend('template/template_admin') ?>

<?= $this->section('title') ?>Edit Penggunaan Dana<?= $this->endSection() ?>

<?= $this->section('page_heading') ?>Edit Penggunaan Dana<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Penggunaan Dana</h6>
            </div>
            <div class="card-body">
                <form action="<?= base_url('penggunaan_dana/update/'.$penggunaan_dana['id']) ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= esc($penggunaan_dana['tanggal']) ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?= esc($penggunaan_dana['jumlah']) ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required><?= esc($penggunaan_dana['deskripsi']) ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="id_kategori">Kategori</label>
                        <select class="form-control" id="id_kategori" name="id_kategori" required>
                            <option value="">Pilih Kategori</option>
                            <?php foreach ($kategori as $kat): ?>
                                <option value="<?= esc($kat['id']); ?>" <?= $kat['id'] == $penggunaan_dana['id_kategori'] ? 'selected' : '' ?>><?= esc($kat['nama']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="proyek">Proyek</label>
                        <input type="text" class="form-control" id="proyek" name="proyek" value="<?= esc($penggunaan_dana['proyek']) ?>" required>
                    </div>
                    <!-- Input hidden untuk id_user, agar tidak bisa diubah -->
                    <input type="hidden" name="id_user" value="<?= esc($penggunaan_dana['id_user']) ?>">
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
