<?php
// Memanggil library FPDF dari folder cetakpdf
require('../cetakpdf/fpdf.php');
include "../config/koneksi.php";

// Membuat class PDF turunan dari FPDF
class PDF extends FPDF
{
    // Page Header
    function Header()
    {
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(0, 10, 'LAPORAN PEMINJAMAN KAMERA', 0, 1, 'C');
        $this->SetFont('Arial', '', 12);
        $this->Cell(0, 10, 'Sistem Informasi Peminjaman Kamera Berbasis Web', 0, 1, 'C');
        $this->Ln(10); // Spasi

        // Header Tabel
        $this->SetFont('Arial', 'B', 10);
        $this->SetFillColor(200, 220, 255); // Warna background header tabel
        $this->Cell(10, 10, 'No', 1, 0, 'C', true);
        $this->Cell(45, 10, 'Nama Peminjam', 1, 0, 'C', true);
        $this->Cell(45, 10, 'Nama Kamera', 1, 0, 'C', true);
        $this->Cell(30, 10, 'Tgl Pinjam', 1, 0, 'C', true);
        $this->Cell(30, 10, 'Tgl Kembali', 1, 0, 'C', true);
        $this->Cell(30, 10, 'Status', 1, 1, 'C', true);
    }

    // Page Footer
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Halaman ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);

// Query Data
$no = 1;
$query = mysqli_query($koneksi, "
        SELECT * FROM peminjaman 
        JOIN kamera ON peminjaman.id_kamera = kamera.id_kamera
        JOIN peminjam ON peminjaman.id_peminjam = peminjam.id_peminjam
        ORDER BY peminjaman.id_pinjam DESC
    ");

while ($data = mysqli_fetch_array($query)) {
    $pdf->Cell(10, 10, $no++, 1, 0, 'C');
    $pdf->Cell(45, 10, $data['nama_peminjam'], 1, 0); // Nama Peminjam
    $pdf->Cell(45, 10, $data['nama_kamera'], 1, 0); // Nama Kamera
    $pdf->Cell(30, 10, $data['tgl_pinjam'], 1, 0, 'C');
    $pdf->Cell(30, 10, $data['tgl_kembali'], 1, 0, 'C');
    $pdf->Cell(30, 10, $data['status_pinjam'], 1, 1, 'C');
}

$pdf->Output();
?>