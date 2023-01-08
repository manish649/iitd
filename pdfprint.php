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
		$image_file = K_PATH_IMAGES.'shardalogo.png';
		$this->Image($image_file, 15, 15, 35, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
		// Set font
	//	$this->SetFont('helvetica', 'B', 16);
		// Title
	//	$this->Cell(0, 55, 'School of Engineering & Technology', 0, false, 'C', 0, '', 0, false, 'M', 'M');
	 $html = '<table><tr><td align="ceter"><h2>School of Engineering & Technology</h4></td></tr>
	 <tr><td align="center"><h4>Outcome Based Learning</h4></td></tr>
	 </table>';
     $this->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = 'top', $autopadding = true);

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
$pdf->AddPage();
$pdf->setPrintHeader(true);
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

///////xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
$db1 = getDbInstance();

$corsdq="";
$copoq="";
$copor="";
$corsdr="";
global $select2;
global $course;
$sessionId= $_SESSION['username'];
if (isset($_POST['course_code'])) {
   $select2 = "cse219";//$_POST['course_code'];
}
$select2 = "cse219";
	$corsdq = "SELECT school,prog, sem, course_code,course_name,course_desc,co1,co2,co3,co4,co5,co6 FROM course WHERE user='$sessionId' and course_code='$select2'";
    $copoq = "SELECT * FROM copo_details WHERE faculty_id='$sessionId' and course_code='$select2'";
 
$i=0;
$prog='';
$sem='';
$school='';
$course_code='';
$course_name='';
$course_desc='';
$co1='';
$co2='';
$co3='';
$co4='';
$co5='';
$co6='';
 if ($select2 =='') {
			$i=''; 
			$prog='';
			$sem='';
			$school='';
			$course_code='';
			$course_name='';
			$co1='';
			$co2='';
			$co3='';
			$co4='';
			$co5='';
			$co6='';
 }
 else{
	        $corsdr=  $db1->query($corsdq);
	 foreach ($corsdr as $row2) {
		// echo "querry =".$corsdq;
			//echo "row222=".$row2;
			$i=$i+1; 
			$school=$row2['school'];
			$prog=$row2['prog'];
			$sem=$row2['sem'];
			$course_code=$row2['course_code'];
			$course_name=$row2['course_name'];
			$course_desc=$row2['course_desc'];
			$co1=$row2['co1'];
			$co1=$row2['co1'];
			$co2=$row2['co2'];
			$co3=$row2['co3'];
			$co4=$row2['co4'];
			$co5=$row2['co5'];
			$co6=$row2['co6'];
  }
 }
// create some HTML content
$html = '<div class="container" >
	<div class="content">
	<br><br>
    <div align="center">
		<img src="s.jpg" width="303" height="73"/>
	</div>
    <br><br><br><br><br><br><br>
    <div align="center">
		<h1>'.$school.'</h1>
		<h2>'.$prog.'</h2>
		<h3> Course Code:  '. $course_code .'</h3>
		<h3> Course Name:  '.$course_name .'</h3>
		
	</div>


    <div align="center" >
	  <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	  
      <table   border="1">
        <tr>
          <th colspan="2" scope="col"><p><strong>Faculty Details:</strong></p></th>
        </tr>
        <tr>
          <th  scope="row"><p align="left">Name</p></th>
          <td >'.$sessionId.'</td>
        </tr>
        <tr>
          <th scope="row"><p align="left">Website link</p></th>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <th scope="row"><p align="left">Designation</p></th>
          <td>Assistant Professor</td>
        </tr>
        <tr>
          <th scope="row"><p align="left">School</p></th>
          <td>School of Engineering and Technology</td>
        </tr>
        <tr>
          <th scope="row"><p align="left">Cabin No</p></th>
          <td>215 B1</td>
        </tr>
        <tr>
          <th scope="row"><p align="left">Intercom </p></th>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <th scope="row"><p align="left">Open Hours</p></th>
          <td>&nbsp;</td>
        </tr>
      </table>
    </div>
	</div>
	</div>
	
';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

$pdf->writeHTML($html5, true, false, true, false, '');
/////////// co wise table  begins ----------------------->

/////////// co wise table  ENDS ----------------------->



//Close and output PDF document
header('Content-type: application/pdf');
header('Content-Disposition: attachment; filename="file.pdf"');
$pdf->Output('example_006.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
