<?= $this->extend('template/template_admin') ?>

<?= $this->section('title') ?>Edit Kategori<?= $this->endSection() ?>

<?= $this->section('page_heading') ?>Edit Kategori<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Kategori</h6>
            </div>
            <div class="card-body">
                <form action="<?= base_url('kategori/update/'.$kategori['id']) ?>" method="post">
                    <div class="form-group">
                        <label for="nama">Nama Kategori</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= esc($kategori['nama']) ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
