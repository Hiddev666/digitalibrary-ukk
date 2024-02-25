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

    <div class="container d-flex align-items-center justify-content-between p-4">
        <div class="d-flex align-items-center justify-content-between" style="width: 18%;">
            <p>Collections</p>
            <p>Favorites</p>
        </div>
        <h4>Logo</h4>
        <div class="d-flex align-items-center justify-content-between">
            <div style="width: 40px; height: 40px; border-radius: 100%;" class="bg-danger">

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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>