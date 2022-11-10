<?= $this->extend('layouts/index'); ?>

<?= $this->section('content'); ?>
<div class="container">

    <h1 class="my-5"><?= $title; ?></h1>

    <form action="/mahasiswa/save" method="post">

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control <?= $validation->hasError('nama') ? 'is-invalid' : ''; ?>" id="nama" name="nama">
            <div class="invalid-feedback">
                <?= $validation->getError('nama'); ?>
            </div>
        </div>
        <div class="mb-3">
            <label for="nim" class="form-label">NIM</label>
            <input type="text" class="form-control <?= $validation->hasError('nim') ? 'is-invalid' : ''; ?>" id="nim" name="nim">
            <div class="invalid-feedback">
                <?= $validation->getError('nim'); ?>
            </div>
        </div>

        <a class="btn btn-danger" href="/mahasiswa" role="button">Back</a>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>
<?= $this->endSection('content'); ?>