<?= $this->extend('base') ?>
<?= $this->section('content') ?>
<div class="container py-5">
    <h3 class="mb-3">Tambah Exercise</h3>
    <form action="/admin/exercise" method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Link Video</label>
            <input type="text" class="form-control" id="video" name="video">
        </div>

        <button type="submit" class="btn btn-dark">Simpan</button>
    </form>
</div>
<?= $this->endSection() ?>