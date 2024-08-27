<?= $this->extend('template/template_admin') ?>

<?= $this->section('title') ?>Penggunaan Dana<?= $this->endSection() ?>

<?= $this->section('page_heading') ?>Penggunaan Dana<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="row">
    <!-- Daftar Penggunaan Dana -->
    <div class="col-xl-12 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Header -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Penggunaan Dana</h6>
                <a href="<?= base_url('penggunaan_dana/create') ?>" class="btn btn-primary btn-sm">Tambah Penggunaan Dana</a>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Jumlah</th>
                                <th>Deskripsi</th>
                                <th>Kategori</th>
                                <th>Proyek</th>
                                <th>User</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($penggunaan_dana) && is_array($penggunaan_dana)): ?>
                                <?php foreach ($penggunaan_dana as $item): ?>
                                    <tr>
                                        <td><?= esc($item['id']); ?></td>
                                        <td><?= esc($item['tanggal']); ?></td>
                                        <td>Rp. <?= esc($item['jumlah']); ?></td>
                                        <td><?= esc($item['deskripsi']); ?></td>
                                        <td><?= esc($item['nama_kategori']); ?></td>
                                        <td><?= esc($item['proyek']); ?></td>
                                        <td><?= esc($item['nama_user']); ?></td>
                                        <td>
                                            <!-- Tombol Edit -->
                                            <a href="<?= base_url('penggunaan_dana/edit/'.$item['id']) ?>" class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <!-- Tombol Delete -->
                                            <a href="<?= base_url('penggunaan_dana/delete/'.$item['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus item ini?');">
                                                <i class="fas fa-trash"></i> Delete
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="8" class="text-center">Tidak ada penggunaan dana ditemukan.</td>
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
