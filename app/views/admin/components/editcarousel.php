<div class="container p-3 ps-4">
    <div class="container card p-4">

        <h3>Ubah Buku</h3>
        <form method="POST" action="<?= BASEURL ?>/admin/updatecarousel" enctype="multipart/form-data">
            <div class="card w-50">
                <img src="http://<?= $carousel['image'] ?>" alt="" class="card-img-top">
            </div>
            <input type="file" class="form-control" id="image" name="image" class="mt-2">
            <div class="mt-3">
                <button type="submit" class="btn btn-primary" name="currentid" value="<?= $id ?>">Ubah</button>
            </div>
        </form>
        <a href="<?= BASEURL ?>/admin/carousel" class="mt-2">
            <button class="btn btn-warning">Cancel</button>
        </a>
    </div>
</div>