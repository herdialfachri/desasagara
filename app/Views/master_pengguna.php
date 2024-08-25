<?= $this->extend('template/template') ?>

<?= $this->section('title') ?>Pengguna<?= $this->endSection() ?>

<?= $this->section('page_heading') ?>Daftar Pengguna<?= $this->endSection() ?>

<?= $this->section('generate_report_button') ?>
<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
    <i class="fas fa-download fa-sm text-white-50"></i> Download PDF
</a>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Content Row -->
<div class="row">

    <!-- Area Chart -->
    <div class="col-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Pengguna</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($users) && is_array($users)): ?>
                                <?php foreach ($users as $user): ?>
                                    <tr>
                                        <td><?= esc($user['id']); ?></td>
                                        <td><?= esc($user['username']); ?></td>
                                        <td>
                                            <?= $user['role'] == 1 ? 'Master' : 'Admin'; ?>
                                        </td>
                                        <td>
                                            <a href="<?= site_url('users/edit/' . $user['id']); ?>" class="btn btn-sm btn-primary">Edit</a>
                                            <a href="<?= site_url('users/delete/' . $user['id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apa kamu yakin ingin menghapus data ini?');">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="4" class="text-center">Tidak ada ditemukan</td>
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