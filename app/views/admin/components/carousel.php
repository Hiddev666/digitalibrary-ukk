<div class="container p-3 ps-4">
    <div class="container card p-4">

        <h3>Carousel</h3>

        <div class="mt-3">
            <a href="<?= BASEURL ?>/admin/addcarousel">
                <button class="btn btn-primary">Tambah Carousel +</button>
            </a>
        </div>

        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Image</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($carousels as $carousel) {
                ?>
                    <tr>
                        <th scope="carousel"><?= $carousel['id'] ?></th>
                        <td>
                            <img src="<?= $carousel['image'] ?>" alt="" style="width: 400px;" class="rounded">

                        </td>
                        <td class="">
                            <a href="<?= BASEURL ?>/admin/editcarousel/<?= $carousel['id'] ?>" class="btn btn-warning btn-sm">Ubah</a>
                            <a href="<?= BASEURL ?>/admin/deletecarousel/<?= $carousel['id'] ?>" class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>