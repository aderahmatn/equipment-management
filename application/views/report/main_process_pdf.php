<?php
$pdf = new FPDF('l', 'mm', 'A4');
// membuat halaman baru
$pdf->AddPage();
$pdf->SetTitle("Report Transaction Main Process", 1);

// setting jenis font yang akan digunakan
$pdf->SetFont('Arial', 'B', 16);
// mencetak string 
$pdf->Cell(275, 7, 'CHING LUH ', 0, 1, 'C');
$pdf->Image(base_url() . "assets/img/brand/logo.png", 10, 10, 50, 0, 'PNG');

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(275, 7, 'EQUIPMENT MANAGEMENT', 0, 1, 'C');
$pdf->SetFont('Arial', '', 9);

$pdf->Cell(275, 7, 'REPORT TRANSACTION MAIN PROCESS ', 0, 1, 'C');
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10, 7, '', 0, 1);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(10, 6, 'No', 1, 0, 'C');
$pdf->Cell(30, 6, 'MACHINE CODE', 1, 0, 'C');
$pdf->Cell(60, 6, 'EQUIPMENT NAME', 1, 0, 'C');
$pdf->Cell(40, 6, 'MAIN PROCESS', 1, 0, 'C');
$pdf->Cell(40, 6, 'PURCHASE DATE', 1, 0, 'C');
$pdf->Cell(30, 6, 'LINE', 1, 0, 'C');
$pdf->Cell(50, 6, 'MACHINE ENTER LINE', 1, 0, 'C');
$pdf->Cell(20, 6, 'QTY', 1, 1, 'C');
$pdf->SetFont('Arial', '', 8, 'C');
$no = 1;
foreach ($equipment as $key) {
    $pdf->Cell(10, 6, $no++ . '.', 1, 0, 'C');
    $pdf->Cell(30, 6, strtoupper($key->machine_code), 1, 0);
    $pdf->Cell(60, 6, strtoupper($key->equipment_name), 1, 0);
    $pdf->Cell(40, 6, strtoupper($key->main_process), 1, 0);
    $pdf->Cell(40, 6, strtoupper($key->machine_purchase_date), 1, 0);
    $pdf->Cell(30, 6, strtoupper($key->line), 1, 0);
    $pdf->Cell(50, 6,  strtoupper($key->machine_enter_line), 1, 0);
    $pdf->Cell(20, 6, strtoupper($key->qty), 1, 1, 'R');
}


$pdf->ln();
// $pdf->ln();
// $pdf->Cell(217, 6, '', 0, 0);
// $pdf->Cell(60, 6, 'Tangerang, ' . date('Y-m-d'), 0, 1, 'C');
// $pdf->Cell(217, 6, '', 0, 0);
// $pdf->Cell(60, 6, 'Mengetahui,', 0, 1, 'C');
// $pdf->ln();
// $pdf->ln();
// $pdf->ln();
// $pdf->ln();
// $pdf->Cell(217, 6, '', 0, 0);
// $pdf->Cell(60, 6, 'Pemilik', 'T', 1, 'C');
$pdf->Output();
