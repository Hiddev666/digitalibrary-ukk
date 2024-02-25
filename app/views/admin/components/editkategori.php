<div class="container p-3 ps-4">
    <div class="container card p-4">

        <h3>Ubah Kategori</h3>
        <form method="POST" action="<?= BASEURL?>/admin/updatekategori">
            <label for="namakategori" class="form-label">Nama Kategori</label>
            <input type="text" class="form-control" id="namakategori" name="namakategori" value="<?= $category['nama_kategori']?>">
            <div class="mt-3">
                <button type="submit" class="btn btn-primary" name="currentid" value="<?= $id?>">Ubah</button>
            </div>
        </form>
        <a href="<?= BASEURL?>/admin/kategori" class="mt-2">
            <button class="btn btn-warning">Cancel</button>
        </a>
    </div>
</div>