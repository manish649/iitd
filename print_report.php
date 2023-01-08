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

	//Page header
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

		$footer='QIP/CEP OFFICE, 1st Floor Vishwakarma Bhawan, IIT Delhi, Hauz Khas, New Delhi 110016'	;
		$this->Cell(0, 10,$footer, 0, false, 'L', 0, '', 0, false, 'T', 'M');
	
	

	}
}



// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
//$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('IITD');
$pdf->SetTitle('Fee Receipt');
$pdf->SetSubject('Fee Receipt');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data

// set header and footer fonts

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
$pdf->SetFont('times', '', 10);

// add a page
//$pdf->AddPage();
$pdf->AddPage('P', 'A4');
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(true);
//$pdf->SetLineStyle( array( 'width' => 1, 'color' => array(2,2,10)));
$pdf->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
$pdf->Line(12,12,$pdf->getPageWidth()-12,12); 
$pdf->Line($pdf->getPageWidth()-12,12,$pdf->getPageWidth()-12,$pdf->getPageHeight()-10);
$pdf->Line(12,$pdf->getPageHeight()-10,$pdf->getPageWidth()-12,$pdf->getPageHeight()-10);
$pdf->Line(12,12,12,$pdf->getPageHeight()-10);

// writeHTML($html, $ln=true, $fill=false, $reseth=false, $cell=false, $align='')
 //writeHTMLCell($w, $h, $x, $y, $html='', $border=1, $ln=0, $fill=0, $reseth=true, $align='', $autopadding=true)

///////xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
function numberTowords($num)
{ 
$ones = array( 
1 => "One", 
2 => "Two", 
3 => "Three", 
4 => "Four", 
5 => "Five", 
6 => "Six", 
7 => "Seven", 
8 => "Eight", 
9 => "Nine", 
10 => "Ten", 
11 => "Eleven", 
12 => "Twelve", 
13 => "Thirteen", 
14 => "Fourteen", 
15 => "Fifteen", 
16 => "Sixteen", 
17 => "Seventeen", 
18 => "Eighteen", 
19 => "Nineteen" 
); 
$tens = array( 
1 => "Ten",
2 => "Twenty", 
3 => "Thirty", 
4 => "Forty", 
5 => "Fifty", 
6 => "Sixty", 
7 => "Seventy", 
8 => "Eighty", 
9 => "Ninety" 
); 
$hundreds = array( 
"Hundred", 
"Thousand", 
"Million", 
"Billion", 
"Trillion", 
"Quadrillion" 
); //limit t quadrillion 

$num = number_format($num,2,".",","); 
$num_arr = explode(".",$num); 
$wholenum = $num_arr[0]; 
$decnum = $num_arr[1]; 
$whole_arr = array_reverse(explode(",",$wholenum)); 
krsort($whole_arr); 
$rettxt = ""; 
foreach($whole_arr as $key => $i){ 
if($i < 20){ 
$rettxt .= $ones[$i]; 
}elseif($i < 100){ 
$rettxt .= $tens[substr($i,0,1)]; 
$rettxt .= " ".$ones[substr($i,1,1)]; 
}else{ 
$rettxt .= $ones[substr($i,0,1)]." ".$hundreds[0]; 
$rettxt .= " ".$tens[substr($i,1,1)]; 
$rettxt .= " ".$ones[substr($i,2,1)]; 
} 
if($key > 0){ 
$rettxt .= " ".$hundreds[$key]." "; 
} 
} 
if($decnum > 0){ 
$rettxt .= " Point "; 
if($decnum < 20){ 
$rettxt .= $ones[$decnum]; 
}elseif($decnum < 100){ 
$rettxt .= $tens[substr($decnum,0,1)]; 
$rettxt .= " ".$ones[substr($decnum,1,1)]; 
} 
} 
return $rettxt; 
} 

///////xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
$db1 = getDbInstance();

$corsdq="";
$copoq="";
$copor="";
$corsdr="";
global $select2;
global $course;
$sessionId= $_SESSION['username'];
$select =  filter_input( INPUT_GET, 'bank_ref_no' );
echo $select2;
    $copoq = "SELECT * FROM transactiondetail WHERE bank_ref_no='$select'";
	$html=$copoq;
//	echo $copoq;
 
	$prog_category='';
	$payment_mode='';
	$bank_ref_no='';
	$trans_date='';
	global $amount;
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
	global $wamount;
if ($select =='') {
	
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
	$wamount='';
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
		  // $wamount=numberTowords($amount);

		   
		  // echo $wamount;
  }
 // echo $amount;
  //$wamount=numberTowords($amount);
  //echo $wamount;
 }
//$amount=543.78;
 
$igst=18;
$cgst=20;
$sgst=16;
$total = $amount+$igst+$cgst+$sgst;
//$total=238; 
$wamount=numberTowords($total);


// create some HTML content
$html = '<div class="container" >
	<div class="content">
	<br><br>
    <div align="centre">
		<img src="./images/header4.png"  height="100"/>
	</div>
	
    <br>
	<div>GSTIN:07AAATI0393LIZI</div>
	<div>PAN No. AAATI0393L</div>
	<br>
	<div align="left">
	<table border="1">
	<tr ><td rowspan="4">Mr./Ms.'.$participant_name.' </td><td>SI. No.................</td></tr>
	<tr><td>Date. <b>'.$trans_date.'</b></td></tr>
	<tr><td>Invoice No.................</td></tr>
	<tr><td>Program Code <b>'.$prog_category.'</b></td></tr>
	<tr><th align="centre"><b>Particulars</b></th><th align="centre"><b>Amount(Rs)</b></th></tr>
	<tr><th align="left">Towards participation fee for the CEP Programme on <b> '.$prog_category.' </b> to be held from $fromdate to $todate at IIT Delhi under the Coordination of <b> Prof. $coordinator 
	</b> Department/School/Centre of <b> $school </b>IIT Delhi. <br> 
	Transaction Id =<b>'.$bank_ref_no.'</b> <br>Transaction Date = <b>'.$trans_date.' </b></th>
	    <th align="centre">Amount(Rs) <b>'. $amount.'</b></th></tr> 
	<tr><td>IGST @9.05</td><td><b> '.$igst.'</b></td></tr>
	<tr><td>CGST @9.05</td><td><b> '.$cgst.'</b></td></tr>
	<tr><td>SGST @9.05 </td><td><b> '.$sgst.'</b></td></tr>
	<tr><td><b>Total</b></td><td><b> '.$total.'</b></td></tr>
	<tr><td align="left" colspan="2"><b>Rs. '.$wamount.' Only</b></td></tr>
	</table>
	 <div align="right>CEP Accounts</div>
	
';

//$html = $html.'QIP/CEP OFFICE, 1st Floor Vishwakarma Bhawan, IIT Delhi, Hauz Khas, New Delhi 110016';

//$pdf->Line(12,$pdf->getPageHeight()-30,$pdf->getPageWidth()-12,$pdf->getPageHeight()-30);

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

//////////////////////////////////////////////////////////////
//Close and output PDF document
header('Content-type: application/pdf');
header('Content-Disposition: attachment; filename="file.pdf"');
$filename=$sessionId."_".$select2.".pdf";
$pdf->Output($filename, 'I');

//============================================================+
// END OF FILE
//============================================================+
