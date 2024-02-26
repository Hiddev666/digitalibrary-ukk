<div class="container p-3 ps-4">
    <div class="container card p-4">

        <h3>Buku</h3>

        <div class="d-flex gap-2">
            <form action="" class="d-flex gap-1 mt-3 w-100" method="POST">
                <input type="text" class="form-control" placeholder="Cari Judul Buku" name="keyword">
                <button type="submit" class="btn btn-warning" name="startsearch">Cari</button>
            </form>

            <div class="dropdown mt-3">
                <button class="btn btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Filter
                </button>
                <ul class="dropdown-menu mt-2 p-3" style="width: 100vh;">
                    <h5>Filter</h5>
                    <form action="" method="POST">
                        <div class="row mt-3">
                            <div class="col">
                                <select name="penulis" id="" class="form-select" name="penulis">
                                    <option value="">Penulis</option>
                                    <?php foreach ($datapenulis as $penulis) : ?>
                                        <option value="<?= $penulis["penulis"] ?>"><?= $penulis["penulis"] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="col">
                                <select name="penerbit" id="" class="form-select" name="penerbit">
                                    <option value="">Penerbit</option>
                                    <?php foreach ($datapenerbit as $penerbit) : ?>
                                        <option value="<?= $penerbit["penerbit"] ?>"><?= $penerbit["penerbit"] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <select name="tahunterbit" id="" class="form-select" name="tahunterbit">
                                    <option value="">Tahun Terbit</option>
                                    <?php foreach ($datatahunterbit as $tahunterbit) : ?>
                                        <option value="<?= $tahunterbit["tahun_terbit"] ?>"><?= $tahunterbit["tahun_terbit"] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="col">
                                <select name="kategori" id="" class="form-select" name="kategori">
                                    <option value="">Kategori</option>
                                    <?php foreach ($datakategori as $kategori) : ?>
                                        <option value="<?= $kategori["nama_kategori"] ?>"><?= $kategori["nama_kategori"] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col"></div>
                            <div class="col d-flex justify-content-end gap-2">
                                <button type="submit" class="btn btn-warning" name="startfilter">Cari</button>
                            </div>
                        </div>
                    </form>
                </ul>
            </div>

        </div>

        <script src="<?= BASEURL ?>/js/filterpopup.js"></script>

        <table class="table table-striped mt-2">
            <thead>
                <tr>
                    <th scope="col">Kode</th>
                    <th scope="col">Cover</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Penulis</th>
                    <th scope="col">Penerbit</th>
                    <th scope="col" class="text-center">Tahun Terbit</th>
                    <th scope="col" class="text-center">Stock</th>
                    <th scope="col">Kategori</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($books as $book) {
                ?>
                    <tr>
                        <th scope="book"><?= $book['id'] ?></th>
                        <td>
                            <img src="<?= $book['image'] ?>" alt="" style="width: 100px;" class="rounded">

                        </td>
                        <td><?= $book['judul'] ?></td>
                        <td><?= $book['penulis'] ?></td>
                        <td><?= $book['penerbit'] ?></td>
                        <td class="text-center"><?= $book['tahun_terbit'] ?></td>
                        <td class="text-center"><?= $book['stock'] ?></td>
                        <td><?= $book['nama_kategori'] ?></td>                    
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>