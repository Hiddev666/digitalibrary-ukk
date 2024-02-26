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

    <div class="container d-flex align-items-center justify-content-between pt-4 mt-3">
        <div class="d-flex align-items-center justify-content-between" style="width: 18%;">
            <p>Collections</p>
            <p>Favorites</p>
        </div>
        <img src="<?= BASEURL ?>/img/digitaLibrary.svg" alt="">
        <div class="d-flex align-items-center justify-content-between">
            <div style="width: 40px; height: 40px; border-radius: 100%;" class="bg-success">

            </div>
            <div class="btn-group ms-3 d-flex align-items-center">
                <a type="button" class="dropdown-toggle link-offset-2 link-underline link-underline-opacity-0 text-dark" data-bs-toggle="dropdown" aria-expanded="false">
                    John Doe
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a href="<?= BASEURL ?>/auth/logout" class="dropdown-item" type="button">Sign Out</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container d-flex justify-content-center mt-5">
        <form class="d-flex w-50" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-success d-flex justify-content-center align-items-center" type="submit">
                <img src="<?= BASEURL ?>/img/search.svg">
            </button>
        </form>
    </div>

    <div class="container  mt-5">
        <h6>Most Populars</h6>
        <div class="container d-flex w-100 justify-content-center mt-4">
            <div class="row justify-content-center gap-5">

                <div class="col mb-5 d-flex align-items-center gap-3">
                    <img src="<?= BASEURL ?>/img/uploaded/bumi-manusia-edit.jpg" style="width: 140px; box-shadow: 0px 13px 0px 0px rgba(0,0,0,0.1);
-webkit-box-shadow: 0px 13px 0px 0px rgba(0,0,0,0.1);
-moz-box-shadow: 0px 13px 0px 0px rgba(0,0,0,0.1);">
                    <div class="d-flex flex-column">
                        <h4 class="m-0 text-truncate" style="max-width: 130px;">Catatahhhhhhggggggggggggggggggggggggggggggggn Juang</h4>
                        <p class="m-0">by Fiersa Besari</p>
                        <div class="d-flex gap-2 mt-1">
                            <img src="<?= BASEURL ?>/img/star-svgrepo-com.svg" style="width: 23px;">
                            <p class="m-0">4,5</p>
                        </div>
                        <a href="" class="btn btn-success mt-4">Pinjam</a>
                    </div>
                </div>


                <div class="col mb-5 d-flex align-items-center gap-3">
                    <img src="<?= BASEURL ?>/img/uploaded/bumi-manusia-edit.jpg" style="width: 140px; box-shadow: 0px 13px 0px 0px rgba(0,0,0,0.1);
-webkit-box-shadow: 0px 13px 0px 0px rgba(0,0,0,0.1);
-moz-box-shadow: 0px 13px 0px 0px rgba(0,0,0,0.1);">
                    <div class="d-flex flex-column">
                        <h4 class="m-0 text-truncate" style="max-width: 130px;">Catatahhhhhhggggggggggggggggggggggggggggggggn Juang</h4>
                        <p class="m-0">by Fiersa Besari</p>
                        <div class="d-flex gap-2 mt-1">
                            <img src="<?= BASEURL ?>/img/star-svgrepo-com.svg" style="width: 23px;">
                            <p class="m-0">4,5</p>
                        </div>
                        <a href="" class="btn btn-success mt-4">Pinjam</a>
                    </div>
                </div>


                <div class="col mb-5 d-flex align-items-center gap-3">
                    <img src="<?= BASEURL ?>/img/uploaded/bumi-manusia-edit.jpg" style="width: 140px; box-shadow: 0px 13px 0px 0px rgba(0,0,0,0.1);
-webkit-box-shadow: 0px 13px 0px 0px rgba(0,0,0,0.1);
-moz-box-shadow: 0px 13px 0px 0px rgba(0,0,0,0.1);">
                    <div class="d-flex flex-column">
                        <h4 class="m-0 text-truncate" style="max-width: 130px;">Catatahhhhhhggggggggggggggggggggggggggggggggn Juang</h4>
                        <p class="m-0">by Fiersa Besari</p>
                        <div class="d-flex gap-2 mt-1">
                            <img src="<?= BASEURL ?>/img/star-svgrepo-com.svg" style="width: 23px;">
                            <p class="m-0">4,5</p>
                        </div>
                        <a href="" class="btn btn-success mt-4">Pinjam</a>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <div class="container mt-4">
        <h6>All Books</h6>
        <div class="container d-flex w-100 justify-content-center mt-4">
            <div class="row justify-content-center gap-1">

                <div class="col mb-5 d-flex align-items-center gap-3">
                    <img src="<?= BASEURL ?>/img/uploaded/bumi-manusia-edit.jpg" style="width: 100px; box-shadow: 0px 13px 0px 0px rgba(0,0,0,0.1);
-webkit-box-shadow: 0px 13px 0px 0px rgba(0,0,0,0.1);
-moz-box-shadow: 0px 13px 0px 0px rgba(0,0,0,0.1);">
                    <div class="d-flex flex-column">
                        <h5 class="m-0 text-truncate" style="max-width: 130px;">Catatahhhhhhggggggggggggggggggggggggggggggggn Juang</h5>
                        <p class="m-0">by Fiersa Besari</p>
                        <div class="d-flex gap-2 mt-1">
                            <img src="<?= BASEURL ?>/img/star-svgrepo-com.svg" style="width: 23px;">
                            <p class="m-0">4,5</p>
                        </div>
                        <a href="" class="btn btn-success btn-sm mt-4">Pinjam</a>
                    </div>
                </div>

                <div class="col mb-5 d-flex align-items-center gap-3">
                    <img src="<?= BASEURL ?>/img/uploaded/bumi-manusia-edit.jpg" style="width: 100px; box-shadow: 0px 13px 0px 0px rgba(0,0,0,0.1);
-webkit-box-shadow: 0px 13px 0px 0px rgba(0,0,0,0.1);
-moz-box-shadow: 0px 13px 0px 0px rgba(0,0,0,0.1);">
                    <div class="d-flex flex-column">
                        <h5 class="m-0 text-truncate" style="max-width: 130px;">Catatahhhhhhggggggggggggggggggggggggggggggggn Juang</h5>
                        <p class="m-0">by Fiersa Besari</p>
                        <div class="d-flex gap-2 mt-1">
                            <img src="<?= BASEURL ?>/img/star-svgrepo-com.svg" style="width: 23px;">
                            <p class="m-0">4,5</p>
                        </div>
                        <a href="" class="btn btn-success btn-sm mt-4">Pinjam</a>
                    </div>
                </div>

                <div class="col mb-5 d-flex align-items-center gap-3">
                    <img src="<?= BASEURL ?>/img/uploaded/bumi-manusia-edit.jpg" style="width: 100px; box-shadow: 0px 13px 0px 0px rgba(0,0,0,0.1);
-webkit-box-shadow: 0px 13px 0px 0px rgba(0,0,0,0.1);
-moz-box-shadow: 0px 13px 0px 0px rgba(0,0,0,0.1);">
                    <div class="d-flex flex-column">
                        <h5 class="m-0 text-truncate" style="max-width: 130px;">Catatahhhhhhggggggggggggggggggggggggggggggggn Juang</h5>
                        <p class="m-0">by Fiersa Besari</p>
                        <div class="d-flex gap-2 mt-1">
                            <img src="<?= BASEURL ?>/img/star-svgrepo-com.svg" style="width: 23px;">
                            <p class="m-0">4,5</p>
                        </div>
                        <a href="" class="btn btn-success btn-sm mt-4">Pinjam</a>
                    </div>
                </div>

                <div class="col mb-5 d-flex align-items-center gap-3">
                    <img src="<?= BASEURL ?>/img/uploaded/bumi-manusia-edit.jpg" style="width: 100px; box-shadow: 0px 13px 0px 0px rgba(0,0,0,0.1);
-webkit-box-shadow: 0px 13px 0px 0px rgba(0,0,0,0.1);
-moz-box-shadow: 0px 13px 0px 0px rgba(0,0,0,0.1);">
                    <div class="d-flex flex-column">
                        <h5 class="m-0 text-truncate" style="max-width: 130px;">Catatahhhhhhggggggggggggggggggggggggggggggggn Juang</h5>
                        <p class="m-0">by Fiersa Besari</p>
                        <div class="d-flex gap-2 mt-1">
                            <img src="<?= BASEURL ?>/img/star-svgrepo-com.svg" style="width: 23px;">
                            <p class="m-0">4,5</p>
                        </div>
                        <a href="" class="btn btn-success btn-sm mt-4">Pinjam</a>
                    </div>
                </div>

            </div>
            <div class="row justify-content-center gap-1">

                <div class="col mb-5 d-flex align-items-center gap-3">
                    <img src="<?= BASEURL ?>/img/uploaded/bumi-manusia-edit.jpg" style="width: 100px; box-shadow: 0px 13px 0px 0px rgba(0,0,0,0.1);
-webkit-box-shadow: 0px 13px 0px 0px rgba(0,0,0,0.1);
-moz-box-shadow: 0px 13px 0px 0px rgba(0,0,0,0.1);">
                    <div class="d-flex flex-column">
                        <h5 class="m-0 text-truncate" style="max-width: 130px;">Catatahhhhhhggggggggggggggggggggggggggggggggn Juang</h5>
                        <p class="m-0">by Fiersa Besari</p>
                        <div class="d-flex gap-2 mt-1">
                            <img src="<?= BASEURL ?>/img/star-svgrepo-com.svg" style="width: 23px;">
                            <p class="m-0">4,5</p>
                        </div>
                        <a href="" class="btn btn-success btn-sm mt-4">Pinjam</a>
                    </div>
                </div>

                <div class="col mb-5 d-flex align-items-center gap-3">
                    <img src="<?= BASEURL ?>/img/uploaded/bumi-manusia-edit.jpg" style="width: 100px; box-shadow: 0px 13px 0px 0px rgba(0,0,0,0.1);
-webkit-box-shadow: 0px 13px 0px 0px rgba(0,0,0,0.1);
-moz-box-shadow: 0px 13px 0px 0px rgba(0,0,0,0.1);">
                    <div class="d-flex flex-column">
                        <h5 class="m-0 text-truncate" style="max-width: 130px;">Catatahhhhhhggggggggggggggggggggggggggggggggn Juang</h5>
                        <p class="m-0">by Fiersa Besari</p>
                        <div class="d-flex gap-2 mt-1">
                            <img src="<?= BASEURL ?>/img/star-svgrepo-com.svg" style="width: 23px;">
                            <p class="m-0">4,5</p>
                        </div>
                        <a href="" class="btn btn-success btn-sm mt-4">Pinjam</a>
                    </div>
                </div>

                <div class="col mb-5 d-flex align-items-center gap-3">
                    <img src="<?= BASEURL ?>/img/uploaded/bumi-manusia-edit.jpg" style="width: 100px; box-shadow: 0px 13px 0px 0px rgba(0,0,0,0.1);
-webkit-box-shadow: 0px 13px 0px 0px rgba(0,0,0,0.1);
-moz-box-shadow: 0px 13px 0px 0px rgba(0,0,0,0.1);">
                    <div class="d-flex flex-column">
                        <h5 class="m-0 text-truncate" style="max-width: 130px;">Catatahhhhhhggggggggggggggggggggggggggggggggn Juang</h5>
                        <p class="m-0">by Fiersa Besari</p>
                        <div class="d-flex gap-2 mt-1">
                            <img src="<?= BASEURL ?>/img/star-svgrepo-com.svg" style="width: 23px;">
                            <p class="m-0">4,5</p>
                        </div>
                        <a href="" class="btn btn-success btn-sm mt-4">Pinjam</a>
                    </div>
                </div>

                <div class="col mb-5 d-flex align-items-center gap-3">
                    <img src="<?= BASEURL ?>/img/uploaded/bumi-manusia-edit.jpg" style="width: 100px; box-shadow: 0px 13px 0px 0px rgba(0,0,0,0.1);
-webkit-box-shadow: 0px 13px 0px 0px rgba(0,0,0,0.1);
-moz-box-shadow: 0px 13px 0px 0px rgba(0,0,0,0.1);">
                    <div class="d-flex flex-column">
                        <h5 class="m-0 text-truncate" style="max-width: 130px;">Catatahhhhhhggggggggggggggggggggggggggggggggn Juang</h5>
                        <p class="m-0">by Fiersa Besari</p>
                        <div class="d-flex gap-2 mt-1">
                            <img src="<?= BASEURL ?>/img/star-svgrepo-com.svg" style="width: 23px;">
                            <p class="m-0">4,5</p>
                        </div>
                        <a href="" class="btn btn-success btn-sm mt-4">Pinjam</a>
                    </div>
                </div>

            </div>
            <div class="row justify-content-center gap-1">

                <div class="col mb-5 d-flex align-items-center gap-3">
                    <img src="<?= BASEURL ?>/img/uploaded/bumi-manusia-edit.jpg" style="width: 100px; box-shadow: 0px 13px 0px 0px rgba(0,0,0,0.1);
-webkit-box-shadow: 0px 13px 0px 0px rgba(0,0,0,0.1);
-moz-box-shadow: 0px 13px 0px 0px rgba(0,0,0,0.1);">
                    <div class="d-flex flex-column">
                        <h5 class="m-0 text-truncate" style="max-width: 130px;">Catatahhhhhhggggggggggggggggggggggggggggggggn Juang</h5>
                        <p class="m-0">by Fiersa Besari</p>
                        <div class="d-flex gap-2 mt-1">
                            <img src="<?= BASEURL ?>/img/star-svgrepo-com.svg" style="width: 23px;">
                            <p class="m-0">4,5</p>
                        </div>
                        <a href="" class="btn btn-success btn-sm mt-4">Pinjam</a>
                    </div>
                </div>

                <div class="col mb-5 d-flex align-items-center gap-3">
                    <img src="<?= BASEURL ?>/img/uploaded/bumi-manusia-edit.jpg" style="width: 100px; box-shadow: 0px 13px 0px 0px rgba(0,0,0,0.1);
-webkit-box-shadow: 0px 13px 0px 0px rgba(0,0,0,0.1);
-moz-box-shadow: 0px 13px 0px 0px rgba(0,0,0,0.1);">
                    <div class="d-flex flex-column">
                        <h5 class="m-0 text-truncate" style="max-width: 130px;">Catatahhhhhhggggggggggggggggggggggggggggggggn Juang</h5>
                        <p class="m-0">by Fiersa Besari</p>
                        <div class="d-flex gap-2 mt-1">
                            <img src="<?= BASEURL ?>/img/star-svgrepo-com.svg" style="width: 23px;">
                            <p class="m-0">4,5</p>
                        </div>
                        <a href="" class="btn btn-success btn-sm mt-4">Pinjam</a>
                    </div>
                </div>

                <div class="col mb-5 d-flex align-items-center gap-3">
                    <img src="<?= BASEURL ?>/img/uploaded/bumi-manusia-edit.jpg" style="width: 100px; box-shadow: 0px 13px 0px 0px rgba(0,0,0,0.1);
-webkit-box-shadow: 0px 13px 0px 0px rgba(0,0,0,0.1);
-moz-box-shadow: 0px 13px 0px 0px rgba(0,0,0,0.1);">
                    <div class="d-flex flex-column">
                        <h5 class="m-0 text-truncate" style="max-width: 130px;">Catatahhhhhhggggggggggggggggggggggggggggggggn Juang</h5>
                        <p class="m-0">by Fiersa Besari</p>
                        <div class="d-flex gap-2 mt-1">
                            <img src="<?= BASEURL ?>/img/star-svgrepo-com.svg" style="width: 23px;">
                            <p class="m-0">4,5</p>
                        </div>
                        <a href="" class="btn btn-success btn-sm mt-4">Pinjam</a>
                    </div>
                </div>

                <div class="col mb-5 d-flex align-items-center gap-3">
                    <img src="<?= BASEURL ?>/img/uploaded/bumi-manusia-edit.jpg" style="width: 100px; box-shadow: 0px 13px 0px 0px rgba(0,0,0,0.1);
-webkit-box-shadow: 0px 13px 0px 0px rgba(0,0,0,0.1);
-moz-box-shadow: 0px 13px 0px 0px rgba(0,0,0,0.1);">
                    <div class="d-flex flex-column">
                        <h5 class="m-0 text-truncate" style="max-width: 130px;">Catatahhhhhhggggggggggggggggggggggggggggggggn Juang</h5>
                        <p class="m-0">by Fiersa Besari</p>
                        <div class="d-flex gap-2 mt-1">
                            <img src="<?= BASEURL ?>/img/star-svgrepo-com.svg" style="width: 23px;">
                            <p class="m-0">4,5</p>
                        </div>
                        <a href="" class="btn btn-success btn-sm mt-4">Pinjam</a>
                    </div>
                </div>

            </div>
            <div class="row justify-content-center gap-1">

                <div class="col mb-5 d-flex align-items-center gap-3">
                    <img src="<?= BASEURL ?>/img/uploaded/bumi-manusia-edit.jpg" style="width: 100px; box-shadow: 0px 13px 0px 0px rgba(0,0,0,0.1);
-webkit-box-shadow: 0px 13px 0px 0px rgba(0,0,0,0.1);
-moz-box-shadow: 0px 13px 0px 0px rgba(0,0,0,0.1);">
                    <div class="d-flex flex-column">
                        <h5 class="m-0 text-truncate" style="max-width: 130px;">Catatahhhhhhggggggggggggggggggggggggggggggggn Juang</h5>
                        <p class="m-0">by Fiersa Besari</p>
                        <div class="d-flex gap-2 mt-1">
                            <img src="<?= BASEURL ?>/img/star-svgrepo-com.svg" style="width: 23px;">
                            <p class="m-0">4,5</p>
                        </div>
                        <a href="" class="btn btn-success btn-sm mt-4">Pinjam</a>
                    </div>
                </div>

                <div class="col mb-5 d-flex align-items-center gap-3">
                    <img src="<?= BASEURL ?>/img/uploaded/bumi-manusia-edit.jpg" style="width: 100px; box-shadow: 0px 13px 0px 0px rgba(0,0,0,0.1);
-webkit-box-shadow: 0px 13px 0px 0px rgba(0,0,0,0.1);
-moz-box-shadow: 0px 13px 0px 0px rgba(0,0,0,0.1);">
                    <div class="d-flex flex-column">
                        <h5 class="m-0 text-truncate" style="max-width: 130px;">Catatahhhhhhggggggggggggggggggggggggggggggggn Juang</h5>
                        <p class="m-0">by Fiersa Besari</p>
                        <div class="d-flex gap-2 mt-1">
                            <img src="<?= BASEURL ?>/img/star-svgrepo-com.svg" style="width: 23px;">
                            <p class="m-0">4,5</p>
                        </div>
                        <a href="" class="btn btn-success btn-sm mt-4">Pinjam</a>
                    </div>
                </div>

                <div class="col mb-5 d-flex align-items-center gap-3">
                    <img src="<?= BASEURL ?>/img/uploaded/bumi-manusia-edit.jpg" style="width: 100px; box-shadow: 0px 13px 0px 0px rgba(0,0,0,0.1);
-webkit-box-shadow: 0px 13px 0px 0px rgba(0,0,0,0.1);
-moz-box-shadow: 0px 13px 0px 0px rgba(0,0,0,0.1);">
                    <div class="d-flex flex-column">
                        <h5 class="m-0 text-truncate" style="max-width: 130px;">Catatahhhhhhggggggggggggggggggggggggggggggggn Juang</h5>
                        <p class="m-0">by Fiersa Besari</p>
                        <div class="d-flex gap-2 mt-1">
                            <img src="<?= BASEURL ?>/img/star-svgrepo-com.svg" style="width: 23px;">
                            <p class="m-0">4,5</p>
                        </div>
                        <a href="" class="btn btn-success btn-sm mt-4">Pinjam</a>
                    </div>
                </div>

                <div class="col mb-5 d-flex align-items-center gap-3">
                    <img src="<?= BASEURL ?>/img/uploaded/bumi-manusia-edit.jpg" style="width: 100px; box-shadow: 0px 13px 0px 0px rgba(0,0,0,0.1);
-webkit-box-shadow: 0px 13px 0px 0px rgba(0,0,0,0.1);
-moz-box-shadow: 0px 13px 0px 0px rgba(0,0,0,0.1);">
                    <div class="d-flex flex-column">
                        <h5 class="m-0 text-truncate" style="max-width: 130px;">Catatahhhhhhggggggggggggggggggggggggggggggggn Juang</h5>
                        <p class="m-0">by Fiersa Besari</p>
                        <div class="d-flex gap-2 mt-1">
                            <img src="<?= BASEURL ?>/img/star-svgrepo-com.svg" style="width: 23px;">
                            <p class="m-0">4,5</p>
                        </div>
                        <a href="" class="btn btn-success btn-sm mt-4">Pinjam</a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>