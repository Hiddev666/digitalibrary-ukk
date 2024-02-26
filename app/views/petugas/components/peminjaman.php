<div class="container p-3 ps-4">
    <div class="container card p-4">

        <h3>Peminjaman</h3>

        <?php

        if (isset($_GET['pesan'])) {
            if ($_GET['pesan'] == 'storeberhasil') {
                echo "<div class='alert alert-info' role='alert'>Berhasil menambahkan peminjaman</div>";
            } elseif ($_GET['pesan'] == 'updateberhasil') {
                echo "<div class='alert alert-info' role='alert'>Berhasil mengubah peminjaman</div>";
            } elseif ($_GET['pesan'] == 'deleteberhasil') {
                echo "<div class='alert alert-info' role='alert'>Berhasil menghapus peminjaman</div>";
            }
        }

        ?>


        <div class="mt-3 d-flex align-items-center justify-content-between">
            <a href="<?= BASEURL ?>/petugas/addpeminjaman">
                <button class="btn btn-primary">Tambah Peminjaman +</button>
            </a>
            <div class="d-flex gap-2">
                <form action="" class="d-flex gap-2" method="post">

                    <div class="d-flex">
                        <input type="text" class="form-control" placeholder="Cari Nama Anggota" name="idanggota">
                    </div>
                    <div class="d-flex">
                            <input type="date" class="form-control" name="date">
                    </div>
                    <div class="d-flex align-items-center">
                        <input class="btn btn-warning" type="submit" value="Cari"/>
                    </div>

                </form>
            </div>
        </div>


        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Anggota</th>
                    <th scope="col">Buku</th>
                    <th scope="col">Peminjaman</th>
                    <th scope="col">Pengembalian</th>
                    <th scope="col" class="text-center">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($datapeminjaman as $peminjaman) {
                ?>
                    <tr>
                        <th scope="peminjaman"><?= $peminjaman['id'] ?></th>
                        <td><?= $peminjaman['nama_lengkap'] ?></td>
                        <td><?= $peminjaman['judul'] ?></td>
                        <td><?= $peminjaman['tgl_peminjaman'] ?></td>
                        <td><?= $peminjaman['tgl_pengembalian'] ?></td>
                        <td>
                            <p class="m-0 text-center p-1 rounded <?php
                                                                    if ($peminjaman['status_peminjaman'] == "Dipinjam") {
                                                                        echo "bg-primary text-light";
                                                                    } elseif ($peminjaman['status_peminjaman'] == "Pending") {
                                                                        echo "bg-warning text-light";
                                                                    } else {
                                                                        echo "bg-success text-light";
                                                                    }
                                                                    ?>">
                                <?= $peminjaman['status_peminjaman'] ?>
                            </p>
                        </td>
                        <td>
                            <div class="d-flex gap-1">
                                <a href="<?= BASEURL ?>/petugas/laporanpeminjaman/<?= $peminjaman['id'] ?>" class="btn btn-primary btn-sm">Laporan</a>
                                <a href="<?= BASEURL ?>/petugas/editpeminjaman/<?= $peminjaman['id'] ?>" class="btn btn-warning btn-sm">Ubah</a>
                                <a href="<?= BASEURL ?>/petugas/deletepeminjaman/<?= $peminjaman['id'] ?>" class="btn btn-danger btn-sm">Hapus</a>

                                <?php
                                if ($peminjaman['status_peminjaman'] == "Dipinjam") { ?>
                                    <a href="<?= BASEURL ?>/petugas/kembalikan/<?= $peminjaman['id'] ?>">
                                        <img src="<?= BASEURL ?>/img/accept-check-good-mark-ok-tick-svgrepo-com.svg" alt="" style="width: 28px;">
                                    </a>
                                <?php } elseif ($peminjaman['status_peminjaman'] == "Pending") { ?>
                                    <a href="<?= BASEURL ?>/petugas/accept/<?= $peminjaman['id'] ?>">
                                        <img src="<?= BASEURL ?>/img/accept-check-good-mark-ok-tick-svgrepo-com.svg" alt="" style="width: 28px;">
                                    </a>
                                <?php } else { ?>
                                    <a href="<?= BASEURL ?>/petugas/pinjamkan/<?= $peminjaman['id'] ?>">
                                        <img src="<?= BASEURL ?>/img/cross-mark-svgrepo-com.svg" alt="" style="width: 20px;">
                                    </a>
                                <?php } ?>


                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <p class="text-center">
            <?= $alert?>
        </p>
    </div>
</div>