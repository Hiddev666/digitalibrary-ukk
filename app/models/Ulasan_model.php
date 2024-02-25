<?php

class Ulasan_model
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

    public function getUlasanByIdBuku($id)
    {
        $this->stmt = $this->dbh->prepare("SELECT * FROM ulasanbuku INNER JOIN user on ulasanbuku.id_user = user.id WHERE ulasanbuku.id_buku=:id;");
        $this->stmt->execute([
            "id" => $id,
        ]);
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function storeUlasan($userid, $bukuid, $ulasan, $rating) {
        $this->stmt = $this->dbh->prepare("INSERT INTO `ulasanbuku` (`id_user`, `id_buku`, `ulasan`, `rating`) VALUES (:userid, :bukuid, :ulasan, :rating);");
        $this->stmt->execute([
            "userid" => $userid,
            "bukuid" => $bukuid,
            "ulasan" => $ulasan,
            "rating" => $rating
        ]);
    }

}
