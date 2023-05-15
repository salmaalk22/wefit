<?= $this->extend('base') ?>
<?= $this->section('content') ?>
<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between">
                <h5 class="mb-4">Lists Exercise</h5>
                <div>
                    <a href="<?= base_url('admin/exercise/tambah/') ?>" class="btn btn-sm btn-dark">Tambah Exercise</a>
                </div>
            </div>

            <table class="table table-hover ">
                <thead>
                    <tr>
                        <th scope="col ">Video</th>
                        <th scope="col ">Name</th>
                        <th scope="col ">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $item) : ?>
                        <tr>
                            <td>
                                <iframe width="560" height="315" src=<?= $item['video'] ?> frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                                <!-- <video width="640" height="360" controls>
                                    <source src= type="video/mp4">
                                    Your browser does not support the video tag.
                                </video> -->
                            </td>
                            <td><?= $item['name'] ?></td>
                            <td class="d-flex">
                                <div>
                                    <a href="<?= base_url('admin/exercise/edit/' . $item['id']) ?>" class="btn btn-sm btn-primary">Edit</a>
                                </div>
                                <form action="/admin/exercise/delete/<?= $item['id'] ?>" method="post" onsubmit="return confirm(`Are you sure?`)">
                                    <input type="hidden" name="_method" value="delete" />
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>