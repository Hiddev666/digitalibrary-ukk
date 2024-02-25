<?php

class Carousel_model {

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
        $this->stmt = $this->dbh->prepare("SELECT * FROM carousel;");
        $this->stmt->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getbyId($id) {
        $this->stmt = $this->dbh->prepare("SELECT * FROM carousel WHERE id=:id;");
        $this->stmt->execute([
            "id" => $id
        ]);
        return $this->stmt->fetch();
    }

    public function storeCarousel($image) {
        $this->stmt = $this->dbh->prepare("INSERT INTO carousel VALUES (NULL, :image)");
        $this->stmt->execute([
            "image" => $image
        ]);
    }

    public function updateCarousel($id, $image) {
        $this->stmt = $this->dbh->prepare("UPDATE carousel SET image=:image WHERE id=:id");
        $this->stmt->execute([
            "image" => $image,
            "id" => $id
        ]);
    }

    public function deleteCarousel($id) {
        $this->stmt = $this->dbh->prepare("DELETE FROM carousel WHERE id=:id");
        $this->stmt->execute([
            "id" => $id
        ]);
    }

}