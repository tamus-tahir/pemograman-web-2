<?= $this->extend('layouts/index'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <h1 class="my-5"><?= $title; ?></h1>

    <?php if (session()->getFlashdata('success')) :  ?>
        <div class="alert alert-primary" role="alert">
            <?= session()->getFlashdata('success'); ?>
        </div>
    <?php endif;  ?>

    <a class="btn btn-primary" href="/mahasiswa/create" role="button">Add</a>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">NIM</th>
                <th scope="col">Nama</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($mahasiswa as $row) : ?>
                <tr>
                    <th scope="row"><?= $i++; ?></th>
                    <td><?= $row['nim']; ?></td>
                    <td><?= $row['nama']; ?></td>
                    <td>
                        <a class="btn btn-warning" href="/mahasiswa/edit/<?= $row['id_mahasiswa']; ?>" role="button">Edit</a>
                        <a class="btn btn-danger" href="/mahasiswa/delete/<?= $row['id_mahasiswa']; ?>" role="button" onclick="confirm()">Delete</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<?= $this->endSection('content'); ?>