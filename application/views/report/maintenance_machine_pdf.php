<?php
$pdf = new FPDF('l', 'mm', 'A4');
// membuat halaman baru
$pdf->AddPage();
$pdf->SetTitle("Report Trasaction Maintenance Machine", 1);

// setting jenis font yang akan digunakan
$pdf->SetFont('Arial', 'B', 16);
// mencetak string 
$pdf->Cell(275, 7, 'CHING LUH ', 0, 1, 'C');
$pdf->Image(base_url() . "assets/img/brand/logo.png", 10, 10, 50, 0, 'PNG');

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(275, 7, 'EQUIPMENT MANAGEMENT', 0, 1, 'C');
$pdf->SetFont('Arial', '', 9);

$pdf->Cell(275, 7, 'REPORT TRANSACTION MAINTENANCE MACHINE ', 0, 1, 'C');
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10, 7, '', 0, 1);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(10, 6, 'No', 1, 0, 'C');
$pdf->Cell(30, 6, 'MACHINE CODE', 1, 0, 'C');
$pdf->Cell(35, 6, 'EQUIPMENT NAME', 1, 0, 'C');
$pdf->Cell(25, 6, 'OCCURENCE', 1, 0, 'C');
$pdf->Cell(20, 6, 'SEVERITY', 1, 0, 'C');
$pdf->Cell(25, 6, 'DETECTION', 1, 0, 'C');
$pdf->Cell(20, 6, 'FRPN', 1, 0, 'C');
$pdf->Cell(30, 6, 'TROUBLE', 1, 0, 'C');
$pdf->Cell(15, 6, 'FMEA', 1, 0, 'C');
$pdf->Cell(40, 6, 'DATE MAINTENANCE', 1, 0, 'C');
$pdf->Cell(30, 6, 'STATUS', 1, 1, 'C');
$pdf->SetFont('Arial', '', 8, 'C');
$no = 1;
foreach ($equipment as $key) {
    $pdf->Cell(10, 6, $no++ . '.', 1, 0, 'C');
    $pdf->Cell(30, 6, strtoupper($key->machine_code), 1, 0);
    $pdf->Cell(35, 6, strtoupper($key->equipment_name), 1, 0);
    $pdf->Cell(25, 6, strtoupper($key->occurence_value), 1, 0);
    $pdf->Cell(20, 6, strtoupper($key->severity_value), 1, 0);
    $pdf->Cell(25, 6, strtoupper($key->detection_value), 1, 0);
    $pdf->Cell(20, 6, strtoupper($key->frpn_value), 1, 0);
    $pdf->Cell(30, 6, strtoupper($key->machine_trouble), 1, 0);
    $pdf->Cell(15, 6, strtoupper($key->fmea_type), 1, 0);
    $pdf->Cell(40, 6, strtoupper($key->date_maintenance_machine), 1, 0);
    $pdf->Cell(30, 6, strtoupper($key->status_maintenance_machine), 1, 1);
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
