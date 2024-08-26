<?= $this->extend('template/template_admin') ?>

<?= $this->section('title') ?>Tambah Penggunaan Dana<?= $this->endSection() ?>

<?= $this->section('page_heading') ?>Tambah Penggunaan Dana<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Penggunaan Dana</h6>
            </div>
            <div class="card-body">
                <form action="<?= base_url('penggunaan_dana/store') ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" class="form-control" id="jumlah" name="jumlah" required>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="id_kategori">Kategori</label>
                        <select class="form-control" id="id_kategori" name="id_kategori" required>
                            <option value="">Pilih Kategori</option>
                            <?php foreach ($kategori as $kat): ?>
                                <option value="<?= esc($kat['id']); ?>"><?= esc($kat['nama']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_user">User</label>
                        <select class="form-control" id="id_user" name="id_user" required>
                            <option value="">Pilih User</option>
                            <?php foreach ($users as $user): ?>
                                <option value="<?= esc($user['id']); ?>"><?= esc($user['username']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="proyek">Proyek</label>
                        <input type="text" class="form-control" id="proyek" name="proyek" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
