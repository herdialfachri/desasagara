<?= $this->extend('template/template') ?>

<?= $this->section('title') ?>Edit Pengguna<?= $this->endSection() ?>

<?= $this->section('page_heading') ?>Edit Pengguna<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Content Row -->
<div class="row">

    <!-- Formulir Edit Pengguna -->
    <div class="col-xl-12 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Header -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Edit Pengguna</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <form action="<?= site_url('users/update/' . $user['id']); ?>" method="post">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?= esc($user['username']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Kata Sandi Baru:</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Biarkan kosong jika tidak ingin mengubah kata sandi">
                        <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah kata sandi.</small>
                    </div>
                    <div class="form-group">
                        <label for="role">Role:</label>
                        <select class="form-control" id="role" name="role" required>
                            <option value="1" <?= $user['role'] == 1 ? 'selected' : ''; ?>>Master</option>
                            <option value="2" <?= $user['role'] == 2 ? 'selected' : ''; ?>>Admin</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Pengguna</button>
                </form>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection() ?>
