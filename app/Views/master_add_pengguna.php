<?= $this->extend('template/template') ?>

<?= $this->section('title') ?>Tambah Pengguna<?= $this->endSection() ?>

<?= $this->section('page_heading') ?>Tambah Pengguna Baru<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Content Row -->
<div class="row">

    <!-- Area Chart -->
    <div class="col-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Pengguna Baru</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <form action="<?= site_url('users/store'); ?>" method="post">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="role">Role:</label>
                        <select class="form-control" id="role" name="role" required>
                            <option value="1">Master</option>
                            <option value="2">Admin</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Pengguna</button>
                </form>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection() ?>
