<?php

class Admin extends Controller
{

    public function __construct()
    {
        session_start();
        if (!isset($_SESSION["username"])) {
            header("Location: " . BASEURL . "/auth/login");
        } elseif ($_SESSION["level"] != "1") {
            header("Location: " . BASEURL . "/auth/login");
        }
    }

    // Buku
    public function index()
    {      
        if(isset($_POST["startfilter"])) {
            $penulis = $_POST["penulis"];
            $penerbit = $_POST["penerbit"];
            $tahunterbit = $_POST["tahunterbit"];
            $kategori = $_POST["kategori"];

            $buku = $this->getModel("Buku_model")->filter($penulis, $penerbit, $tahunterbit, $kategori);
        } elseif (isset($_POST["startsearch"])) {
            $keyword = $_POST["keyword"];

            $buku = $this->getModel("Buku_model")->searchCatalog($keyword);
        } else {
            $buku = $this->getModel("Buku_model")->getAll();
        }

        $penulis = $this->getModel("Buku_model")->getAllPenulis();
        $penerbit = $this->getModel("Buku_model")->getAllPenerbit();
        $tahunterbit = $this->getModel("Buku_model")->getAllTahunTerbit();
        $kategori = $this->getModel("Kategori_model")->getAll();

        $this->render("admin/index", [
            "books" => $buku,
            "datapenulis" => $penulis,
            "datapenerbit" => $penerbit,
            "datatahunterbit" => $tahunterbit,
            "datakategori" => $kategori,
            "title" => "Buku | DigitaLibrary",
            'activePage' => "buku",
            'action' => "buku"
        ]);
    }

    public function addbuku()
    {

        $kategori = $this->getModel("Kategori_model")->getAll();

        $this->render("admin/index", [
            "categories" => $kategori,
            "title" => "Add Buku | DigitaLibrary",
            'activePage' => "buku",
            'action' => "addbuku"
        ]);
    }

    public function storebuku()
    {
        try {
            $targetDirectory = "/opt/lampp/htdocs/digitalibrary/public/img/uploaded/";
            $allowedFileTypes = array("jpg", "jpeg", "png", "gif");
            $maxFileSize = 500000;

            if (isset($_FILES['image'])) {
                $targetFile = $targetDirectory . basename($_FILES["image"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

                if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                    $image = BASEURL . "/img/uploaded/" . $_FILES["image"]["name"];
                    $judul = $_POST['judul'];
                    $penulis = $_POST['penulis'];
                    $penerbit = $_POST['penerbit'];
                    $tahunterbit = $_POST['tahunterbit'];
                    $stock = $_POST['stock'];

                    $buku = $this->getModel("Buku_model")->storeBuku($image, $judul, $penulis, $penerbit, $tahunterbit, $stock);

                    $lastBook = $this->getModel("Buku_model")->getLastBook();

                    try {
                        $storeKategoriRelasi = $this->getModel("Kategori_model")->storeKategoriRelasi($lastBook['id'], $_POST['kategori']);
                    } catch (Exception $e) {
                        echo "" . $e->getMessage() . "";
                    }

                    header("Location: " . BASEURL . "/admin");
                } else {
                    echo "gagal";
                }
            }
        } catch (Exception $e) {
            echo "" . $e->getMessage() . "";
        }

        header("Location: " . BASEURL . "/admin");
    }

    public function editbuku($id)
    {

        $buku = $this->getModel("Buku_model")->getById($id);
        $kategori = $this->getModel("Kategori_model")->getAll();
        $selectedKategori = $this->getModel("Buku_model")->getSelectedKategori($id);

        $this->render("admin/index", [
            'id' => $id,
            "book" => $buku,
            "categories" => $kategori,
            'selectedcategory' => $selectedKategori,
            "title" => "Edit Buku | DigitaLibrary",
            'activePage' => "buku",
            'action' => "editbuku"
        ]);
    }

    public function updatebuku()
    {
        if ($_FILES['image']['name'] != "") {
            $targetDirectory = "/opt/lampp/htdocs/digitalibrary/public/img/uploaded/";
            $allowedFileTypes = array("jpg", "jpeg", "png", "gif");
            $maxFileSize = 500000;
            $targetFile = $targetDirectory . basename($_FILES["image"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                $image = BASEURL . "/img/uploaded/" . $_FILES["image"]["name"];
                $judul = $_POST['judul'];
                $penulis = $_POST['penulis'];
                $penerbit = $_POST['penerbit'];
                $tahunterbit = $_POST['tahunterbit'];
                $stock = $_POST['stock'];
                $id = $_POST['currentid'];

                $buku = $this->getModel("Buku_model")->updateBuku($image, $judul, $penulis, $penerbit, $tahunterbit, $stock, $id);

                $lastBook = $this->getModel("Buku_model")->getLastBook();

                try {
                    $updateKategoriRelasi = $this->getModel("Kategori_model")->updateKategoriRelasi($lastBook['id'], $_POST['kategori']);
                } catch (Exception $e) {
                    echo "" . $e->getMessage() . "";
                }

                header("Location: " . BASEURL . "/admin");
            } else {
                echo "gagal";
            }
        } else {
            $judul = $_POST['judul'];
            $penulis = $_POST['penulis'];
            $penerbit = $_POST['penerbit'];
            $tahunterbit = $_POST['tahunterbit'];
            $stock = $_POST['stock'];
            $id = $_POST['currentid'];

            $buku = $this->getModel("Buku_model")->updateBukuWithoutImage($judul, $penulis, $penerbit, $tahunterbit, $stock, $id);

            $lastBook = $this->getModel("Buku_model")->getLastBook();

            try {
                $updateKategoriRelasi = $this->getModel("Kategori_model")->updateKategoriRelasi($lastBook['id'], $_POST['kategori']);
            } catch (Exception $e) {
                echo "" . $e->getMessage() . "";
            }

            header("Location: " . BASEURL . "/admin");
        }
    }

    public function deletebuku($id)
    {
        try {
            $deleteKategoriRelasi = $this->getModel("Kategori_model")->deleteKategoriRelasi($id);
            $deleteBuku = $this->getModel("Buku_model")->deleteBuku($id);
            header("Location: " . BASEURL . "/admin");
        } catch (Exception $e) {
            echo "" . $e->getMessage() . "";
        }
    }

    // Kategori
    public function kategori()
    {
        if(isset($_POST["startsearch"])) {
            $kategori = $this->getModel("Kategori_model")->search($_POST["keyword"]);
        } else {
            $kategori = $this->getModel("Kategori_model")->getAll();
        }

        $this->render("admin/index", [
            "categories" => $kategori,
            "title" => "Kategori | DigitaLibrary",
            'activePage' => "kategori",
            'action' => "kategori"
        ]);
    }

    public function addkategori()
    {
        $this->render("admin/index", [
            "title" => "Kategori | DigitaLibrary",
            'activePage' => "kategori",
            'action' => "addkategori"
        ]);
    }

    public function editkategori($id)
    {
        $kategori = $this->getModel("Kategori_model")->getById($id);

        $this->render("admin/index", [
            "id" => $id,
            "category" => $kategori,
            "title" => "Kategori | DigitaLibrary",
            'activePage' => "kategori",
            'action' => "editkategori"
        ]);
    }

    public function storeKategori()
    {
        try {
            $namakategori = $_POST['namakategori'];
            $kategori = $this->getModel("Kategori_model")->storeKategori($namakategori);
            header("Location: " . BASEURL . "/admin/kategori");
        } catch (Exception $e) {
            echo "" . $e->getMessage() . "";
        }
    }

    public function updatekategori()
    {
        try {
            $namakategori = $_POST['namakategori'];
            $id = $_POST['currentid'];
            $kategori = $this->getModel("Kategori_model")->updateKategori($namakategori, $id);
            header("Location: " . BASEURL . "/admin/kategori");
        } catch (Exception $e) {
            echo "" . $e->getMessage() . "";
        }
    }

    public function deletekategori($id)
    {
        try {
            $kategori = $this->getModel("Kategori_model")->deleteKategori($id);
            header("Location: " . BASEURL . "/admin/kategori");
        } catch (Exception $e) {
            echo "" . $e->getMessage() . "";
        }
    }

    // Peminjaman
    public function peminjaman()
    {
        if(count($_POST) == 0) {
            $peminjaman = $this->getModel("Peminjaman_model")->getAll();
        } else {
            $peminjaman = $this->getModel("Peminjaman_model")->searchPeminjaman($_POST["idanggota"], $_POST["date"]);
            if(count($peminjaman) == 0) {
                $alert = "Peminjaman dengan Nama Anggota " . $_POST["idanggota"] . " dan Tanggal Peminjaman " . $_POST["date"] . " tidak ditemukan!";
            }
        }

        $this->render("admin/index", [
            "datapeminjaman" => $peminjaman,
            "alert" => $alert,
            "title" => "Peminjaman | DigitaLibrary",
            'activePage' => "peminjaman",
            'action' => "peminjaman"
        ]);
    }

    public function addpeminjaman()
    {
        $this->render("admin/index", [
            "title" => "Add Peminjaman | DigitaLibrary",
            'activePage' => "peminjaman",
            'action' => "addpeminjaman"
        ]);
    }

    public function editpeminjaman($id)
    {
        $peminjaman = $this->getModel("Peminjaman_model")->getByIdEdit($id);
        $user = $this->getModel("User_model")->getById($peminjaman["id_user"]);

         $this->render("admin/index", [
            "id" => $id,
            "username" => $user["username"],
            "peminjaman" => $peminjaman,
            "title" => "Add Peminjaman | DigitaLibrary",
            'activePage' => "peminjaman",
            'action' => "editpeminjaman"
        ]);
    }

    public function storepeminjaman()
    {
        $username = $_POST['username'];
        $user = $this->getModel("User_model")->getByUsername($username);
        try {
            $userid = $user['id'];
            $bukuid = $_POST['id_buku'];
            $tglpeminjaman = $_POST['tgl_peminjaman'];
            $tglpengembalian = $_POST['tgl_pengembalian'];

            $user = $this->getModel("Peminjaman_model")->storePeminjaman($userid, $bukuid, $tglpeminjaman, $tglpengembalian);

            header("Location: " . BASEURL . "/admin/peminjaman");
        } catch (Exception $e) {
            echo "" . $e->getMessage() . "";
        }
    }

    public function updatepeminjaman()
    {
        $username = $_POST['username'];
        $user = $this->getModel("User_model")->getByUsername($username);
        try {
            $userid = $user['id'];
            $bukuid = $_POST['id_buku'];
            $tglpeminjaman = $_POST['tgl_peminjaman'];
            $tglpengembalian = $_POST['tgl_pengembalian'];
            $id = $_POST['currentid'];

            $user = $this->getModel("Peminjaman_model")->updatePeminjaman($userid, $bukuid, $tglpeminjaman, $tglpengembalian, $id);

            header("Location: " . BASEURL . "/admin/peminjaman");
        } catch (Exception $e) {
            echo "" . $e->getMessage() . "";
        }
    }

    public function deletepeminjaman($id)
    {
        try {
            $peminjaman = $this->getModel("Peminjaman_model")->deletePeminjaman($id);
            header("Location: " . BASEURL . "/admin/peminjaman");
        } catch (Exception $e) {
            echo "" . $e->getMessage() . "";
        }
    }

    public function kembalikan($id)
    {
        try {
            $peminjaman = $this->getModel("Peminjaman_model")->updateStatus("Dikembalikan", $id);
            header("Location: " . BASEURL . "/admin/peminjaman");
        } catch (Exception $e) {
            echo "" . $e->getMessage() . "";
        }
    }

    public function accept($id)
    {
        try {
            $peminjaman = $this->getModel("Peminjaman_model")->updateStatus("Dipinjam", $id);
            header("Location: " . BASEURL . "/admin/peminjaman");
        } catch (Exception $e) {
            echo "" . $e->getMessage() . "";
        }
    }

    public function pinjamkan($id)
    {
        try {
            $peminjaman = $this->getModel("Peminjaman_model")->updateStatus("Pending", $id);
            header("Location: " . BASEURL . "/admin/peminjaman");
        } catch (Exception $e) {
            echo "" . $e->getMessage() . "";
        }
    }

    public function laporanpeminjaman($id)
    {
        $peminjaman = $this->getModel("Peminjaman_model")->getByIdEdit($id);

        $pdf = new FPDF();

        $pdf->SetMargins(2, 6, 2);
        $pdf->SetTopMargin(18);
        $pdf->AddPage();

        $pdf->SetFont('Courier', 'B', 24);
        $pdf->Cell(10, 5, '', 0, 0);
        $pdf->Cell(30, 5, 'DIGITALIBRARY', 0, 1);
        $pdf->SetFont('Courier', '', 13);
        $pdf->Cell(10, 40, '', 10, 0);
        $pdf->Cell(70, 10, 'Laporan Peminjaman', 0, 1);


        $pdf->SetFont('Courier', 'B', 12);
        $pdf->Cell(30, 3, '', 10, 1);
        $pdf->Cell(10, 10, '', 10, 0);
        $pdf->Cell(40, 10, 'ID Peminjaman', 0, 0);
        $pdf->SetFont('Courier', '', 12);
        $pdf->Cell(40, 10, ": " . $peminjaman['id'], 0, 1);

        $pdf->SetFont('Courier', 'B', 12);
        $pdf->Cell(10, 10, '', 10, 0);
        $pdf->Cell(40, 10, 'Nama Peminjam', 0, 0);
        $pdf->SetFont('Courier', '', 12);
        $pdf->Cell(40, 10, ": " . $peminjaman['nama_lengkap'], 0, 1);

        $pdf->SetFont('Courier', 'B', 12);
        $pdf->Cell(10, 10, '', 10, 0);
        $pdf->Cell(35, 10, 'Judul Buku', 0, 0);
        $pdf->SetFont('Courier', '', 12);
        $pdf->Cell(35, 10, ": " . $peminjaman['judul'], 0, 1);

        $pdf->SetFont('Courier', 'B', 12);
        $pdf->Cell(10, 10, '', 10, 0);
        $pdf->Cell(35, 10, 'Peminjaman', 0, 0);
        $pdf->SetFont('Courier', '', 12);
        $pdf->Cell(35, 10, ": " . $peminjaman['tgl_peminjaman'], 0, 1);

        $pdf->SetFont('Courier', 'B', 12);
        $pdf->Cell(10, 10, '', 10, 0);
        $pdf->Cell(35, 10, 'Pengembalian', 0, 0);
        $pdf->SetFont('Courier', '', 12);
        $pdf->Cell(35, 10, ": " . $peminjaman['tgl_pengembalian'], 0, 1);
        $pdf->Output();
    }

    // User
    public function user()
    {
        $user = $this->getModel("User_model")->getAll();

        $this->render("admin/index", [
            "datauser" => $user,
            "title" => "User | DigitaLibrary",
            'activePage' => "user",
            'action' => "user"
        ]);
    }

    public function adduser()
    {
        $this->render("admin/index", [
            "title" => "Add User | DigitaLibrary",
            'activePage' => "user",
            'action' => "adduser"
        ]);
    }

    public function edituser($id)
    {
        $user = $this->getModel("User_model")->getById($id);

        $this->render("admin/index", [
            "user" => $user,
            "title" => "Add User | DigitaLibrary",
            'activePage' => "user",
            'action' => "edituser"
        ]);
    }

    public function storeuser()
    {
        try {
            $username = $_POST['username'];
            $password = md5($_POST['password']);
            $email = $_POST['email'];
            $namalengkap = $_POST['nama_lengkap'];
            $alamat = $_POST['alamat'];
            $level = $_POST['level'];

            $user = $this->getModel("User_model")->storeUser($username, $password, $email, $namalengkap, $alamat, $level);

            header("Location: " . BASEURL . "/admin/user");
        } catch (Exception $e) {
            echo "" . $e->getMessage() . "";
        }
    }

    public function updateuser()
    {
        if (empty($_POST['password'])) {
            $currentid = $_POST['currentid'];
            header("Location: " . BASEURL . "/admin/edituser/$currentid?err=passempty");
        } else {
            try {
                $username = $_POST['username'];
                $password = md5($_POST['password']);
                $email = $_POST['email'];
                $namalengkap = $_POST['nama_lengkap'];
                $alamat = $_POST['alamat'];
                $level = $_POST['level'];
                $id = $_POST['currentid'];

                $user = $this->getModel("User_model")->updateUser($username, $password, $email, $namalengkap, $alamat, $level, $id);

                header("Location: " . BASEURL . "/admin/user");
            } catch (Exception $e) {
                echo "" . $e->getMessage() . "";
            }
        }
    }

    public function deleteuser($id)
    {
        try {
            $user = $this->getModel("User_model")->deleteUser($id);
            header("Location: " . BASEURL . "/admin/user");
        } catch (Exception $e) {
            echo "" . $e->getMessage() . "";
        }
    }

    // Carousel
    public function carousel()
    {
        $carousels = $this->getModel("Carousel_model")->getAll();

        $this->render("admin/index", [
            "carousels" => $carousels,
            "title" => "Carousel | DigitaLibrary",
            'activePage' => "carousel",
            'action' => "carousel"
        ]);
    }

    public function addcarousel()
    {
        $this->render("admin/index", [
            "title" => "Carousel | DigitaLibrary",
            'activePage' => "carousel",
            'action' => "addcarousel"
        ]);
    }

    public function storecarousel()
    {
        try {
            $targetDirectory = "/opt/lampp/htdocs/digitalibrary/public/img/carousel/";
            $allowedFileTypes = array("jpg", "jpeg", "png", "gif");
            $maxFileSize = 500000;

            if (isset($_FILES['image'])) {
                $targetFile = $targetDirectory . basename($_FILES["image"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

                if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                    $image = BASEURL . "/img/carousel/" . $_FILES["image"]["name"];

                    $carousel = $this->getModel("Carousel_model")->storeCarousel($image);

                    header("Location: " . BASEURL . "/admin/carousel");
                } else {
                    echo "gagal";
                }
            }
        } catch (Exception $e) {
            echo "" . $e->getMessage() . "";
        }

        header("Location: " . BASEURL . "/admin/carousel");
    }

    public function editcarousel($id)
    {

        $carousel = $this->getModel("Carousel_model")->getById($id);


        $this->render("admin/index", [
            'id' => $id,
            "carousel" => $carousel,
            "title" => "Edit Carousel | DigitaLibrary",
            'activePage' => "carousel",
            'action' => "editcarousel"
        ]);
    }

    public function updatecarousel()
    {
        if ($_FILES['image']['name'] != "") {
            $targetDirectory = "/opt/lampp/htdocs/digitalibrary/public/img/carousel/";
            $allowedFileTypes = array("jpg", "jpeg", "png", "gif");
            $maxFileSize = 500000;
            $targetFile = $targetDirectory . basename($_FILES["image"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                $id = $_POST['currentid'];
                $image = BASEURL . "/img/carousel/" . $_FILES["image"]["name"];

                $carousel = $this->getModel("Carousel_model")->updateCarousel($id, $image);

                header("Location: " . BASEURL . "/admin/carousel");
            } else {
                echo "gagal";
            }
        }
    }

    public function deletecarousel($id)
    {
        try {
            $carousel = $this->getModel("Carousel_model")->deleteCarousel($id);
            header("Location: " . BASEURL . "/admin/carousel");
        } catch (Exception $e) {
            echo "" . $e->getMessage() . "";
        }
    }
}
