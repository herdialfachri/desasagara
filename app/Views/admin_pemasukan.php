<?= $this->extend('template/template_admin') ?>

<?= $this->section('title') ?>Pemasukan<?= $this->endSection() ?>

<?= $this->section('page_heading') ?>Pemasukan<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="row">
    <!-- Filter Pemasukan dan Daftar Pemasukan -->
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <!-- Card Header -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Pemasukan</h6>
                <a href="<?= base_url('pemasukan/create') ?>" class="btn btn-primary btn-sm">Tambah Pemasukan</a>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <!-- Filter Pemasukan -->
                <div class="mb-4">
                    <form action="<?= base_url('pemasukan') ?>" method="get">
                        <div class="form-row">
                            <div class="col">
                                <label for="bulan">Bulan</label>
                                <input type="month" class="form-control" id="bulan" name="bulan" value="<?= esc($bulan ?? date('Y-m')) ?>">
                            </div>
                            <div class="col">
                                <label>&nbsp;</label>
                                <button type="submit" class="btn btn-primary btn-block">Filter Berdasarkan Bulan</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Daftar Pemasukan -->
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Jumlah Pemasukan</th>
                                <th>Kategori</th>
                                <th>Keterangan</th>
                                <th>Aksi</th> <!-- Tambahkan kolom Aksi -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($pemasukan) && is_array($pemasukan)): ?>
                                <?php foreach ($pemasukan as $item): ?>
                                    <tr>
                                        <td><?= esc($item['id']); ?></td>
                                        <td><?= esc($item['tanggal']); ?></td>
                                        <td>Rp. <?= esc($item['jumlah']); ?></td>
                                        <td><?= esc($item['nama_kategori']); ?></td>
                                        <td><?= esc($item['keterangan']); ?></td>
                                        <td>
                                            <!-- Tombol Edit -->
                                            <a href="<?= base_url('pemasukan/edit/'.$item['id']) ?>" class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <!-- Tombol Delete -->
                                            <a href="<?= base_url('pemasukan/delete/'.$item['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus item ini?');">
                                                <i class="fas fa-trash"></i> Delete
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6" class="text-center">Tidak ada pemasukan ditemukan.</td>
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
