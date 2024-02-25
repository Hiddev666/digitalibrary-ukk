<?php

class Buku_model
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
        $this->stmt = $this->dbh->prepare("CALL selectBukuJoined();");
        $this->stmt->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getLimit()
    {
        $this->stmt = $this->dbh->prepare("SELECT buku.id, buku.image, buku.judul, buku.penulis, buku.penerbit, buku.tahun_terbit, kategoribuku.nama_kategori FROM buku inner join kategoribuku_relasi on buku.id = kategoribuku_relasi.id_buku inner join kategoribuku on kategoribuku.id = kategoribuku_relasi.id_kategori ORDER BY buku.id desc LIMIT 4;");
        $this->stmt->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getById($id)
    {
        $this->stmt = $this->dbh->prepare("SELECT buku.id, buku.stock, buku.image, buku.judul, buku.penulis, buku.penerbit, buku.stock, buku.tahun_terbit, kategoribuku.nama_kategori FROM buku inner join kategoribuku_relasi on buku.id = kategoribuku_relasi.id_buku inner join kategoribuku on kategoribuku.id = kategoribuku_relasi.id_kategori WHERE buku.id = $id ORDER BY buku.id desc;");
        $this->stmt->execute();
        return $this->stmt->fetch();
    }

    public function getLastBook()
    {
        $this->stmt = $this->dbh->prepare("SELECT id FROM buku ORDER BY id DESC LIMIT 1;");
        $this->stmt->execute();
        return $this->stmt->fetch();
    }

    public function getSelectedKategori($id)
    {
        $this->stmt = $this->dbh->prepare("SELECT * FROM kategoribuku_relasi inner join kategoribuku on kategoribuku_relasi.id_kategori = kategoribuku.id  WHERE kategoribuku_relasi.id_buku=$id;");
        $this->stmt->execute();
        return $this->stmt->fetch();
    }

    public function storeBuku($image, $judul, $penulis, $penerbit, $tahunterbit, $stock)
    {
        $this->stmt = $this->dbh->prepare("INSERT INTO `buku` (`id`, `image`, `judul`, `penulis`, `penerbit`, `tahun_terbit`, `stock`) VALUES (NULL, :image, :judul, :penulis, :penerbit, :tahunterbit, :stock);");
        $this->stmt->execute([
            'image' => $image,
            'judul' => $judul,
            'penulis' => $penulis,
            'penerbit' => $penerbit,
            'tahunterbit' => $tahunterbit,
            'stock' => $stock,
        ]);
    }

    public function updateBuku($image, $judul, $penulis, $penerbit, $tahunterbit, $stock, $id)
    {
        $this->stmt = $this->dbh->prepare("UPDATE buku SET image=:image, judul=:judul, penulis=:penulis, penerbit=:penerbit, tahun_terbit=:tahunterbit, stock=:stock WHERE id=:id;");
        $this->stmt->execute([
            'image' => $image,
            'judul' => $judul,
            'penulis' => $penulis,
            'penerbit' => $penerbit,
            'tahunterbit' => $tahunterbit,
            'stock' => $stock,
            "id" => $id
        ]);
    }

    public function updateBukuWithoutImage($judul, $penulis, $penerbit, $tahunterbit, $stock, $id)
    {
        $this->stmt = $this->dbh->prepare("UPDATE buku SET judul=:judul, penulis=:penulis, penerbit=:penerbit, tahun_terbit=:tahunterbit, stock=:stock WHERE id=:id;");
        $this->stmt->execute([
            'judul' => $judul,
            'penulis' => $penulis,
            'penerbit' => $penerbit,
            'tahunterbit' => $tahunterbit,
            'stock' => $stock,
            "id" => $id
        ]);
    }

    public function deleteBuku($id)
    {
        $this->stmt = $this->dbh->prepare("DELETE FROM buku WHERE id=:id;");
        $this->stmt->execute([
            "id" => $id
        ]);
    }


    public function getAllCatalog()
    {
        $this->stmt = $this->dbh->prepare("SELECT buku.id, buku.stock, buku.image, buku.judul, buku.penulis, buku.penerbit, buku.tahun_terbit, kategoribuku.nama_kategori FROM buku inner join kategoribuku_relasi on buku.id = kategoribuku_relasi.id_buku inner join kategoribuku on kategoribuku.id = kategoribuku_relasi.id_kategori ORDER BY buku.id desc;");
        $this->stmt->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function searchCatalog($keyword)
    {
        $this->stmt = $this->dbh->prepare("SELECT buku.id, buku.image, buku.judul, buku.penulis, buku.penerbit, buku.tahun_terbit, kategoribuku.nama_kategori FROM buku inner join kategoribuku_relasi on buku.id = kategoribuku_relasi.id_buku inner join kategoribuku on kategoribuku.id = kategoribuku_relasi.id_kategori WHERE buku.judul LIKE '%$keyword%' ORDER BY buku.id desc;");
        $this->stmt->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getRating($id)
    {
        $this->stmt = $this->dbh->prepare("SELECT AVG(ulasanbuku.rating) as rate FROM ulasanbuku INNER JOIN user on ulasanbuku.id_user = user.id WHERE ulasanbuku.id_buku=:id;");
        $this->stmt->execute([
            "id" => $id
        ]);
        return $this->stmt->fetch();
    }

    public function getStock($id)
    {
        $this->stmt = $this->dbh->prepare("SELECT stock FROM buku WHERE id=:id;");
        $this->stmt->execute([
            "id" => $id
        ]);
        return $this->stmt->fetch();
    }

    public function getTotalBukuByKategori($id)
    {
        $this->stmt = $this->dbh->prepare("SELECT COUNT(*) as total FROM kategoribuku_relasi WHERE id_kategori=:id;");
        $this->stmt->execute([
            "id" => $id
        ]);
        return $this->stmt->fetch();
    }

    public function getAllPenulis()
    {
        $this->stmt = $this->dbh->prepare("SELECT penulis FROM buku GROUP BY penulis;");
        $this->stmt->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllPenerbit()
    {
        $this->stmt = $this->dbh->prepare("SELECT penerbit FROM buku GROUP BY penerbit;");
        $this->stmt->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllTahunTerbit()
    {
        $this->stmt = $this->dbh->prepare("SELECT tahun_terbit FROM buku GROUP BY tahun_terbit;");
        $this->stmt->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function filter($penulis, $penerbit, $tahunterbit, $kategori)
    {
        $this->stmt = $this->dbh->prepare("
        SELECT buku.id, buku.image, buku.judul, buku.penulis, buku.penerbit, buku.stock, buku.tahun_terbit, kategoribuku.nama_kategori FROM buku inner join kategoribuku_relasi on buku.id = kategoribuku_relasi.id_buku inner join kategoribuku on kategoribuku.id = kategoribuku_relasi.id_kategori WHERE buku.penulis LIKE '%$penulis%' AND buku.penerbit LIKE '%$penerbit%' AND buku.tahun_terbit LIKE '%$tahunterbit%' AND kategoribuku.nama_kategori LIKE '%$kategori%' ORDER BY buku.id desc;
        ");
        $this->stmt->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
