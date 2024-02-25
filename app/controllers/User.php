<?php

class User extends Controller
{

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
            $buku = $this->getModel("Buku_model")->getAllCatalog();
        }

        $penulis = $this->getModel("Buku_model")->getAllPenulis();
        $penerbit = $this->getModel("Buku_model")->getAllPenerbit();
        $tahunterbit = $this->getModel("Buku_model")->getAllTahunTerbit();
        $kategori = $this->getModel("Kategori_model")->getAll();

        $peminjaman = $this->getModel("Peminjaman_model");
        $koleksi = $this->getModel("Koleksi_model");

        $this->render("user/index", [
            "peminjaman" => $peminjaman,
            "datapenulis" => $penulis,
            "datapenerbit" => $penerbit,
            "datatahunterbit" => $tahunterbit,
            "datakategori" => $kategori,
            "koleksi" => $koleksi,
            "databuku" => $buku,
            "title" => "Home | DigitaLibrary",
            'action' => "allcatalog"
        ]);
    }

    public function detailbuku($id)
    {
        $peminjaman = $this->getModel("Peminjaman_model");
        $ulasan = $this->getModel("Ulasan_model")->getUlasanByIdBuku($id);
        $buku = $this->getModel("Buku_model")->getById($id);

        $this->render("user/index", [
            "peminjaman" => $peminjaman,
            "dataulasan" => $ulasan,
            "id" => $id,
            "buku" => $buku,
            "title" => "Home | DigitaLibrary",
            'action' => "detailbuku"
        ]);
    }

    public function pinjam($bukuid)
    {
        session_start();
        $userid = $_SESSION["user-id"];
        $tglpeminjaman = date("Y-m-d");
        $tglpengembalian = date("Y-m-d", strtotime("+3 days"));

        $peminjaman = $this->getModel("Peminjaman_model")->storePeminjaman($userid, $bukuid, $tglpeminjaman, $tglpengembalian);

        header("Location: " . BASEURL . "/user");
    }

    public function storeulasan()
    {
        session_start();
        $userid = $_SESSION["user-id"];
        $bukuid = $_POST["id"];
        $rating = $_POST["rating"];
        $ulasan = $_POST["ulasan"];

        $peminjaman = $this->getModel("Ulasan_model")->storeUlasan($userid, $bukuid, $ulasan, $rating);

        header("Location: " . BASEURL . "/user/detailbuku/$bukuid");
    }

    public function savekoleksi($id)
    {
        session_start();
        $userid = $_SESSION['user-id'];

        $koleksi = $this->getModel("Koleksi_model")->getKoleksi($userid, $id);

        if (count($koleksi) != 0) {
            try {
                $koleksi = $this->getModel("Koleksi_model")->deleteKoleksi($userid, $id);
                header("Location: " . BASEURL . "/user");
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        } else {
            try {
                $koleksi = $this->getModel("Koleksi_model")->storeKoleksi($userid, $id);
                header("Location: " . BASEURL . "/user");
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
    }

    public function koleksi()
    {

        session_start();
        $userid = $_SESSION["user-id"];

        $bukumodel = $this->getModel("Buku_model");
        $buku = $this->getModel("Koleksi_model")->getKoleksiPribadi($userid);
        $peminjaman = $this->getModel("Peminjaman_model");
        $koleksi = $this->getModel("Koleksi_model");

        $this->render("user/index", [
            "peminjaman" => $peminjaman,
            "koleksi" => $koleksi,
            "databuku" => $buku,
            "bukumodel" => $bukumodel,
            "title" => "Koleksi | DigitaLibrary",
            'action' => "allkoleksi"
        ]);
    }

    public function dipinjam()
    {


        session_start();
        $userid = $_SESSION["user-id"];

        if (isset($_POST["status"])) {
            if($_POST["status"] == "Dipinjam") {
                $buku = $this->getModel("Peminjaman_model")->getDipinjam($userid);
            } else {
                $buku = $this->getModel("Peminjaman_model")->getDipending($userid);
            }
        } else {
            $buku = $this->getModel("Peminjaman_model")->getById($userid);
        }

        $bukumodel = $this->getModel("Buku_model");

        $peminjaman = $this->getModel("Peminjaman_model");
        $koleksi = $this->getModel("Koleksi_model");

        $this->render("user/index", [
            "peminjaman" => $peminjaman,
            "koleksi" => $koleksi,
            "databuku" => $buku,
            "bukumodel" => $bukumodel,
            "title" => "Koleksi | DigitaLibrary",
            'action' => "alldipinjam"
        ]);
    }

    public function search()
    {
        $keyword = $_POST['keyword'];
        $buku = $this->getModel("Buku_model")->searchCatalog($keyword);
        $peminjaman = $this->getModel("Peminjaman_model");
        $koleksi = $this->getModel("Koleksi_model");

        $this->render("user/index", [
            "peminjaman" => $peminjaman,
            "koleksi" => $koleksi,
            "databuku" => $buku,
            "title" => "Home | DigitaLibrary",
            'action' => "allcatalog"
        ]);
    }
}
