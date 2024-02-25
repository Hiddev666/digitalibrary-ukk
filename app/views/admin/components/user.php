<div class="container p-3 ps-4">
    <div class="container card p-4">

        <h3>User</h3>

        <?php

        if (isset($_GET['pesan'])) {
            if ($_GET['pesan'] == 'storeberhasil') {
                echo "<div class='alert alert-info' role='alert'>Berhasil menambahkan user</div>";
            } elseif ($_GET['pesan'] == 'updateberhasil') {
                echo "<div class='alert alert-info' role='alert'>Berhasil mengubah user</div>";
            } elseif ($_GET['pesan'] == 'deleteberhasil') {
                echo "<div class='alert alert-info' role='alert'>Berhasil menghapus user</div>";
            }
        }

        ?>

        <div class="mt-3">
            <a href="<?= BASEURL ?>/admin/adduser">
                <button class="btn btn-primary">Tambah User +</button>
            </a>
        </div>

        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Lengkap</th>
                    <th scope="col">Email</th>
                    <th scope="col">Level</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($datauser as $user) {
                ?>
                    <tr>
                        <th scope="row"><?= $user['id'] ?></th>
                        <td><?= $user['nama_lengkap'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td><?php
                            if ($user['level'] == "1") { ?>
                                <?= "Admin" ?>
                        </td>
                        <td>
                        </td>
                    <?php } elseif ($user['level'] == "2") { ?>
                        <?= "Petugas" ?>
                        </td>
                        <td>
                            <a href="<?= BASEURL ?>/admin/edituser/<?= $user['id'] ?>" class="btn btn-warning btn-sm">Detail</a>
                            <a href="<?= BASEURL ?>/admin/deleteuser/<?= $user['id'] ?>" class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                    <?php } elseif ($user['level'] == "3") { ?>
                        <?= "Anggota" ?>
                        </td>
                        <td>
                            <a href="<?= BASEURL ?>/admin/edituser/<?= $user['id'] ?>" class="btn btn-warning btn-sm">Detail</a>
                            <a href="<?= BASEURL ?>/admin/deleteuser/<?= $user['id'] ?>" class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                    <?php } ?>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>