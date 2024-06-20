<?php

require_once('helpers/querys.php');
require_once('lib/Conexion.php');
require_once('helpers/languages/en.php');

$core = new Core();

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('Community School of Health Technology Gusau');
$pdf->setTitle('Appointment Letter');
$pdf->setSubject('Offer');
$pdf->setKeywords('PDF, Appointment');

// set default header data
$header_string = '+'. $core->c_phone. ' | ' . $core->site_email;
// $pdf->setHeaderData(PDF_HEADER_LOGO, 20, $core->site_name, $header_string.'                                  
// '. $core->c_address .', '. $core->c_city .', '. $core->c_postal, array(0,255,0), array(0,0,0));

// // set header and footer fonts
// $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
// $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->setMargins(PDF_MARGIN_LEFT, 40, PDF_MARGIN_RIGHT);
$pdf->setHeaderMargin(false);
$pdf->setFooterMargin(false);

// set auto page breaks
$pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// NOTE: 2D barcode algorithms must be implemented on 2dbarcode.php class file.

// set font
$pdf->setFont('helvetica', '', 11);

// add a page
$pdf->AddPage();




// new style
$style = array(
	'border' => false,
	'padding' => 0,
	'fgcolor' => array(0,0,0),
	'bgcolor' => false
);

// QRCODE,H : QR-CODE Best error correction
$pdf->write2DBarcode($core->site_name, 'QRCODE,H', 140, 230, 40, 40, $style, 'N');
$pdf->Text(149, 225, $core->site_name);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('Appointment Letter', 'I');
// $pdf->Output('Invoice - '.$row->order_prefix . $row->order_no, 'D');

//============================================================+
// END OF FILE
//============================================================+
