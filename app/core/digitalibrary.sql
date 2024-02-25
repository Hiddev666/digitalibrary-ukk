-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 25, 2024 at 04:17 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digitalibrary`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `selectBukuJoined` ()   BEGIN
    SELECT buku.id, buku.image, buku.judul, buku.penulis, buku.penerbit, buku.stock, buku.tahun_terbit, kategoribuku.nama_kategori FROM buku inner join kategoribuku_relasi on buku.id = kategoribuku_relasi.id_buku inner join kategoribuku on kategoribuku.id = kategoribuku_relasi.id_kategori ORDER BY buku.id desc;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectKategoriBuku` ()   BEGIN
    SELECT * FROM kategoribuku;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectPeminjamanJoined` ()   BEGIN
    SELECT peminjaman.id, user.nama_lengkap, buku.judul, peminjaman.tgl_peminjaman, peminjaman.tgl_pengembalian, peminjaman.status_peminjaman FROM buku INNER JOIN peminjaman on buku.id = peminjaman.id_buku INNER JOIN user ON user.id = peminjaman.id_user ORDER BY peminjaman.id DESC;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `judul` varchar(255) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL,
  `tahun_terbit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `image`, `judul`, `penulis`, `penerbit`, `stock`, `tahun_terbit`) VALUES
(50, 'localhost/ukkmvc/public/img/uploaded/pastel_books_novel_ancika_pidi_baiq_full01_foc7md4g.webp', 'Ancika: Dia yang bersamaku', 'Pidi Baiq', 'Mizan', 50, 2015),
(51, 'localhost/ukkmvc/public/img/uploaded/ID_MIZ2016MTH03DDADT_B.jpg', 'Dilan: Dia adalah Dilanku 1990', 'Pidi Baiq', 'Mizan', 2, 2014),
(55, 'http://localhost/digitalibrary/public/img/uploaded/bumi-manusia-edit.jpg', 'Bumi Manusia', 'Pramoedya Ananta Toer', 'Gramedia', 50, 1980),
(56, 'http://localhost/digitalibrary/public/img/uploaded/59577379.jpg', 'Halo Koding!', 'Hilman', 'Gramedia', 40, 2022),
(57, 'http://localhost/digitalibrary/public/img/uploaded/download.jpeg', 'Tenggelamnya Kapal Van Der Wijck', 'Buya Hamka', 'Gramedia', 30, 2016),
(58, 'http://localhost/digitalibrary/public/img/uploaded/207959051.jpg', 'Catatan Juang', 'Fiersa Besari', 'Gramedia', 10, 2016),
(59, 'http://localhost/digitalibrary/public/img/uploaded/ID_MIZ2016MTH03DDADT_B.jpg', 'Dilan: Dia adalah Dilanku 1990', 'Pidi Baiq', 'Mizan', 40, 2015),
(60, 'http://localhost/digitalibrary/public/img/uploaded/pastel_books_novel_ancika_pidi_baiq_full01_foc7md4g.webp', 'Ancika: Dia yang bersamaku', 'Pidi Baiq', 'Mizan', 40, 2016),
(61, 'http://localhost/digitalibrary/public/img/uploaded/Garis_waktu.jpg', 'Garis Waktu', 'Fiersa Besari', 'Gramedia', 40, 2016),
(62, 'http://localhost/digitalibrary/public/img/uploaded/9786023100033_Fihi-Ma-Fihi-Mengarungi-Samudera-Kebijaksanaan.jpg', 'Fihi Ma Fihi', 'Jalaluddin Rumi', 'Gramedia', 30, 2014),
(63, 'http://localhost/digitalibrary/public/img/uploaded/9789797945350_Konspirasi-Alam-Semesta.jpg', 'Konspirasi Alam Semesta', 'Fiersa Besari', 'Gramedia', 20, 2016),
(64, 'http://localhost/digitalibrary/public/img/uploaded/HiroshimaBook.jpg', 'Hiroshima', 'John Hersey', 'Alfred A. Knopf, Inc', 20, 1946),
(65, 'http://localhost/digitalibrary/public/img/uploaded/images (3).jpeg', 'A History of Modern Indonesia', 'Adrian Vickers', 'Gramedia', 10, 2005),
(66, 'http://localhost/digitalibrary/public/img/uploaded/images (2).jpeg', 'One Piece Vol 98', 'Eiichiro Oda', 'Weekly Shonen Jump', 10, 2016),
(67, 'http://localhost/digitalibrary/public/img/uploaded/images (1).jpeg', 'Attack on Titan Vol 31', 'Hajime Isayama', 'Kodansha', 10, 2023),
(68, 'http://localhost/digitalibrary/public/img/uploaded/licensed-image.jpeg', 'Steve Jobs', 'Walter Isaacson', 'Simon', 5, 2011),
(69, 'http://localhost/digitalibrary/public/img/uploaded/images.jpeg', 'BIografi Gus Dur', 'Abdurrahman Wahid', 'Gramedia', 20, 2016);

-- --------------------------------------------------------

--
-- Table structure for table `carousel`
--

CREATE TABLE `carousel` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carousel`
--

INSERT INTO `carousel` (`id`, `image`) VALUES
(5, 'http://localhost/digitalibrary/public/img/carousel/Frame 1 (2).png'),
(6, 'http://localhost/digitalibrary/public/img/carousel/Frame 1 (3).png'),
(7, 'http://localhost/digitalibrary/public/img/carousel/Frame 1 (4).png');

-- --------------------------------------------------------

--
-- Table structure for table `kategoribuku`
--

CREATE TABLE `kategoribuku` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategoribuku`
--

INSERT INTO `kategoribuku` (`id`, `nama_kategori`) VALUES
(1, 'Novel'),
(2, 'Sejarah'),
(6, 'Filsafat'),
(7, 'Ensiklopedia'),
(8, 'Komik'),
(9, 'Nomik'),
(10, 'Antologi'),
(11, 'Dongeng'),
(12, 'Biografi'),
(13, 'Catatan Harian'),
(14, 'Novelet'),
(15, 'Fotografi'),
(16, 'Karya Ilmiah'),
(17, 'Tafsir'),
(18, 'Kamus'),
(19, 'Panduan'),
(20, 'Atlas'),
(21, 'Buku Ilmiah'),
(22, 'Teks');

-- --------------------------------------------------------

--
-- Table structure for table `kategoribuku_relasi`
--

CREATE TABLE `kategoribuku_relasi` (
  `id` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategoribuku_relasi`
--

INSERT INTO `kategoribuku_relasi` (`id`, `id_buku`, `id_kategori`) VALUES
(1, 55, 1),
(2, 56, 16),
(3, 57, 1),
(4, 58, 1),
(5, 59, 1),
(6, 60, 1),
(7, 61, 1),
(8, 62, 6),
(9, 63, 1),
(10, 64, 2),
(11, 65, 2),
(12, 66, 8),
(13, 67, 8),
(14, 68, 12),
(15, 69, 12);

-- --------------------------------------------------------

--
-- Table structure for table `koleksipribadi`
--

CREATE TABLE `koleksipribadi` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `koleksipribadi`
--

INSERT INTO `koleksipribadi` (`id`, `id_user`, `id_buku`) VALUES
(1, 32, 69),
(2, 32, 68);

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `tgl_peminjaman` date NOT NULL,
  `tgl_pengembalian` date NOT NULL,
  `status_peminjaman` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `id_user`, `id_buku`, `tgl_peminjaman`, `tgl_pengembalian`, `status_peminjaman`) VALUES
(78, 32, 67, '2024-02-25', '2024-02-28', 'Pending'),
(79, 32, 66, '2024-02-25', '2024-02-28', 'Pending');

--
-- Triggers `peminjaman`
--
DELIMITER $$
CREATE TRIGGER `decrease_stock` AFTER INSERT ON `peminjaman` FOR EACH ROW BEGIN
	UPDATE buku SET stock = stock - 1 WHERE id = new.id_buku AND new.id_buku = "Dipinjam";
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `increase_stock` AFTER DELETE ON `peminjaman` FOR EACH ROW BEGIN
	UPDATE buku SET stock = stock + 1 WHERE id = old.id_buku;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `increase_stock_dikembalikan` AFTER UPDATE ON `peminjaman` FOR EACH ROW BEGIN
	UPDATE buku SET stock = stock + 1 WHERE id = new.id_buku AND new.status_peminjaman = "Dikembalikan";
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `increase_stock_dipinjam` AFTER UPDATE ON `peminjaman` FOR EACH ROW BEGIN
	UPDATE buku SET stock = stock - 1 WHERE id = new.id_buku AND new.status_peminjaman = "Dipinjam";
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `ulasanbuku`
--

CREATE TABLE `ulasanbuku` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `ulasan` text NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `nama_lengkap`, `alamat`, `level`) VALUES
(2, 'petugas', 'afb91ef692fd08c445e8cb1bab2ccf9c', 'petugas@gmail.com', 'Petugas', 'Los Angeles', 2),
(7, 'wahidaziz', '2b1ddf586a8155d1b59c26c087128380', 'anggota@gmail.com', 'Wahid Abdul Aziz', 'Los Angeles', 3),
(15, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', 'Admin', 'local', 1),
(31, 'johndoe', '527bd5b5d689e2c32ae974c6229ff785', 'johndoe@gmail.com', 'John Doe', 'Los Angeles', 3),
(32, 'ekokurniawankhannedy', 'e5ea9b6d71086dfef3a15f726abcc5bf', 'ekokurniawan@gmail.com', 'Eko Kurniawan Khannedy', 'Bandung', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carousel`
--
ALTER TABLE `carousel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategoribuku`
--
ALTER TABLE `kategoribuku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategoribuku_relasi`
--
ALTER TABLE `kategoribuku_relasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_buku` (`id_buku`,`id_kategori`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `koleksipribadi`
--
ALTER TABLE `koleksipribadi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`,`id_buku`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indexes for table `ulasanbuku`
--
ALTER TABLE `ulasanbuku`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`,`id_buku`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `carousel`
--
ALTER TABLE `carousel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kategoribuku`
--
ALTER TABLE `kategoribuku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `kategoribuku_relasi`
--
ALTER TABLE `kategoribuku_relasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `koleksipribadi`
--
ALTER TABLE `koleksipribadi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `ulasanbuku`
--
ALTER TABLE `ulasanbuku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kategoribuku_relasi`
--
ALTER TABLE `kategoribuku_relasi`
  ADD CONSTRAINT `kategoribuku_relasi_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id`),
  ADD CONSTRAINT `kategoribuku_relasi_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategoribuku` (`id`);

--
-- Constraints for table `koleksipribadi`
--
ALTER TABLE `koleksipribadi`
  ADD CONSTRAINT `koleksipribadi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `koleksipribadi_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id`);

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id`),
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Constraints for table `ulasanbuku`
--
ALTER TABLE `ulasanbuku`
  ADD CONSTRAINT `ulasanbuku_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id`),
  ADD CONSTRAINT `ulasanbuku_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
