<?php
require_once('tcpdf/tcpdf.php');

$nombre = $_GET['nombre'];
$usuario = $_GET['nCuenta'];
$clase = $_GET['asignatura'];
$nombre_asignatura = $_GET['nombre_asignatura']; 
// Include the main TCPDF library (search for installation path).


// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('HC2');
$pdf->SetTitle('Código de Entrada');



    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);

// set auto page breaks
//$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);



// set font
$pdf->SetFont('helvetica', '', 11);

// add a page
$pdf->AddPage();


    $pdf->Ln(5);
    #Título del curso
    $pdf->SetFont('times', 'B', 15);
    $pdf->MultiCell(0, 10, $nombre_asignatura, 0, 'C', 0, 1, '', '', true);
    $pdf->Ln(5);
    
    $pdf->SetFont('times', '', 12);
    $pdf->MultiCell(0, 5, $nombre, 0, 'C', 0, 0, '', '', true);
    $pdf->Ln(10);	



$pdf->Ln(15);

$style = array(
    'border' => 0,
    'vpadding' => 'auto',
    'hpadding' => 'auto',
    'bgcolor' => false,//array(204, 204, 204),
    'fgcolor' => array(0,0,0), //array(255,255,255)
    'module_width' => 5, // width of a single module in points
    'module_height' => 5 // height of a single module in points
);

// QRCODE,H : QR-CODE Best error correction
$cadena = $usuario. "&".$clase;
$pdf->write2DBarcode($cadena, 'QRCODE,H', 80, 50, 60, 0, $style, 'N');
$pdf->Ln(15);

	$leyenda = "Este código QR es su pase de entrada y salida de la clase."; 
    $pdf->SetFont('times', 'B', 14);
    //$pdf->writeHTML($leyenda, true, 1, true,1);
    $pdf->MultiCell(0, 5, $leyenda, 0, 'C', 0, 0, '', '', true);
    $pdf->Ln(10);









//Close and output PDF document
$pdf->Output('codigoqr.pdf');

//============================================================+
// END OF FILE
//============================================================+