<?php

class Kategori_model {

    private $dbh;
    private $stmt;

    public function __construct(){
        $dsn = "mysql:host=localhost;dbname=digitalibrary";

        try {
            $this->dbh = new PDO($dsn, "root", "");
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getAll() {
        $this->stmt = $this->dbh->prepare("CALL selectKategoriBuku()");
        $this->stmt->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getLimit() {
        $this->stmt = $this->dbh->prepare("SELECT * FROM kategoribuku LIMIT 4");
        $this->stmt->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getById($id) {
        $this->stmt = $this->dbh->prepare("SELECT * FROM kategoribuku WHERE id=:id;");
        $this->stmt->execute([
            "id" => $id
        ]);
        return $this->stmt->fetch();
    }

    public function search($keyword) {
        $this->stmt = $this->dbh->prepare("SELECT * FROM kategoribuku WHERE nama_kategori LIKE '%$keyword%';");
        $this->stmt->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function storeKategori($nama) {
        $this->stmt = $this->dbh->prepare("INSERT INTO `kategoribuku` (`id`, `nama_kategori`) VALUES (NULL, :nama);");
        $this->stmt->execute([
            "nama" => $nama
        ]);
    }

    public function updateKategori($nama, $id) {
        $this->stmt = $this->dbh->prepare("UPDATE kategoribuku SET nama_kategori=:nama WHERE id=:id;");
        $this->stmt->execute([
            "nama" => $nama,
            "id" => $id
        ]);
    }

    public function deleteKategori($id)
    {
        $this->stmt = $this->dbh->prepare("DELETE FROM kategoribuku WHERE id=:id;");
        $this->stmt->execute([
            "id" => $id
        ]);
    }

    public function storeKategoriRelasi($buku, $kategori) {
        $this->stmt = $this->dbh->prepare("INSERT INTO kategoribuku_relasi VALUES (NULL, :buku, :kategori);");
        $this->stmt->execute([
            "buku" => $buku,
            "kategori" => $kategori
        ]);
    }

    public function updateKategoriRelasi($buku, $kategori) {
        $this->stmt = $this->dbh->prepare("UPDATE kategoribuku_relasi SET id_buku=:buku, id_kategori=:kategori WHERE id_buku=:buku");
        $this->stmt->execute([
            "buku" => $buku,
            "kategori" => $kategori
        ]);
    }

    public function deleteKategoriRelasi($id)
    {
        $this->stmt = $this->dbh->prepare("DELETE FROM kategoribuku_relasi WHERE id_buku=:id;");
        $this->stmt->execute([
            "id" => $id
        ]);
    }

    public function getSelectedKategori($id) {
        $this->stmt = $this->dbh->prepare("SELECT * FROM kategoribuku_relasi inner join kategoribuku on kategoribuku_relasi.id_kategori = kategoribuku.id  WHERE kategoribuku_relasi.id_buku=$id;");
        $this->stmt->execute();
        return $this->stmt->fetch();
    }

}