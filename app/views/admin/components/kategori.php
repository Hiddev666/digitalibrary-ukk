<div class="container p-3 ps-4">
    <div class="container card p-4">

        <h3>Kategori</h3>

        <?php

        if (isset($_GET['pesan'])) {
            if ($_GET['pesan'] == 'storeberhasil') {
                echo "<div class='alert alert-info' role='alert'>Berhasil menambahkan kategori</div>";
            } elseif ($_GET['pesan'] == 'updateberhasil') {
                echo "<div class='alert alert-info' role='alert'>Berhasil mengubah kategori</div>";
            } elseif ($_GET['pesan'] == 'deleteberhasil') {
                echo "<div class='alert alert-info' role='alert'>Berhasil menghapus kategori</div>";
            }
        }

        ?>

        <div class="mt-3">
            <a href="<?= BASEURL ?>/admin/addkategori">
                <button class="btn btn-primary">Tambah Kategori +</button>
            </a>
        </div>

        <form action="" method="POST" class="mt-3 d-flex gap-1">
            <input type="text" class="form-control" name="keyword" placeholder="Cari Kategori">
            <button type="submit" class="btn btn-warning" name="startsearch">Cari</button>
        </form>

        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Kategori</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($categories as $category) {
                ?>
                    <tr>
                        <th scope="row"><?= $category['id'] ?></th>
                        <td><?= $category['nama_kategori'] ?></td>
                        <td>
                            <a href="<?= BASEURL ?>/admin/editkategori/<?= $category['id'] ?>" class="btn btn-warning btn-sm">Ubah</a>
                            <a href="<?= BASEURL ?>/admin/deletekategori/<?= $category['id'] ?>" class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>