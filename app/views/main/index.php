<?php include "config/database.php"; ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>


    <!-- Navbar -->
    <nav class="navbar">
        <div class="container-fluid p-2">
            <div class="ms-4 d-flex align-items-center">
                <img src="img/book.svg" alt="" width="40px">
                <h5 class="m-0 ms-2">DigitaLibrary</h5>
            </div>
            <div class="d-flex align-items-center ">
                <div class="me-4 d-flex align-items-center">
                    <a href="<?= BASEURL ?>/auth/register" class="link-offset-2 link-underline link-underline-opacity-0 text-dark">Sign Up</a>
                    <p class="m-0 ms-3 me-3">|</p>
                    <a href="<?= BASEURL ?>/auth/login" class="btn btn-warning">Sign In</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Navbar -->

    <div class="container-fluid">

        <div id="carouselExampleAutoplaying" class="carousel slide rounded" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php foreach ($carousels as $carousel) : ?>
                    <div class="carousel-item active w-100" data-bs-interval="3000">
                        <img src="<?= $carousel["image"]?>" class="d-block w-100 img-fluid" alt="...">
                    </div>
                <?php endforeach ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <div class="container mt-5 mb-3">
        <h2 class="text-center m-0">Lihat <span class="text-warning">Koleksi Kami</span></h2>
        <p class="text-center m-0">Koleksi buku-buku terbaik dari berbagai kategori!</p>
    </div>

    <div class="container-fluid d-flex justify-content-center w-100 mb-3">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <?php
                foreach ($databuku as $book) { ?>
                    <div class="col mt-5">
                        <?php
                        session_start();
                        $idUser = $_SESSION['user-id'];
                        $bukuId = $book['id'];

                        $checkPinjam = $peminjaman->checkPinjam($idUser, $bukuId);
                        if (count($checkPinjam) != 0) {
                            echo "<button class='btn btn-success position-absolute z-3'>" . count($checkPinjam) . " Buku Dipinjam</button>";
                        }
                        ?>
                        <a href="<?= BASEURL ?>/auth/login" class="link-offset-2 link-underline link-underline-opacity-0 text-dark">
                            <div class="card h-100" style="width: 16rem;">
                                <img src="<?= $book['image'] ?>" class="card-img-top object-fit-cover" alt="..." style="width: 100%; height: 300px;">
                                <div class="card-body d-flex flex-column justify-content-between">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div class="">
                                            <h5 class="card-title"><?= $book['judul'] ?></h5>
                                            <div class="d-flex gap-1 align-items-center">
                                                <img src="<?= BASEURL ?>/img/star-svgrepo-com.svg" alt="" style="width: 25px;">
                                                <p class="m-0">
                                                    <?php
                                                    $buku = new Buku_model();
                                                    $getRating = $buku->getRating($book["id"]);
                                                    if ($getRating['rate'] != NULL) {
                                                        echo substr($getRating['rate'], 0, 3);
                                                    } else {
                                                        echo "-";
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                            <div class="d-flex gap-1 align-items-center mt-1">
                                                <img src="<?= BASEURL ?>/img/book-closed-svgrepo-com.svg" alt="" style="width: 20px;">
                                                <p class="m-0">
                                                    <?php
                                                    $buku = new Buku_model();
                                                    $getRating = $buku->getStock($book["id"]);
                                                    if ($getRating['stock'] != NULL) {
                                                        echo substr($getRating['stock'], 0, 3);
                                                    } else {
                                                        echo "0";
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                        <a href="<?= BASEURL ?>/auth/login">
                                            <img src="<?= BASEURL ?>/img/save<?php
                                                                                $checkSaved = $koleksi->getKoleksi($idUser, $bukuId);
                                                                                if (count($checkSaved) != 0) {
                                                                                    echo "d";
                                                                                }
                                                                                ?>.svg" alt="" style="width: 18px;" class="">
                                        </a>
                                    </div>
                                    <div class="d-flex flex-column gap-1 mt-4 justify-content-end">
                                        <a href="<?= BASEURL ?>/auth/login" class="btn btn-warning w-100">Pinjam Sekarang</a>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>

    </div>

    <div class="container d-flex justify-content-center mt-4">
        <a href="login.php" class="btn btn-warning">Sign In Untuk Melihat Selengkapnya!</a>
    </div>

    <div class="container-fluid mt-5 mb-3 pt-5 pb-5" style="background-color: #EAEAEA;">
        <div class="container">
            <h2 class="text-center m-0">Berbagai Macam <span class="text-warning">Kategori</span></h2>
            <p class="text-center m-0">Hampir semua kategori-kategori buku tersedia disini!</p>
        </div>
        <div class="container-fluid d-flex justify-content-center w-100 mb-3">
            <div class="row d-flex justify-content-center">
                <?php
                foreach ($categories as $category) { ?>
                    <?php
                    $categoryID = $category['id'];
                    $totalCategories = $bukumodel->getTotalBukuByKategori($categoryID);
                    ?>
                    <div class="col mt-3">
                        <div class="card" style="width: 15rem;">
                            <div class="card-body d-flex flex-column justify-content-between">
                                <div>
                                    <h5 class="card-title"><?= $category['nama_kategori'] ?></h5>
                                    <h6 class="card-subtitle mb-2 text-body-secondary"><?= $totalCategories['total'] ?> Buku</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <div class="container-fluid d-flex align-items-center justify-content-between pt-3 pb-3">
        <div class="ms-3 d-flex align-items-center">
            <img src="img/book.svg" alt="" width="40px">
            <h5 class="m-0 ms-2">DigitaLibrary</h5>
            <p>©</p>
        </div>
        <p>UKK RPL 2024</p>
        <p class="me-3">© Copyright HIDDEV 2024</p>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>