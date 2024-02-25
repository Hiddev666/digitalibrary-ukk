<?php

class Main extends Controller
{

    public function index() {
        $buku = $this->getModel("Buku_model")->getLimit();
        $bukumodel = $this->getModel("Buku_model");
        $peminjaman = $this->getModel("Peminjaman_model");
        $koleksi = $this->getModel("Koleksi_model");
        $kategori = $this->getModel("Kategori_model")->getLimit();
        $carousels = $this->getModel("Carousel_model")->getAll();

        $this->render("main/index", [
            "carousels" => $carousels,
            "categories" => $kategori,
            "peminjaman" => $peminjaman,
            "koleksi" => $koleksi,
            "databuku" => $buku,
            "bukumodel" => $bukumodel,
            "title" => "DigitaLibrary",
            'action' => "allcatalog"
        ]);
    }

    public function test() {
        $this->render("main/test"); 
    }

}
