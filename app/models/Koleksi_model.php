<?php

class Koleksi_model
{

    private $dbh;
    private $stmt;

    public function __construct()
    {
        $dsn = "mysql:host=localhost;dbname=digitalibrary";

        try {
            $this->dbh = new PDO($dsn, "root", "");
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getAll()
    {
        $this->stmt = $this->dbh->prepare("SELECT * FROM user;");
        $this->stmt->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getKoleksi($userid, $bukuid)
    {
        $this->stmt = $this->dbh->prepare("SELECT * FROM koleksipribadi WHERE id_user=:userid AND id_buku=:bukuid;");
        $this->stmt->execute([
            "userid" => $userid,
            "bukuid" => $bukuid,
        ]);
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteKoleksi($userid, $bukuid) {
        $this->stmt = $this->dbh->prepare("DELETE FROM `koleksipribadi` WHERE id_user=:userid AND id_buku=:bukuid;");
        $this->stmt->execute([
            "userid" => $userid,
            "bukuid" => $bukuid,
        ]);
    }

    public function storeKoleksi($userid, $bukuid) {
        $this->stmt = $this->dbh->prepare("INSERT INTO `koleksipribadi` (`id_user`, `id_buku`) VALUES (:userid, :bukuid);");
        $this->stmt->execute([
            "userid" => $userid,
            "bukuid" => $bukuid,
        ]);
    }

    public function getKoleksiPribadi($userid) {
        $this->stmt = $this->dbh->prepare("SELECT buku.id, buku.image, buku.judul, buku.penulis, buku.penerbit, buku.tahun_terbit, kategoribuku.nama_kategori FROM buku inner join kategoribuku_relasi on buku.id = kategoribuku_relasi.id_buku inner join kategoribuku on kategoribuku.id = kategoribuku_relasi.id_kategori inner join koleksipribadi on koleksipribadi.id_buku = buku.id WHERE koleksipribadi.id_user=:userid ORDER BY buku.id desc;");
        $this->stmt->execute([
            "userid" => $userid
        ]);
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
