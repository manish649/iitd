<?php
//============================================================+
// File name   : example_006.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 006 for TCPDF class
//               WriteHTML and RTL support
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
 * @abstract TCPDF - Example: WriteHTML and RTL support
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('tcpdf/tcpdf_include.php');
//require_once('PTCPDF.php');
session_start();
require_once './config/config.php';
require_once 'includes/auth_validate.php';
class MYPDF extends TCPDF {

	public function Header() {
		// Logo
		}



	// Page footer
	public function Footer() {
		// Position at 15 mm from bottom
		$this->SetY(-10);
		// Set font
		$this->SetFont('helvetica', 'I', 8);
		// Page number
		}
}

// create new PDF document
// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
//$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Manish Verma');
$pdf->SetTitle('COurse outcome');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 006', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
//$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('dejavusans', '', 10);

// add a page
//$pdf->AddPage();
$pdf->AddPage('P', 'A4');
$pdf->setPrintHeader(true);
$pdf->setPrintFooter(false);
//$pdf->SetLineStyle( array( 'width' => 1, 'color' => array(2,2,10)));
$pdf->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
$pdf->Line(12,12,$pdf->getPageWidth()-12,12); 
$pdf->Line($pdf->getPageWidth()-12,12,$pdf->getPageWidth()-12,$pdf->getPageHeight()-10);
$pdf->Line(12,$pdf->getPageHeight()-10,$pdf->getPageWidth()-12,$pdf->getPageHeight()-10);
$pdf->Line(12,12,12,$pdf->getPageHeight()-10);


///////xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
$db1 = getDbInstance();
$corsdq="";
$copoq="";
$copor="";
$corsdr="";
global $select2;
global $course;
$sessionId= $_SESSION['username'];
$select2 =  filter_input( INPUT_GET, 'bank_ref_no' );
echo $select2;
    $copoq = "SELECT * FROM transactiondetail WHERE bank_ref_no='$select2'";
//	echo $copoq;
 
	$prog_category='';
	$payment_mode='';
	$bank_ref_no='';
	$trans_date='';
	$amount='';
	$status='';
	$participant_name='';
	$birth_date='';
	$parti_category='';
	$id_proof='';
	$id_no='';
	$prof_occu='';
	$organization='';
	$mobile_no='';
	$email='';
	$Installment='';
	$fees='';
	$remark='';

 if ($select2 =='') {
			$prog_category='';
			$payment_mode='';
			$bank_ref_no='';
			$trans_date='';
			$amount='';
			$status='';
			$participant_name='';
			$birth_date='';
			$parti_category='';
			$id_proof='';
			$id_no='';
			$prof_occu='';
			$organization='';
			$mobile_no='';
			$email='';
			$Installment='';
			$fees='';
			$remark='';
 		}
 else{
	$corsdr=  $db1->query($copoq);
	 foreach ($corsdr as $row2) {
			$prog_category=$row2['prog_category'];
			$payment_mode=$row2['payment_mode'];
			$bank_ref_no=$row2['bank_ref_no'];
			$trans_date=$row2['trans_date'];
			$amount=$row2['amount'];
			$status=$row2['status'];
			$participant_name=$row2['participant_name'];
			$birth_date=$row2['birth_date'];
			$parti_category=$row2['parti_category'];
			$id_proof=$row2['id_proof'];
			$id_no=$row2['id_no'];
			$prof_occu=$row2['prof_occu'];
			$organization=$row2['organization'];
			$mobile_no=$row2['mobile_no'];
			$email=$row2['email'];
			$Installment=$row2['Installment'];
			$fees=$row2['fees'];
			$remark=$row2['remark'];
  		}
 	}

 
// create some HTML content
$html = '<div class="container" >
	<div class="content">
	<br><br>
    <div align="left">
		<img src="./images/IITDicon.png" width="100" height="100"/>
	</div>
	<div align="center">
		<img src="./images/header5.png" width="380" height="100"/>
	</div>
    <br>
	<div>GSTIN:07AAATI0393LIZI</div>
	<div>PAN No. AAATI0393L</div>
	<br>
	<div align="left">
	<table border="1">
	<tr ><td rowspan="4">Mr./Ms.  </td><td>SI. No.................</td></tr>
	<tr><td>Date.................</td></tr>
	<tr><td>Invoice No.................</td></tr>
	<tr><td>Program Code.................</td></tr>
	<tr><th align="centre"><b>Particulars</b></th><th align="centre"><b>Amount(Rs)</b></th></tr>
	<tr><th align="left">Towards participation fee for the CEP Programme on <b> $prog_category </b> to be held from $fromdate to $todate at IIT Delhi under the Coordination of <b> Prof. $coordinator </b> Department/School/Centre of <b> $school </b>IIT Delhi. <br> Transaction Id =$transactonid <br> Transaction Date = $tdate </th>
	    <th align="centre">Amount(Rs)  $amount</th></tr> 
	<tr><td>IGST @9.05</td><td></td></tr>
	<tr><td>CGST @9.05</td><td></td></tr>
	<tr><td>SGST @9.05 </td><td></td></tr>
	<tr><td><b>Total</b></td><td>$total</td></tr>
	<tr><td colspan="2"><b>Rs $total_words only</b></td></tr>
	
	
 	</table>
	 <div align="right>CEP Accounts</div>
	
';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');
//////////////////////////////////////////////////////////////
//Close and output PDF document
header('Content-type: application/pdf');
header('Content-Disposition: attachment; filename="file.pdf"');
//$filename=$sessionId."_".$select2.".pdf";

$pdf->Output("nv.pdf", 'I');
//============================================================+
// END OF FILE
//============================================================+