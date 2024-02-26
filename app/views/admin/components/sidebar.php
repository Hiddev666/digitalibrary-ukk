<div class="w-25 position-fixed h-100 shadow-sm" style="background-color: white;">
    <div class="container p-3 ps-4 mt-3 d-flex align-items-center">
        <img src="<?= BASEURL?>/img/book.svg" alt="" width="40px">
        <div>
            <h5 class="m-0 ms-2">DigitaLibrary</h5>
            <p class="m-0 ms-2">Admin</p>
        </div>
    </div>
    <div class="container p-4">
        <div class="container p-3 mb-1 d-flex align-items-center rounded <?php
            if($activePage == "buku") {
                echo "bg-warning";
            }
        ?>">
            <a href="<?= BASEURL?>/admin/buku" class="link-offset-2 link-underline link-underline-opacity-0 link-dark">
                <p class="m-0">Buku</p>
            </a>
        </div>
        <div class="container p-3 mb-1 d-flex align-items-center rounded <?php
            if($activePage == "kategori") {
                echo "bg-warning";
            }
        ?>">
            <a href="<?= BASEURL?>/admin/kategori" class="link-offset-2 link-underline link-underline-opacity-0 link-dark">
                <p class="m-0">Kategori</p>
            </a>
        </div>
        <div class="container p-3 mb-1 d-flex align-items-center rounded <?php
            if($activePage == "peminjaman") {
                echo "bg-warning";
            }
        ?>">
            <a href="<?= BASEURL?>/admin/peminjaman" class="link-offset-2 link-underline link-underline-opacity-0 link-dark">
                <p class="m-0">Peminjaman</p>
            </a>
        </div>
        <div class="container p-3 mb-1 d-flex align-items-center rounded <?php
            if($activePage == "user") {
                echo "bg-warning";
            }
        ?>">
            <a href="<?= BASEURL?>/admin/user" class="link-offset-2 link-underline link-underline-opacity-0 link-dark">
                <p class="m-0">User</p>
            </a>
        </div>
        <div class="container p-3 mb-1 d-flex align-items-center rounded <?php
            if($activePage == "carousel") {
                echo "bg-warning";
            }
        ?>">
            <a href="<?= BASEURL?>/admin/carousel" class="link-offset-2 link-underline link-underline-opacity-0 link-dark">
                <p class="m-0">Carousel</p>
            </a>
        </div>
        <div class="container position-absolute bottom-0 w-75 d-flex align-items-center" style="height: 15vh;">
        <div class="container p-3 mb-1 d-flex align-items-center rounded">
            <a href="<?= BASEURL?>/auth/logout" class="link-offset-2 link-underline link-underline-opacity-0 d-flex align-items-center link-dark w-100 justify-space-between">
                <h6 class="m-0">@<?= $_SESSION['username']?></h6>
                <p class="ms-1 btn btn-warning btn-sm m-0">Logout</p>
            </a>
        </div>
        </div>
    </div>
</div>