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
		$db2 = getDbInstance();
		$select2 = "";
		if (isset($_REQUEST['course_code'])) {
		$select2 = $_REQUEST['course_code'];
		}
		else{
			$select2 = "";
		}
		
		$corsdq = "SELECT course_name FROM course WHERE user='$_SESSION[username]' and course_code='$select2'";
		$corsdr=  $db2->query($corsdq);
		$course_name='';
	        foreach ($corsdr as $row2) {
				$course_name=$row2['course_name'];
			}		
		$this->Cell(0, 10,'Prepared By '.$_SESSION['username'].'  '.'Course Name:'.$course_name, 0, false, 'L', 0, '', 0, false, 'T', 'M');
		
		//$this->Cell(0, 10,'Course Name:'.$course_name , 0, false, 'C', 0, '', 0, false, 'T', 'M');
		
		$this->Cell(0, 10, 'Page '.$this->getAliasNumPage(), 0, false, 'R', 0, '', 0, false, 'T', 'M');
		
		//$db2.close();
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
   $select2 = $_POST['course_code'];
}else{
$select2 = "";
}
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
		<img src="./images/s.jpg" width="303" height="73"/>
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
          <th scope="row"><p align="left">Cabin No                             </p></th>
          <td>215 B1</td>
        </tr>
        <tr>
          <th scope="row"><p align="left">Intercom  </p></th>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <th scope="row"><p align="left">Open Hours                         </p></th>
          <td>&nbsp;</td>
        </tr>
      </table>
    </div>
	</div>
	</div>
	
';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');


$pdf->AddPage();
$pdf->setPrintFooter(true);
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 006', PDF_HEADER_STRING);
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
$pdf->Line(12,12,$pdf->getPageWidth()-12,12); 
$pdf->Line($pdf->getPageWidth()-12,12,$pdf->getPageWidth()-12,$pdf->getPageHeight()-10);
$pdf->Line(12,$pdf->getPageHeight()-10,$pdf->getPageWidth()-12,$pdf->getPageHeight()-10);
$pdf->Line(12,12,12,$pdf->getPageHeight()-10);

// output some RTL HTML content
$html2 = '<div>
<br>
<br>
<div style="text-align:Left,border:0px red;"><b>Course Objective:</b>'.$course_desc.'</div>
<br>
<br>
<div >

<table border="1" cellpadding="4"  style="width:100%">
<tr><th><h3>Learning Outcome</h3></th></tr>

<tr>
<td width="30%">Course Outcome 1</td>
  <td align="left" >'.$co1.'</td></tr>
<tr><th> Course Outcome 2</th><td>'.$co2.'</td></tr>
<tr><th> Course Outcome 3</th><td>'.$co3.'</td></tr>
<tr><th> Course Outcome 4</th><td>'.$co4.'</td></tr>
<tr><th> Course Outcome 5</th><td>'.$co5.'</td></tr>
<tr><th> Course Outcome 6</th><td>'.$co6.'</td></tr>
</table>
</div>
</div>';
$page_co = $pdf->getPage();
$pdf->writeHTML($html2, true, false, true, false, '');
/////////////////////////////////////////////////////////
/// print syllabus //////////////////////////////////////
//\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\


	if (isset($_POST['course_code'])) {
		$select2 = $_POST['course_code'];
	}else{
		$select2 = "";
	}

$corsdq = "SELECT * FROM syllabus WHERE faculty_id='$sessionId' and course_code='$select2'";

   
   
$i=0;
$course_name='';
$prerequisite='';
$lecture='';
$tutorial='';
$practical='';
$unit1='';
$unit2='';
$unit3='';
$unit4='';
$unit5='';
$text1='';
$text2='';
$text3='';
$ref1='';
$ref2='';
$ref3='';
 if ($select2 =='') {
			$i=''; 
			$course_name='';
$prerequisite='';
$lecture='';
$tutorial='';
$practical='';
$unit1='';
$unit2='';
$unit3='';
$unit4='';
$unit5='';
$text1='';
$text2='';
$text3='';
$ref1='';
$ref2='';
$ref3='';
 }
 else{
	        $corsdr=  $db1->query($corsdq);
	 foreach ($corsdr as $row2) {
		// echo "querry =".$corsdq;
			//echo "row222=".$row2;
			$i=$i+1; 
			$prerequisite=$row2['prerequisite'];
			$lecture=$row2['lecture'];
			$tutorial=$row2['tutorial'];
			$practical=$row2['practical'];
			$course_name=$row2['course_name'];
			$unit1=$row2['unit1'];
			$unit2=$row2['unit2'];
			$unit3=$row2['unit3'];
			$unit4=$row2['unit4'];
			$unit5=$row2['unit5'];
			$text1=$row2['text1'];
			$text2=$row2['text2'];
			$text3=$row2['text3'];
			$ref1=$row2['ref1'];
			$ref2=$row2['ref2'];
			$ref3=$row2['ref3'];
			
  }
 }




$pdf->AddPage();
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 006', PDF_HEADER_STRING);
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
$pdf->Line(12,12,$pdf->getPageWidth()-12,12); 
$pdf->Line($pdf->getPageWidth()-12,12,$pdf->getPageWidth()-12,$pdf->getPageHeight()-10);
$pdf->Line(12,$pdf->getPageHeight()-10,$pdf->getPageWidth()-12,$pdf->getPageHeight()-10);
$pdf->Line(12,12,12,$pdf->getPageHeight()-10);

// output some RTL HTML content

$html3 = '<div>
<div style="text-align:center,border:0px;"><b>Syllabus:</b></div>

<table border="1" cellpadding="4"  style="width:100%">
<tr><th width="30%"> Course Code:'.$select2.'</th><th width="70%">Course Name :'.$course_name.'</th></tr>
<tr><th width="30%"> Prerequisite</th><td width="70%">'.$prerequisite.'</td></tr>
<tr><th> L T P </th><td>'.$lecture.'- '.$tutorial.'- '.$practical.'</td></tr>
<tr><th> Unit 1</th><td>'.$unit1.'</td></tr>
<tr><th> Unit 2</th><td>'.$unit2.'</td></tr>
<tr><th> Unit 3</th><td>'.$unit3.'</td></tr>
<tr><th> Unit 4</th><td>'.$unit4.'</td></tr>
<tr><th> Unit 5</th><td>'.$unit5.'</td></tr>
<tr><th> Text Book 1</th><td>'.$text1.'</td></tr>
<tr><th> Text Book 2</th><td>'.$text2.'</td></tr>
<tr><th> Text Book 3</th><td>'.$text3.'</td></tr>
<tr><th> Reference 4</th><td>'.$ref1.'</td></tr>
<tr><th> Reference 5</th><td>'.$ref2.'</td></tr>
<tr><th> Reference 6</th><td>'.$ref3.'</td></tr>
</table>

</div>';

//$str = $db1->getLastQuery();
//$pdf->writeHTML($str, true, false, true, false, '');

$page_syllabus = $pdf->getPage();
$pdf->writeHTML($html3, true, false, true, false, '');




/// End Printing syllabus
////////////////// copo Details //////////////////////
/////////////////////////////////////////////////////

$pdf->AddPage();
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 006', PDF_HEADER_STRING);
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
$pdf->Line(12,12,$pdf->getPageWidth()-12,12); 
$pdf->Line($pdf->getPageWidth()-12,12,$pdf->getPageWidth()-12,$pdf->getPageHeight()-10);
$pdf->Line(12,$pdf->getPageHeight()-10,$pdf->getPageWidth()-12,$pdf->getPageHeight()-10);
$pdf->Line(12,12,12,$pdf->getPageHeight()-10);


// CO1 details 
$co1q = "SELECT * FROM copo_details WHERE faculty_id='$sessionId' and course_code='$select2' and cono='1'";
	
	     $co1r = $db1->query( $co1q);
		 
		    $po11="";
			$po12="";
			$po13="";
			$po14="";
			$po15="";
			$po16="";
			$po17="";
			$po18="";
			$po19="";
			$po110="";
			$po111="";
			$po112="";
			$peo11="";
			$peo12="";
			$peo13="";
		 foreach ($co1r as $row2) {
			$po11=$row2['po1'];
			$po12=$row2['po2'];
			$po13=$row2['po3'];
			$po14=$row2['po4'];
			$po15=$row2['po5'];
			$po16=$row2['po6'];
			$po17=$row2['po7'];
			$po18=$row2['po8'];
			$po19=$row2['po9'];
			$po110=$row2['po10'];
			$po111=$row2['po11'];
			$po112=$row2['po12'];
			$peo11=$row2['peo1'];
			$peo12=$row2['peo2'];
			$peo13=$row2['peo3'];
			
  }
   $co2q = "SELECT * FROM copo_details WHERE faculty_id='$sessionId' and course_code='$select2' and cono='2'";
	
	     $co2r = $db1->query($co2q);
		 
		    $po21="";
			$po22="";
			$po23="";
			$po24="";
			$po25="";
			$po26="";
			$po27="";
			$po28="";
			$po29="";
			$po210="";
			$po211="";
			$po212="";
			$peo21="";
			$peo22="";
			$peo23="";
		 foreach ( $co2r as $row2 ) {
			$po21=$row2['po1'];
			$po22=$row2['po2'];
			$po23=$row2['po3'];
			$po24=$row2['po4'];
			$po25=$row2['po5'];
			$po26=$row2['po6'];
			$po27=$row2['po7'];
			$po28=$row2['po8'];
			$po29=$row2['po9'];
			$po210=$row2['po10'];
			$po211=$row2['po11'];
			$po212=$row2['po12'];
			$peo21=$row2['peo1'];
			$peo22=$row2['peo2'];
			$peo23=$row2['peo3'];
			
  }
  
   $co3q = "SELECT * FROM copo_details WHERE faculty_id='$sessionId' and course_code='$select2' and cono='3'";
	
	     $co3r = $db1->query($co3q);
		 
		    $po31="";
			$po32="";
			$po33="";
			$po34="";
			$po35="";
			$po36="";
			$po37="";
			$po38="";
			$po39="";
			$po310="";
			$po311="";
			$po312="";
			$peo31="";
			$peo32="";
			$peo33="";
		foreach($co3r as $row2) {
			$po31=$row2['po1'];
			$po32=$row2['po2'];
			$po33=$row2['po3'];
			$po34=$row2['po4'];
			$po35=$row2['po5'];
			$po36=$row2['po6'];
			$po37=$row2['po7'];
			$po38=$row2['po8'];
			$po39=$row2['po9'];
			$po310=$row2['po10'];
			$po311=$row2['po11'];
			$po312=$row2['po12'];
			$peo31=$row2['peo1'];
			$peo32=$row2['peo2'];
			$peo33=$row2['peo3'];
			
  }
  
   $co4q = "SELECT * FROM copo_details WHERE faculty_id='$sessionId' and course_code='$select2' and cono='4'";
	
	     $co4r = $db1->query( $co4q);
		 
		    $po41="";
			$po42="";
			$po43="";
			$po44="";
			$po45="";
			$po46="";
			$po47="";
			$po48="";
			$po49="";
			$po410="";
			$po411="";
			$po412="";
			$peo41="";
			$peo42="";
			$peo43="";
		foreach($co4r as $row2) {
		
			$po41=$row2['po1'];
			$po42=$row2['po2'];
			$po43=$row2['po3'];
			$po44=$row2['po4'];
			$po45=$row2['po5'];
			$po46=$row2['po6'];
			$po47=$row2['po7'];
			$po48=$row2['po8'];
			$po49=$row2['po9'];
			$po410=$row2['po10'];
			$po411=$row2['po11'];
			$po412=$row2['po12'];
			$peo41=$row2['peo1'];
			$peo42=$row2['peo2'];
			$peo43=$row2['peo3'];
			
  }
  
  $co5q = "SELECT * FROM copo_details WHERE faculty_id='$sessionId' and course_code='$select2' and cono='5'";
	
	     $co5r = $db1->query($co5q);
		 
		    $po51="";
			$po52="";
			$po53="";
			$po54="";
			$po55="";
			$po56="";
			$po57="";
			$po58="";
			$po59="";
			$po510="";
			$po511="";
			$po512="";
			$peo51="";
			$peo52="";
			$peo53="";
			
			
		foreach($co5r as $row2) {
			$po51=$row2['po1'];
			$po52=$row2['po2'];
			$po53=$row2['po3'];
			$po54=$row2['po4'];
			$po55=$row2['po5'];
			$po56=$row2['po6'];
			$po57=$row2['po7'];
			$po58=$row2['po8'];
			$po59=$row2['po9'];
			$po510=$row2['po10'];
			$po511=$row2['po11'];
			$po512=$row2['po12'];
			$peo51=$row2['peo1'];
			$peo52=$row2['peo2'];
			$peo53=$row2['peo3'];
			
  }
  
  	 $co6q = "SELECT * FROM copo_details WHERE faculty_id='$sessionId' and course_code='$select2' and cono='6'";
	
	     $co6r = $db1->query($co6q);
		 
		    $po61="";
			$po62="";
			$po63="";
			$po64="";
			$po65="";
			$po66="";
			$po67="";
			$po68="";
			$po69="";
			$po610="";
			$po611="";
			$po612="";
			$peo61="";
			$peo62="";
			$peo63="";
			
			
		foreach( $co6r as $row2) {
			$po61=$row2['po1'];
			$po62=$row2['po2'];
			$po63=$row2['po3'];
			$po64=$row2['po4'];
			$po65=$row2['po5'];
			$po66=$row2['po6'];
			$po67=$row2['po7'];
			$po68=$row2['po8'];
			$po69=$row2['po9'];
			$po610=$row2['po10'];
			$po611=$row2['po11'];
			$po612=$row2['po12'];
			$peo61=$row2['peo1'];
			$peo62=$row2['peo2'];
			$peo63=$row2['peo3'];
			
  }

$html3 = '<div>
<div style="text-align:Left,border:0px red;"><h3>COPO Mapping</h3></div>
<div >

<table border="1" cellpadding="4" style="width:100%">
<tr>
<td >POs\COs </td><td>PO1</td><td>PO2</td><td>PO3</td><td>PO4</td><td>PO5</td><td>PO6</td><td>PO7</td><td>PO8</td><td>PO9</td><td>PO10</td><td>PO11</td><td>PO12</td><td>PSO1</td><td>PSO2</td><td>PSO3</td>
  
</tr>
<tr>
<td >CO1 </td><td>'.$po11.'</td><td>'.$po12.'</td><td>'.$po13.'</td><td>'.$po14.'</td><td>'.$po15.'</td><td>'.$po16.'</td><td>'.$po17.'</td><td>'.$po18.'</td><td>'.$po19.'</td><td>'.$po110.'</td><td>'.$po111.'</td><td>'.$po112.'</td><td>'.$peo11.'</td><td>'.$peo12.'</td><td>'.$peo13.'</td>
</tr>

<tr>
<td >CO2 </td><td>'.$po21.'</td><td>'.$po22.'</td><td>'.$po23.'</td><td>'.$po24.'</td><td>'.$po25.'</td><td>'.$po26.'</td><td>'.$po27.'</td><td>'.$po28.'</td><td>'.$po29.'</td><td>'.$po210.'</td><td>'.$po211.'</td><td>'.$po212.'</td><td>'.$peo21.'</td><td>'.$peo22.'</td><td>'.$peo23.'</td>
</tr>

<tr>
<td >CO3 </td><td>'.$po31.'</td><td>'.$po32.'</td><td>'.$po33.'</td><td>'.$po34.'</td><td>'.$po35.'</td><td>'.$po36.'</td><td>'.$po37.'</td><td>'.$po38.'</td><td>'.$po39.'</td><td>'.$po310.'</td><td>'.$po311.'</td><td>'.$po312.'</td><td>'.$peo31.'</td><td>'.$peo32.'</td><td>'.$peo33.'</td>
</tr>

<tr>
<td >CO4 </td><td>'.$po41.'</td><td>'.$po42.'</td><td>'.$po43.'</td><td>'.$po44.'</td><td>'.$po45.'</td><td>'.$po46.'</td><td>'.$po47.'</td><td>'.$po48.'</td><td>'.$po49.'</td><td>'.$po410.'</td><td>'.$po411.'</td><td>'.$po412.'</td><td>'.$peo41.'</td><td>'.$peo42.'</td><td>'.$peo43.'</td>
</tr>


<tr>
<td >CO5 </td><td>'.$po51.'</td><td>'.$po52.'</td><td>'.$po53.'</td><td>'.$po54.'</td><td>'.$po55.'</td><td>'.$po56.'</td><td>'.$po57.'</td><td>'.$po58.'</td><td>'.$po59.'</td><td>'.$po510.'</td><td>'.$po511.'</td><td>'.$po512.'</td><td>'.$peo51.'</td><td>'.$peo52.'</td><td>'.$peo53.'</td>
</tr>

<tr>
<td >CO6 </td><td>'.$po61.'</td><td>'.$po62.'</td><td>'.$po63.'</td><td>'.$po64.'</td><td>'.$po65.'</td><td>'.$po66.'</td><td>'.$po67.'</td><td>'.$po68.'</td><td>'.$po69.'</td><td>'.$po610.'</td><td>'.$po611.'</td><td>'.$po612.'</td><td>'.$peo61.'</td><td>'.$peo62.'</td><td>'.$peo63.'</td>
</tr>


</table>
</div>
</div>';
$page_copomap = $pdf->getPage();

$pdf->writeHTML($html3, true, false, true, false, '');
// ---------------------------------------------------------
$pdf->AddPage('L','A4');

//$pdf->SetLineStyle( array( 'width' => 1, 'color' => array(2,2,10)));
$pdf->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
$pdf->Line(12,12,$pdf->getPageWidth()-12,12); 
$pdf->Line($pdf->getPageWidth()-12,12,$pdf->getPageWidth()-12,$pdf->getPageHeight()-10);
$pdf->Line(12,$pdf->getPageHeight()-10,$pdf->getPageWidth()-12,$pdf->getPageHeight()-10);
$pdf->Line(12,12,12,$pdf->getPageHeight()-10);

// printing Quiz Marks
$html4 = '<div>
<div style="text-align:center"><h3>Quiz & CA Marks</h3></div>
<div >

<table width="92%" border="1">
        
            <tr>
                <th width="4%">#</th>
                <th width="14%">Roll No</th>
                <th width="14%">Name</th>
               	<th>Q1</th>
				<th>Q2</th>
				<th>Q3</th>
				<th>Q4</th>
				<th>Q5</th>
				<th>Asgn1</th>
				<th>Asgn2</th>
				<th>Asgn3</th>
				<th>Asgn4</th>
				<th>CA </th>
				
            </tr>
        
        <tbody>';
		
		$coq = "SELECT * FROM quiz WHERE facultyId='$sessionId' and course_code='$select2'";
	$i=0;
	     $customers = $db1->query($coq);
foreach ($customers as $row) : $i=$i+1; 
//foreach($your_data_array as $key => $current) {
    $html4 .= '<tr>
        <td>' . $i . '</td>
        <td>' . $row['roll_no']. '</td>
		<td>' . $row['name']. '</td>
		<td>' . $row['quiz1']. '</td>
		<td>' . $row['quiz2']. '</td>
		<td>' . $row['quiz3']. '</td>
		<td>' . $row['quiz4']. '</td>
		<td>' . $row['quiz5']. '</td>
		<td>' . $row['assign1']. '</td>
		<td>' . $row['assign2']. '</td>
		<td>' . $row['assign3']. '</td>
		<td>' . $row['assign4']. '</td>
		<td>' . $row['ca']. '</td>
    </tr>';
endforeach;

$html4 .= '</table>';
$page_quiz = $pdf->getPage();
$pdf->writeHTML($html4, true, false, true, false, '');
////////////////////////////////////////////////////////////////
////////////// mte marks///////////////////////////
/////////////////////////////////////////////////////
//$pdf->AddPage();
$pdf->AddPage('L', 'A4');
//$pdf->SetLineStyle( array( 'width' => 1, 'color' => array(2,2,10)));
$pdf->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
$pdf->Line(12,12,$pdf->getPageWidth()-12,12); 
$pdf->Line($pdf->getPageWidth()-12,12,$pdf->getPageWidth()-12,$pdf->getPageHeight()-10);
$pdf->Line(12,$pdf->getPageHeight()-10,$pdf->getPageWidth()-12,$pdf->getPageHeight()-10);
$pdf->Line(12,12,12,$pdf->getPageHeight()-10);


$html5 = '<div>
<div style="text-align:center"><h3>Mid Term Exam Marks</h3></div>
<div >

<table width="92%" border="1">
        
            <tr>
                <th width="4%">#</th>
                <th width="14%">Roll No</th>
               	<th>Q1</th>
				<th>Q2</th>
				<th>Q3</th>
				<th>Q4</th>
				<th>Q5</th>
				<th>Q6</th>
				<th>Q7</th>
				<th>Q8</th>
				<th>Q9</th>
				<th>Q10</th>
				<th>Q11</th>
				<th>Q12</th>
				<th>Q13</th>
				<th>Q14</th>
				<th>Q15</th>
				<th>Q16</th>
				<th>Q17</th>
				<th>Q18</th>
				<th>Q19</th>
				<th>Q20</th>
				
            </tr>
        
        <tbody>';
		
		$coq2 = "SELECT * FROM mte WHERE facultyId='$sessionId' and course_code='$select2'";
	$i=0;
	     $customerm = $db1->query($coq2);
foreach ($customerm as $row) : $i=$i+1; 
//foreach($your_data_array as $key => $current) {
    $html5 .= '<tr>
        <td>' . $i . '</td>
        <td>' . $row['roll_no']. '</td>
		<td>' . $row['mq1']. '</td>
		<td>' . $row['mq2']. '</td>
		<td>' . $row['mq3']. '</td>
		<td>' . $row['mq4']. '</td>
		<td>' . $row['mq5']. '</td>
		<td>' . $row['mq6']. '</td>
		<td>' . $row['mq7']. '</td>
		<td>' . $row['mq8']. '</td>
		<td>' . $row['mq9']. '</td>
		<td>' . $row['mq10']. '</td>
		<td>' . $row['mq11']. '</td>
		<td>' . $row['mq12']. '</td>
		<td>' . $row['mq13']. '</td>
		<td>' . $row['mq14']. '</td>
		<td>' . $row['mq15']. '</td>
		<td>' . $row['mq16']. '</td>
		<td>' . $row['mq17']. '</td>
		<td>' . $row['mq18']. '</td>
		<td>' . $row['mq19']. '</td>
		<td>' . $row['mq20']. '</td>
    </tr>';
endforeach;

$html5 .= '</table>';
$page_mte = $pdf->getPage();
$pdf->writeHTML($html5, true, false, true, false, '');

////// ETE Marks

//$pdf->AddPage();
$pdf->AddPage('L', 'A4');
$pdf->setPrintHeader(true);
$pdf->setPrintFooter(true);
//$pdf->SetLineStyle( array( 'width' => 1, 'color' => array(2,2,10)));
$pdf->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
$pdf->Line(12,12,$pdf->getPageWidth()-12,12); 
$pdf->Line($pdf->getPageWidth()-12,12,$pdf->getPageWidth()-12,$pdf->getPageHeight()-10);
$pdf->Line(12,$pdf->getPageHeight()-10,$pdf->getPageWidth()-12,$pdf->getPageHeight()-10);
$pdf->Line(12,12,12,$pdf->getPageHeight()-10);


$html5 = '<div>
<div style="text-align:center"><h3>End Term Exam Marks</h3></div>
<div >

<table width="92%" border="1">
        
            <tr>
                <th width="4%">#</th>
                <th width="14%">Roll No</th>
               	<th>Q1</th>
				<th>Q2</th>
				<th>Q3</th>
				<th>Q4</th>
				<th>Q5</th>
				<th>Q6</th>
				<th>Q7</th>
				<th>Q8</th>
				<th>Q9</th>
				<th>Q10</th>
				<th>Q11</th>
				<th>Q12</th>
				<th>Q13</th>
				<th>Q14</th>
				<th>Q15</th>
				<th>Q16</th>
				<th>Q17</th>
				<th>Q18</th>
				<th>Q19</th>
				<th>Q20</th>
				
            </tr>
        
        <tbody>';
		
		$coq3 = "SELECT * FROM ete WHERE facultyId='$sessionId' and course_code='$select2'";
	$i=0;
	     $customere = $db1->query($coq3);
foreach ($customere as $row) : $i=$i+1; 
//foreach($your_data_array as $key => $current) {
    $html5 .= '<tr>
        <td>' . $i . '</td>
        <td>' . $row['roll_no']. '</td>
		<td>' . $row['eq1']. '</td>
		<td>' . $row['eq2']. '</td>
		<td>' . $row['eq3']. '</td>
		<td>' . $row['eq4']. '</td>
		<td>' . $row['eq5']. '</td>
		<td>' . $row['eq6']. '</td>
		<td>' . $row['eq7']. '</td>
		<td>' . $row['eq8']. '</td>
		<td>' . $row['eq9']. '</td>
		<td>' . $row['eq10']. '</td>
		<td>' . $row['eq11']. '</td>
		<td>' . $row['eq12']. '</td>
		<td>' . $row['eq13']. '</td>
		<td>' . $row['eq14']. '</td>
		<td>' . $row['eq15']. '</td>
		<td>' . $row['eq16']. '</td>
		<td>' . $row['eq17']. '</td>
		<td>' . $row['eq18']. '</td>
		<td>' . $row['eq19']. '</td>
		<td>' . $row['eq20']. '</td>
    </tr>';
endforeach;

$html5 .= '</table>';
$page_ete = $pdf->getPage();

$pdf->writeHTML($html5, true, false, true, false, '');
/////////// co wise table  begins ----------------------->

/////////////////////////////Quiz co tables ///////////////////////////


$db = getDbInstance();
//$select = array('roll_no', 'name', 'course_code','batch','quiz1','quiz2','quiz3','quiz4','quiz5','assign1','assign2','assign3','assign4','ca');

$select= "select * from quiz where course_code='".$select2."' and facultyID='".$sessionId."'";

//Start building query according to input parameters.
// If search string
		$qz1co=0;
		$qz2co= 0;
		$qz3co= 0;
		$qz4co= 0;
		$qz5co= 0;
		$assign1=0;
		$assign2=0;
		$assign3=0;
		$assign4=0;
		$caco =0;
		$asg1co=0;
		$asg2co=0;
		$asg3co=0;
		$asg4co=0;

if ($select2)     //select2 =coursecode
{
    $db->where('course_code', $select2);
    $db->where('facultyId', $sessionId );
	$corsdq = "SELECT  qz1cow,qz2cow,qz3cow,qz4cow,qz5cow,asg1cow,asg2cow,asg3cow,asg4cow,cacow,qz1max,qz2max,qz3max,qz4max,qz5max,asg1max,asg2max,asg3max,asg4max,camax FROM conw_component WHERE faculty_id='$sessionId' and course_code='$select2'";
$corsdr=  $db1->query($corsdq);
	 foreach ($corsdr as $row2) {
		$qz1co= $row2['qz1cow'];
		$qz2co= $row2['qz2cow'];
		$qz3co= $row2['qz3cow'];
		$qz4co= $row2['qz4cow'];
		$qz5co= $row2['qz5cow'];
		$asg1co= $row2['asg1cow'];
		$asg2co= $row2['asg2cow'];
		$asg3co= $row2['asg3cow'];
		$asg4co= $row2['asg4cow'];
		$caco = $row2['cacow'];
		$qz1max= $row2['qz1max'];
		$qz2max= $row2['qz2max'];
		$qz3max= $row2['qz3max'];
		$qz4max= $row2['qz4max'];
		$qz5max= $row2['qz5max'];
		$asg1max= $row2['asg1max'];
		$asg2max= $row2['asg2max'];
		$asg3max= $row2['asg3max'];
		$asg4max= $row2['asg4max'];
		$camax = $row2['camax'];


	 }
   // $db->orwhere('name', '%' . $search_string . '%', 'like');
    
   // $db->where('course_code',$search_string );
    //$db->orwhere('facultyID', $facultyId);
}else{
	$db->where('course_code', "None");
    $db->where('facultyID',"None" );
}





	
$pdf->AddPage();
//$pdf->SetLineStyle( array( 'width' => 1, 'color' => array(2,2,10)));
$pdf->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
$pdf->Line(12,12,$pdf->getPageWidth()-12,12); 
$pdf->Line($pdf->getPageWidth()-12,12,$pdf->getPageWidth()-12,$pdf->getPageHeight()-10);
$pdf->Line(12,$pdf->getPageHeight()-10,$pdf->getPageWidth()-12,$pdf->getPageHeight()-10);
$pdf->Line(12,12,12,$pdf->getPageHeight()-10);

// printing Quiz Marks
$html4co = '<div>
<div style="text-align:center"><h3>Weighted Quiz Assignment & CA Marks</h3></div>
<div >

<table width="92%" border="1">
        
            <tr>
                <th width="4%">#</th>
                <th width="14%">Roll No</th>
                <th width="14%">Name</th>
               	<th>Q1</th>
				<th>Q2</th>
				<th>Q3</th>
				<th>Q4</th>
				<th>Q5</th>
				<th>Asgn1</th>
				<th>Asgn2</th>
				<th>Asgn3</th>
				<th>Asgn4</th>
				<th>CA </th>
				
            </tr>
        <tr style="background:lightblue">
                <th colspan="3" class="header">Scale</th>
                
               	<th>'. htmlspecialchars($qz1co) .' </th>
				<th>'.htmlspecialchars($qz2co) .' </th>
				<th>' .htmlspecialchars($qz3co).' </th>
				<th>' .htmlspecialchars($qz4co) .' </th>
				<th>' .htmlspecialchars($qz5co) .' </th>
				<th>' .htmlspecialchars($asg1co) .' </th>
				<th>' .htmlspecialchars($asg2co) .' </th>
				<th>' .htmlspecialchars($asg3co) .' </th>
				<th>' .htmlspecialchars($asg4co) .' </th>
				<th>'. htmlspecialchars($caco) .' </th>
				
            </tr>
        <tbody>';
		
		$coq = "SELECT * FROM quiz WHERE facultyId='$sessionId' and course_code='$select2'";
	$i=0;
	     $customers = $db1->query($coq);
foreach ($customers as $row) : $i=$i+1; 
//foreach($your_data_array as $key => $current) {
    $html4co .= '<tr>
        <td>' . $i . '</td>
        <td>' . $row['roll_no']. '</td>
		<td>' . $row['name']. '</td>
		<td>' . round(($qz1max>0?($row['quiz1']*$qz1co/$qz1max):""),2) . '</td>
		<td>' . round(($qz2max>0?($row['quiz2']*$qz2co/$qz2max):""),2) . '</td>
		<td>' . round(($qz3max>0?($row['quiz3']*$qz3co/$qz3max):""),2) . '</td>
		<td>' . round(($qz4max>0?($row['quiz4']*$qz4co/$qz4max):""),2) . '</td>
		<td>' . round(($qz5max>0?($row['quiz5']*$qz5co/$qz5max):""),2) . '</td>
		<td>' . round(($asg1max>0?($row['assign1']*$asg1co/$asg1max):""),2) . '</td>
		<td>' . round(($asg2max>0?($row['assign2']*$asg2co/$asg2max):""),2) . '</td>
		<td>' . round(($asg3max>0?($row['assign3']*$asg3co/$asg3max):""),2) . '</td>
		<td>' . round(($asg4max>0?($row['assign4']*$asg4co/$asg4max):""),2) . '</td>
		<td>' . round(($camax>0?($row['ca']*$caco/$camax):""),2) . '</td>
    </tr>';
	
endforeach;

$html4co.= '</table>';
$page_quiz_w = $pdf->getPage();

$pdf->writeHTML($html4co, true, false, true, false, '');
	
	
//$pdf->writeHTML($html_coquiz, true, false, true, false, '');



/////////////////////////////Quiz co table Ends ////////////////////////

//////////////////// MTE co tables ////////////////////////////
$db = getDbInstance();
$mq1co= 0;
		$mq2co= 0;
		$mq3co= 0;
		$mq4co= 0;
		$mq5co= 0;
		$mq6co= 0;
		$mq7co= 0;
		$mq8co= 0;
		$mq9co= 0;
		$mq10co= 0;
		$mq11co= 0;
		$mq12co= 0;
		$mq13co= 0;
		$mq14co= 0;
		$mq15co= 0;
		$mq16co= 0;
		$mq17co= 0;
		$mq18co= 0;
		$mq19co= 0;
		$mq20co= 0;
if ($select2) 
{
   
	$corsdq = "SELECT  mq1cow,mq2cow,mq3cow,mq4cow,mq5cow,mq6cow,mq7cow,mq8cow,mq9cow,mq10cow,mq11cow,mq12cow,mq13cow,mq14cow,mq15cow,mq16cow,mq17cow,mq18cow,mq19cow,mq20cow , mq1max,mq2max,mq3max,mq4max,mq5max,mq6max,mq7max,mq8max,mq9max,mq10max,mq11max,mq12max,mq13max,mq14max,mq15max,mq16max,mq17max,mq18max,mq19max,mq20max FROM conw_component WHERE faculty_id='$sessionId' and course_code='$select2'";
	$corsdr=  $db1->query($corsdq);
	 foreach ($corsdr as $row2) {
		$mq1co= $row2['mq1cow'];
		$mq2co= $row2['mq2cow'];
		$mq3co= $row2['mq3cow'];
		$mq4co= $row2['mq4cow'];
		$mq5co= $row2['mq5cow'];
		$mq6co= $row2['mq6cow'];
		$mq7co= $row2['mq7cow'];
		$mq8co= $row2['mq8cow'];
		$mq9co= $row2['mq9cow'];
		$mq10co= $row2['mq10cow'];
		$mq11co= $row2['mq11cow'];
		$mq12co= $row2['mq12cow'];
		$mq13co= $row2['mq13cow'];
		$mq14co= $row2['mq14cow'];
		$mq15co= $row2['mq15cow'];
		$mq16co= $row2['mq16cow'];
		$mq17co= $row2['mq17cow'];
		$mq18co= $row2['mq18cow'];
		$mq19co= $row2['mq19cow'];
		$mq20co= $row2['mq20cow'];
		
		$mq1max= $row2['mq1max'];
		$mq2max= $row2['mq2max'];
		$mq3max= $row2['mq3max'];
		$mq4max= $row2['mq4max'];
		$mq5max= $row2['mq5max'];
		$mq6max= $row2['mq6max'];
		$mq7max= $row2['mq7max'];
		$mq8max= $row2['mq8max'];
		$mq9max= $row2['mq9max'];
		$mq10max= $row2['mq10max'];
		$mq11max= $row2['mq11max'];
		$mq12max= $row2['mq12max'];
		$mq13max= $row2['mq13max'];
		$mq14max= $row2['mq14max'];
		$mq15max= $row2['mq15max'];
		$mq16max= $row2['mq16max'];
		$mq17max= $row2['mq17max'];
		$mq18max= $row2['mq18max'];
		$mq19max= $row2['mq19max'];
		$mq20max= $row2['mq20max'];
    }

	
}else{
	$db->where('course_code', "None");
    $db->where('facultyID',"None" );
}

//$pdf->AddPage();
$pdf->AddPage('L', 'A4');
//$pdf->Cell(0, 0, 'A4 LANDSCAPE', 1, 1, 'C');
//$pdf->SetLineStyle( array( 'width' => 1, 'color' => array(2,2,10)));
$pdf->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
$pdf->Line(12,12,$pdf->getPageWidth()-12,12); 
$pdf->Line($pdf->getPageWidth()-12,12,$pdf->getPageWidth()-12,$pdf->getPageHeight()-10);
$pdf->Line(12,$pdf->getPageHeight()-10,$pdf->getPageWidth()-12,$pdf->getPageHeight()-10);
$pdf->Line(12,12,12,$pdf->getPageHeight()-10);


$html5 = '<div>
<div style="text-align:center"><h3>Weighted Mid Term Exam Marks</h3></div>
<div >

<table width="92%" border="1">
        
            <tr>
                <th width="4%">#S.no</th>
                <th width="14%">Roll No</th>
               	<th>Q1</th>
				<th>Q2</th>
				<th>Q3</th>
				<th>Q4</th>
				<th>Q5</th>
				<th>Q6</th>
				<th>Q7</th>
				<th>Q8</th>
				<th>Q9</th>
				<th>Q10</th>
				<th>Q11</th>
				<th>Q12</th>
				<th>Q13</th>
				<th>Q14</th>
				<th>Q15</th>
				<th>Q16</th>
				<th>Q17</th>
				<th>Q18</th>
				<th>Q19</th>
				<th>Q20</th>
				
            </tr>
        <tr >
                <th colspan="2" class="header">Scale</th>
                
				<th>'.   $mq1co .' </th>
				<th>'.   $mq2co .' </th>
				<th>'.   $mq3co .' </th>
				<th>'.   $mq4co .' </th>
				<th>'.   $mq5co .' </th>
				<th>'.   $mq6co .' </th>
				<th>'.   $mq7co .' </th>
				<th>'.   $mq8co .' </th>
				<th>'.   $mq9co .' </th>
				<th>'.   $mq10co .' </th>
				<th>'.   $mq11co .' </th>
				<th>'.   $mq12co .' </th>
				<th>'.   $mq13co .' </th>
				<th>'.   $mq14co .' </th>
				<th>'.   $mq15co .' </th>
				<th>'.   $mq16co .' </th>
				<th>'.   $mq17co .' </th>
				<th>'.   $mq18co .' </th>
				<th>'.   $mq19co .' </th>
				<th>'.   $mq20co .' </th>
				<!--th>Edit Delete</th-->
            </tr>
        <tbody>';
		
		$coq2 = "SELECT * FROM mte WHERE facultyId='$sessionId' and course_code='$select2'";
	$i=0;
	     $customerm = $db1->query($coq2);
foreach ($customerm as $row) : $i=$i+1; 
//foreach($your_data_array as $key => $current) {
    $html5 .= '<tr>
        <td>' . $i . '</td>
        <td>' . $row['roll_no']. '</td>
		<td>' . round(($mq1max>0?($row['mq1']*$mq1co/$mq1max):""),2) . '</td>
		<td>' . round(($mq2max>0?($row['mq2']*$mq2co/$mq2max):""),2). '</td>
		<td>' . round(($mq3max>0?($row['mq3']*$mq3co/$mq3max):""),2). '</td>
		<td>' . round(($mq4max>0?($row['mq4']*$mq4co/$mq4max):""),2). '</td>
		<td>' . round(($mq5max>0?($row['mq5']*$mq5co/$mq5max):""),2). '</td>
		<td>' . round(($mq6max>0?($row['mq6']*$mq6co/$mq6max):""),2). '</td>
		<td>' . round(($mq7max>0?($row['mq7']*$mq7co/$mq7max):""),2). '</td>
		<td>' . round(($mq8max>0?($row['mq8']*$mq8co/$mq8max):""),2). '</td>
		<td>' . round(($mq9max>0?($row['mq9']*$mq9co/$mq9max):""),2). '</td>
		<td>' . round(($mq10max>0?($row['mq10']*$mq10co/$mq10max):""),2). '</td>
		<td>' . round(($mq11max>0?($row['mq11']*$mq11co/$mq11max):""),2). '</td>
		<td>' . round(($mq12max>0?($row['mq12']*$mq12co/$mq12max):""),2). '</td>
		<td>' . round(($mq13max>0?($row['mq13']*$mq13co/$mq13max):""),2). '</td>
		<td>' . round(($mq14max>0?($row['mq14']*$mq14co/$mq14max):""),2). '</td>
		<td>' . round(($mq15max>0?($row['mq15']*$mq15co/$mq15max):""),2). '</td>
		<td>' . round(($mq16max>0?($row['mq16']*$mq16co/$mq16max):""),2). '</td>
		<td>' . round(($mq17max>0?($row['mq17']*$mq17co/$mq17max):""),2). '</td>
		<td>' . round(($mq18max>0?($row['mq18']*$mq18co/$mq18max):""),2). '</td>
		<td>' . round(($mq19max>0?($row['mq19']*$mq19co/$mq19max):""),2). '</td>
		<td>' . round(($mq20max>0?($row['mq20']*$mq20co/$mq20max):""),2). '</td>
    </tr>';
endforeach;

$html5 .= '</table>';
$page_mte_w = $pdf->getPage();

$pdf->writeHTML($html5, true, false, true, false, '');

////// ETE co Marks  ////////////////////////////


		$eq1co= 0;
		$eq2co= 0;
		$eq3co= 0;
		$eq4co= 0;
		$eq5co= 0;
		$eq6co= 0;
		$eq7co= 0;
		$eq8co= 0;
		$eq9co= 0;
		$eq10co= 0;
		$eq11co= 0;
		$eq12co= 0;
		$eq13co= 0;
		$eq14co= 0;
		$eq15co= 0;
		$eq16co= 0;
		$eq17co= 0;
		$eq18co= 0;
		$eq19co= 0;
		$eq20co= 0;

$db = getDbInstance();
$corsdq = "SELECT  eq1cow,eq2cow,eq3cow,eq4cow,eq5cow,eq6cow,eq7cow,eq8cow,eq9cow,eq10cow,eq11cow,eq12cow,eq13cow,eq14cow,eq15cow,eq16cow,eq17cow,eq18cow,eq19cow,eq20cow, eq1max,eq2max,eq3max,eq4max,eq5max,eq6max,eq7max,eq8max,eq9max,eq10max,eq11max,eq12max,eq13max,eq14max,eq15max,eq16max,eq17max,eq18max,eq19max,eq20max FROM conw_component WHERE faculty_id='$sessionId' and course_code='$select2'";
	$corsdr=  $db1->query($corsdq);
	 foreach ($corsdr as $row2) {
		$eq1co= $row2['eq1cow'];
		$eq2co= $row2['eq2cow'];
		$eq3co= $row2['eq3cow'];
		$eq4co= $row2['eq4cow'];
		$eq5co= $row2['eq5cow'];
		$eq6co= $row2['eq6cow'];
		$eq7co= $row2['eq7cow'];
		$eq8co= $row2['eq8cow'];
		$eq9co= $row2['eq9cow'];
		$eq10co= $row2['eq10cow'];
		$eq11co= $row2['eq11cow'];
		$eq12co= $row2['eq12cow'];
		$eq13co= $row2['eq13cow'];
		$eq14co= $row2['eq14cow'];
		$eq15co= $row2['eq15cow'];
		$eq16co= $row2['eq16cow'];
		$eq17co= $row2['eq17cow'];
		$eq18co= $row2['eq18cow'];
		$eq19co= $row2['eq19cow'];
		$eq20co= $row2['eq20cow'];
		
		$eq1max= $row2['eq1max'];
		$eq2max= $row2['eq2max'];
-		$eq3max= $row2['eq3max'];
		$eq4max= $row2['eq4max'];
		$eq5max= $row2['eq5max'];
		$eq6max= $row2['eq6max'];
		$eq7max= $row2['eq7max'];
		$eq8max= $row2['eq8max'];
		$eq9max= $row2['eq9max'];
		$eq10max= $row2['eq10max'];
		$eq11max= $row2['eq11max'];
		$eq12max= $row2['eq12max'];
		$eq13max= $row2['eq13max'];
		$eq14max= $row2['eq14max'];
		$eq15max= $row2['eq15max'];
		$eq16max= $row2['eq16max'];
		$eq17max= $row2['eq17max'];
		$eq18max= $row2['eq18max'];
		$eq19max= $row2['eq19max'];
		$eq20max= $row2['eq20max'];
    }

$pdf->AddPage();
//$pdf->SetLineStyle( array( 'width' => 1, 'color' => array(2,2,10)));
$pdf->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
$pdf->Line(12,12,$pdf->getPageWidth()-12,12); 
$pdf->Line($pdf->getPageWidth()-12,12,$pdf->getPageWidth()-12,$pdf->getPageHeight()-10);
$pdf->Line(12,$pdf->getPageHeight()-10,$pdf->getPageWidth()-12,$pdf->getPageHeight()-10);
$pdf->Line(12,12,12,$pdf->getPageHeight()-10);


$html5 = '<div>
<div style="text-align:center"><h3>Weighted End Term Exam Marks</h3></div>
<div >

<table width="92%" border="1">
        
            <tr>
                <th width="4%">#</th>
                <th width="14%">Roll No</th>
               	<th>Q1</th>
				<th>Q2</th>
				<th>Q3</th>
				<th>Q4</th>
				<th>Q5</th>
				<th>Q6</th>
				<th>Q7</th>
				<th>Q8</th>
				<th>Q9</th>
				<th>Q10</th>
				<th>Q11</th>
				<th>Q12</th>
				<th>Q13</th>
				<th>Q14</th>
				<th>Q15</th>
				<th>Q16</th>
				<th>Q17</th>
				<th>Q18</th>
				<th>Q19</th>
				<th>Q20</th>
				
            </tr>
            <tr style="background:lightblue">
                <th colspan="2" class="header">Scale</th>
          
               	<th>'. $eq1co  .' </th>
				<th>'. $eq2co  .' </th>
				<th>'. $eq3co.' </th>
				<th>'. $eq4co  .' </th>
				<th>'. $eq5co  .' </th>
				<th>'. $eq6co  .' </th>
				<th>'. $eq7co  .' </th>
				<th>'. $eq8co  .' </th>
				<th>'. $eq9co  .' </th>
				<th>'. $eq10co  .' </th>
				<th>'. $eq11co  .' </th>
				<th>'. $eq12co  .' </th>
				<th>'. $eq13co.' </th>
				<th>'. $eq14co  .' </th>
				<th>'. $eq15co  .' </th>
				<th>'. $eq16co  .' </th>
				<th>'. $eq17co  .' </th>
				<th>'. $eq18co  .' </th>
				<th>'. $eq19co  .' </th>
				<th>'. $eq20co  .' </th>
				<!--th>Edit Delete</th-->
            </tr>
        <tbody>';
		
		$coq3 = "SELECT * FROM ete WHERE facultyId='$sessionId' and course_code='$select2'";
	$i=0;
	     $customere = $db1->query($coq3);
foreach ($customere as $row) : $i=$i+1; 
//foreach($your_data_array as $key => $current) {
    $html5 .= '<tr>
        <td>' . $i . '</td>
        <td>' . $row['roll_no']. '</td>
		<td>' . round(($eq1max>0?($row['eq1']*$eq1co/$eq1max):""),2). '</td>
		<td>' . round(($eq2max>0?($row['eq2']*$eq2co/$eq2max):""),2). '</td>
		<td>' . round(($eq3max>0?($row['eq3']*$eq3co/$eq3max):""),2). '</td>
		<td>' . round(($eq4max>0?($row['eq4']*$eq4co/$eq4max):""),2). '</td>
		<td>' . round(($eq5max>0?($row['eq5']*$eq5co/$eq5max):""),2). '</td>
		<td>' . round(($eq6max>0?($row['eq6']*$eq6co/$eq6max):""),2). '</td>
		<td>' . round(($eq7max>0?($row['eq7']*$eq7co/$eq7max):""),2). '</td>
		<td>' . round(($eq8max>0?($row['eq8']*$eq8co/$eq8max):""),2). '</td>
		<td>' . round(($eq9max>0?($row['eq9']*$eq9co/$eq9max):""),2). '</td>
		<td>' . round(($eq10max>0?($row['eq10']*$eq10co/$eq10max):""),2). '</td>
		<td>' . round(($eq11max>0?($row['eq11']*$eq11co/$eq11max):""),2). '</td>
		<td>' . round(($eq12max>0?($row['eq12']*$eq12co/$eq12max):""),2). '</td>
		<td>' . round(($eq13max>0?($row['eq13']*$eq13co/$eq13max):""),2). '</td>
		<td>' . round(($eq14max>0?($row['eq14']*$eq14co/$eq14max):""),2). '</td>
		<td>' . round(($eq15max>0?($row['eq15']*$eq15co/$eq15max):""),2). '</td>
		<td>' . round(($eq16max>0?($row['eq16']*$eq16co/$eq16max):""),2). '</td>
		<td>' . round(($eq17max>0?($row['eq17']*$eq17co/$eq17max):""),2). '</td>
		<td>' . round(($eq18max>0?($row['eq18']*$eq18co/$eq18max):""),2). '</td>
		<td>' . round(($eq19max>0?($row['eq19']*$eq19co/$eq19max):""),2). '</td>
		<td>' . round(($eq20max>0?($row['eq20']*$eq20co/$eq20max):""),2). '</td>
    </tr>';
endforeach;

$html5 .= '</table>';

$page_ete_w = $pdf->PageNo();

$pdf->writeHTML($html5, true, false, true, false, '');




//////////////////// ETE co tables ends ///////////////////////////////////////////
/////////// co wise table  ENDS -----------------------////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////CO Attainment starts ///////////////////////////////
///////////////////////////////////////////////////////////////////////////////////

$pdf->AddPage();
//$pdf->SetLineStyle( array( 'width' => 1, 'color' => array(2,2,10)));
$pdf->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
$pdf->Line(12,12,$pdf->getPageWidth()-12,12); 
$pdf->Line($pdf->getPageWidth()-12,12,$pdf->getPageWidth()-12,$pdf->getPageHeight()-10);
$pdf->Line(12,$pdf->getPageHeight()-10,$pdf->getPageWidth()-12,$pdf->getPageHeight()-10);
$pdf->Line(12,12,12,$pdf->getPageHeight()-10);

$db1 = getDbInstance();

$percentage=50;
$co1_per=0;
$co2_per=0;
$co3_per=0;
$co4_per=0;
$co5_per=0;
$co6_per=0;
$no_co1=0;
$no_co2=0;
$no_co3=0;
$no_co4=0;
$no_co5=0;
$no_co6=0;
$co1_student_perc=0;
$co2_student_perc=0;
$co3_student_perc=0;
$co4_student_perc=0;
$co5_student_perc=0;
$co6_student_perc=0;

$attain_level1=0;
$attain_level2=0;
$attain_level3=0;
$attain_level4=0;
$attain_level5=0;
$attain_level6=0;

$corsq="";
$corsdq="";
$copoq="";
$copos="";
$corsr="";
$corsdr="";
$combine_tbl="";

  
	$corsdq = "SELECT prog, sem, course_code,course_name,co1,co2,co3,co4,co5,co6 FROM course WHERE user='$sessionId' and course_code='$select2'";
    $copoq = "SELECT * FROM conw_component WHERE faculty_id='$sessionId' and course_code='$select2'";
	
	$combine_tbl="SELECT * FROM quiz,mte,ete WHERE quiz.roll_no=mte.roll_no and quiz.roll_no=ete.roll_no and quiz.course_code='$select2'and mte.course_code='$select2'and ete.course_code='$select2' and quiz.facultyId='$sessionId'"; 
	//echo "combine_tbl=".$combine_tbl;
	error_log(print_r($corsq, TRUE)); 

$i=0;
 if ($select2 =='') {
			$i=''; 
			$prog='';
			$sem='';
			$course_code='';
			$course_name='';
			$co1='';
			$co2='';
			$co3='';
			$co4='';
			$co5='';
			$co6='';
			$co1_comp_str1='';
			$co1_comp_str2='';
			$co1_comp_str3='';
			$co1_comp_str4='';
			$co1_comp_str5='';
			$co1_comp_str6='';
			$co1_comp_total=0;
			$co2_comp_total=0;
			$co3_comp_total=0;
			$co4_comp_total=0;
			$co5_comp_total=0;
			$co6_comp_total=0;
 }
 else{
	        $corsdr=  $db1->query($corsdq);
	 foreach ($corsdr as $row2) 
	 {
		    // echo "querry =".$corsdq;
			//echo "row222=".$row2;
			$i=$i+1; 
			$prog=$row2['prog'];
			$sem=$row2['sem'];
			$course_code=$row2['course_code'];
			$course_name=$row2['course_name'];
			$co1=$row2['co1'];
			$co2=$row2['co2'];
			$co3=$row2['co3'];
			$co4=$row2['co4'];
			$co5=$row2['co5'];
			$co6=$row2['co6'];
			
			
			} //foreach ends
  



  
$html_attain='<div>
<div style="text-align:center"><h3>CO-Wise Marks Obtained</h3></div>

<!--div class="col-sm-12 table" style=" border-radius: 5px; background: #73AD21; padding: 20px;"-->
      

    <table border="1">
		<thead>
			
            <tr>
                <th >SNo</th>
                <th>Roll No</th>
                <th>Name</th>
               
				<th>CO 1</th>
				<th>CO 2</th>
				<th>CO 3</th>
				<th>CO 4</th>
				<th>CO 5</th>
				<th>CO 6</th>
			</tr>
		 
        </thead>
        <tbody>';
  
  

		    $qz1="";
			$qz2="";
			$qz3="";
			$qz4="";
			$qz5="";
			$asg1="";
			$asg2="";
			$asg3="";
			$asg4="";
			$ca="";
			
			$prj1="";
			$prj2="";
			$prj3="";
			$prj4="";
			$prj5="";
			$prj1cow="";
			$prj2cow="";
			$prj3cow="";
			$prj4cow="";
			$prj5cow="";
			
			$mq1="";
			$mq2="";
			$mq3="";
			$mq4="";
			$mq5="";
			$mq6="";
			$mq7="";
			$mq8="";
			$mq9="";
			$mq10="";
			$mq11="";
			$mq12="";
			$mq13="";
			$mq14="";
			$mq15="";
			$mq16="";
			$mq17="";
			$mq18="";
			$mq19="";
			$mq20="";
			
			$eq1="";
			$eq2="";
			$eq3="";
			$eq4="";
			$eq5="";
			$eq6="";
			$eq7="";
			$eq8="";
			$eq9="";
			$eq10="";
			$eq11="";
			$eq12="";
			$eq13="";
			$eq14="";
			$eq15="";
			$eq16="";
			$eq17="";
			$eq18="";
			$eq19="";
			$eq20="";
			
			$qz1cow="";
			$qz2cow="";
			$qz3cow="";
			$qz4cow="";
			$qz5cow="";
			$asg1cow="";
			$asg2cow="";
			$asg3cow="";
			$asg4cow="";
			$cacow="";
			$mq1cow="";
			$mq2cow="";
			$mq3cow="";
			$mq4cow="";
			$mq5cow="";
			$mq6cow="";
			$mq7cow="";
			$mq8cow="";
			$mq9cow="";
			$mq10cow="";
			$mq11cow="";
			$mq12cow="";
			$mq13cow="";
			$mq14cow="";
			$mq15cow="";
			$mq16cow="";
			$mq17cow="";
			$mq18cow="";
			$mq19cow="";
			$mq20cow="";
			
			$eq1cow="";
			$eq2cow="";
			$eq3cow="";
			$eq4cow="";
			$eq5cow="";
			$eq6cow="";
			$eq7cow="";
			$eq8cow="";
			$eq9cow="";
			$eq10cow="";
			$eq11cow="";
			$eq12cow="";
			$eq13cow="";
			$eq14cow="";
			$eq15cow="";
			$eq16cow="";
			$eq17cow="";
			$eq18cow="";
			$eq19cow="";
			$eq20cow="";
			
			$qz1max="";
			$qz2max="";
			$qz3max="";
			$qz4max="";
			$qz5max="";
			$asg1max="";
			$asg2max="";
			$asg3max="";
			$asg4max="";
			$camax="";
			$mq1max="";
			$mq2max="";
			$mq3max="";
			$mq4max="";
			$mq5max="";
			$mq6max="";
			$mq7max="";
			$mq8max="";
			$mq9max="";
			$mq10max="";
			$mq11max="";
			$mq12max="";
			$mq13max="";
			$mq14max="";
			$mq15max="";
			$mq16max="";
			$mq17max="";
			$mq18max="";
			$mq19max="";
			$mq20max="";
			
			$eq1max="";
			$eq2max="";
			$eq3max="";
			$eq4max="";
			$eq5max="";
			$eq6max="";
			$eq7max="";
			$eq8max="";
			$eq9max="";
			$eq10max="";
			$eq11max="";
			$eq12max="";
			$eq13max="";
			$eq14max="";
			$eq15max="";
			$eq16max="";
			$eq17max="";
			$eq18max="";
			$eq19max="";
			$eq20max="";
		
		  $co1r = $db1->query( $copoq);
       //   echo "copoq=".$copoq;
		 
		 foreach ($co1r as $row2) {
			$qz1=$row2['qz1'];
			$qz2=$row2['qz2'];
			$qz3=$row2['qz3'];
			$qz4=$row2['qz4'];
			$qz5=$row2['qz5'];
			$asg1=$row2['asg1'];
			$asg2=$row2['asg2'];
			$asg3=$row2['asg3'];
			$asg4=$row2['asg4'];
			$ca=$row2['ca'];
			
			$prj1=$row2['prj1'];
			$prj2=$row2['prj2'];
			$prj3=$row2['prj3'];
			$prj4=$row2['prj4'];
			$prj5=$row2['prj5'];
			$prj1cow=$row2['prj1cow'];
			$prj2cow=$row2['prj2cow'];
			$prj3cow=$row2['prj3cow'];
			$prj4cow=$row2['prj4cow'];
			$prj5cow=$row2['prj5cow'];
			
			$qz1cow=$row2['qz1cow'];
			$qz2cow=$row2['qz2cow'];
			$qz3cow=$row2['qz3cow'];
			$qz4cow=$row2['qz4cow'];
			$qz5cow=$row2['qz5cow'];
			$asg1cow=$row2['asg1cow'];
			$asg2cow=$row2['asg2cow'];
			$asg3cow=$row2['asg3cow'];
			$asg4cow=$row2['asg4cow'];
			$cacow=$row2['cacow'];
			
			$qz1max=$row2['qz1max'];
			$qz2max=$row2['qz2max'];
			$qz3max=$row2['qz3max'];
			$qz4max=$row2['qz4max'];
			$qz5max=$row2['qz5max'];
			$asg1max=$row2['asg1max'];
			$asg2max=$row2['asg2max'];
			$asg3max=$row2['asg3max'];
			$asg4max=$row2['asg4max'];
			$camax=$row2['camax'];
			
			$mq1=$row2['mq1'];
			$mq2=$row2['mq2'];
			$mq3=$row2['mq3'];
			$mq4=$row2['mq4'];
			$mq5=$row2['mq5'];
			$mq6=$row2['mq6'];
			$mq7=$row2['mq7'];
			$mq8=$row2['mq8'];
			$mq9=$row2['mq9'];
			$mq10=$row2['mq10'];
			$mq11=$row2['mq11'];
			$mq12=$row2['mq12'];
			$mq13=$row2['mq13'];
			$mq14=$row2['mq14'];
			$mq15=$row2['mq15'];
			$mq16=$row2['mq16'];
			$mq17=$row2['mq17'];
			$mq18=$row2['mq18'];
			$mq19=$row2['mq19'];
			$mq20=$row2['mq20'];
			
			$mq1cow=$row2['mq1cow'];
			$mq2cow=$row2['mq2cow'];
			$mq3cow=$row2['mq3cow'];
			$mq4cow=$row2['mq4cow'];
			$mq5cow=$row2['mq5cow'];
-			$mq6cow=$row2['mq6cow'];
			$mq7cow=$row2['mq7cow'];
			$mq8cow=$row2['mq8cow'];
			$mq9cow=$row2['mq9cow'];
			$mq10cow=$row2['mq10cow'];
			$mq11cow=$row2['mq11cow'];
			$mq12cow=$row2['mq12cow'];
			$mq13cow=$row2['mq13cow'];
			$mq14cow=$row2['mq14cow'];
			$mq15cow=$row2['mq15cow'];
			$mq16cow=$row2['mq16cow'];
			$mq17cow=$row2['mq17cow'];
			$mq18cow=$row2['mq18cow'];
			$mq19cow=$row2['mq19cow'];
			$mq20cow=$row2['mq20cow'];
			
			$mq1max=$row2['mq1max'];
			$mq2max=$row2['mq2max'];
			$mq3max=$row2['mq3max'];
			$mq4max=$row2['mq4max'];
			$mq5max=$row2['mq5max'];
			$mq6max=$row2['mq6max'];
			$mq7max=$row2['mq7max'];
			$mq8max=$row2['mq8max'];
			$mq9max=$row2['mq9max'];
			$mq10max=$row2['mq10max'];
			$mq11max=$row2['mq11max'];
			$mq12max=$row2['mq12max'];
			$mq13max=$row2['mq13max'];
			$mq14max=$row2['mq14max'];
			$mq15max=$row2['mq15max'];
			$mq16max=$row2['mq16max'];
			$mq17max=$row2['mq17max'];
			$mq18max=$row2['mq18max'];
			$mq19max=$row2['mq19max'];
			$mq20max=$row2['mq20max'];
			
			$eq1=$row2['eq1'];
			$eq2=$row2['eq2'];
			$eq3=$row2['eq3'];
			$eq4=$row2['eq4'];
			$eq5=$row2['eq5'];
			$eq6=$row2['eq6'];
			$eq7=$row2['eq7'];
			$eq8=$row2['eq8'];
			$eq9=$row2['eq9'];
			$eq10=$row2['eq10'];
			$eq11=$row2['eq11'];
			$eq12=$row2['eq12'];
			$eq13=$row2['eq13'];
			$eq14=$row2['eq14'];
			$eq15=$row2['eq15'];
			$eq16=$row2['eq16'];
			$eq17=$row2['eq17'];
			$eq18=$row2['eq18'];
			$eq19=$row2['eq19'];
			$eq20=$row2['eq20'];
			
			$eq1cow=$row2['eq1cow'];
			$eq2cow=$row2['eq2cow'];
			$eq3cow=$row2['eq3cow'];
			$eq4cow=$row2['eq4cow'];
			$eq5cow=$row2['eq5cow'];
			$eq6cow=$row2['eq6cow'];
			$eq7cow=$row2['eq7cow'];
			$eq8cow=$row2['eq8cow'];
			$eq9cow=$row2['eq9cow'];
			$eq10cow=$row2['eq10cow'];
			$eq11cow=$row2['eq11cow'];
			$eq12cow=$row2['eq12cow'];
			$eq13cow=$row2['eq13cow'];
			$eq14cow=$row2['eq14cow'];
			$eq15cow=$row2['eq15cow'];
			$eq16cow=$row2['eq16cow'];
			$eq17cow=$row2['eq17cow'];
			$eq18cow=$row2['eq18cow'];
			$eq19cow=$row2['eq19cow'];
			$eq20cow=$row2['eq20cow'];
			
			$eq1max=$row2['eq1max'];
			$eq2max=$row2['eq2max'];
			$eq3max=$row2['eq3max'];
			$eq4max=$row2['eq4max'];
			$eq5max=$row2['eq5max'];
			$eq6max=$row2['eq6max'];
			$eq7max=$row2['eq7max'];
			$eq8max=$row2['eq8max'];
			$eq9max=$row2['eq9max'];
			$eq10max=$row2['eq10max'];
			$eq11max=$row2['eq11max'];
			$eq12max=$row2['eq12max'];
			$eq13max=$row2['eq13max'];
			$eq14max=$row2['eq14max'];
			$eq15max=$row2['eq15max'];
			$eq16max=$row2['eq16max'];
			$eq17max=$row2['eq17max'];
			$eq18max=$row2['eq18max'];
			$eq19max=$row2['eq19max'];
			$eq20max=$row2['eq20max'];
			
			
			$co1_comp_total=($qz1==1?$qz1cow:0)+($qz2==1?$qz2cow:0)+($qz3==1?$qz3cow:0)+($qz4==1?$qz4cow:0)+($qz5==1? $qz5cow:"")+($asg1==1?$asg1cow:0)+($asg2==1?$asg2cow:0)+($asg3==1? $asg3cow:0)+($asg4==1? $asg4cow:0)+($ca==1? $cacow:0)+($mq1==1? $mq1cow:0)+($mq2==1? $mq2cow:0)+($mq3==1? $mq3cow:0)+($mq4==1? $mq4cow:0)+($mq5==1? $mq5cow:0)+($mq6==1? $mq6cow:0)+($mq7==1? $mq7cow:0)+($mq8==1? $mq8cow:0)+($mq9==1? $mq9cow:0)+($mq10==1? $mq10cow:0)+($mq11==1? $mq11cow:0)+($mq12==1? $mq12cow:0)+($mq13==1? $mq13cow:0)+($mq14==1? $mq14cow:0)+($mq15==1? $mq15cow:0)+($mq16==1? $mq16cow:0)+($mq17==1? $mq17cow:0)+($mq18==1? $mq18cow:0)+($mq19==1? $mq19cow:0)+($mq20==1? $mq20cow:0)+
			($prj1==1? $prj1cow:0)+
		  ($prj2==1? $prj2cow:0)+
		  ($prj3==1? $prj3cow:0)+
		  ($prj4==1? $prj4cow:0)+
		  ($prj5==1? $prj5cow:0)+
		  ($eq1==1? $eq1cow:0)+($eq2==1? $eq2cow:0)+($eq3==1? $eq3cow:0)+($eq4==1? $eq4cow:0)+($eq5==1? $eq5cow:0)+($eq6==1? $eq6cow:0)+($eq7==1? $eq7cow:0)+($eq8==1? $eq8cow:0)+($eq9==1? $eq9cow:0)+($eq10==1? $eq10cow:0)+
		  ($eq11==1? $eq11cow:0)+($eq12==1? $eq12cow:0)+($eq13==1? $eq13cow:0)+($eq14==1? $eq14cow:0)+($eq15==1? $eq15cow:0)+($eq16==1? $eq16cow:0)+($eq17==1? $eq17cow:0)+($eq18==1? $eq18cow:0)+($eq19==1? $eq19cow:0)+($eq20==1? $eq20cow:0) ;
		   
   $co2_comp_total=($qz1==2?$qz1cow:0)+($qz2==2?$qz2cow:0)+($qz3==2?$qz3cow:0)+($qz4==2?$qz4cow:0)+($qz5==2? $qz5cow:"")+($asg1==2?$asg1cow:0)+($asg2==2?$asg2cow:0)+($asg3==2? $asg3cow:0)+($asg4==2? $asg4cow:0)+($ca==2? $cacow:0)+($mq1==2? $mq1cow:0)+($mq2==2? $mq2cow:0)+($mq3==2? $mq3cow:0)+($mq4==2? $mq4cow:0)+($mq5==2? $mq5cow:0)+($mq6==2? $mq6cow:0)+($mq7==2? $mq7cow:0)+($mq8==2? $mq8cow:0)+($mq9==2? $mq9cow:0)+($mq10==2? $mq10cow:0)+
  ($mq11==2? $mq11cow:0)+($mq12==2? $mq12cow:0)+($mq13==2? $mq13cow:0)+($mq14==2? $mq14cow:0)+($mq15==2? $mq15cow:0)+($mq16==2? $mq16cow:0)+($mq17==2? $mq17cow:0)+($mq18==2? $mq18cow:0)+($mq19==2? $mq19cow:0)+($mq20==2? $mq20cow:0)+
  ($prj1==2? $prj1cow:0)+
  ($prj2==2? $prj2cow:0)+
  ($prj3==2? $prj3cow:0)+
  ($prj4==2? $prj4cow:0)+
  ($prj5==2? $prj5cow:0)+
  
  ($eq1==2? $eq1cow:0)+($eq2==2? $eq2cow:0)+($eq3==2? $eq3cow:0)+($eq4==2? $eq4cow:0)+($eq5==2? $eq5cow:0)+($eq6==2? $eq6cow:0)+($eq7==2? $eq7cow:0)+($eq8==2? $eq8cow:0)+($eq9==2? $eq9cow:0)+($eq10==2? $eq10cow:0)+
  ($eq11==2? $eq11cow:0)+($eq12==2? $eq12cow:0)+($eq13==2? $eq13cow:0)+($eq14==2? $eq14cow:0)+($eq15==2? $eq15cow:0)+($eq16==2? $eq16cow:0)+($eq17==2? $eq17cow:0)+($eq18==2? $eq18cow:0)+($eq19==2? $eq19cow:0)+($eq20==2? $eq20cow:0)
   ;
  
  //// co3
  $co3_comp_total=($qz1==3?$qz1cow:0)+($qz2==3?$qz2cow:0)+($qz3==3?$qz3cow:0)+($qz4==3?$qz4cow:0)+($qz5==3? $qz5cow:"")+($asg1==3?$asg1cow:0)+($asg2==3?$asg2cow:0)+($asg3==3? $asg3cow:0)+($asg4==3? $asg4cow:0)+($ca==3? $cacow:0)+($mq1==3? $mq1cow:0)+($mq2==3? $mq2cow:0)+($mq3==3? $mq3cow:0)+($mq4==3? $mq4cow:0)+($mq5==3? $mq5cow:0)+($mq6==3? $mq6cow:0)+($mq7==3? $mq7cow:0)+($mq8==3? $mq8cow:0)+($mq9==3? $mq9cow:0)+($mq10==3? $mq10cow:0)+
  ($mq11==3? $mq11cow:0)+($mq12==3? $mq12cow:0)+($mq13==3? $mq13cow:0)+($mq14==3? $mq14cow:0)+($mq15==3? $mq15cow:0)+($mq16==3? $mq16cow:0)+($mq17==3? $mq17cow:0)+($mq18==3? $mq18cow:0)+($mq19==3? $mq19cow:0)+($mq20==3? $mq20cow:0)+
  ($prj1==3? $prj1cow:0)+
  ($prj2==3? $prj2cow:0)+
  ($prj3==3? $prj3cow:0)+
  ($prj4==3? $prj4cow:0)+
  ($prj5==3? $prj5cow:0)+
  
  ($eq1==3? $eq1cow:0)+($eq2==3? $eq2cow:0)+($eq3==3? $eq3cow:0)+($eq4==3? $eq4cow:0)+($eq5==3? $eq5cow:0)+($eq6==3? $eq6cow:0)+($eq7==3? $eq7cow:0)+($eq8==3? $eq8cow:0)+($eq9==3? $eq9cow:0)+($eq10==3? $eq10cow:0)+
  ($eq11==3? $eq11cow:0)+($eq12==3? $eq12cow:0)+($eq13==3? $eq13cow:0)+($eq14==3? $eq14cow:0)+($eq15==3? $eq15cow:0)+($eq16==3? $eq16cow:0)+($eq17==3? $eq17cow:0)+($eq18==3? $eq18cow:0)+($eq19==3? $eq19cow:0)+($eq20==3? $eq20cow:0)
   ;
  //// co4
  $co4_comp_total=($qz1==4?$qz1cow:0)+($qz2==4?$qz2cow:0)+($qz3==4?$qz3cow:0)+($qz4==4?$qz4cow:0)+($qz5==4? $qz5cow:"")+($asg1==4?$asg1cow:0)+($asg2==4?$asg2cow:0)+($asg3==4? $asg3cow:0)+($asg4==4? $asg4cow:0)+($ca==4? $cacow:0)+($mq1==4? $mq1cow:0)+($mq2==4? $mq2cow:0)+($mq3==4? $mq3cow:0)+($mq4==4? $mq4cow:0)+($mq5==4? $mq5cow:0)+($mq6==4? $mq6cow:0)+($mq7==4? $mq7cow:0)+($mq8==4? $mq8cow:0)+($mq9==4? $mq9cow:0)+($mq10==4? $mq10cow:0)+
  ($mq11==4? $mq11cow:0)+($mq12==4? $mq12cow:0)+($mq13==4? $mq13cow:0)+($mq14==4? $mq14cow:0)+($mq15==4? $mq15cow:0)+($mq16==4? $mq16cow:0)+($mq17==4? $mq17cow:0)+($mq18==4? $mq18cow:0)+($mq19==4? $mq19cow:0)+($mq20==4? $mq20cow:0)+
  ($prj1==4? $prj1cow:0)+
  ($prj2==4? $prj2cow:0)+
  ($prj3==4? $prj3cow:0)+
  ($prj4==4? $prj4cow:0)+
  ($prj5==4? $prj5cow:0)+
  
  ($eq1==4? $eq1cow:0)+($eq2==4? $eq2cow:0)+($eq3==4? $eq3cow:0)+($eq4==4? $eq4cow:0)+($eq5==4? $eq5cow:0)+($eq6==4? $eq6cow:0)+($eq7==4? $eq7cow:0)+($eq8==4? $eq8cow:0)+($eq9==4? $eq9cow:0)+($eq10==4? $eq10cow:0)+
  ($eq11==4? $eq11cow:0)+($eq12==4? $eq12cow:0)+($eq13==4? $eq13cow:0)+($eq14==4? $eq14cow:0)+($eq15==4? $eq15cow:0)+($eq16==4? $eq16cow:0)+($eq17==4? $eq17cow:0)+($eq18==4? $eq18cow:0)+($eq19==4? $eq19cow:0)+($eq20==4? $eq20cow:0)
   ;
   
   /// co5
   $co5_comp_total=($qz1==5?$qz1cow:0)+($qz2==5?$qz2cow:0)+($qz3==5?$qz3cow:0)+($qz4==5?$qz4cow:0)+($qz5==5? $qz5cow:"")+($asg1==5?$asg1cow:0)+($asg2==5?$asg2cow:0)+($asg3==5? $asg3cow:0)+($asg4==5? $asg4cow:0)+($ca==5? $cacow:0)+($mq1==5? $mq1cow:0)+($mq2==5? $mq2cow:0)+($mq3==5? $mq3cow:0)+($mq4==5? $mq4cow:0)+($mq5==5? $mq5cow:0)+($mq6==5? $mq6cow:0)+($mq7==5? $mq7cow:0)+($mq8==5? $mq8cow:0)+($mq9==5? $mq9cow:0)+($mq10==5? $mq10cow:0)+
  ($mq11==5? $mq11cow:0)+($mq12==5? $mq12cow:0)+($mq13==5? $mq13cow:0)+($mq14==5? $mq14cow:0)+($mq15==5? $mq15cow:0)+($mq16==5? $mq16cow:0)+($mq17==5? $mq17cow:0)+($mq18==5? $mq18cow:0)+($mq19==5? $mq19cow:0)+($mq20==5? $mq20cow:0)+
  ($prj1==5? $prj1cow:0)+
  ($prj2==5? $prj2cow:0)+
  ($prj3==5? $prj3cow:0)+
  ($prj4==5? $prj4cow:0)+
  ($prj5==5? $prj5cow:0)+
  
  ($eq1==5? $eq1cow:0)+($eq2==5? $eq2cow:0)+($eq3==5? $eq3cow:0)+($eq4==5? $eq4cow:0)+($eq5==5? $eq5cow:0)+($eq6==5? $eq6cow:0)+($eq7==5? $eq7cow:0)+($eq8==5? $eq8cow:0)+($eq9==5? $eq9cow:0)+($eq10==5? $eq10cow:0)+
  ($eq11==5? $eq11cow:0)+($eq12==5? $eq12cow:0)+($eq13==5? $eq13cow:0)+($eq14==5? $eq14cow:0)+($eq15==5? $eq15cow:0)+($eq16==5? $eq16cow:0)+($eq17==5? $eq17cow:0)+($eq18==5? $eq18cow:0)+($eq19==5? $eq19cow:0)+($eq20==5? $eq20cow:0)
   ;
   
   /// co6
   $co6_comp_total=($qz1==6?$qz1cow:0)+($qz2==6?$qz2cow:0)+($qz3==6?$qz3cow:0)+($qz4==6?$qz4cow:0)+($qz5==6? $qz5cow:"")+($asg1==6?$asg1cow:0)+($asg2==6?$asg2cow:0)+($asg3==6? $asg3cow:0)+($asg4==6? $asg4cow:0)+($ca==6? $cacow:0)+($mq1==6? $mq1cow:0)+($mq2==6? $mq2cow:0)+($mq3==6? $mq3cow:0)+($mq4==6? $mq4cow:0)+($mq5==6? $mq5cow:0)+($mq6==6? $mq6cow:0)+($mq7==6? $mq7cow:0)+($mq8==6? $mq8cow:0)+($mq9==6? $mq9cow:0)+($mq10==6? $mq10cow:0)+
  ($mq11==6? $mq11cow:0)+($mq12==6? $mq12cow:0)+($mq13==6? $mq13cow:0)+($mq14==6? $mq14cow:0)+($mq15==6? $mq15cow:0)+($mq16==6? $mq16cow:0)+($mq17==6? $mq17cow:0)+($mq18==6? $mq18cow:0)+($mq19==6? $mq19cow:0)+($mq20==6? $mq20cow:0)+
  ($prj1==6? $prj1cow:0)+
  ($prj2==6? $prj2cow:0)+
  ($prj3==6? $prj3cow:0)+
  ($prj4==6? $prj4cow:0)+
  ($prj5==6? $prj5cow:0)+
  
  ($eq1==6? $eq1cow:0)+($eq2==6? $eq2cow:0)+($eq3==6? $eq3cow:0)+($eq4==6? $eq4cow:0)+($eq5==6? $eq5cow:0)+($eq6==6? $eq6cow:0)+($eq7==6? $eq7cow:0)+($eq8==6? $eq8cow:0)+($eq9==6? $eq9cow:0)+($eq10==6? $eq10cow:0)+
  ($eq11==6? $eq11cow:0)+($eq12==6? $eq12cow:0)+($eq13==6? $eq13cow:0)+($eq14==6? $eq14cow:0)+($eq15==6? $eq15cow:0)+($eq16==6? $eq16cow:0)+($eq17==6? $eq17cow:0)+($eq18==6? $eq18cow:0)+($eq19==6? $eq19cow:0)+($eq20==6? $eq20cow:0)
   ;

  } // for each ends
  
$html_attain.='<tr>
               <td colspan="3"><b>Total COs</b></td>
				<td>'.$co1_comp_total.'</td>
				<td>'.$co2_comp_total.'</td>
				<td>'.$co3_comp_total.'</td>
				<td>'.$co4_comp_total.'</td>
				<td>'.$co5_comp_total.'</td>
				<td>'.$co6_comp_total.'</td>
			 </tr>';
			
  
  $combine_tblr = $db1->query( $combine_tbl);
   $i=0;
 foreach ($combine_tblr as $row3) 
	{
		$i=$i+1;
			$rollno=$row3['roll_no'];
			$name=$row3['name'];
			$course_code=$row3['course_code'];
			$batch=$row3['batch'];
			$qz1v=$row3['quiz1'];
			$qz2v=$row3['quiz2'];
			$qz3v=$row3['quiz3'];
			$qz4v=$row3['quiz4'];
			$qz5v=$row3['quiz5'];
			$asg1v=$row3['assign1'];
			$asg2v=$row3['assign2'];
			$asg3v=$row3['assign3'];
			$asg4v=$row3['assign4'];
			$cav=$row3['ca'];

			$mq1v=$row3['mq1'];
			$mq2v=$row3['mq2'];
			$mq3v=$row3['mq3'];
			$mq4v=$row3['mq4'];
			$mq5v=$row3['mq5'];
			$mq6v=$row3['mq6'];
			$mq7v=$row3['mq7'];
			$mq8v=$row3['mq8'];
			$mq9v=$row3['mq9'];
			$mq10v=$row3['mq10'];
			$mq11v=$row3['mq11'];
			$mq12v=$row3['mq12'];
			$mq13v=$row3['mq13'];
			$mq14v=$row3['mq14'];
			$mq15v=$row3['mq15'];
			$mq16v=$row3['mq16'];
			$mq17v=$row3['mq17'];
			$mq18v=$row3['mq18'];
			$mq19v=$row3['mq19'];
			$mq20v=$row3['mq20'];

			$eq1v=$row3['eq1'];
			$eq2v=$row3['eq2'];
			$eq3v=$row3['eq3'];
			$eq4v=$row3['eq4'];
			$eq5v=$row3['eq5'];
			$eq6v=$row3['eq6'];
			$eq7v=$row3['eq7'];
			$eq8v=$row3['eq8'];
			$eq9v=$row3['eq9'];
			$eq10v=$row3['eq10'];
			$eq11v=$row3['eq11'];
			$eq12v=$row3['eq12'];
			$eq13v=$row3['eq13'];
			$eq14v=$row3['eq14'];
			$eq15v=$row3['eq15'];
			$eq16v=$row3['eq16'];
			$eq17v=$row3['eq17'];
			$eq18v=$row3['eq18'];
			$eq19v=$row3['eq19'];
			$eq20v=$row3['eq20'];
  
  $co1_comp_total1=($qz1==1?($qz1max>0?$qz1cow*$qz1v/$qz1max:0):0)+($qz2==1?($qz2max>0?$qz2cow*$qz2v/$qz2max:0):0)+($qz3==1?($qz3max>0?$qz3cow*$qz3v/$qz3max:0):0)+($qz4==1?($qz4max>0?$qz4cow*$qz4v/$qz4max:0):0)+($qz5==1?($qz5max>0?$qz5cow*$qz5v/$qz5max:0):0)+($asg1==1?($asg1max>0?$asg1cow*$asg1v/$asg1max:0):0)+($asg2==1?($asg2max>0?$asg2cow*$asg2v/$asg2max:0):0)+($asg3==1?($asg3max>0?$asg3cow*$asg3v/$asg3max:0):0)+($asg4==1?($asg4max>0?$asg4cow*$asg4v/$asg4max:0):0)+($ca==1?($camax>0? $cacow*$cav/$camax:0):0)+
  
  ($mq1==1?($mq1max>0? $mq1cow*$mq1v/$mq1max:0):0)+($mq2==1?($mq2max>0?  $mq2cow*$mq2v/$mq2max:0):0)+($mq3==1?($mq3max>0?  $mq3cow*$mq3v/$mq3max:0):0)+($mq4==1?($mq4max>0?  $mq4cow*$mq4v/$mq4max:0):0)+($mq5==1?($mq5max>0?  $mq5cow*$mq5v/$mq5max:0):0)+($mq6==1?($mq6max>0?  $mq6cow*$mq6v/$mq6max:0):0)+($mq7==1?($mq7max>0?  $mq7cow*$mq7v/$mq7max:0):0)+($mq8==1?($mq8max>0?  $mq8cow*$mq8v/$mq8max:0):0)+($mq9==1?($mq9max>0?  $mq9cow*$mq9v/$mq9max:0):0)+($mq10==1?($mq10max>0?  $mq10cow*$mq10v/$mq10max:0):0)+($mq11==1?($mq11max>0?  $mq11cow*$mq11v/$mq11max:0):0)+($mq12==1?($mq12max>0?  $mq12cow*$mq12v/$mq12max:0):0)+($mq13==1?($mq13max>0?  $mq13cow*$mq13v/$mq13max:0):0)+($mq14==1?($mq14max>0?  $mq14cow*$mq14v/$mq14max:0):0)+($mq15==1?($mq15max>0?  $mq15cow*$mq15v/$mq15max:0):0)+($mq16==1?($mq16max>0?  $mq16cow*$mq16v/$mq16max:0):0)+($mq17==1?($mq17max>0?  $mq17cow*$mq17v/$mq17max:0):0)+($mq18==1?($mq18max>0?  $mq18cow*$mq18v/$mq18max:0):0)+($mq19==1?($mq19max>0?  $mq19cow*$mq19v/$mq19max:0):0)+($mq20==1?($mq20max>0?  $mq20cow*$mq20v/$mq20max:0):0)+
  
  ($eq1==1?($eq1max>0? $eq1cow*$eq1v/$eq1max:0):0)+($eq2==1?($eq2max>0?  $eq2cow*$eq2v/$eq2max:0):0)+($eq3==1?($eq3max>0?  $eq3cow*$eq3v/$eq3max:0):0)+($eq4==1?($eq4max>0?  $eq4cow*$eq4v/$eq4max:0):0)+($eq5==1?($eq5max>0?  $eq5cow*$eq5v/$eq5max:0):0)+($eq6==1?($eq6max>0?  $eq6cow*$eq6v/$eq6max:0):0)+($eq7==1?($eq7max>0?  $eq7cow*$eq7v/$eq7max:0):0)+($eq8==1?($eq8max>0?  $eq8cow*$eq8v/$eq8max:0):0)+($eq9==1?($eq9max>0?  $eq9cow*$eq9v/$eq9max:0):0)+($eq10==1?($eq10max>0?  $eq10cow*$eq10v/$eq10max:0):0)+($eq11==1?($eq11max>0?  $eq11cow*$eq11v/$eq11max:0):0)+($eq12==1?($eq12max>0?  $eq12cow*$eq12v/$eq12max:0):0)+($eq13==1?($eq13max>0?  $eq13cow*$eq13v/$eq13max:0):0)+($eq14==1?($eq14max>0?  $eq14cow*$eq14v/$eq14max:0):0)+($eq15==1?($eq15max>0?  $eq15cow*$eq15v/$eq15max:0):0)+($eq16==1?($eq16max>0?  $eq16cow*$eq16v/$eq16max:0):0)+($eq17==1?($eq17max>0?  $eq17cow*$eq17v/$eq17max:0):0)+($eq18==1?($eq18max>0?  $eq18cow*$eq18v/$eq18max:0):0)+($eq19==1?($eq19max>0?  $eq19cow*$eq19v/$eq19max:0):0)+($eq20==1?($eq20max>0?  $eq20cow*$eq20v/$eq20max:0):0);

  
  $co2_comp_total2=($qz1==2?($qz1max>0?$qz1cow*$qz1v/$qz1max:0):0)+($qz2==2?($qz2max>0?$qz2cow*$qz2v/$qz2max:0):0)+($qz3==2?($qz3max>0?$qz3cow*$qz3v/$qz3max:0):0)+($qz4==2?($qz4max>0?$qz4cow*$qz4v/$qz4max:0):0)+($qz5==2?($qz5max>0?$qz5cow*$qz5v/$qz5max:0):0)+($asg1==2?($asg1max>0?$asg1cow*$asg1v/$asg1max:0):0)+($asg2==2?($asg2max>0?$asg2cow*$asg2v/$asg2max:0):0)+($asg3==2?($asg3max>0?$asg3cow*$asg3v/$asg3max:0):0)+($asg4==2?($asg4max>0?$asg4cow*$asg4v/$asg4max:0):0)+($ca==2?($camax>0? $cacow*$cav/$camax:0):0)+
  
  ($mq1==2?($mq1max>0? $mq1cow*$mq1v/$mq1max:0):0)+($mq2==2?($mq2max>0?  $mq2cow*$mq2v/$mq2max:0):0)+($mq3==2?($mq3max>0?  $mq3cow*$mq3v/$mq3max:0):0)+($mq4==2?($mq4max>0?  $mq4cow*$mq4v/$mq4max:0):0)+($mq5==2?($mq5max>0?  $mq5cow*$mq5v/$mq5max:0):0)+($mq6==2?($mq6max>0?  $mq6cow*$mq6v/$mq6max:0):0)+($mq7==2?($mq7max>0?  $mq7cow*$mq7v/$mq7max:0):0)+($mq8==2?($mq8max>0?  $mq8cow*$mq8v/$mq8max:0):0)+($mq9==2?($mq9max>0?  $mq9cow*$mq9v/$mq9max:0):0)+($mq10==2?($mq10max>0?  $mq10cow*$mq10v/$mq10max:0):0)+($mq11==2?($mq11max>0?  $mq11cow*$mq11v/$mq11max:0):0)+($mq12==2?($mq12max>0?  $mq12cow*$mq12v/$mq12max:0):0)+($mq13==2?($mq13max>0?  $mq13cow*$mq13v/$mq13max:0):0)+($mq14==2?($mq14max>0?  $mq14cow*$mq14v/$mq14max:0):0)+($mq15==2?($mq15max>0?  $mq15cow*$mq15v/$mq15max:0):0)+($mq16==2?($mq16max>0?  $mq16cow*$mq16v/$mq16max:0):0)+($mq17==2?($mq17max>0?  $mq17cow*$mq17v/$mq17max:0):0)+($mq18==2?($mq18max>0?  $mq18cow*$mq18v/$mq18max:0):0)+($mq19==2?($mq19max>0?  $mq19cow*$mq19v/$mq19max:0):0)+($mq20==2?($mq20max>0?  $mq20cow*$mq20v/$mq20max:0):0)+
  
  ($eq1==2?($eq1max>0? $eq1cow*$eq1v/$eq1max:0):0)+($eq2==2?($eq2max>0?  $eq2cow*$eq2v/$eq2max:0):0)+($eq3==2?($eq3max>0?  $eq3cow*$eq3v/$eq3max:0):0)+($eq4==2?($eq4max>0?  $eq4cow*$eq4v/$eq4max:0):0)+($eq5==2?($eq5max>0?  $eq5cow*$eq5v/$eq5max:0):0)+($eq6==2?($eq6max>0?  $eq6cow*$eq6v/$eq6max:0):0)+($eq7==2?($eq7max>0?  $eq7cow*$eq7v/$eq7max:0):0)+($eq8==2?($eq8max>0?  $eq8cow*$eq8v/$eq8max:0):0)+($eq9==2?($eq9max>0?  $eq9cow*$eq9v/$eq9max:0):0)+($eq10==2?($eq10max>0?  $eq10cow*$eq10v/$eq10max:0):0)+($eq11==2?($eq11max>0?  $eq11cow*$eq11v/$eq11max:0):0)+($eq12==2?($eq12max>0?  $eq12cow*$eq12v/$eq12max:0):0)+($eq13==2?($eq13max>0?  $eq13cow*$eq13v/$eq13max:0):0)+($eq14==2?($eq14max>0?  $eq14cow*$eq14v/$eq14max:0):0)+($eq15==2?($eq15max>0?  $eq15cow*$eq15v/$eq15max:0):0)+($eq16==2?($eq16max>0?  $eq16cow*$eq16v/$eq16max:0):0)+($eq17==2?($eq17max>0?  $eq17cow*$eq17v/$eq17max:0):0)+($eq18==2?($eq18max>0?  $eq18cow*$eq18v/$eq18max:0):0)+($eq19==2?($eq19max>0?  $eq19cow*$eq19v/$eq19max:0):0)+($eq20==2?($eq20max>0?  $eq20cow*$eq20v/$eq20max:0):0);


  $co3_comp_total3=($qz1==3?($qz1max>0?$qz1cow*$qz1v/$qz1max:0):0)+($qz2==3?($qz2max>0?$qz2cow*$qz2v/$qz2max:0):0)+($qz3==3?($qz3max>0?$qz3cow*$qz3v/$qz3max:0):0)+($qz4==3?($qz4max>0?$qz4cow*$qz4v/$qz4max:0):0)+($qz5==3?($qz5max>0?$qz5cow*$qz5v/$qz5max:0):0)+($asg1==3?($asg1max>0?$asg1cow*$asg1v/$asg1max:0):0)+($asg2==3?($asg2max>0?$asg2cow*$asg2v/$asg2max:0):0)+($asg3==3?($asg3max>0?$asg3cow*$asg3v/$asg3max:0):0)+($asg4==3?($asg4max>0?$asg4cow*$asg4v/$asg4max:0):0)+($ca==3?($camax>0? $cacow*$cav/$camax:0):0)+
  
  ($mq1==3?($mq1max>0? $mq1cow*$mq1v/$mq1max:0):0)+($mq2==3?($mq2max>0?  $mq2cow*$mq2v/$mq2max:0):0)+($mq3==3?($mq3max>0?  $mq3cow*$mq3v/$mq3max:0):0)+($mq4==3?($mq4max>0?  $mq4cow*$mq4v/$mq4max:0):0)+($mq5==3?($mq5max>0?  $mq5cow*$mq5v/$mq5max:0):0)+($mq6==3?($mq6max>0?  $mq6cow*$mq6v/$mq6max:0):0)+($mq7==3?($mq7max>0?  $mq7cow*$mq7v/$mq7max:0):0)+($mq8==3?($mq8max>0?  $mq8cow*$mq8v/$mq8max:0):0)+($mq9==3?($mq9max>0?  $mq9cow*$mq9v/$mq9max:0):0)+($mq10==3?($mq10max>0?  $mq10cow*$mq10v/$mq10max:0):0)+($mq11==3?($mq11max>0?  $mq11cow*$mq11v/$mq11max:0):0)+($mq12==3?($mq12max>0?  $mq12cow*$mq12v/$mq12max:0):0)+($mq13==3?($mq13max>0?  $mq13cow*$mq13v/$mq13max:0):0)+($mq14==3?($mq14max>0?  $mq14cow*$mq14v/$mq14max:0):0)+($mq15==3?($mq15max>0?  $mq15cow*$mq15v/$mq15max:0):0)+($mq16==3?($mq16max>0?  $mq16cow*$mq16v/$mq16max:0):0)+($mq17==3?($mq17max>0?  $mq17cow*$mq17v/$mq17max:0):0)+($mq18==3?($mq18max>0?  $mq18cow*$mq18v/$mq18max:0):0)+($mq19==3?($mq19max>0?  $mq19cow*$mq19v/$mq19max:0):0)+($mq20==3?($mq20max>0?  $mq20cow*$mq20v/$mq20max:0):0)+
  
  ($eq1==3?($eq1max>0? $eq1cow*$eq1v/$eq1max:0):0)+($eq2==3?($eq2max>0?  $eq2cow*$eq2v/$eq2max:0):0)+($eq3==3?($eq3max>0?  $eq3cow*$eq3v/$eq3max:0):0)+($eq4==3?($eq4max>0?  $eq4cow*$eq4v/$eq4max:0):0)+($eq5==3?($eq5max>0?  $eq5cow*$eq5v/$eq5max:0):0)+($eq6==3?($eq6max>0?  $eq6cow*$eq6v/$eq6max:0):0)+($eq7==3?($eq7max>0?  $eq7cow*$eq7v/$eq7max:0):0)+($eq8==3?($eq8max>0?  $eq8cow*$eq8v/$eq8max:0):0)+($eq9==3?($eq9max>0?  $eq9cow*$eq9v/$eq9max:0):0)+($eq10==3?($eq10max>0?  $eq10cow*$eq10v/$eq10max:0):0)+($eq11==3?($eq11max>0?  $eq11cow*$eq11v/$eq11max:0):0)+($eq12==3?($eq12max>0?  $eq12cow*$eq12v/$eq12max:0):0)+($eq13==3?($eq13max>0?  $eq13cow*$eq13v/$eq13max:0):0)+($eq14==3?($eq14max>0?  $eq14cow*$eq14v/$eq14max:0):0)+($eq15==3?($eq15max>0?  $eq15cow*$eq15v/$eq15max:0):0)+($eq16==3?($eq16max>0?  $eq16cow*$eq16v/$eq16max:0):0)+($eq17==3?($eq17max>0?  $eq17cow*$eq17v/$eq17max:0):0)+($eq18==3?($eq18max>0?  $eq18cow*$eq18v/$eq18max:0):0)+($eq19==3?($eq19max>0?  $eq19cow*$eq19v/$eq19max:0):0)+($eq20==3?($eq20max>0?  $eq20cow*$eq20v/$eq20max:0):0);

$co4_comp_total4=($qz1==4?($qz1max>0?$qz1cow*$qz1v/$qz1max:0):0)+($qz2==4?($qz2max>0?$qz2cow*$qz2v/$qz2max:0):0)+($qz3==4?($qz3max>0?$qz3cow*$qz3v/$qz3max:0):0)+($qz4==4?($qz4max>0?$qz4cow*$qz4v/$qz4max:0):0)+($qz5==4?($qz5max>0?$qz5cow*$qz5v/$qz5max:0):0)+($asg1==4?($asg1max>0?$asg1cow*$asg1v/$asg1max:0):0)+($asg2==4?($asg2max>0?$asg2cow*$asg2v/$asg2max:0):0)+($asg3==4?($asg3max>0?$asg3cow*$asg3v/$asg3max:0):0)+($asg4==4?($asg4max>0?$asg4cow*$asg4v/$asg4max:0):0)+($ca==4?($camax>0? $cacow*$cav/$camax:0):0)+
  
  ($mq1==4?($mq1max>0? $mq1cow*$mq1v/$mq1max:0):0)+($mq2==4?($mq2max>0?  $mq2cow*$mq2v/$mq2max:0):0)+($mq3==4?($mq3max>0?  $mq3cow*$mq3v/$mq3max:0):0)+($mq4==4?($mq4max>0?  $mq4cow*$mq4v/$mq4max:0):0)+($mq5==4?($mq5max>0?  $mq5cow*$mq5v/$mq5max:0):0)+($mq6==4?($mq6max>0?  $mq6cow*$mq6v/$mq6max:0):0)+($mq7==4?($mq7max>0?  $mq7cow*$mq7v/$mq7max:0):0)+($mq8==4?($mq8max>0?  $mq8cow*$mq8v/$mq8max:0):0)+($mq9==4?($mq9max>0?  $mq9cow*$mq9v/$mq9max:0):0)+($mq10==4?($mq10max>0?  $mq10cow*$mq10v/$mq10max:0):0)+($mq11==4?($mq11max>0?  $mq11cow*$mq11v/$mq11max:0):0)+($mq12==4?($mq12max>0?  $mq12cow*$mq12v/$mq12max:0):0)+($mq13==4?($mq13max>0?  $mq13cow*$mq13v/$mq13max:0):0)+($mq14==4?($mq14max>0?  $mq14cow*$mq14v/$mq14max:0):0)+($mq15==4?($mq15max>0?  $mq15cow*$mq15v/$mq15max:0):0)+($mq16==4?($mq16max>0?  $mq16cow*$mq16v/$mq16max:0):0)+($mq17==4?($mq17max>0?  $mq17cow*$mq17v/$mq17max:0):0)+($mq18==4?($mq18max>0?  $mq18cow*$mq18v/$mq18max:0):0)+($mq19==4?($mq19max>0?  $mq19cow*$mq19v/$mq19max:0):0)+($mq20==4?($mq20max>0?  $mq20cow*$mq20v/$mq20max:0):0)+
  
  ($eq1==4?($eq1max>0? $eq1cow*$eq1v/$eq1max:0):0)+($eq2==4?($eq2max>0?  $eq2cow*$eq2v/$eq2max:0):0)+($eq3==4?($eq3max>0?  $eq3cow*$eq3v/$eq3max:0):0)+($eq4==4?($eq4max>0?  $eq4cow*$eq4v/$eq4max:0):0)+($eq5==4?($eq5max>0?  $eq5cow*$eq5v/$eq5max:0):0)+($eq6==4?($eq6max>0?  $eq6cow*$eq6v/$eq6max:0):0)+($eq7==4?($eq7max>0?  $eq7cow*$eq7v/$eq7max:0):0)+($eq8==4?($eq8max>0?  $eq8cow*$eq8v/$eq8max:0):0)+($eq9==4?($eq9max>0?  $eq9cow*$eq9v/$eq9max:0):0)+($eq10==4?($eq10max>0?  $eq10cow*$eq10v/$eq10max:0):0)+($eq11==4?($eq11max>0?  $eq11cow*$eq11v/$eq11max:0):0)+($eq12==4?($eq12max>0?  $eq12cow*$eq12v/$eq12max:0):0)+($eq13==4?($eq13max>0?  $eq13cow*$eq13v/$eq13max:0):0)+($eq14==4?($eq14max>0?  $eq14cow*$eq14v/$eq14max:0):0)+($eq15==4?($eq15max>0?  $eq15cow*$eq15v/$eq15max:0):0)+($eq16==4?($eq16max>0?  $eq16cow*$eq16v/$eq16max:0):0)+($eq17==4?($eq17max>0?  $eq17cow*$eq17v/$eq17max:0):0)+($eq18==4?($eq18max>0?  $eq18cow*$eq18v/$eq18max:0):0)+($eq19==4?($eq19max>0?  $eq19cow*$eq19v/$eq19max:0):0)+($eq20==4?($eq20max>0?  $eq20cow*$eq20v/$eq20max:0):0);

$co5_comp_total5=($qz1==5?($qz1max>0?$qz1cow*$qz1v/$qz1max:0):0)+($qz2==5?($qz2max>0?$qz2cow*$qz2v/$qz2max:0):0)+($qz3==5?($qz3max>0?$qz3cow*$qz3v/$qz3max:0):0)+($qz4==5?($qz4max>0?$qz4cow*$qz4v/$qz4max:0):0)+($qz5==5?($qz5max>0?$qz5cow*$qz5v/$qz5max:0):0)+($asg1==5?($asg1max>0?$asg1cow*$asg1v/$asg1max:0):0)+($asg2==5?($asg2max>0?$asg2cow*$asg2v/$asg2max:0):0)+($asg3==5?($asg3max>0?$asg3cow*$asg3v/$asg3max:0):0)+($asg4==5?($asg4max>0?$asg4cow*$asg4v/$asg4max:0):0)+($ca==5?($camax>0? $cacow*$cav/$camax:0):0)+
  
  ($mq1==5?($mq1max>0? $mq1cow*$mq1v/$mq1max:0):0)+($mq2==5?($mq2max>0?  $mq2cow*$mq2v/$mq2max:0):0)+($mq3==5?($mq3max>0?  $mq3cow*$mq3v/$mq3max:0):0)+($mq4==5?($mq4max>0?  $mq4cow*$mq4v/$mq4max:0):0)+($mq5==5?($mq5max>0?  $mq5cow*$mq5v/$mq5max:0):0)+($mq6==5?($mq6max>0?  $mq6cow*$mq6v/$mq6max:0):0)+($mq7==5?($mq7max>0?  $mq7cow*$mq7v/$mq7max:0):0)+($mq8==5?($mq8max>0?  $mq8cow*$mq8v/$mq8max:0):0)+($mq9==5?($mq9max>0?  $mq9cow*$mq9v/$mq9max:0):0)+($mq10==5?($mq10max>0?  $mq10cow*$mq10v/$mq10max:0):0)+($mq11==5?($mq11max>0?  $mq11cow*$mq11v/$mq11max:0):0)+($mq12==5?($mq12max>0?  $mq12cow*$mq12v/$mq12max:0):0)+($mq13==5?($mq13max>0?  $mq13cow*$mq13v/$mq13max:0):0)+($mq14==5?($mq14max>0?  $mq14cow*$mq14v/$mq14max:0):0)+($mq15==5?($mq15max>0?  $mq15cow*$mq15v/$mq15max:0):0)+($mq16==5?($mq16max>0?  $mq16cow*$mq16v/$mq16max:0):0)+($mq17==5?($mq17max>0?  $mq17cow*$mq17v/$mq17max:0):0)+($mq18==5?($mq18max>0?  $mq18cow*$mq18v/$mq18max:0):0)+($mq19==5?($mq19max>0?  $mq19cow*$mq19v/$mq19max:0):0)+($mq20==5?($mq20max>0?  $mq20cow*$mq20v/$mq20max:0):0)+
  
  ($eq1==5?($eq1max>0? $eq1cow*$eq1v/$eq1max:0):0)+($eq2==5?($eq2max>0?  $eq2cow*$eq2v/$eq2max:0):0)+($eq3==5?($eq3max>0?  $eq3cow*$eq3v/$eq3max:0):0)+($eq4==5?($eq4max>0?  $eq4cow*$eq4v/$eq4max:0):0)+($eq5==5?($eq5max>0?  $eq5cow*$eq5v/$eq5max:0):0)+($eq6==5?($eq6max>0?  $eq6cow*$eq6v/$eq6max:0):0)+($eq7==5?($eq7max>0?  $eq7cow*$eq7v/$eq7max:0):0)+($eq8==5?($eq8max>0?  $eq8cow*$eq8v/$eq8max:0):0)+($eq9==5?($eq9max>0?  $eq9cow*$eq9v/$eq9max:0):0)+($eq10==5?($eq10max>0?  $eq10cow*$eq10v/$eq10max:0):0)+($eq11==5?($eq11max>0?  $eq11cow*$eq11v/$eq11max:0):0)+($eq12==5?($eq12max>0?  $eq12cow*$eq12v/$eq12max:0):0)+($eq13==5?($eq13max>0?  $eq13cow*$eq13v/$eq13max:0):0)+($eq14==5?($eq14max>0?  $eq14cow*$eq14v/$eq14max:0):0)+($eq15==5?($eq15max>0?  $eq15cow*$eq15v/$eq15max:0):0)+($eq16==5?($eq16max>0?  $eq16cow*$eq16v/$eq16max:0):0)+($eq17==5?($eq17max>0?  $eq17cow*$eq17v/$eq17max:0):0)+($eq18==5?($eq18max>0?  $eq18cow*$eq18v/$eq18max:0):0)+($eq19==5?($eq19max>0?  $eq19cow*$eq19v/$eq19max:0):0)+($eq20==5?($eq20max>0?  $eq20cow*$eq20v/$eq20max:0):0);

	$co6_comp_total6=($qz1==6?($qz1max>0?$qz1cow*$qz1v/$qz1max:0):0)+($qz2==6?($qz2max>0?$qz2cow*$qz2v/$qz2max:0):0)+($qz3==6?($qz3max>0?$qz3cow*$qz3v/$qz3max:0):0)+($qz4==6?($qz4max>0?$qz4cow*$qz4v/$qz4max:0):0)+($qz5==6?($qz5max>0?$qz5cow*$qz5v/$qz5max:0):0)+($asg1==6?($asg1max>0?$asg1cow*$asg1v/$asg1max:0):0)+($asg2==6?($asg2max>0?$asg2cow*$asg2v/$asg2max:0):0)+($asg3==6?($asg3max>0?$asg3cow*$asg3v/$asg3max:0):0)+($asg4==6?($asg4max>0?$asg4cow*$asg4v/$asg4max:0):0)+($ca==6?($camax>0? $cacow*$cav/$camax:0):0)+
	
	($mq1==6?($mq1max>0? $mq1cow*$mq1v/$mq1max:0):0)+($mq2==6?($mq2max>0?  $mq2cow*$mq2v/$mq2max:0):0)+($mq3==6?($mq3max>0?  $mq3cow*$mq3v/$mq3max:0):0)+($mq4==6?($mq4max>0?  $mq4cow*$mq4v/$mq4max:0):0)+($mq5==6?($mq5max>0?  $mq5cow*$mq5v/$mq5max:0):0)+($mq6==6?($mq6max>0?  $mq6cow*$mq6v/$mq6max:0):0)+($mq7==6?($mq7max>0?  $mq7cow*$mq7v/$mq7max:0):0)+($mq8==6?($mq8max>0?  $mq8cow*$mq8v/$mq8max:0):0)+($mq9==6?($mq9max>0?  $mq9cow*$mq9v/$mq9max:0):0)+($mq10==6?($mq10max>0?  $mq10cow*$mq10v/$mq10max:0):0)+($mq11==6?($mq11max>0?  $mq11cow*$mq11v/$mq11max:0):0)+($mq12==6?($mq12max>0?  $mq12cow*$mq12v/$mq12max:0):0)+($mq13==6?($mq13max>0?  $mq13cow*$mq13v/$mq13max:0):0)+($mq14==6?($mq14max>0?  $mq14cow*$mq14v/$mq14max:0):0)+($mq15==6?($mq15max>0?  $mq15cow*$mq15v/$mq15max:0):0)+($mq16==6?($mq16max>0?  $mq16cow*$mq16v/$mq16max:0):0)+($mq17==6?($mq17max>0?  $mq17cow*$mq17v/$mq17max:0):0)+($mq18==6?($mq18max>0?  $mq18cow*$mq18v/$mq18max:0):0)+($mq19==6?($mq19max>0?  $mq19cow*$mq19v/$mq19max:0):0)+($mq20==6?($mq20max>0?  $mq20cow*$mq20v/$mq20max:0):0)+
  
  ($eq1==6?($eq1max>0? $eq1cow*$eq1v/$eq1max:0):0)+($eq2==6?($eq2max>0?  $eq2cow*$eq2v/$eq2max:0):0)+($eq3==6?($eq3max>0?  $eq3cow*$eq3v/$eq3max:0):0)+($eq4==6?($eq4max>0?  $eq4cow*$eq4v/$eq4max:0):0)+($eq5==6?($eq5max>0?  $eq5cow*$eq5v/$eq5max:0):0)+($eq6==6?($eq6max>0?  $eq6cow*$eq6v/$eq6max:0):0)+($eq7==6?($eq7max>0?  $eq7cow*$eq7v/$eq7max:0):0)+($eq8==6?($eq8max>0?  $eq8cow*$eq8v/$eq8max:0):0)+($eq9==6?($eq9max>0?  $eq9cow*$eq9v/$eq9max:0):0)+($eq10==6?($eq10max>0?  $eq10cow*$eq10v/$eq10max:0):0)+($eq11==6?($eq11max>0?  $eq11cow*$eq11v/$eq11max:0):0)+($eq12==6?($eq12max>0?  $eq12cow*$eq12v/$eq12max:0):0)+($eq13==6?($eq13max>0?  $eq13cow*$eq13v/$eq13max:0):0)+($eq14==6?($eq14max>0?  $eq14cow*$eq14v/$eq14max:0):0)+($eq15==6?($eq15max>0?  $eq15cow*$eq15v/$eq15max:0):0)+($eq16==6?($eq16max>0?  $eq16cow*$eq16v/$eq16max:0):0)+($eq17==6?($eq17max>0?  $eq17cow*$eq17v/$eq17max:0):0)+($eq18==6?($eq18max>0?  $eq18cow*$eq18v/$eq18max:0):0)+($eq19==6?($eq19max>0?  $eq19cow*$eq19v/$eq19max:0):0)+($eq20==6?($eq20max>0?  $eq20cow*$eq20v/$eq20max:0):0);

    $co1_percentage=($co1_comp_total!=0?(($co1_comp_total1/$co1_comp_total)*100):0);
	$co2_percentage=($co2_comp_total!=0?(($co2_comp_total2/$co2_comp_total)*100):0);
	$co3_percentage=($co3_comp_total!=0?(($co3_comp_total3/$co3_comp_total)*100):0);
	$co4_percentage=($co4_comp_total!=0?(($co4_comp_total4/$co4_comp_total)*100):0);
	$co5_percentage=($co5_comp_total!=0?(($co5_comp_total5/$co5_comp_total)*100):0);
	$co6_percentage=($co6_comp_total!=0?(($co6_comp_total6/$co6_comp_total)*100):0);
   if($co1_percentage>$percentage)
   {  $co1_per=$co1_per+1;
		$no_co1=$no_co1+1;
   }
   if($co2_percentage>$percentage){
	   $co2_per=$co2_per+1;
   $no_co2=$no_co2+1;
   }
   if($co3_percentage>$percentage)
   {   $co3_per=$co3_per+1;
       $no_co3=$no_co3+1;
   }
   if($co4_percentage>$percentage)
   {
	   $co4_per=$co4_per+1;
	   $no_co4=$no_co4+1;
   }
   if($co5_percentage>$percentage)
   {$co5_per=$co5_per+1;
   $no_co5=$no_co5+1;
   }
   if($co6_percentage>$percentage)
   {   $co6_per=$co6_per+1;
		$no_co6=$no_co6+1;
   }
  
   
   
  
 	
			
$html_attain.='<tr>
           		<td>'. $i. '	</td>
                <td>'. $rollno. '</td>
                <td>'. $name.'</td>
               
				<td>'. $co1_comp_total1.'</td>
				<td>'. $co2_comp_total2.'</td>
				<td>'.$co3_comp_total3.'</td>
				<td>'.$co4_comp_total4.'</td>
				<td>'.$co5_comp_total5.'</td>
				<td>'.$co6_comp_total6.'</td>
				</tr>';
			
			
 } 
 
 // for each ends
 
   $co1_student_perc=($i>0?($co1_per/$i)*100:0);
   $co2_student_perc=($i>0?($co2_per/$i)*100:0);
   $co3_student_perc=($i>0?($co3_per/$i)*100:0);
   $co4_student_perc=($i>0?($co4_per/$i)*100:0);
   $co5_student_perc=($i>0?($co5_per/$i)*100:0);
   $co6_student_perc=($i>0?($co6_per/$i)*100:0);
 

$html_attain.='</tbody></table>';






$page_cowise = $pdf->PageNo();   
$pdf->writeHTML($html_attain, true, false, true, false, '');
 } 
 $pdf->AddPage('L', 'A4');
//$pdf->Cell(0, 0, 'A4 LANDSCAPE', 1, 1, 'C');
//$pdf->SetLineStyle( array( 'width' => 1, 'color' => array(2,2,10)));
$pdf->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
$pdf->Line(12,12,$pdf->getPageWidth()-12,12); 
$pdf->Line($pdf->getPageWidth()-12,12,$pdf->getPageWidth()-12,$pdf->getPageHeight()-10);
$pdf->Line(12,$pdf->getPageHeight()-10,$pdf->getPageWidth()-12,$pdf->getPageHeight()-10);
$pdf->Line(12,12,12,$pdf->getPageHeight()-10);

$html_attain='<table class="table table-striped table-bordered table-condensed" border="1" >
	<tr><th bgcolor="#73AD21" align="center" colspan="7">Course Outcome Attainment Table</th></tr>
	<tr>
	<td><b>Course Outcomes</b></td>
	<td>CO1</td>
	<td>CO2</td>
	<td>CO3</td>
	<td>CO4</td>
	<td>CO5</td>
	<td>CO6</td>
	</tr>
	<tr>
	<td><b>Student having marks greater than '.$percentage .'</b></td>
				<td>'. $no_co1.'</td>
				<td>'. $no_co2.'</td>
				<td>'. $no_co3.'</td>
				<td>'. $no_co4.'</td>
				<td>'. $no_co5.'</td>
				<td>'. $no_co6.'</td>
	</tr>';
	
	if($co1_student_perc>=50&&$co1_student_perc<60)
	   $attain_level1=1;
   if($co1_student_perc>=60&&$co1_student_perc<70)
	   $attain_level1=2;
   if($co1_student_perc>=70)
	   $attain_level1=3;
   
   	if($co2_student_perc>=50&&$co2_student_perc<60)
	   $attain_level2=1;
   if($co2_student_perc>=60&&$co2_student_perc<70)
	   $attain_level2=2;
   if($co2_student_perc>=70)
	   $attain_level2=3;
   
   	if($co3_student_perc>=50&&$co3_student_perc<60)
	   $attain_level3=1;
   if($co3_student_perc>=60&&$co3_student_perc<70)
	   $attain_level3=2;
   if($co3_student_perc>=70)
	   $attain_level3=3;
   
   	if($co4_student_perc>=50&&$co4_student_perc<60)
	   $attain_level4=1;
   if($co4_student_perc>=60&&$co4_student_perc<70)
	   $attain_level4=2;
   if($co4_student_perc>=70)
	   $attain_level4=3;
   
   	if($co5_student_perc>=50&&$co5_student_perc<60)
	   $attain_level5=1;
   if($co5_student_perc>=60&&$co5_student_perc<70)
	   $attain_level5=2;
   if($co5_student_perc>=70)
	   $attain_level5=3;
   
   	if($co6_student_perc>=50&&$co6_student_perc<60)
	   $attain_level6=1;
   if($co6_student_perc>=60&&$co6_student_perc<70)
	   $attain_level6=2;
   if($co6_student_perc>=70)
	   $attain_level6=3;
   
  
	
	
	
$html_attain.='<tr>
	<td><b>Attainment Level<br> 1->  50% student have >'. $percentage.'% marks <br> 2-> 60% student have >'. $percentage.'% marks <br> 3-> 70% or more student have >'. $percentage.'% marks</b></td>
	<td>'. $attain_level1 .'</td>
	<td>'. $attain_level2 .'</td>
	<td>'. $attain_level3 .'</td>
	<td>'. $attain_level4 .'</td>
	<td>'. $attain_level5 .'</td>
	<td>'. $attain_level6 .'</td>
	
	</tr></table>';
/*
		
		 $co1q = "SELECT * FROM copo_details WHERE faculty_id='$sessionId' and course_code='$select2' and cono='1'";
	
	     $co1r = $db1->query( $co1q);
		 
		    $po11="";
			$po12="";
			$po13="";
			$po14="";
			$po15="";
			$po16="";
			$po17="";
			$po18="";
			$po19="";
			$po110="";
			$po111="";
			$po112="";
			$peo11="";
			$peo12="";
			$peo13="";
		 foreach ($co1r as $row2) {
			$po11=$row2['po1'];
			$po12=$row2['po2'];
			$po13=$row2['po3'];
			$po14=$row2['po4'];
			$po15=$row2['po5'];
			$po16=$row2['po6'];
			$po17=$row2['po7'];
			$po18=$row2['po8'];
			$po19=$row2['po9'];
			$po110=$row2['po10'];
			$po111=$row2['po11'];
			$po112=$row2['po12'];
			$peo11=$row2['peo1'];
			$peo12=$row2['peo2'];
			$peo13=$row2['peo3'];
  }

		 $co2q = "SELECT * FROM copo_details WHERE faculty_id='$sessionId' and course_code='$select2' and cono='2'";
	     $co2r = $db1->query($co2q);
		 
		    $po21="";
			$po22="";
			$po23="";
			$po24="";
			$po25="";
			$po26="";
			$po27="";
			$po28="";
			$po29="";
			$po210="";
			$po211="";
			$po212="";
			$peo21="";
			$peo22="";
			$peo23="";
		 foreach ( $co2r as $row2 ) {
			$po21=$row2['po1'];
			$po22=$row2['po2'];
			$po23=$row2['po3'];
			$po24=$row2['po4'];
			$po25=$row2['po5'];
			$po26=$row2['po6'];
			$po27=$row2['po7'];
			$po28=$row2['po8'];
			$po29=$row2['po9'];
			$po210=$row2['po10'];
			$po211=$row2['po11'];
			$po212=$row2['po12'];
			$peo21=$row2['peo1'];
			$peo22=$row2['peo2'];
			$peo23=$row2['peo3'];
  }
  
  		 $co3q = "SELECT * FROM copo_details WHERE faculty_id='$sessionId' and course_code='$select2' and cono='3'";
	     $co3r = $db1->query($co3q);
		 
		    $po31="";
			$po32="";
			$po33="";
			$po34="";
			$po35="";
			$po36="";
			$po37="";
			$po38="";
			$po39="";
			$po310="";
			$po311="";
			$po312="";
			$peo31="";
			$peo32="";
			$peo33="";
		foreach($co3r as $row2) {
			$po31=$row2['po1'];
			$po32=$row2['po2'];
			$po33=$row2['po3'];
			$po34=$row2['po4'];
			$po35=$row2['po5'];
			$po36=$row2['po6'];
			$po37=$row2['po7'];
			$po38=$row2['po8'];
			$po39=$row2['po9'];
			$po310=$row2['po10'];
			$po311=$row2['po11'];
			$po312=$row2['po12'];
			$peo31=$row2['peo1'];
			$peo32=$row2['peo2'];
			$peo33=$row2['peo3'];
  }
  		 $co4q = "SELECT * FROM copo_details WHERE faculty_id='$sessionId' and course_code='$select2' and cono='4'";
	     $co4r = $db1->query( $co4q);
		 
		    $po41="";
			$po42="";
			$po43="";
			$po44="";
			$po45="";
			$po46="";
			$po47="";
			$po48="";
			$po49="";
			$po410="";
			$po411="";
			$po412="";
			$peo41="";
			$peo42="";
			$peo43="";
		foreach($co4r as $row2) {
		
			$po41=$row2['po1'];
			$po42=$row2['po2'];
			$po43=$row2['po3'];
			$po44=$row2['po4'];
			$po45=$row2['po5'];
			$po46=$row2['po6'];
			$po47=$row2['po7'];
			$po48=$row2['po8'];
			$po49=$row2['po9'];
			$po410=$row2['po10'];
			$po411=$row2['po11'];
			$po412=$row2['po12'];
			$peo41=$row2['peo1'];
			$peo42=$row2['peo2'];
			$peo43=$row2['peo3'];
			
  }
    
		 $co5q = "SELECT * FROM copo_details WHERE faculty_id='$sessionId' and course_code='$select2' and cono='5'";
		 $co5r = $db1->query($co5q);
		 
		    $po51="";
			$po52="";
			$po53="";
			$po54="";
			$po55="";
			$po56="";
			$po57="";
			$po58="";
			$po59="";
			$po510="";
			$po511="";
			$po512="";
			$peo51="";
			$peo52="";
			$peo53="";
			
			
		foreach($co5r as $row2) {
			$po51=$row2['po1'];
			$po52=$row2['po2'];
			$po53=$row2['po3'];
			$po54=$row2['po4'];
			$po55=$row2['po5'];
			$po56=$row2['po6'];
			$po57=$row2['po7'];
			$po58=$row2['po8'];
			$po59=$row2['po9'];
			$po510=$row2['po10'];
			$po511=$row2['po11'];
			$po512=$row2['po12'];
			$peo51=$row2['peo1'];
			$peo52=$row2['peo2'];
			$peo53=$row2['peo3'];
			
  }
	
		 $co6q = "SELECT * FROM copo_details WHERE faculty_id='$sessionId' and course_code='$select2' and cono='6'";
	     $co6r = $db1->query($co6q);
		 
		    $po61="";
			$po62="";
			$po63="";
			$po64="";
			$po65="";
			$po66="";
			$po67="";
			$po68="";
			$po69="";
			$po610="";
			$po611="";
			$po612="";
			$peo61="";
			$peo62="";
			$peo63="";
			
			
		foreach( $co6r as $row2) {
			$po61=$row2['po1'];
			$po62=$row2['po2'];
			$po63=$row2['po3'];
			$po64=$row2['po4'];
			$po65=$row2['po5'];
			$po66=$row2['po6'];
			$po67=$row2['po7'];
			$po68=$row2['po8'];
			$po69=$row2['po9'];
			$po610=$row2['po10'];
			$po611=$row2['po11'];
			$po612=$row2['po12'];
			$peo61=$row2['peo1'];
			$peo62=$row2['peo2'];
			$peo63=$row2['peo3'];
			
  }
  */

$html_attain.='<table border="1" class="table  table-hover"> 
	  	<!--table class="table table-striped table-bordered table-condensed">  -->
		 <thead>
	<tr><th bgcolor="#73AD21" align="center" colspan="16">COPO Mapping Table</th></tr>
      <tr>
	    <th>CO\PO1</th>
        <th>PO1</th>
		<th>PO2</th>
		<th>PO3</th>
		<th>PO4</th>
		<th>PO5</th>
		<th>PO6</th>
		<th>PO7</th>
		<th>PO8</th>
		<th>PO9</th>
		<th>PO10</th>
		<th>PO11</th>
		<th>PO12</th>
		
		<th>PSO1</th>
		<th>PSO2</th>
		<th>PSO3</th>
        
      </tr>
    </thead>
    <tbody>
	<!------------- co1 ------------->
      <tr>
        <td><b>CO1</b></td>';
		
		
		
 $html_attain.='<td>
			<div class="form-group">
			'. $po11 .'
			</div>
			</td>
			<td>
			<div class="form-group">
			'. $po12.'
			</div>
			</td>
			<td>
			<div class="form-group">
			'. $po13.'
			</div>
			</td>
			<td>
			<div class="form-group">
			'. $po14.'
			</div>
			</td>
			<td>
			<div class="form-group">
			'. $po15.'
			</div>
			</td>
			<td>
			<div class="form-group">
			'. $po16.'
			</div>
			</td>
			<td>
			<div class="form-group">
			'. $po17.'
			</div>
</td>
			<td>
			<div class="form-group">
			'. $po18.'
			</div>
</td>
			<td>
			<div class="form-group">
			'. $po19.'
			</div>
</td>
			<td>
			<div class="form-group">
			'. $po110.'
			</div>
</td>
			<td>
			<div class="form-group">
			'. $po111.'
			</div>
</td>
			<td>
			<div class="form-group">
			'. $po112.'
			</div>
</td>
			<td>
			<div class="form-group">
			'. $peo11.'
			</div>
</td>
			<td>
			<div class="form-group">
			'. $peo12.'
			</div>
</td>
			<td>
			<div class="form-group">
			'. $peo13.'
			</div>
</td>
			

						
		</tr>

      <tr>
        <td><b>CO2</b></td>';

		$html_attain.='<td>
		
			<div class="form-group">
			'. $po21.'
			</div>
			</td>
			<td>
			<div class="form-group">
			'. $po22.'
			</div>
</td>
			<td>
			<div class="form-group">
			'. $po23.'
			</div>
			</td>
			<td>
			<div class="form-group">
			'. $po24.'
			</div>
</td>
			<td>
			<div class="form-group">
			'. $po25.'
			</div>
</td>
			<td>
			<div class="form-group">
			'. $po26.'
			</div>
</td>
			<td>
			<div class="form-group">
			'. $po27.'
			</div>
</td>
			<td>
			<div class="form-group">
			'. $po28.'
			</div>
</td>
			<td>
			<div class="form-group">
			'. $po29.'
			</div>
</td>
			<td>
			<div class="form-group">
			'. $po210.'
			</div>
</td>
			<td>
			<div class="form-group">
			'. $po211.'
			</div>
</td>
			<td>
			<div class="form-group">
			'. $po212.'
			</div>
</td>
			<td>
			<div class="form-group">
			'. $peo21.'
			</div>
</td>
			<td>
			<div class="form-group">
			'. $peo22.'
			</div>
</td>
			<td>
			<div class="form-group">
			'. $peo23.'
			</div>
</td>
		</tr>


      <tr>
        <td><b>CO3</b></td>';
	$html_attain.='<td>
			<div class="form-group">
			 '.$po31  ;
	$html_attain.='	</div>
			</td>
			<td>
			<div class="form-group">
			 '.$po32 ;
	$html_attain.='	</div>
			</td>
			<td>
			<div class="form-group">
			 '.$po33  ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			 '.$po34  ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			 '.$po35 ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			 '.$po36 ;
$html_attain.='</div>
</td>
			<td>
			<div class="form-group">
			 '.$po37  ;
$html_attain.='</div>
</td>
			<td>
			<div class="form-group">
			 '.$po38 ;
$html_attain.='	</div>
			</td>
			<td>
			<div class="form-group">
			 '.$po39 ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			 '.$po310 ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			'.$po311 ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			'.$po312 ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			'.$peo31 ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			'.$peo32 ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			'.$peo33 .'
</div>
</td>
		</tr>


      <tr>
        <td><b>CO4</b></td>';
        
		

$html_attain.='<td>
		
			<div class="form-group">
			'.$po41  ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			 '.$po42 ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			 '.$po43 ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			 '.$po44 ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			 '.$po45 ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			 '.$po46 ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			'.$po47 ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			 '.$po48 ;
$html_attain.='	</div>
			</td>
			<td>
			<div class="form-group">
			'.$po49 ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			 '.$po410  ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			'.$po411  ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			 '.$po412  ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			 '.$peo41 ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			 '.$peo42  ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			'.$peo43  ;
$html_attain.='</div>
		</td>
		</tr>
	<!------------- co5 ------------->
      <tr>
        <td><b>CO5</b></td>';
    
$html_attain.='<td>
		
			<div class="form-group">
			'. $po51 ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			'. $po52  ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			'. $po53  ;
$html_attain.='	</div>
			</td>
			<td>
			<div class="form-group">
			'. $po54  ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			'. $po55 ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			 '. $po56  ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			'. $po57 ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			'. $po58 ;
$html_attain.='	</div>
			</td>
			<td>
			<div class="form-group">
			'. $po59 ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			'. $po510  ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			'. $po511  ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			'. $po512 ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			'.$peo51 ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			'. $peo52 ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			'. $peo53 ;
$html_attain.='</div>
		</td>
		</tr>


<!------------- co6 ------------->
      <tr>
        <td><b>CO6</b></td>';
$html_attain.='<td>
		
			<div class="form-group">
			 '.$po61 ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			 '.$po62  ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			'.$po63 ;
$html_attain.='	</div>
			</td>
			<td>
			<div class="form-group">
			 '. $po64  ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			'. $po65 ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			'. $po66 ;
$html_attain.='	</div>
			</td>
			<td>
			<div class="form-group">
			'. $po67 ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			'. $po68 ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			'. $po69 ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			'. $po610 ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			'. $po611 ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			'. $po612 ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			'. $peo61 ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			'. $peo62 ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			'. $peo63 ;
		
$html_attain.='</div>
</td>
		</tr>
		<tr bgcolor="#33D2F" style="font-weight: bold;font-size: 17px;">
		<th  align="center" >Over-all</th>
	
		<td>
        <div class="form-group">'.
		((($po11>0 ?1:0)+($po21>0?1:0)+($po31>0?1:0)+($po41>0 ?1:0)+($po51>0?1:0)+($po61>0?1:0))>0? round(( ($po11+$po21+$po31+$po41+$po51+$po61)/(($po11>0 ?1:0)+($po21>0?1:0)+($po31>0?1:0)+($po41>0 ?1:0)+($po51>0?1:0)+($po61>0?1:0))),2):0);
			
			
			
		 
			
$html_attain.='</div>
		</td>';
		$po2_denominator=(($po12>0?1:0)+($po22>0?1:0)+($po32>0?1:0)+($po42>0?1:0)+($po52>0?1:0)+($po62>0?1:0)) ;
			
				$po2r= ($po2_denominator>0? (($po12+$po22 +$po32 +$po42 +$po52 +$po62 )/$po2_denominator):0);
$html_attain.='		<td>
        <div class="form-group">'.
			   round($po2r,2);  
			   
			   $po3_denominator=(($po13>0?1:0)+($po23>0?1:0)+($po33>0?1:0)+($po43>0?1:0)+($po53>0?1:0)+($po63>0?1:0)) ;
				
				$po3r= ($po3_denominator>0? (($po13 +$po23 +$po33 +$po43 +$po53 +$po63 )/$po3_denominator):0);
			
			
			 
$html_attain.='</div>
		</td>

		<td>
        <div class="form-group">'.
			
			 round($po3r,2);
			
			$po4_denominator=(($po14>0?1:0)+($po24>0?1:0)+($po34>0?1:0)+($po44>0?1:0)+($po54>0?1:0)+($po64>0?1:0)) ;
				
				$po4r= ($po4_denominator>0? (($po14 +$po24 +$po34 +$po44 +$po54 +$po64 )/$po4_denominator):0);
			
			
$html_attain.='	</div>
		</td>

		<td>
        <div class="form-group">'.
			
			 round($po4r,2);
			 
			/*$po4=0;	
			(($attain_level1==0 && $attain_level2==0 && $attain_level3==0 && $attain_level4==0 && $attain_level5==0 && $attain_level6==0)==true?0:
			((($po14>0?$attain_level1:0)+($po24>0?$attain_level2:0)+($po34>0?$attain_level3:0)+($po44>0?$attain_level4:0)+($po54>0?$attain_level5:0)+($po64>0?$attain_level6:0))>0? (($po14*$attain_level1+$po24*$attain_level2+$po34*$attain_level3+$po44*$attain_level4+$po54*$attain_level5+$po64*$attain_level6)/(($po14>0?$attain_level1:0)+($po24>0?$attain_level2:0)+($po34>0?$attain_level3:0)+($po44>0?$attain_level4:0)+($po54>0?$attain_level5:0)+($po64>0?$attain_level6:0))):0));
			//}
			
			*/
			
			$po5_denominator=(($po15>0?1:0)+($po25>0?1:0)+($po35>0?1:0)+($po45>0?1:0)+($po55>0?1:0)+($po65>0?1:0));
			
			$po5r=($po5_denominator>0? (($po15 +$po25 +$po35 +$po45 +$po55 +$po65 )/$po5_denominator):0) ;
			
			
$html_attain.='</div>
		</td>

		<td>
        <div class="form-group">'.
		/*	
			//$po5=0;	
			(($attain_level1==0 && $attain_level2==0 && $attain_level3==0 && $attain_level4==0 && $attain_level5==0 && $attain_level6==0)==true?0:
			((($po15>0?$attain_level1:0)+($po25>0?$attain_level2:0)+($po35>0?$attain_level3:0)+($po45>0?$attain_level4:0)+($po55>0?$attain_level5:0)+($po65>0?$attain_level6:0))>0? (($po15*$attain_level1+$po25*$attain_level2+$po35*$attain_level3+$po45*$attain_level4+$po55*$attain_level5+$po65*$attain_level6)/(($po15>0?$attain_level1:0)+($po25>0?$attain_level2:0)+($po35>0?$attain_level3:0)+($po45>0?$attain_level4:0)+($po55>0?$attain_level5:0)+($po65>0?$attain_level6:0))):0) );
		//	}
			*/
			round($po5r,2);

				$po6_denominator=(($po16>0?1:0)+($po26>0?1:0)+($po36>0?1:0)+($po46>0?1:0)+($po56>0?1:0)+($po66>0?1:0));
				
				$po6r= ($po6_denominator>0?(($po16 +$po26 +$po36 +$po46 +$po56 +$po66 )/$po6_denominator):0) ;
			
				
$html_attain.='</div>
		</td>
		<td>
        <div class="form-group">'.
			/*
			$po6=0;	
			(($attain_level1==0 && $attain_level2==0 && $attain_level3==0 && $attain_level4==0 && $attain_level5==0 && $attain_level6==0)==true?0:
			((($po16>0?$attain_level1:0)+($po26>0?$attain_level2:0)+($po36>0?$attain_level3:0)+($po46>0?$attain_level4:0)+($po56>0?$attain_level5:0)+($po66>0?$attain_level6:0))>0?(($po16*$attain_level1+$po26*$attain_level2+$po36*$attain_level3+$po46*$attain_level4+$po56*$attain_level5+$po66*$attain_level6)/(($po16>0?$attain_level1:0)+($po26>0?$attain_level2:0)+($po36>0?$attain_level3:0)+($po46>0?$attain_level4:0)+($po56>0?$attain_level5:0)+($po66>0?$attain_level6:0))):0)) ;
			//}
			*/
			
			round($po6r,2);
			
			$po7_denominator=(($po17>0?1:0)+($po27>0?1:0)+($po37>0?1:0)+($po47>0?1:0)+($po57>0?1:0)+($po67>0?1:0));
				
				$po7r= ($po7_denominator>0?(($po17 +$po27 +$po37 +$po47 +$po57 +$po67 )/$po7_denominator):0) ;
			
			
			
$html_attain.='</div>
		</td>

		<td>
        <div class="form-group">'.
			/*
			$po7=0;	
			(($attain_level1==0 && $attain_level2==0 && $attain_level3==0 && $attain_level4==0 && $attain_level5==0 && $attain_level6==0)==true?0:
			$po7= ((($po17>0?$attain_level1:0)+($po27>0?$attain_level2:0)+($po37>0?$attain_level3:0)+($po47>0?$attain_level4:0)+($po57>0?$attain_level5:0)+($po67>0?$attain_level6:0))>0?(($po17*$attain_level1+$po27*$attain_level2+$po37*$attain_level3+$po47*$attain_level4+$po57*$attain_level5+$po67*$attain_level6)/(($po17>0?$attain_level1:0)+($po27>0?$attain_level2:0)+($po37>0?$attain_level3:0)+($po47>0?$attain_level4:0)+($po57>0?$attain_level5:0)+($po67>0?$attain_level6:0))):0)) ;

		//	}
		*/
		
		round($po7r,2);
		$po8_denominator=(($po18>0?1:0)+($po28>0?1:0)+($po38>0?1:0)+($po48>0?1:0)+($po58>0?1:0)+($po68>0?1:0));
				
		$po8r= ($po8_denominator>0?(($po18 +$po28 +$po38 +$po48 +$po58 +$po68 )/$po8_denominator):0) ;
			
		
$html_attain.='</div>
		</td>

		<td>
        <div class="form-group">'.
			/* 
			(($attain_level1==0 && $attain_level2==0 && $attain_level3==0 && $attain_level4==0 && $attain_level5==0 && $attain_level6==0)==true?0:
			((($po18>0?$attain_level1:0)+($po28>0?$attain_level2:0)+($po38>0?$attain_level3:0)+($po48>0?$attain_level4:0)+($po58>0?$attain_level5:0)+($po68>0?$attain_level6:0))>0?(($po18*$attain_level1+$po28*$attain_level2+$po38*$attain_level3+$po48*$attain_level4+$po58*$attain_level5+$po68*$attain_level6)/(($po18>0?$attain_level1:0)+($po28>0?$attain_level2:0)+($po38>0?$attain_level3:0)+($po48>0?$attain_level4:0)+($po58>0?$attain_level5:0)+($po68>0?$attain_level6:0))):0)) ;
			//}
			*/
			
			round($po8r,2);
			
			$po9_denominator=(($po19>0?1:0)+($po29>0?1:0)+($po39>0?1:0)+($po49>0?1:0)+($po59>0?1:0)+($po69>0?1:0));
				
			$po9r= ($po9_denominator>0?(($po19 +$po29 +$po39 +$po49 +$po59 +$po69 )/$po9_denominator):0) ;
				
			
$html_attain.='	</div>
		</td>

		<td>
        <div class="form-group">'.
			 	
				
			round($po9r,2);
			
			$po10_denominator=(($po110>0?1:0)+($po210>0?1:0)+($po310>0?1:0)+($po410>0?1:0)+($po510>0?1:0)+($po610>0?1:0));
			
			$po10r= ($po10_denominator>0?(($po110 +$po210 +$po310 +$po410 +$po510 +$po610 )/$po10_denominator):0) ;
			
			
			
			//	}
			
			
$html_attain.='</div>
		</td>

		<td>
        <div class="form-group">'.
			
			round($po10r,2);
			$po11_denominator=(($po111>0?1:0)+($po211>0?1:0)+($po311>0?1:0)+($po411>0?1:0)+($po511>0?1:0)+($po611>0?1:0));
				
			$po11r1= ($po11_denominator>0?(($po111 +$po211 +$po311 +$po411 +$po511 +$po611 )/$po11_denominator):0) ;
			
			
$html_attain.='	</div>
		</td>

		<td>
        <div class="form-group">'.
			
			
			 round($po11r1,2);
			
			$po12_denominator=(($po112>0?1:0)+($po212>0?1:0)+($po312>0?1:0)+($po412>0?1:0)+($po512>0?1:0)+($po612>0?1:0));
				
				$po12r1= ($po12_denominator>0?(($po112 +$po212 +$po312 +$po412 +$po512 +$po612 )/$po12_denominator):0) ;
				
			
			
			
				//}
			
			
$html_attain.='	</div>
		</td>

		<td>
        <div class="form-group">'.
			 
			round($po12r1,2);	
		//	}
			
			$peo1_denominator=(($peo11>0?1:0)+($peo21>0?1:0)+($peo31>0?1:0)+($peo41>0?1:0)+($peo51>0?1:0)+($peo61>0?1:0));
				
				$peo11= ($peo1_denominator>0?(($peo11 +$peo21 +$peo31 +$peo41 +$peo51 +$peo61 )/$peo1_denominator):0) ;
				
			
			
			
$html_attain.='	</div>
		</td>

		<td>
        <div class="form-group">'.
		//	$peo1=0;	
			 round($peo1r,2);
			$peo2_denominator=(($peo12>0?1:0)+($peo22>0?1:0)+($peo32>0?1:0)+($peo42>0?1:0)+($peo52>0?1:0)+($peo62>0?1:0));
				
				$peo2r= ($peo2_denominator>0?(($peo12 +$peo22 +$peo32 +$peo42 +$peo52 +$peo62 )/$peo2_denominator):0) ;
				
			
			
		//	}
			
			
$html_attain.='	</div>
		</td>

		<td>
        <div class="form-group">'.			
			//$peo2=0;	
			 round($peo2r,2);
			$peo3_denominator=(($peo13>0?1:0)+($peo23>0?1:0)+($peo33>0?1:0)+($peo43>0?1:0)+($peo53>0?1:0)+($peo63>0?1:0));
			
			$peo3r= ($peo3_denominator>0?(($peo13 +$peo23 +$peo33 +$peo43 +$peo53 +$peo63 )/$peo3_denominator):0) ;
			
			
			
$html_attain.='	</div>
		</td>

		<td>
        <div class="form-group">'.
			
			//$peo3=0;	
			
			 round($peo3r,2);
			
$html_attain.='		</div>
		</td>
		</tr>';
		
		   $po1=0;	
			if($attain_level1==0 && $attain_level2==0 && $attain_level3==0 && $attain_level4==0 && $attain_level5==0 && $attain_level6==0){
			$po1=0;	
				
			}else{
			$po1_denominator=(($po11>0 ?1:0)+($po21>0?1:0)+($po31>0?1:0)+($po41>0 ?1:0)+($po51>0?1:0)+($po61>0?1:0)) ;
			
			$po1=($po1_denominator>0? ( ($po11+$po21+$po31+$po41+$po51+$po61)/$po1_denominator):0);
			
			}
			$po1_comap= round($po1,2);
			
			
$html_attain.='		<tr bgcolor="#33D2F" style="font-weight: bold;font-size: 17px;">
	<th  align="center" >Over-all</th>
	
		<td>
        <div class="form-group">'.
			 $po1_comap;
			
			 $po2=0;	
			if($attain_level1==0 && $attain_level2==0 && $attain_level3==0 && $attain_level4==0 && $attain_level5==0 && $attain_level6==0){
			$po2=0;	
				
			}else{
				$po2_denominator=(($po12>0?1:0)+($po22>0?1:0)+($po32>0?1:0)+($po42>0?1:0)+($po52>0?1:0)+($po62>0?1:0)) ;
			
				$po2= ($po2_denominator>0? (($po12+$po22 +$po32 +$po42 +$po52 +$po62 )/$po2_denominator):0);
			}
			$po2_comap= round($po2,2);
			
			
$html_attain.='	</div>
		</td>
		
		<td>
        <div class="form-group">'.
			$po2_comap;
			
			
			$po3=0;	
			if($attain_level1==0 && $attain_level2==0 && $attain_level3==0 && $attain_level4==0 && $attain_level5==0 && $attain_level6==0){
			$po3=0;	
				
			}else{
				$po3_denominator=(($po13>0?1:0)+($po23>0?1:0)+($po33>0?1:0)+($po43>0?1:0)+($po53>0?1:0)+($po63>0?1:0)) ;
				
				$po3= ($po3_denominator>0? (($po13 +$po23 +$po33 +$po43 +$po53 +$po63 )/$po3_denominator):0);
			}
			$po3_comap= round($po3,2);
			
			
			
$html_attain.='			</div>
		</td>

		<td>
        <div class="form-group">'.
			$po3_comap;
			
			
			$po4=0;	
			if($attain_level1==0 && $attain_level2==0 && $attain_level3==0 && $attain_level4==0 && $attain_level5==0 && $attain_level6==0){
			$po4=0;	
				
			}else{
				$po4_denominator=(($po14>0?1:0)+($po24>0?1:0)+($po34>0?1:0)+($po44>0?1:0)+($po54>0?1:0)+($po64>0?1:0)) ;
				
				$po4= ($po4_denominator>0? (($po14 +$po24 +$po34 +$po44 +$po54 +$po64 )/$po4_denominator):0);
			}
			$po4_comap= round($po4,2);
		
			
$html_attain.='			</div>
		</td>

		<td>
        <div class="form-group">'.
			$po4_comap;
$html_attain.='					</div>
		</td>

		<td>
        <div class="form-group">'.
		  
			
			
			$po5=0;	
			if($attain_level1==0 && $attain_level2==0 && $attain_level3==0 && $attain_level4==0 && $attain_level5==0 && $attain_level6==0){
			$po5=0;	
				
			}else{
			$po5_denominator=(($po15>0?1:0)+($po25>0?1:0)+($po35>0?1:0)+($po45>0?1:0)+($po55>0?1:0)+($po65>0?1:0));
			
			$po5=($po5_denominator>0? (($po15 +$po25 +$po35 +$po45 +$po55 +$po65 )/$po5_denominator):0) ;
			}
			$po5_comap= round($po5,2);
			
$html_attain.='					</div>
		</td>

		
		<td>
        <div class="form-group">'.
		   $po5_comap;
			
			$po6=0;	
			if($attain_level1==0 && $attain_level2==0 && $attain_level3==0 && $attain_level4==0 && $attain_level5==0 && $attain_level6==0){
			$po6=0;	
				
			}else{
				$po6_denominator=(($po16>0?1:0)+($po26>0?1:0)+($po36>0?1:0)+($po46>0?1:0)+($po56>0?1:0)+($po66>0?1:0));
				
				$po6= ($po6_denominator>0?(($po16 +$po26 +$po36 +$po46 +$po56 +$po66 )/$po6_denominator):0) ;
			}
			$po6_comap= round($po6,2);
			
$html_attain.='					</div>
		</td>

		<td>
        <div class="form-group">'.
			$po6_comap;
			
			$po7=0;	
			if($attain_level1==0 && $attain_level2==0 && $attain_level3==0 && $attain_level4==0 && $attain_level5==0 && $attain_level6==0){
			$po7=0;	
				
			}else{
				$po7_denominator=(($po17>0?1:0)+($po27>0?1:0)+($po37>0?1:0)+($po47>0?1:0)+($po57>0?1:0)+($po67>0?1:0));
				
				$po7= ($po7_denominator>0?(($po17 +$po27 +$po37 +$po47 +$po57 +$po67 )/$po7_denominator):0) ;
			}
			$po7_comap= round($po7,2);
			
$html_attain.='				</div>
		</td>

		<td>
        <div class="form-group">'.
		$po7_comap;
			 $po8=0;	
			if($attain_level1==0 && $attain_level2==0 && $attain_level3==0 && $attain_level4==0 && $attain_level5==0 && $attain_level6==0){
			$po8=0;	
				
			}else{
				$po8_denominator=(($po18>0?1:0)+($po28>0?1:0)+($po38>0?1:0)+($po48>0?1:0)+($po58>0?1:0)+($po68>0?1:0));
				
				$po8= ($po8_denominator>0?(($po18 +$po28 +$po38 +$po48 +$po58 +$po68 )/$po8_denominator):0) ;
			}
			
			$po8_comap=round($po8,2);
			
$html_attain.='					</div>
		</td>

		<td>
        <div class="form-group">'.
		$po8_comap;
			 $po9=0;	
			if($attain_level1==0 && $attain_level2==0 && $attain_level3==0 && $attain_level4==0 && $attain_level5==0 && $attain_level6==0){
			$po9=0;	
				
			}else{
				$po9_denominator=(($po19>0?1:0)+($po29>0?1:0)+($po39>0?1:0)+($po49>0?1:0)+($po59>0?1:0)+($po69>0?1:0));
				
				$po9= ($po9_denominator>0?(($po19 +$po29 +$po39 +$po49 +$po59 +$po69 )/$po9_denominator):0) ;
				
				}
			$po9_comap= round($po9,2);
			
$html_attain.='					</div>
		</td>

		<td>
        <div class="form-group">'.
		$po9_comap;
			
			$po10r=0;	
			if($attain_level1==0 && $attain_level2==0 && $attain_level3==0 && $attain_level4==0 && $attain_level5==0 && $attain_level6==0){
			$po10r=0;	
				
			}else{
			$po10_denominator=(($po110>0?1:0)+($po210>0?1:0)+($po310>0?1:0)+($po410>0?1:0)+($po510>0?1:0)+($po610>0?1:0));
			
			$po10r= ($po10_denominator>0?(($po110 +$po210 +$po310 +$po410 +$po510 +$po610 )/$po10_denominator):0) ;
			}
			$po10r_comap= round($po10r,2);
			
$html_attain.='					</div>
		</td>

		<td>
        <div class="form-group">'.
		$po10r_comap;
			
			$po11r=0;	
			if($attain_level1==0 && $attain_level2==0 && $attain_level3==0 && $attain_level4==0 && $attain_level5==0 && $attain_level6==0){
			$po11r=0;	
				
			}else{
				$po11_denominator=(($po111>0?1:0)+($po211>0?1:0)+($po311>0?1:0)+($po411>0?1:0)+($po511>0?1:0)+($po611>0?1:0));
				
				$po11r= ($po11_denominator>0?(($po111 +$po211 +$po311 +$po411 +$po511 +$po611 )/$po11_denominator):0) ;
				}
			$po11r_comap= round($po11r,2);
			
$html_attain.='					</div>
		</td>

		<td>
        <div class="form-group">'.
		$po11r_comap;
			
			$po12r=0;	
			if($attain_level1==0 && $attain_level2==0 && $attain_level3==0 && $attain_level4==0 && $attain_level5==0 && $attain_level6==0){
			$po12r=0;	
				
			}else{
				$po12_denominator=(($po112>0?1:0)+($po212>0?1:0)+($po312>0?1:0)+($po412>0?1:0)+($po512>0?1:0)+($po612>0?1:0));
				
				$po12r= ($po12_denominator>0?(($po112 +$po212 +$po312 +$po412 +$po512 +$po612 )/$po12_denominator):0) ;
				
			}
			$po12r_comap= round($po12r,2);
			
$html_attain.='					</div>
		</td>
		

		

		<td>
        <div class="form-group">'.
		$po12r_comap;
		
			$peo1=0;	
			if($attain_level1==0 && $attain_level2==0 && $attain_level3==0 && $attain_level4==0 && $attain_level5==0 && $attain_level6==0){
			$peo1=0;	
				
			}else{
				$peo1_denominator=(($peo11>0?1:0)+($peo21>0?1:0)+($peo31>0?1:0)+($peo41>0?1:0)+($peo51>0?1:0)+($peo61>0?1:0));
				
				$peo1= ($peo1_denominator>0?(($peo11 +$peo21 +$peo31 +$peo41 +$peo51 +$peo61 )/$peo1_denominator):0) ;
				
			}
			$peo1_comap= round($peo1,2);
			
$html_attain.='					</div>
		</td>
		<td>
			<div class="form-group">'.
			$peo1_comap;
			
			$peo2=0;	
			if($attain_level1==0 && $attain_level2==0 && $attain_level3==0 && $attain_level4==0 && $attain_level5==0 && $attain_level6==0){
			$peo2=0;	
				
			}else{
				$peo2_denominator=(($peo12>0?1:0)+($peo22>0?1:0)+($peo32>0?1:0)+($peo42>0?1:0)+($peo52>0?1:0)+($peo62>0?1:0));
				
				$peo2= ($peo2_denominator>0?(($peo12 +$peo22 +$peo32 +$peo42 +$peo52 +$peo62 )/$peo2_denominator):0) ;
				
			}
			$peo2_comap= round($peo2,2);
			
$html_attain.='					</div>
		</td>

		<td>
        <div class="form-group">'.
		$peo2_comap;
			
			$peo3=0;	
			if($attain_level1==0 && $attain_level2==0 && $attain_level3==0 && $attain_level4==0 && $attain_level5==0 && $attain_level6==0){
			$peo3=0;	
				
			}else{			
			$peo3_denominator=(($peo13>0?1:0)+($peo23>0?1:0)+($peo33>0?1:0)+($peo43>0?1:0)+($peo53>0?1:0)+($peo63>0?1:0));
			
			$peo3= ($peo3_denominator>0?(($peo13 +$peo23 +$peo33 +$peo43 +$peo53 +$peo63 )/$peo3_denominator):0) ;
			
			}
			$peo3_comap= round($peo3,2);
			
$html_attain.='					</div>
		</td>
		<td>
        <div class="form-group">'.
		$peo3_comap;
$html_attain.='</div>
		</td>
	</tr>
';

$html_attain.='</div></td></tr></table></div>';

$page_attain = $pdf->PageNo();
$pdf->writeHTML($html_attain, true, false, true, false, '');

///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////CO Attainment Begins ///////////////////////////////
///////////////////////////////////////////////////////////////////////////////////

$page_cowise = $pdf->PageNo();   
$pdf->writeHTML($html_attain, true, false, true, false, '');
 
 $pdf->AddPage('L', 'A4');
//$pdf->Cell(0, 0, 'A4 LANDSCAPE', 1, 1, 'C');
//$pdf->SetLineStyle( array( 'width' => 1, 'color' => array(2,2,10)));
$pdf->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
$pdf->Line(12,12,$pdf->getPageWidth()-12,12); 
$pdf->Line($pdf->getPageWidth()-12,12,$pdf->getPageWidth()-12,$pdf->getPageHeight()-10);
$pdf->Line(12,$pdf->getPageHeight()-10,$pdf->getPageWidth()-12,$pdf->getPageHeight()-10);
$pdf->Line(12,12,12,$pdf->getPageHeight()-10);


	
$html_attain.='<table border="1" class="table  table-hover"> 
	  	<!--table class="table table-striped table-bordered table-condensed">  -->
		 <thead>
	<tr><th bgcolor="#73AD21" align="center" colspan="16">Program Outcome Attainment Table</th></tr>
      <tr>
	    <th>CO/PO1</th>
        <th>PO1</th>
		<th>PO2</th>
		<th>PO3</th>
		<th>PO4</th>
		<th>PO5</th>
		<th>PO6</th>
		<th>PO7</th>
		<th>PO8</th>
		<th>PO9</th>
		<th>PO10</th>
		<th>PO11</th>
		<th>PO12</th>
		
		<th>PSO1</th>
		<th>PSO2</th>
		<th>PSO3</th>
        
      </tr>
    </thead>
    <tbody>
	<!------------- co1 ------------->
      <tr>
        <td><b>CO1</b></td>';
		/*
		 $co1q = "SELECT * FROM copo_details WHERE faculty_id='$sessionId' and course_code='$select2' and cono='1'";
	
	     $co1r = $db1->query( $co1q);
		 
		    $po11="";
			$po12="";
			$po13="";
			$po14="";
			$po15="";
			$po16="";
			$po17="";
			$po18="";
			$po19="";
			$po110="";
			$po111="";
			$po112="";
			$peo11="";
			$peo12="";
			$peo13="";
		 foreach ($co1r as $row2) {
			$po11=$row2['po1'];
			$po12=$row2['po2'];
			$po13=$row2['po3'];
			$po14=$row2['po4'];
			$po15=$row2['po5'];
			$po16=$row2['po6'];
			$po17=$row2['po7'];
			$po18=$row2['po8'];
			$po19=$row2['po9'];
			$po110=$row2['po10'];
			$po111=$row2['po11'];
			$po112=$row2['po12'];
			$peo11=$row2['peo1'];
			$peo12=$row2['peo2'];
			$peo13=$row2['peo3'];
			
  }
		
		*/
		
 $html_attain.='<td>
			<div class="form-group">
			'. ($po11) .'
			</div>
			</td>
			<td>
			<div class="form-group">
			'.  round($po12*$attain_level1/3,2) .'
			</div>
			</td>
			<td>
			<div class="form-group">
			'.  round($po13*$attain_level1/3,2) .'
			</div>
			</td>
			<td>
			<div class="form-group">
			'.  round($po14*$attain_level1/3,2) .'
			</div>
			</td>
			<td>
			<div class="form-group">
			'.  round($po15,2) .'
			</div>
			</td>
			<td>
			<div class="form-group">
			'.  round($po16*$attain_level1/3,2) .'
			</div>
			</td>
			<td>
			<div class="form-group">
			'.  round($po17*$attain_level1/3,2) .'
			</div>
</td>
			<td>
			<div class="form-group">
			'.  round($po18*$attain_level1/3,2) .'
			</div>
</td>
			<td>
			<div class="form-group">
			'.  round($po19*$attain_level1/3,2) .'
			</div>
</td>
			<td>
			<div class="form-group">
			'.  round($po110*$attain_level1/3,2) .'
			</div>
</td>
			<td>
			<div class="form-group">
			'.  round($po111*$attain_level1/3,2) .'
			</div>
</td>
			<td>
			<div class="form-group">
			'.  round($po112*$attain_level1/3,2) .'
			</div>
</td>
			<td>
			<div class="form-group">
			'.  round($peo11*$attain_level1/3,2) .'
			</div>
</td>
			<td>
			<div class="form-group">
			'.  round($peo12*$attain_level1/3,2) .'
			</div>
</td>
			<td>
			<div class="form-group">
			'.  round($peo13*$attain_level1/3,2) .'
			</div>
</td>
			

						
		</tr>

      <tr>
        <td><b>CO2</b></td>';
		/*
		 $co2q = "SELECT * FROM copo_details WHERE faculty_id='$sessionId' and course_code='$select2' and cono='2'";
	
	     $co2r = $db1->query($co2q);
		 
		    $po21="";
			$po22="";
			$po23="";
			$po24="";
			$po25="";
			$po26="";
			$po27="";
			$po28="";
			$po29="";
			$po210="";
			$po211="";
			$po212="";
			$peo21="";
			$peo22="";
			$peo23="";
		 foreach ( $co2r as $row2 ) {
			$po21=$row2['po1'];
			$po22=$row2['po2'];
			$po23=$row2['po3'];
			$po24=$row2['po4'];
			$po25=$row2['po5'];
			$po26=$row2['po6'];
			$po27=$row2['po7'];
			$po28=$row2['po8'];
			$po29=$row2['po9'];
			$po210=$row2['po10'];
			$po211=$row2['po11'];
			$po212=$row2['po12'];
			$peo21=$row2['peo1'];
			$peo22=$row2['peo2'];
			$peo23=$row2['peo3'];
			
  }
		*/
		$html_attain.='<td>
		
			<div class="form-group">
			'.  round($po21*$attain_level2/3,2) .'
			</div>
			</td>
			<td>
			<div class="form-group">
			'.  round($po22*$attain_level2/3,2) .'
			</div>
</td>
			<td>
			<div class="form-group">
			'.  round($po23*$attain_level2/3,2) .'
			</div>
			</td>
			<td>
			<div class="form-group">
			'.  round($po24*$attain_level2/3,2) .'
			</div>
</td>
			<td>
			<div class="form-group">
			'.  round($po25*$attain_level2/3,2) .'
			</div>
</td>
			<td>
			<div class="form-group">
			'.  round($po26*$attain_level2/3,2) .'
			</div>
</td>
			<td>
			<div class="form-group">
			'.  round($po27*$attain_level2/3,2) .'
			</div>
</td>
			<td>
			<div class="form-group">
			'.  round($po28*$attain_level2/3,2) .'
			</div>
</td>
			<td>
			<div class="form-group">
			'.  round($po29*$attain_level2/3,2) .'
			</div>
</td>
			<td>
			<div class="form-group">
			'.  round($po210*$attain_level2/3,2) .'
			</div>
</td>
			<td>
			<div class="form-group">
			'.  round($po211*$attain_level2/3,2) .'
			</div>
</td>
			<td>
			<div class="form-group">
			'.  round($po212*$attain_level2/3,2) .'
			</div>
</td>
			<td>
			<div class="form-group">
			'.  round($peo21*$attain_level2/3,2) .'
			</div>
</td>
			<td>
			<div class="form-group">
			'.  round($peo22*$attain_level2/3,2) .'
			</div>
</td>
			<td>
			<div class="form-group">
			'.  round($peo23*$attain_level2/3,2) .'
			</div>
</td>
		</tr>


      <tr>
        <td><b>CO3</b></td>';
		
        /*
		 $co3q = "SELECT * FROM copo_details WHERE faculty_id='$sessionId' and course_code='$select2' and cono='3'";
	
	     $co3r = $db1->query($co3q);
		 
		    $po31="";
			$po32="";
			$po33="";
			$po34="";
			$po35="";
			$po36="";
			$po37="";
			$po38="";
			$po39="";
			$po310="";
			$po311="";
			$po312="";
			$peo31="";
			$peo32="";
			$peo33="";
		foreach($co3r as $row2) {
			$po31=$row2['po1'];
			$po32=$row2['po2'];
			$po33=$row2['po3'];
			$po34=$row2['po4'];
			$po35=$row2['po5'];
			$po36=$row2['po6'];
			$po37=$row2['po7'];
			$po38=$row2['po8'];
			$po39=$row2['po9'];
			$po310=$row2['po10'];
			$po311=$row2['po11'];
			$po312=$row2['po12'];
			$peo31=$row2['peo1'];
			$peo32=$row2['peo2'];
			$peo33=$row2['peo3'];
			
  }
		
	*/
	$html_attain.='<td>
			<div class="form-group">
			 '.round($po31*$attain_level3/3,2 ) ;
	$html_attain.='	</div>
			</td>
			<td>
			<div class="form-group">
			  '.round($po32*$attain_level3,2 );
	$html_attain.='	</div>
			</td>
			<td>
			<div class="form-group">
			  '.round($po33*$attain_level3,2 );
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			 '.round($po34*$attain_level3/3,2 ) ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			 '.round($po35*$attain_level3/3,2 ) ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			 '.round($po36*$attain_level3/3,2 ) ;
$html_attain.='</div>
</td>
			<td>
			<div class="form-group">
			 '.round($po37*$attain_level3 /3,2 ) ;
$html_attain.='</div>
</td>
			<td>
			<div class="form-group">
			 '.round($po38*$attain_level3/3,2 ) ;
$html_attain.='	</div>
			</td>
			<td>
			<div class="form-group">
			 '.round($po39*$attain_level3/3,2 ) ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			 '.round($po310*$attain_level3/3,2 ) ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			'.round($po311*$attain_level3/3,2 ) ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			'.round($po312*$attain_level3/3,2 ) ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			'.round($peo31*$attain_level3/3,2) ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			'.round($peo32*$attain_level3/3,2 ) ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			'.round($peo33*$attain_level3/3,2 ) .'
</div>
</td>
		</tr>


      <tr>
        <td><b>CO4</b></td>';
       /* 
		 $co4q = "SELECT * FROM copo_details WHERE faculty_id='$sessionId' and course_code='$select2' and cono='4'";
	
	     $co4r = $db1->query( $co4q);
		 
		    $po41="";
			$po42="";
			$po43="";
			$po44="";
			$po45="";
			$po46="";
			$po47="";
			$po48="";
			$po49="";
			$po410="";
			$po411="";
			$po412="";
			$peo41="";
			$peo42="";
			$peo43="";
		foreach($co4r as $row2) {
		
			$po41=$row2['po1'];
			$po42=$row2['po2'];
			$po43=$row2['po3'];
			$po44=$row2['po4'];
			$po45=$row2['po5'];
			$po46=$row2['po6'];
			$po47=$row2['po7'];
			$po48=$row2['po8'];
			$po49=$row2['po9'];
			$po410=$row2['po10'];
			$po411=$row2['po11'];
			$po412=$row2['po12'];
			$peo41=$row2['peo1'];
			$peo42=$row2['peo2'];
			$peo43=$row2['peo3'];
			
  }
		
*/
$html_attain.='<td>
		
			<div class="form-group">
			'.round($po41*$attain_level4/3,2 ) ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			 '.round($po42*$attain_level4/3,2 ) ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			 '.round($po43*$attain_level4/3,2 ) ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			 '.round($po44*$attain_level4/3,2 ) ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			 '.round($po45*$attain_level4/3,2 ) ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			 '.round($po46*$attain_level4/3,2 ) ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			'.round($po47*$attain_level4/3,2 ) ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			 '.round($po48*$attain_level4/3,2 ) ;
$html_attain.='	</div>
			</td>
			<td>
			<div class="form-group">
			'.round($po49*$attain_level4/3,2 ) ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			 '.round($po410*$attain_level4 /3,2 ) ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			'.round($po411*$attain_level4/3,2 ) ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			 '.round($po412*$attain_level4/3,2 ) ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			 '.round($peo41*$attain_level4/3,2 ) ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			 '.round($peo42*$attain_level4/3,2 ) ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			'.round($peo43*$attain_level4/3,2 ) ;
$html_attain.='</div>
		</td>
		</tr>
	<!------------- co5 ------------->
      <tr>
        <td><b>CO5</b></td>';
       /* 
		 $co5q = "SELECT * FROM copo_details WHERE faculty_id='$sessionId' and course_code='$select2' and cono='5'";
	
	     $co5r = $db1->query($co5q);
		 
		    $po51="";
			$po52="";
			$po53="";
			$po54="";
			$po55="";
			$po56="";
			$po57="";
			$po58="";
			$po59="";
			$po510="";
			$po511="";
			$po512="";
			$peo51="";
			$peo52="";
			$peo53="";
			
			
		foreach($co5r as $row2) {
			$po51=$row2['po1'];
			$po52=$row2['po2'];
			$po53=$row2['po3'];
			$po54=$row2['po4'];
			$po55=$row2['po5'];
			$po56=$row2['po6'];
			$po57=$row2['po7'];
			$po58=$row2['po8'];
			$po59=$row2['po9'];
			$po510=$row2['po10'];
			$po511=$row2['po11'];
			$po512=$row2['po12'];
			$peo51=$row2['peo1'];
			$peo52=$row2['peo2'];
			$peo53=$row2['peo3'];
			
  }
		
	*/	

$html_attain.='<td>
		
			<div class="form-group">
			'.  round($po51*$attain_level5/3,2 ) ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			'.  round($po52*$attain_level5/3,2 ) ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			'.  round($po53*$attain_level5/3,2 ) ;
$html_attain.='	</div>
			</td>
			<td>
			<div class="form-group">
			'.  round($po54*$attain_level5/3,2 ) ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			'.  round($po55*$attain_level5/3,2 ) ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			 '.  round($po56*$attain_level5/3,2 ) ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			'.  round($po57*$attain_level5/3,2 ) ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			'.  round($po58*$attain_level5/3,2 ) ;
$html_attain.='	</div>
			</td>
			<td>
			<div class="form-group">
			'.  round($po59*$attain_level5/3,2 ) ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			'.  round($po510*$attain_level5/3,2 ) ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			'.  round($po511*$attain_level5/3,2 ) ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			'.  round($po512*$attain_level5/3,2 ) ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			'.round($peo51*$attain_level5/3,2 ) ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			'.  round($peo52*$attain_level5/3,2 ) ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			'.  round($peo53*$attain_level5/3,2 ) ;
$html_attain.='</div>
		</td>
		</tr>


<!------------- co6 ------------->
      <tr>
        <td><b>CO6</b></td>';
      /* 
		 $co6q = "SELECT * FROM copo_details WHERE faculty_id='$sessionId' and course_code='$select2' and cono='6'";
	
	     $co6r = $db1->query($co6q);
		 
		    $po61="";
			$po62="";
			$po63="";
			$po64="";
			$po65="";
			$po66="";
			$po67="";
			$po68="";
			$po69="";
			$po610="";
			$po611="";
			$po612="";
			$peo61="";
			$peo62="";
			$peo63="";
			
			
		foreach( $co6r as $row2) {
			$po61=$row2['po1'];
			$po62=$row2['po2'];
			$po63=$row2['po3'];
			$po64=$row2['po4'];
			$po65=$row2['po5'];
			$po66=$row2['po6'];
			$po67=$row2['po7'];
			$po68=$row2['po8'];
			$po69=$row2['po9'];
			$po610=$row2['po10'];
			$po611=$row2['po11'];
			$po612=$row2['po12'];
			$peo61=$row2['peo1'];
			$peo62=$row2['peo2'];
			$peo63=$row2['peo3'];
			
  }
		
		*/

$html_attain.='<td>
		
			<div class="form-group">
			 '.round($po61*$attain_level6/3,2 ) ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			 '.round($po62*$attain_level6/3,2 ) ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			'.round($po63*$attain_level6/3,2 ) ;
$html_attain.='	</div>
			</td>
			<td>
			<div class="form-group">
			 '.  round($po64*$attain_level6/3,2 ) ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			'.  round($po65*$attain_level6/3,2 ) ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			'.  round($po66*$attain_level6/3,2 ) ;
$html_attain.='	</div>
			</td>
			<td>
			<div class="form-group">
			'.  round($po67*$attain_level6/3,2 ) ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			'.  round($po68*$attain_level6/3,2 ) ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			'.  round($po69*$attain_level6/3,2 ) ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			'.  round($po610*$attain_level6/3,2 ) ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			'.  round($po611*$attain_level6/3,2 ) ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			'.  round($po612*$attain_level6/3,2 ) ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			'.  round($peo61*$attain_level6/3,2 ) ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			'.  round($peo62*$attain_level6/3,2 ) ;
$html_attain.='</div>
			</td>
			<td>
			<div class="form-group">
			'.  "ddddddddddddddddddddddddd" ;
		
$html_attain.='</div>
</td>
		</tr>
		<tr bgcolor="#33D2F" style="font-weight: bold;font-size: 17px;">
		<th  align="center" >Over-all</th>
	
		<td>
        <div class="form-group">'.
			
			(( $attain_level1==0 && $attain_level2==0 && $attain_level3==0 && $attain_level4==0 && $attain_level5==0 && $attain_level6==0)==true?0:((($po11>0?$attain_level1:0)+($po21>0?$attain_level2:0)+($po31>0?$attain_level3:0)+($po41>0?$attain_level4:0)+($po51>0?$attain_level5:0)+($po61>0?$attain_level6:0))>0? ( ($po11*$attain_level1+$po21*$attain_level2+$po31*$attain_level3+$po41*$attain_level4+$po51*$attain_level5+$po61*$attain_level6)/(($po11>0?$attain_level1:0)+($po21>0?$attain_level2:0)+($po31>0?$attain_level3:0)+($po41>0?$attain_level4:0)+($po51>0?$attain_level5:0)+($po61>0?$attain_level6:0))):0));
			//}
		//	$po1;	 
			
$html_attain.='</div>
		</td>
		
		<td>
        <div class="form-group">'.
			(($attain_level1==0 && $attain_level2==0 && $attain_level3==0 && $attain_level4==0 && $attain_level5==0 && $attain_level6==0)==true?0:
			((($po12>0?$attain_level1:0)+($po22>0?$attain_level2:0)+($po32>0?$attain_level3:0)+($po42>0?$attain_level4:0)+($po52>0?$attain_level5:0)+($po62>0?$attain_level6:0))>0? (($po12*$attain_level1+$po22*$attain_level2+$po32*$attain_level3+$po42*$attain_level4+$po52*$attain_level5+$po62*$attain_level6)/(($po12>0?$attain_level1:0)+($po22>0?$attain_level2:0)+($po32>0?$attain_level3:0)+($po42>0?$attain_level4:0)+($po52>0?$attain_level5:0)+($po62>0?$attain_level6:0))):0));
			//	}
			
$html_attain.='</div>
		</td>

		<td>
        <div class="form-group">'.
			
			
			(($attain_level1==0 && $attain_level2==0 && $attain_level3==0 && $attain_level4==0 && $attain_level5==0 && $attain_level6==0)==true?0:
			((($po13>0?$attain_level1:0)+($po23>0?$attain_level2:0)+($po33>0?$attain_level3:0)+($po43>0?$attain_level4:0)+($po53>0?$attain_level5:0)+($po63>0?$attain_level6:0))>0? (($po13*$attain_level1+$po23*$attain_level2+$po33*$attain_level3+$po43*$attain_level4+$po53*$attain_level5+$po63*$attain_level6)/(($po13>0?$attain_level1:0)+($po23>0?$attain_level2:0)+($po33>0?$attain_level3:0)+($po43>0?$attain_level4:0)+($po53>0?$attain_level5:0)+($po63>0?$attain_level6:0))):0));
			//}
			
			
$html_attain.='	</div>
		</td>

		<td>
        <div class="form-group">'.
			
			(($attain_level1==0 && $attain_level2==0 && $attain_level3==0 && $attain_level4==0 && $attain_level5==0 && $attain_level6==0)==true?0:
			((($po14>0?$attain_level1:0)+($po24>0?$attain_level2:0)+($po34>0?$attain_level3:0)+($po44>0?$attain_level4:0)+($po54>0?$attain_level5:0)+($po64>0?$attain_level6:0))>0? (($po14*$attain_level1+$po24*$attain_level2+$po34*$attain_level3+$po44*$attain_level4+$po54*$attain_level5+$po64*$attain_level6)/(($po14>0?$attain_level1:0)+($po24>0?$attain_level2:0)+($po34>0?$attain_level3:0)+($po44>0?$attain_level4:0)+($po54>0?$attain_level5:0)+($po64>0?$attain_level6:0))):0));
			
			/*$po4=0;	
			(($attain_level1==0 && $attain_level2==0 && $attain_level3==0 && $attain_level4==0 && $attain_level5==0 && $attain_level6==0)==true?0:
			((($po14>0?$attain_level1:0)+($po24>0?$attain_level2:0)+($po34>0?$attain_level3:0)+($po44>0?$attain_level4:0)+($po54>0?$attain_level5:0)+($po64>0?$attain_level6:0))>0? (($po14*$attain_level1+$po24*$attain_level2+$po34*$attain_level3+$po44*$attain_level4+$po54*$attain_level5+$po64*$attain_level6)/(($po14>0?$attain_level1:0)+($po24>0?$attain_level2:0)+($po34>0?$attain_level3:0)+($po44>0?$attain_level4:0)+($po54>0?$attain_level5:0)+($po64>0?$attain_level6:0))):0));
			//}
			
			*/
$html_attain.='</div>
		</td>

		<td>
        <div class="form-group">'.
		/*	
			//$po5=0;	
			(($attain_level1==0 && $attain_level2==0 && $attain_level3==0 && $attain_level4==0 && $attain_level5==0 && $attain_level6==0)==true?0:
			((($po15>0?$attain_level1:0)+($po25>0?$attain_level2:0)+($po35>0?$attain_level3:0)+($po45>0?$attain_level4:0)+($po55>0?$attain_level5:0)+($po65>0?$attain_level6:0))>0? (($po15*$attain_level1+$po25*$attain_level2+$po35*$attain_level3+$po45*$attain_level4+$po55*$attain_level5+$po65*$attain_level6)/(($po15>0?$attain_level1:0)+($po25>0?$attain_level2:0)+($po35>0?$attain_level3:0)+($po45>0?$attain_level4:0)+($po55>0?$attain_level5:0)+($po65>0?$attain_level6:0))):0) );
		//	}
			*/
			(($attain_level1==0 && $attain_level2==0 && $attain_level3==0 && $attain_level4==0 && $attain_level5==0 && $attain_level6==0)==true?0:
			((($po15>0?$attain_level1:0)+($po25>0?$attain_level2:0)+($po35>0?$attain_level3:0)+($po45>0?$attain_level4:0)+($po55>0?$attain_level5:0)+($po65>0?$attain_level6:0))>0? (($po15*$attain_level1+$po25*$attain_level2+$po35*$attain_level3+$po45*$attain_level4+$po55*$attain_level5+$po65*$attain_level6)/(($po15>0?$attain_level1:0)+($po25>0?$attain_level2:0)+($po35>0?$attain_level3:0)+($po45>0?$attain_level4:0)+($po55>0?$attain_level5:0)+($po65>0?$attain_level6:0))):0));
						
$html_attain.='</div>
		</td>
		<td>
        <div class="form-group">'.
			/*
			$po6=0;	
			(($attain_level1==0 && $attain_level2==0 && $attain_level3==0 && $attain_level4==0 && $attain_level5==0 && $attain_level6==0)==true?0:
			((($po16>0?$attain_level1:0)+($po26>0?$attain_level2:0)+($po36>0?$attain_level3:0)+($po46>0?$attain_level4:0)+($po56>0?$attain_level5:0)+($po66>0?$attain_level6:0))>0?(($po16*$attain_level1+$po26*$attain_level2+$po36*$attain_level3+$po46*$attain_level4+$po56*$attain_level5+$po66*$attain_level6)/(($po16>0?$attain_level1:0)+($po26>0?$attain_level2:0)+($po36>0?$attain_level3:0)+($po46>0?$attain_level4:0)+($po56>0?$attain_level5:0)+($po66>0?$attain_level6:0))):0)) ;
			//}
			*/
			
			(($attain_level1==0 && $attain_level2==0 && $attain_level3==0 && $attain_level4==0 && $attain_level5==0 && $attain_level6==0)==true?0:
			((($po16>0?$attain_level1:0)+($po26>0?$attain_level2:0)+($po36>0?$attain_level3:0)+($po46>0?$attain_level4:0)+($po56>0?$attain_level5:0)+($po66>0?$attain_level6:0))>0? (($po16*$attain_level1+$po26*$attain_level2+$po36*$attain_level3+$po46*$attain_level4+$po56*$attain_level5+$po66*$attain_level6)/(($po16>0?$attain_level1:0)+($po26>0?$attain_level2:0)+($po36>0?$attain_level3:0)+($po46>0?$attain_level4:0)+($po56>0?$attain_level5:0)+($po66>0?$attain_level6:0))):0));
			
$html_attain.='</div>
		</td>

		<td>
        <div class="form-group">'.
			/*
			$po7=0;	
			(($attain_level1==0 && $attain_level2==0 && $attain_level3==0 && $attain_level4==0 && $attain_level5==0 && $attain_level6==0)==true?0:
			$po7= ((($po17>0?$attain_level1:0)+($po27>0?$attain_level2:0)+($po37>0?$attain_level3:0)+($po47>0?$attain_level4:0)+($po57>0?$attain_level5:0)+($po67>0?$attain_level6:0))>0?(($po17*$attain_level1+$po27*$attain_level2+$po37*$attain_level3+$po47*$attain_level4+$po57*$attain_level5+$po67*$attain_level6)/(($po17>0?$attain_level1:0)+($po27>0?$attain_level2:0)+($po37>0?$attain_level3:0)+($po47>0?$attain_level4:0)+($po57>0?$attain_level5:0)+($po67>0?$attain_level6:0))):0)) ;

		//	}
		*/
		(($attain_level1==0 && $attain_level2==0 && $attain_level3==0 && $attain_level4==0 && $attain_level5==0 && $attain_level6==0)==true?0:
			((($po17>0?$attain_level1:0)+($po27>0?$attain_level2:0)+($po37>0?$attain_level3:0)+($po47>0?$attain_level4:0)+($po57>0?$attain_level5:0)+($po67>0?$attain_level6:0))>0? (($po17*$attain_level1+$po27*$attain_level2+$po37*$attain_level3+$po47*$attain_level4+$po57*$attain_level5+$po67*$attain_level6)/(($po17>0?$attain_level1:0)+($po27>0?$attain_level2:0)+($po37>0?$attain_level3:0)+($po47>0?$attain_level4:0)+($po57>0?$attain_level5:0)+($po67>0?$attain_level6:0))):0));
			
$html_attain.='</div>
		</td>

		<td>
        <div class="form-group">'.
			/* 
			(($attain_level1==0 && $attain_level2==0 && $attain_level3==0 && $attain_level4==0 && $attain_level5==0 && $attain_level6==0)==true?0:
			((($po18>0?$attain_level1:0)+($po28>0?$attain_level2:0)+($po38>0?$attain_level3:0)+($po48>0?$attain_level4:0)+($po58>0?$attain_level5:0)+($po68>0?$attain_level6:0))>0?(($po18*$attain_level1+$po28*$attain_level2+$po38*$attain_level3+$po48*$attain_level4+$po58*$attain_level5+$po68*$attain_level6)/(($po18>0?$attain_level1:0)+($po28>0?$attain_level2:0)+($po38>0?$attain_level3:0)+($po48>0?$attain_level4:0)+($po58>0?$attain_level5:0)+($po68>0?$attain_level6:0))):0)) ;
			//}
			*/
			(($attain_level1==0 && $attain_level2==0 && $attain_level3==0 && $attain_level4==0 && $attain_level5==0 && $attain_level6==0)==true?0:
			((($po18>0?$attain_level1:0)+($po28>0?$attain_level2:0)+($po38>0?$attain_level3:0)+($po48>0?$attain_level4:0)+($po58>0?$attain_level5:0)+($po68>0?$attain_level6:0))>0? (($po18*$attain_level1+$po28*$attain_level2+$po38*$attain_level3+$po48*$attain_level4+$po58*$attain_level5+$po68*$attain_level6)/(($po18>0?$attain_level1:0)+($po28>0?$attain_level2:0)+($po38>0?$attain_level3:0)+($po48>0?$attain_level4:0)+($po58>0?$attain_level5:0)+($po68>0?$attain_level6:0))):0));
			
$html_attain.='	</div>
		</td>

		<td>
        <div class="form-group">'.
			 	
			(($attain_level1==0 && $attain_level2==0 && $attain_level3==0 && $attain_level4==0 && $attain_level5==0 && $attain_level6==0)==true?0:
			((($po19>0?$attain_level1:0)+($po29>0?$attain_level2:0)+($po39>0?$attain_level3:0)+($po49>0?$attain_level4:0)+($po59>0?$attain_level5:0)+($po69>0?$attain_level6:0))>0?(($po19*$attain_level1+$po29*$attain_level2+$po39*$attain_level3+$po49*$attain_level4+$po59*$attain_level5+$po69*$attain_level6)/(($po19>0?$attain_level1:0)+($po29>0?$attain_level2:0)+($po39>0?$attain_level3:0)+($po49>0?$attain_level4:0)+($po59>0?$attain_level5:0)+($po69>0?$attain_level6:0))):0) );
				
			//	}
			
			
$html_attain.='</div>
		</td>

		<td>
        <div class="form-group">'.
			
			
			(($attain_level1==0 && $attain_level2==0 && $attain_level3==0 && $attain_level4==0 && $attain_level5==0 && $attain_level6==0)==true?0:	
			((($po110>0?$attain_level1:0)+($po210>0?$attain_level2:0)+($po310>0?$attain_level3:0)+($po410>0?$attain_level4:0)+($po510>0?$attain_level5:0)+($po610>0?$attain_level6:0))>0?(($po110*$attain_level1+$po210*$attain_level2+$po310*$attain_level3+$po410*$attain_level4+$po510*$attain_level5+$po610*$attain_level6)/(($po110>0?$attain_level1:0)+($po210>0?$attain_level2:0)+($po310>0?$attain_level3:0)+($po410>0?$attain_level4:0)+($po510>0?$attain_level5:0)+($po610>0?$attain_level6:0))):0)) ;
		//	}
			
$html_attain.='	</div>
		</td>

		<td>
        <div class="form-group">'.
			
			
			(($attain_level1==0 && $attain_level2==0 && $attain_level3==0 && $attain_level4==0 && $attain_level5==0 && $attain_level6==0)==true?0:
			((($po111>0?$attain_level1:0)+($po211>0?$attain_level2:0)+($po311>0?$attain_level3:0)+($po411>0?$attain_level4:0)+($po511>0?$attain_level5:0)+($po611>0?$attain_level6:0))>0?(($po111*$attain_level1+$po211*$attain_level2+$po311*$attain_level3+$po411*$attain_level4+$po511*$attain_level5+$po611*$attain_level6)/(($po111>0?$attain_level1:0)+($po211>0?$attain_level2:0)+($po311>0?$attain_level3:0)+($po411>0?$attain_level4:0)+($po511>0?$attain_level5:0)+($po611>0?$attain_level6:0))):0)) ;
				//}
			
			
$html_attain.='	</div>
		</td>

		<td>
        <div class="form-group">'.
			 
			(($attain_level1==0 && $attain_level2==0 && $attain_level3==0 && $attain_level4==0 && $attain_level5==0 && $attain_level6==0)==true?0:
			((($po112>0?$attain_level1:0)+($po212>0?$attain_level2:0)+($po312>0?$attain_level3:0)+($po412>0?$attain_level4:0)+($po512>0?$attain_level5:0)+($po612>0?$attain_level6:0))>0?(($po112*$attain_level1+$po212*$attain_level2+$po312*$attain_level3+$po412*$attain_level4+$po512*$attain_level5+$po612*$attain_level6)/(($po112>0?$attain_level1:0)+($po212>0?$attain_level2:0)+($po312>0?$attain_level3:0)+($po412>0?$attain_level4:0)+($po512>0?$attain_level5:0)+($po612>0?$attain_level6:0))):0)) ;
				
		//	}
			
			
$html_attain.='	</div>
		</td>

		<td>
        <div class="form-group">'.
		//	$peo1=0;	
			(($attain_level1==0 && $attain_level2==0 && $attain_level3==0 && $attain_level4==0 && $attain_level5==0 && $attain_level6==0)==true?0:
			((($peo11>0?$attain_level1:0)+($peo21>0?$attain_level2:0)+($peo31>0?$attain_level3:0)+($peo41>0?$attain_level4:0)+($peo51>0?$attain_level5:0)+($peo61>0?$attain_level6:0))>0?(($peo11*$attain_level1+$peo21*$attain_level2+$peo31*$attain_level3+$peo41*$attain_level4+$peo51*$attain_level5+$peo61*$attain_level6)/(($peo11>0?$attain_level1:0)+($peo21>0?$attain_level2:0)+($peo31>0?$attain_level3:0)+($peo41>0?$attain_level4:0)+($peo51>0?$attain_level5:0)+($peo61>0?$attain_level6:0))):0)) ;
				
		//	}
			
			
$html_attain.='	</div>
		</td>

		<td>
        <div class="form-group">'.			
			//$peo2=0;	
			(($attain_level1==0 && $attain_level2==0 && $attain_level3==0 && $attain_level4==0 && $attain_level5==0 && $attain_level6==0)==true?0:
			$peo2= ((($peo12>0?$attain_level1:0)+($peo22>0?$attain_level2:0)+($peo32>0?$attain_level3:0)+($peo42>0?$attain_level4:0)+($peo52>0?$attain_level5:0)+($peo62>0?$attain_level6:0))>0?(($peo12*$attain_level1+$peo22*$attain_level2+$peo32*$attain_level3+$peo42*$attain_level4+$peo52*$attain_level5+$peo62*$attain_level6)/(($peo12>0?$attain_level1:0)+($peo22>0?$attain_level2:0)+($peo32>0?$attain_level3:0)+($peo42>0?$attain_level4:0)+($peo52>0?$attain_level5:0)+($peo62>0?$attain_level6:0))):0)) ;
				
			//}
			
			
$html_attain.='	</div>
		</td>

		<td>
        <div class="form-group">'.
			
			//$peo3=0;	
			(($attain_level1==0 && $attain_level2==0 && $attain_level3==0 && $attain_level4==0 && $attain_level5==0 && $attain_level6==0)==true?0:	
			((($peo13>0?$attain_level1:0)+($peo23>0?$attain_level2:0)+($peo33>0?$attain_level3:0)+($peo43>0?$attain_level4:0)+($peo53>0?$attain_level5:0)+($peo63>0?$attain_level6:0))>0?(($peo13*$attain_level1+$peo23*$attain_level2+$peo33*$attain_level3+$peo43*$attain_level4+$peo53*$attain_level5+$peo63*$attain_level6)/(($peo13>0?$attain_level1:0)+($peo23>0?$attain_level2:0)+($peo33>0?$attain_level3:0)+($peo43>0?$attain_level4:0)+($peo53>0?$attain_level5:0)+($peo63>0?$attain_level6:0))):0)) ;
			
			//}
			
		
//$html_attain.='	</div>		</td>			</tr> </table></div></div>';

$html_attain.='</div></td></tr></table></div>';


/////////////////// Index Page /////////////////////////////////
//$pdf->AddPage();
$pdf->AddPage('P', 'A4');
$pdf->setPrintFooter(false);
//$pdf->SetLineStyle( array( 'width' => 1, 'color' => array(2,2,10)));
$pdf->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
$pdf->Line(12,12,$pdf->getPageWidth()-12,12); 
$pdf->Line($pdf->getPageWidth()-12,12,$pdf->getPageWidth()-12,$pdf->getPageHeight()-10);
$pdf->Line(12,$pdf->getPageHeight()-10,$pdf->getPageWidth()-12,$pdf->getPageHeight()-10);
$pdf->Line(12,12,12,$pdf->getPageHeight()-10);

$html_index = '<div class="container" >
	<div class="content">

    <div align="center" >
	  <br><br>
	  
      <table   border="1">
        <tr>
          <td colspan="3"><h1>Index</h1></td>
        </tr>
        <tr>
		  <th width="15%" height="20%">SNo</th>
          <th width="70%">Title</th>
          <th width="15%">Page No</th>
        </tr>
        <tr>
		  <td> 1 </td>
          <th scope="row"><p align="left">Course Objective and Outcome</p></th>
          <td>'.$page_co.'</td>
        </tr>
        <tr>
		  <td> 2 </td>
          <th scope="row"><p align="left">Syllabus</p></th>
          <td>'.$page_syllabus.'</td>
        </tr>
		<tr>
		  <td> 3 </td>
          <th scope="row"><p align="left">CO-PO Mapping</p></th>
          <td>'.$page_copomap.'</td>
        </tr>
		<tr>
		  <td> 4 </td>
          <th scope="row"><p align="left">Quiz Assignment & CA Marks</p></th>
          <td>'.$page_quiz.'</td>
        </tr>
		<tr>
		  <td> 5 </td>
          <th scope="row"><p align="left">ETE Marks</p></th>
          <td>'.$page_mte.'</td>
        </tr>
		<tr>
		  <td> 6 </td>
          <th scope="row"><p align="left">Syllabus</p></th>
          <td>'.$page_ete.'</td>
        </tr>
        <tr>
		  <td> 7 </td>
          <th scope="row"><p align="left">Weighted Quiz Assignment & CA Marks</p></th>
          <td>'.$page_quiz_w.'</td>
        </tr>
		<tr>
		  <td> 8 </td>
          <th scope="row"><p align="left">Weighted Mid Term Exam Marks</p></th>
          <td>'.$page_mte_w.'</td>
        </tr>
		<tr>
		  <td> 9 </td>
          <th scope="row"><p align="left">Weighted End Term Exam Marks</p></th>
          <td>'.$page_ete_w.'</td>
        </tr>
		<tr>
		  <td> 10 </td>
          <th scope="row"><p align="left">CO-Wise Marks Obtained</p></th>
          <td>'.$page_cowise.'</td>
        </tr>
		<tr>
		  <td> 11 </td>
          <th scope="row"><p align="left">Course Outcome Attainment Table</p></th>
          <td>'.$page_attain.'</td>
        </tr>
		<tr>
		  <td> 12 </td>
          <th scope="row"><p align="left">Program Outcome Attainment Table</p></th>
          <td>'.$page_attain.'</td>
        </tr>
      </table>
    </div>
	</div>
	</div>';

// output the HTML content
$pdf->writeHTML($html_index, true, false, true, false, '');
$page_attain2= $pdf->PageNo();
//$pdf->writeHTML($html_attain2 true, false, true, false, '');

////////////////////////////Index ENds ////////////////////////////




//////////////////////////////////////////////////////////////
//Close and output PDF document
header('Content-type: application/pdf');
header('Content-Disposition: attachment; filename="file.pdf"');
$filename=$sessionId."_".$select2.".pdf";
$pdf->Output($filename, 'I');

//============================================================+
// END OF FILE
//============================================================+
