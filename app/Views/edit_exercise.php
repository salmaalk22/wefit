<?= $this->extend('base') ?>
<?= $this->section('content') ?>
<div class="container py-5">
    <h3 class="mb-3">Edit Exercise</h3>
    <form action="/admin/exercise/edit/<?= $data['id'] ?>" method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input value="<?= $data['name'] ?>" type="text" class="form-control" id="name" name="name">
        </div>
        <div class="mb-3">
            <label for="video" class="form-label">Link Video</label>
            <input value="<?= $data['video'] ?>" type="text" class="form-control" id="video" name="video">
        </div>

        <button type="submit" class="btn btn-dark">Simpan</button>
    </form>
</div>
<?= $this->endSection() ?>