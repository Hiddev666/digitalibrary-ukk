<?php
require_once(BASEURL . '/fpdf/fpdf.php');
echo "asd";
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
