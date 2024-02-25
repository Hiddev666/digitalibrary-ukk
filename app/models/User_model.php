<?php

class User_model
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

    public function getById($id)
    {
        $this->stmt = $this->dbh->prepare("SELECT * FROM user WHERE id=:id;");
        $this->stmt->execute([
            "id" => $id
        ]);
        return $this->stmt->fetch();
    }

    public function getByUsername($username)
    {
        $this->stmt = $this->dbh->prepare("SELECT * FROM user WHERE username=:username;");
        $this->stmt->execute([
            "username" => $username
        ]);
        return $this->stmt->fetch();
    }

    public function storeUser($username, $password, $email, $namalengkap, $alamat, $level) {
        $this->stmt = $this->dbh->prepare("INSERT INTO `user` (`username`, `password`, `email`, `nama_lengkap`, `alamat`, `level`) VALUES (:username, :password, :email, :namalengkap, :alamat, :level);");
        $this->stmt->execute([
            "username" => $username,
            "password" => $password,
            "email" => $email,
            "namalengkap" => $namalengkap,
            "alamat" => $alamat,
            "level" => $level
        ]);
    }

    public function updateUser($username, $password, $email, $namalengkap, $alamat, $level, $id) {
        $this->stmt = $this->dbh->prepare("UPDATE user SET username=:username, password=:password, email=:email, nama_lengkap=:namalengkap, alamat=:alamat, level=:level WHERE id=:id;");
        $this->stmt->execute([
            "username" => $username,
            "password" => $password,
            "email" => $email,
            "namalengkap" => $namalengkap,
            "alamat" => $alamat,
            "level" => $level,
            "id" => $id
        ]);
    }

    public function deleteUser($id) {
        $this->stmt = $this->dbh->prepare("DELETE FROM user WHERE id=:id;");
        $this->stmt->execute([
            "id" => $id
        ]);
    }

    // Auth
    public function authentication($username, $password) {
        $this->stmt = $this->dbh->prepare("SELECT * FROM user WHERE username=:username and password=:password");
        $this->stmt->execute([
            "username" => $username,
            "password" => $password,
        ]);
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function userRegister($username, $password, $email, $namalengkap, $alamat) {
        $this->stmt = $this->dbh->prepare("INSERT INTO user VALUES (NULL, :username, :password, :email, :namalengkap, :alamat, 3);");
        $this->stmt->execute([
            "username" => $username,
            "password" => $password,
            "email" => $email,
            "namalengkap" => $namalengkap,
            "alamat" => $alamat,
        ]);
    }

}
