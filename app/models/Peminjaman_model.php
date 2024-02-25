<?php

class Peminjaman_model
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
        $this->stmt = $this->dbh->prepare("CALL selectPeminjamanJoined();");
        $this->stmt->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function searchPeminjaman($idanggota, $tglpeminjaman)
    {
        $this->stmt = $this->dbh->prepare("SELECT peminjaman.id, user.nama_lengkap, buku.judul, peminjaman.tgl_peminjaman, peminjaman.tgl_pengembalian, peminjaman.status_peminjaman FROM buku INNER JOIN peminjaman on buku.id = peminjaman.id_buku INNER JOIN user ON user.id = peminjaman.id_user WHERE user.nama_lengkap=:idanggota OR peminjaman.tgl_peminjaman=:tglpeminjaman ORDER BY peminjaman.id DESC;");
        $this->stmt->execute([
            "idanggota" => $idanggota,
            "tglpeminjaman" => $tglpeminjaman
        ]);
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $this->stmt = $this->dbh->prepare("SELECT COUNT(buku.id) as jumlah, peminjaman.id, user.id as userid, buku.id as bukuid, buku.image, user.nama_lengkap, buku.judul, peminjaman.tgl_peminjaman, peminjaman.tgl_pengembalian, peminjaman.status_peminjaman FROM buku INNER JOIN peminjaman on buku.id = peminjaman.id_buku INNER JOIN user ON user.id = peminjaman.id_user WHERE user.id=:id GROUP BY buku.id ORDER BY peminjaman.id DESC;");
        $this->stmt->execute([
            "id" => $id
        ]);
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getDipinjam($id) {
        $this->stmt = $this->dbh->prepare("SELECT COUNT(buku.id) as jumlah, peminjaman.id, user.id as userid, buku.id as bukuid, buku.image, user.nama_lengkap, buku.judul, peminjaman.tgl_peminjaman, peminjaman.tgl_pengembalian, peminjaman.status_peminjaman FROM buku INNER JOIN peminjaman on buku.id = peminjaman.id_buku INNER JOIN user ON user.id = peminjaman.id_user WHERE user.id=:id AND peminjaman.status_peminjaman='Dipinjam' GROUP BY buku.id ORDER BY peminjaman.id DESC;");
        $this->stmt->execute([
            "id" => $id
        ]);
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getDipending($id) {
        $this->stmt = $this->dbh->prepare("SELECT COUNT(buku.id) as jumlah, peminjaman.id, user.id as userid, buku.id as bukuid, buku.image, user.nama_lengkap, buku.judul, peminjaman.tgl_peminjaman, peminjaman.tgl_pengembalian, peminjaman.status_peminjaman FROM buku INNER JOIN peminjaman on buku.id = peminjaman.id_buku INNER JOIN user ON user.id = peminjaman.id_user WHERE user.id=:id AND peminjaman.status_peminjaman='Pending' GROUP BY buku.id ORDER BY peminjaman.id DESC;");
        $this->stmt->execute([
            "id" => $id
        ]);
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function storePeminjaman($userid, $bukuid, $tglpeminjaman, $tglpengembalian)
    {
        $this->stmt = $this->dbh->prepare("INSERT INTO `peminjaman` (`id_user`, `id_buku`, `tgl_peminjaman`, `tgl_pengembalian`, `status_peminjaman`) VALUES (:userid, :bukuid, :tglpeminjaman, :tglpengembalian, 'Pending');");
        $this->stmt->execute([
            "userid" => $userid,
            "bukuid" => $bukuid,
            "tglpeminjaman" => $tglpeminjaman,
            "tglpengembalian" => $tglpengembalian
        ]);
    }

    public function updatePeminjaman($userid, $bukuid, $tglpeminjaman, $tglpengembalian, $id)
    {
        $this->stmt = $this->dbh->prepare("UPDATE peminjaman SET id_user=:userid, id_buku=:bukuid, tgl_peminjaman=:tglpeminjaman, tgl_pengembalian=:tglpengembalian WHERE id=:id;");
        $this->stmt->execute([
            "userid" => $userid,
            "bukuid" => $bukuid,
            "tglpeminjaman" => $tglpeminjaman,
            "tglpengembalian" => $tglpengembalian,
            "id" => $id
        ]);
    }

    public function deletePeminjaman($id)
    {
        $this->stmt = $this->dbh->prepare("DELETE FROM peminjaman WHERE id=:id;");
        $this->stmt->execute([
            "id" => $id
        ]);
    }

    public function updateStatus($status, $id)
    {
        $this->stmt = $this->dbh->prepare("UPDATE peminjaman SET status_peminjaman=:status WHERE id=:id;");
        $this->stmt->execute([
            "status" => $status,
            "id" => $id
        ]);
    }

    public function checkPending($userid, $bukuid)
    {
        $this->stmt = $this->dbh->prepare("SELECT * FROM peminjaman WHERE id_user=:userid and id_buku=:bukuid and status_peminjaman='Pending';");
        $this->stmt->execute([
            "userid" => $userid,
            "bukuid" => $bukuid
        ]);
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function checkPinjam($userid, $bukuid)
    {
        $this->stmt = $this->dbh->prepare("SELECT * FROM peminjaman WHERE id_user=:userid and id_buku=:bukuid and status_peminjaman='Dipinjam';");
        $this->stmt->execute([
            "userid" => $userid,
            "bukuid" => $bukuid
        ]);
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function checkDetailPending($userid, $bukuid)
    {
        $this->stmt = $this->dbh->prepare("SELECT * FROM peminjaman WHERE id_user=:userid and id_buku=:bukuid and status_peminjaman='Pending';");
        $this->stmt->execute([
            "userid" => $userid,
            "bukuid" => $bukuid
        ]);
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
