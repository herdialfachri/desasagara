<?= $this->extend('template/template') ?>

<?= $this->section('title') ?>Dashboard<?= $this->endSection() ?>

<?= $this->section('page_heading') ?>Dashboard<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Content Row -->
<div class="row">

    <!-- Pengeluaran Count Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                            Jumlah Akun</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jmlAkun; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-box-open fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection() ?>