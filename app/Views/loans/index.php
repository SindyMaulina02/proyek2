<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('head') ?>
<title>Peminjaman</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?php

use CodeIgniter\I18n\Time;

if (session()->getFlashdata('msg')) : ?>
<div class="pb-2">
    <div class="alert <?= (session()->getFlashdata('error') ?? false) ? 'alert-danger' : 'alert-success'; ?> alert-dismissible fade show"
        role="alert">
        <?= session()->getFlashdata('msg') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
<?php endif; ?>

<div class="card">
    <div class="card-body">

        <div class="row mb-2">
            <div class="col-12 col-lg-5">
                <h5 class="card-title fw-semibold mb-4">Data Peminjaman</h5>
            </div>
            <div class="col-12 col-lg-7">
                <div class="d-flex gap-2 justify-content-md-end">
                    <div>
                        <form action="" method="get">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="search" value="<?= $search ?? ''; ?>"
                                    placeholder="Cari peminjaman" aria-label="Cari peminjaman"
                                    aria-describedby="searchButton">
                                <button class="btn btn-outline-secondary" type="submit" id="searchButton">Cari</button>
                            </div>
                        </form>
                    </div>
                    <div>
                        <a href="<?= base_url('admin/loans/new/members/search'); ?>" class="btn btn-primary py-2">
                            <i class="ti ti-plus"></i>
                            Peminjaman baru
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- ... (bagian HTML lainnya tetap tidak berubah) ... -->
    </div>
</div>
<?= $this->endSection() ?>