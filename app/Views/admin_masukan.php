<?= $this->extend('template/template_admin') ?>

<?= $this->section('title') ?>Masukan<?= $this->endSection() ?>

<?= $this->section('page_heading') ?>Masukan<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="row">
    <!-- Daftar Masukan Pengunjung -->
    <div class="col-xl-12 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Header -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Masukan Pengunjung</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Pengunjung</th>
                                <th>Kontak</th>
                                <th>Pesan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($masukan) && is_array($masukan)): ?>
                                <?php foreach ($masukan as $item): ?>
                                    <tr>
                                        <td><?= esc($item['id']); ?></td>
                                        <td><?= esc($item['nama_pengunjung']); ?></td>
                                        <td>
                                            <a href="https://wa.me/<?= esc($item['whatsapp_pengunjung']); ?>" target="_blank" class="btn btn-sm btn-success">
                                                <i class="fab fa-whatsapp"></i> WhatsApp
                                            </a>
                                        </td>
                                        <td><?= esc($item['pesan']); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="4" class="text-center">Tidak ada masukan ditemukan.</td>
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
