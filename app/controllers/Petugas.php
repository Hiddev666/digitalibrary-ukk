<?php

class Petugas extends Controller {

    public function __construct() {
        session_start();
        if(!isset($_SESSION["username"])) {
            header("Location: " . BASEURL . "/auth/login");
        } elseif($_SESSION["level"] != "2") {
            header("Location: " . BASEURL . "/petugas/login");
        }
    }

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

        $this->render("petugas/index", [
            "books" => $buku,
            "datapenulis" => $penulis,
            "datapenerbit" => $penerbit,
            "datatahunterbit" => $tahunterbit,
            "datakategori" => $kategori,
            "title" => "Buku | Petugas DigitaLibrary",
            'activePage' => "buku",
            'action' => "buku"
        ]);
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
 
         $this->render("petugas/index", [
             "datapeminjaman" => $peminjaman,
             "alert" => $alert,
             "title" => "Peminjaman | DigitaLibrary",
             'activePage' => "peminjaman",
             'action' => "peminjaman"
         ]);
     }
 
     public function addpeminjaman()
     {
         $this->render("petugas/index", [
             "title" => "Add Peminjaman | DigitaLibrary",
             'activePage' => "peminjaman",
             'action' => "addpeminjaman"
         ]);
     }
 
     public function editpeminjaman($id)
     {
         $peminjaman = $this->getModel("Peminjaman_model")->getByIdEdit($id);
         $user = $this->getModel("User_model")->getById($peminjaman["id_user"]);
 
         $this->render("petugas/index", [
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
 
             header("Location: " . BASEURL . "/petugas/peminjaman");
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
 
             header("Location: " . BASEURL . "/petugas/peminjaman");
         } catch (Exception $e) {
             echo "" . $e->getMessage() . "";
         }
     }
 
     public function deletepeminjaman($id)
     {
         try {
             $peminjaman = $this->getModel("Peminjaman_model")->deletePeminjaman($id);
             header("Location: " . BASEURL . "/petugas/peminjaman");
         } catch (Exception $e) {
             echo "" . $e->getMessage() . "";
         }
     }
 
     public function kembalikan($id)
     {
         try {
             $peminjaman = $this->getModel("Peminjaman_model")->updateStatus("Dikembalikan", $id);
             header("Location: " . BASEURL . "/petugas/peminjaman");
         } catch (Exception $e) {
             echo "" . $e->getMessage() . "";
         }
     }
 
     public function accept($id)
     {
         try {
             $peminjaman = $this->getModel("Peminjaman_model")->updateStatus("Dipinjam", $id);
             header("Location: " . BASEURL . "/petugas/peminjaman");
         } catch (Exception $e) {
             echo "" . $e->getMessage() . "";
         }
     }
 
     public function pinjamkan($id)
     {
         try {
             $peminjaman = $this->getModel("Peminjaman_model")->updateStatus("Pending", $id);
             header("Location: " . BASEURL . "/petugas/peminjaman");
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
 
}