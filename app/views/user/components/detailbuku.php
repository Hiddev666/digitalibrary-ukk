<div class="container mt-5 d-flex">
    <div class='d-flex position-absolute z-3 ms-2 mt-2 flex-column gap-1'>
        <?php
        session_start();
        $idUser = $_SESSION['user-id'];
        $bukuId = $buku['id'];

        $checkPinjam = $peminjaman->checkPinjam($idUser, $bukuId);
        $checkPending = $peminjaman->checkDetailPending($idUser, $bukuId);
        if (count($checkPending) != 0) {
            echo "<span class='badge text-bg-warning'>" . count($checkPending) . " Buku Dipending</span>";
        }

        if (count($checkPinjam) != 0) {
            echo "<span class='badge text-bg-primary'>" . count($checkPinjam) . " Buku Dipinjam</span>";
        }
        ?>
    </div>
    <img src="<?= $buku['image'] ?>" alt="" style="height: 70vh;" class="rounded border border-1">
    <div class="ms-5 " style="width: 30%;">
        <h1><?= $buku['judul'] ?></h1>
        <div class="mt-3">
            <div class="row w-100">
                <div class="col">
                    <p class="m-0">Penulis</p>
                    <h5 class="m-0"><?= $buku['penulis'] ?></h5>
                </div>
                <div class="col">
                    <p class="m-0 mt-3">Penerbit</p>
                    <h5 class="m-0"><?= $buku['penerbit'] ?></h5>
                </div>
            </div>
            <div class="row w-100">
                <div class="col">
                    <p class="m-0 mt-3">Tahun Terbit</p>
                    <h5 class="m-0"><?= $buku['tahun_terbit'] ?></h5>
                </div>
                <div class="col">
                    <p class="m-0 mt-3">Kategori</p>
                    <h5 class="m-0"><?= $buku['nama_kategori'] ?></h5>
                </div>
            </div>
            <div class="row w-100">
                <div class="col">
                    <p class="m-0 mt-3">Stock</p>
                    <h5 class="m-0"><?= $buku['stock'] ?></h5>
                </div>
            </div>
        </div>
        <div class="mt-4 d-flex gap-3">
            <a href="<?= BASEURL ?>/user" class="btn btn-warning">Cancel</a>
            <?php if ($buku["stock"] != "0") { ?>
                <a href="<?= BASEURL ?>/user/pinjam/<?= $buku['id'] ?>" class="btn btn-primary">Pinjam Sekarang</a>
            <?php } else { ?>
                <a href="" class="btn btn-warning w-100">Stock Kosong</a>
            <?php } ?>
        </div>
    </div>
    <div class="container w-25 ms-5">
        <div class="mt-2">
            <h6>Tambahkan Rating</h6>
            <form action="<?= BASEURL ?>/user/storeulasan" method="POST">
                <input type="hidden" name="id" id="" value="<?= $buku["id"] ?>">
                <select name="rating" class="form-control">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
        </div>
        <div class="mt-2">
            <h6>Tambahkan Ulasan</h6>
            <textarea name="ulasan" id="" cols="30" rows="10" class="form-control">

                </textarea>
        </div>
        <div class="mt-2">
            <input type="submit" name="" id="" class="btn btn-warning" value="Kirim">
        </div>
        </form>

        <div class="mt-5 d-flex flex-column gap-3 mb-5">
            <?php
            foreach ($dataulasan as $ulasan) {
            ?>
                <div class="card p-2">
                    <div class="d-flex justify-content-between">
                        <h6 class="m-0"><?= $ulasan['nama_lengkap'] ?></h6>
                        <div class="d-flex align-items-center">
                            <img src="<?= BASEURL ?>/img/star-svgrepo-com.svg" alt="" style="width: 25px;">
                            <p class="m-0 ms-1"><?= $ulasan['rating'] ?></p>
                        </div>
                    </div>
                    <p class="m-0 mt-2"><?= $ulasan['ulasan'] ?></p>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

</div>