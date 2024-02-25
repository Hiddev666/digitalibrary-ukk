<div class="container p-3 ps-4">
    <div class="container card p-4">

        <h3>Ubah Buku</h3>
        <form method="POST" action="<?= BASEURL?>/admin/updatebuku" enctype="multipart/form-data">
            <div class="row">
                <div class="col">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" class="form-control" id="judul" name="judul" value="<?= $book['judul'] ?>">
                </div>
                <div class="col">
                    <label for="penulis" class="form-label">Penulis</label>
                    <input type="text" class="form-control" id="penulis" name="penulis" value="<?= $book['penulis'] ?>">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col">
                    <label for="penerbit" class="form-label">Penerbit</label>
                    <input type="text" class="form-control" id="penerbit" name="penerbit" value="<?= $book['penerbit'] ?>">
                </div>
                <div class="col">
                    <label for="tahunterbit" class="form-label">Tahun Terbit</label>
                    <input type="text" class="form-control" id="tahunterbit" name="tahunterbit" value="<?= $book['tahun_terbit'] ?>">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col">
                    <label for="penerbit" class="form-label">Kategori</label>
                    <select name="kategori" id="" class="form-select">
                        <option value="<?= $selectedcategory['id'] ?>"><?= $selectedcategory['nama_kategori'] ?></option>
                        <?php foreach ($categories as $category) { ?>
                            <option value="<?= $category['id'] ?>"><?= $category['nama_kategori'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col d-flex align-items-center gap-2">
                    <div class="card w-25">
                        <img src="http://<?= $book['image'] ?>" alt="" class="card-img-top">
                    </div>
                    <input type="file" class="form-control" id="image" name="image">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col">
                    <label for="stock" class="form-label">Stock</label>
                    <input type="number" class="form-control" id="stock" name="stock" value="<?= $book['stock'] ?>">
                </div>
                <div class="col">
                    
                </div>
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-primary" name="currentid" value="<?= $id ?>">Ubah</button>
            </div>
        </form>
        <a href="<?= BASEURL?>/admin" class="mt-2">
            <button class="btn btn-warning">Cancel</button>
        </a>
    </div>
</div>