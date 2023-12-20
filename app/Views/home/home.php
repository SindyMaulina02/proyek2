<?= $this->extend('layouts/home_layout') ?>

<?= $this->section('head') ?>
<title>Home</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="px-4 pt-5 my-5 text-center border-bottom">
    <h1 class="display-4 fw-bold">
        <span class="text-body-emphasiULBI" style="color: orange;">ULBI</span>
        <span class="text-primary">Library</span>
    </h1>
    <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">Selamat datang di ULBI Library! Mari bergabung dalam perjalanan pengetahuan, menjelajahi
            koleksi kami, dan merasakan atmosfer akademis yang inspiratif. Kami berkomitmen untuk menjadi mitra
            terpercaya Anda dalam mencapai tujuan akademis dan pengembangan pribadi.</p>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5">
            <a href="<?= base_url('login'); ?>" class="btn btn-primary btn-lg px-4 me-sm-3">Login</a>
            <a href="<?= base_url('book'); ?>" class="btn btn-outline-secondary btn-lg px-4">Daftar buku</a>
        </div>
    </div>
    <div class="overflow-hidden" style="max-height: 55vh;">
        <div class="container px-5">
            <img src="<?= base_url('assets/images/ulbi1.jpg'); ?>" class="img-fluid border rounded-3 shadow-lg mb-4"
                alt="Example image" width="700" height="500" loading="lazy">
        </div>
    </div>
</div>
<?= $this->endSection() ?>