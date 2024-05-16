<?php
//============================================================+
// File name   : example_050.php
// Begin       : 2009-04-09
// Last Update : 2013-05-14
//
// Description : Example 050 for TCPDF class
//               2D Barcodes
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: 2D barcodes.
 * @author Nicola Asuni
 * @since 2008-03-04
 * @group barcode
 * @group pdf
 */
require_once('helpers/querys.php');
require_once('helpers/languages/en.php');
$order_id = $_GET['id'];
$core = new Core();

if (isset($order_id)) {
    $data = cdp_getCourierPrint($order_id);
    $row = $data['data'];
    $invoice_item = json_decode($row->invoice, true);
    $db = new Conexion;

    $db->cdp_query("SELECT * FROM cdb_add_order_item WHERE order_id='" . $order_id . "'");
    $order_items = $db->cdp_registros();

    $db->cdp_query("SELECT * FROM cdb_met_payment where id= '" . $row->order_pay_mode . "'");
    $met_payment = $db->cdp_registro();

    $db->cdp_query("SELECT * FROM cdb_offices where id= '" . $row->order_courier . "'");
    $courier_com = $db->cdp_registro();

    $db->cdp_query("SELECT * FROM cdb_shipping_mode where id= '" . $row->order_service_options . "'");
    $shipping_mode = $db->cdp_registro();

    $fecha = date("Y-m-d :h:i A");

    $db->cdp_query("SELECT * FROM user where id= '" . $row->sender_id . "'");
    $sender_data = $db->cdp_registro();

    $db->cdp_query("SELECT * FROM cdb_address_shipments where order_track='" . $row->order_prefix . $row->order_no . "'");
    $address_order = $db->cdp_registro();
}

if (!isset($order_id) or $data['rowCount'] != 1) {
    cdp_redirect_to("courier_list.php");
}


// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('Marafco Universal Concepts');
$pdf->setTitle('Invoice - '.$row->order_prefix . $row->order_no );
$pdf->setSubject('Invoice');
$pdf->setKeywords('PDF, INVOICE');

// set default header data
$header_string = '+'. $core->c_phone. ' | ' . $core->site_email ;
$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $core->site_name, $header_string.'                                  
'. $core->c_address .', '. $core->c_city .', '. $core->c_postal);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->setHeaderMargin(PDF_MARGIN_HEADER);
$pdf->setFooterMargin(0);

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

if($row->status_invoice == 1){
    $html = '<h1 style="color:#03254c; font-size: 46px; ">INVOICE <span style="color:#006A4E; font-size: 46px; ">PAID</span></h1> ';
} else {
    $html = '<h1 style="color:#002D62; font-size: 46px;">INVOICE </h1>';
}


$html .= '<div>
<table>
    <tr>
        <td rowspan="4" style="border: 1px solid white; text-align: left; font-size: 16px;" width="60%">
            <h4 style="color:#03254c;">BILL TO</h4><br/>
            <b style="font-size: 18px;">'. $sender_data->fname . " " . $sender_data->lname.',</b><br/><span style="font-size: 16px;">';
    if($sender_data->company_name) {
        $html .= $sender_data->company_name.',<br/>';
    }

            $html .= $address_order->sender_address.',<br/>';
            $html .= $address_order->sender_city . " | " . $address_order->sender_state.", ".$address_order->sender_country.'.<br/>';
            $html .= $sender_data->email.'</span>';
$html .= '</td>

        <td style="line-height: 7px; border: 1px solid white;" width="20%">
            <p style="color:#002D62;"><b>Payment Method</b></p>
        </td>
        <td style="line-height: 7px; border: 1px solid white;">
            <p>'. $met_payment->name_pay.'</p>
        </td>
    </tr>
    
    <tr>
        <td style="line-height: 8px; border: 1px solid white;" width="20%">
            <p style="color:#002D62;"><b>Ocean Carrier</b></p>
            <p style="color:#002D62;"><b>Shipping Mode</b></p>
        </td>
        <td style="line-height: 8px; border: 1px solid white;"> 
            <p>'.$courier_com->name_off.'</p>
            <p>'.$shipping_mode->ship_mode.'</p>
        </td>
    </tr>
    <tr>
        <td style="line-height: 7px; border: 1px solid white;" width="20%">
            <p style="color:#002D62;"><b>Invoice #</b></p>
        </td>
        <td style="line-height: 7px; border: 1px solid white;">
            <p><b>'. $row->order_prefix . $row->order_no.'</b></p>
        </td>
    </tr>
</table><br/><br/><br/><br/><br/><br/><br/><br/>';


$html .= '<table class="" id="items">
    <tr style="border-top: 1px solid #800000; border-bottom: 1px solid #800000;">
        <th style="line-height: 25px; height: 40px; color:#002D62; text-align: left; font-size: 18px;  border-top: 1px #800000; border-bottom: 1px #800000;" width="85%"><b> Description</b></th>
        <th style="line-height: 25px; height: 40px; color:#002D62; text-align: right; font-size: 18px; border-top: 1px #800000; border-bottom: 1px #800000;" width="15%"><b>Amount  </b></th>
    </tr>';
    if ($invoice_item) {
        $cnt = 0;
        $total =0;
        foreach ($invoice_item as $row_order_item) {
            $cnt += 1;
    $html .= '<tr class="item-row">
        <td style="line-height: 20px; height: 30px; text-align: left; font-size: 14px;"><b>'.$row_order_item[0][0].'</b><br/>'.$row->vehicle .' - VIN '.substr($row->vin,-6).'
        </td>
        <td style="line-height: 20px; height: 30px; text-align: right; font-size: 14px;"><b>'.cdb_money_format($row_order_item[0][1]).'</b></td>
    </tr>';
    $total +=  $row_order_item[0][1];
        }
    
    $html .= '<tr class="item-row">
        <td colspan="2" style="line-height: 25px; height: 30px; text-align: right;"><b style="color:#002D62; font-size: 14px;">TOTAL '.cdb_money_format($total).'</b></td>
    </tr>';
    }


$html .= '</table></div>';



// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');
// new style
$style = array(
	'border' => false,
	'padding' => 0,
	'fgcolor' => array(0,0,0),
	'bgcolor' => false
);

// QRCODE,H : QR-CODE Best error correction
$pdf->write2DBarcode($row->order_prefix . $row->order_no, 'QRCODE,H', 140, 230, 40, 40, $style, 'N');
$pdf->Text(149, 225, $row->order_prefix . $row->order_no);

// ---------------------------------------------------------

//Close and output PDF document
// $pdf->Output('Invoice - '.$row->order_prefix . $row->order_no, 'I');
$pdf->Output('Invoice - '.$row->order_prefix . $row->order_no, 'D');

//============================================================+
// END OF FILE
//============================================================+
