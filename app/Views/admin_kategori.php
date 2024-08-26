<?= $this->extend('template/template_admin') ?>

<?= $this->section('title') ?>Kategori<?= $this->endSection() ?>

<?= $this->section('page_heading') ?>Kategori<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="row">
    <!-- Daftar Kategori -->
    <div class="col-xl-12 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Header -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Kategori</h6>
                <a href="<?= base_url('kategori/create') ?>" class="btn btn-primary btn-sm">Tambah Kategori</a>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($kategori) && is_array($kategori)): ?>
                                <?php foreach ($kategori as $item): ?>
                                    <tr>
                                        <td><?= esc($item['id']); ?></td>
                                        <td><?= esc($item['nama']); ?></td>
                                        <td>
                                            <a href="<?= base_url('kategori/edit/'.$item['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
                                            <a href="<?= base_url('kategori/delete/'.$item['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');">Hapus</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="3" class="text-center">Tidak ada kategori ditemukan.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
