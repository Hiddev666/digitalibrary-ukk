<div class="container p-3 ps-4">
    <div class="container card p-4">

        <h3>Ubah User</h3>
        <?php
        if (isset($_GET['err'])) {
            if ($_GET['err'] == "passempty") {
                echo "<div class='alert alert-danger' role='alert'>Password tidak boleh kosong!</div>";
            }
        }

        ?>
        <form method="POST" action="<?= BASEURL?>/admin/updateuser">
            <div class="row">
                <div class="col">
                    <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?= $user['nama_lengkap'] ?>">
                </div>
                <div class="col">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?= $user['username'] ?>">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col">
                    <label for="password" class="form-label">Password</label>
                    <input type="text" class="form-control" id="password" name="password">
                </div>
                <div class="col">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="<?= $user['email'] ?>">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col">
                    <label for="penerbit" class="form-label">Level</label>
                    <select name="level" id="" class="form-select">
                        <option value="<?= $user['level'] ?>"><?php
                                                                        if ($user['level'] == "1") {
                                                                            echo "Admin";
                                                                        } elseif ($user['level'] == "2") {
                                                                            echo "Petugas";
                                                                        } elseif ($user['level'] == "3") {
                                                                            echo "Anggota";
                                                                        }
                                                                        ?></option>
                        <option value="1">Admin</option>
                        <option value="2">Petugas</option>
                        <option value="3">Anggota</option>
                    </select>
                </div>
                <div class="col">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $user['alamat'] ?>">
                </div>
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-primary" name="currentid" value="<?= $user['id'] ?>">Ubah</button>
            </div>
        </form>
        <a href="<?= BASEURL?>/admin/user" class="mt-2">
            <button class="btn btn-warning">Cancel</button>
        </a>
    </div>
</div>