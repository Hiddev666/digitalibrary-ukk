<div class="container p-3 ps-4">
    <div class="container card p-4">

        <h3>Tambah Carousel</h3>
        <form method="POST" action="<?= BASEURL ?>/admin/storecarousel" enctype="multipart/form-data">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="image">
            <div class="mt-3">
                <button type="submit" class="btn btn-primary" name="storebuku">Tambah</button>
            </div>
        </form>
        <a href="<?= BASEURL?>/admin/carousel" class="mt-2">
            <button class="btn btn-warning">Cancel</button>
        </a>
    </div>
</div>