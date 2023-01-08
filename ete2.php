<?php

require 'vendor/autoload.php';

session_start();
require_once './config/config.php';
require_once './includes/auth_validate.php';
$unser=null;
$dirname2=null;
$file_extn=null;
$school="School of Engineering and Technology";
$examType='ete';
//serve POST method, After successful insert, redirect to customers.php page.

global $select2;
$i=''; 
global $school;
global $prog;
global $sem;
global $section;
global $course_code;
global $course_name;
$sessionId= $_SESSION['username'];
$db1 = getDbInstance();
//  }	
//echo "upload =".$_POST['upload'];
if(isset($_POST['upload'])){
			
	
	//$dirname2 = "filesUploaded/".$school."/".$prog."/".$sem."/".$examType;
	$dirname2 = "filesUploaded/TestUpload";
	echo "   dir name =".$dirname2;
	
	
	if (!file_exists($dirname2)){
	if (!mkdir($dirname2, 0777, true)) {
		echo $dirname2;
    		die('Failed to create folders...');
}
		
	}
	// mkdir($dirname2,777,true);
	
	if(isset($_FILES['image'])){
      $errors= array();
	  $file_tmp =$_FILES['image']['tmp_name'];
      $file_name = $_FILES['image']['name'];
	  $path_info = pathinfo("".$_FILES['image']['name']);
	  $file_extn=$path_info['type'];
	  $file_extension = explode(".",$file_name);
	  echo "file extension ".$file_extn;
    }else{
         print_r($errors);
      }
	  echo "<br>file extension ".$file_extension[1];  
    //Insert timestamp
	$data_to_store['dirname']=$dirname2;
	date_default_timezone_set("Asia/Kolkata");
    $data_to_store['time'] = date('d-m-y h:i:s');
	date_default_timezone_set("Asia/Kolkata");
	$time2= date('d-m-y_h-i-s');
   // $filename = $course_code."_".$_POST['batch']."_".$_SESSION['username']."_".$time2."."."xlsx";
   $filename = "nfile".$_SESSION['username']."_".$time2."."."xlsx";
	
	echo "   filename= ".$filename;
	$data_to_store['filename']=$filename;
	
	$data_to_store['user'] = $_SESSION['username'];
   // $user=$_SESSION['username'];
    $file_name = null;
    $uploadPath = $dirname2.'/'.$filename;  
	$dirname=$dirname2."/".$uploadPath;
	
	if(empty($errors)==true){ 
        
       // $file_ext = strtolower(end(explode('.',$_FILES['image']['name'])));
         if(move_uploaded_file($file_tmp,$uploadPath)){
			echo "   filename= ".$filename;
			$db = getDbInstance();
			// creating log
			
			$last_id = $db->insert ('ete_detail', $data_to_store); 
			echo "laast_id ==".$last_id;
			
			// copy data from xlsx to database
			
$inputFileType = 'Xlsx';
$inputFileName = $uploadPath;

echo "<br>inputFileName =".$inputFileName;
//$examType=$examType;
$facultyId= $_SESSION['username'];
//$inputFileName="excel/".$inputFileName;

/**  Create a new Reader of the type defined in $inputFileType  **/

$reader=\PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
/**  Advise the Reader that we only want to load cell data  **/
$reader->setReadDataOnly(true);
/**  Load $inputFileName to a Spreadsheet Object  **/
$spreadsheet = $reader->load($inputFileName);
//$reader->setPreCalculateFormulas(false);
$reader->setReadDataOnly(true);
$worksheet = $spreadsheet->getActiveSheet();
//$writer = new \PhpOffice\PhpSpreadsheet\Writer\Html($spreadsheet);
//$writer->setPreCalculateFormulas(false);
//$worksheet->setPreCalculateFormulas(false);

//$worksheet->getStyle("D")->getNumberFormat()->setFormatCode("YYYY-MM-DD");

// Get the highest row number and column letter referenced in the worksheet
$highestRow = $worksheet->getHighestRow(); // e.g. 10
$highestColumn = $worksheet->getHighestColumn(); // e.g 'F'
// Increment the highest column letter
$highestColumn++;

//INSERT INTO `transactiondetail` (`prog_category`, `payment_mode`, `bank_ref_no`, 
//`trans_date`, `amount`, `status`, `participant_name`, `birth_date`, `parti_category`, 
//`id_proof`, `id_no`, `prof_occu`, `organization`, `mobile_no`, `email`, `Installment`, 
//`fees`, `remark`) VALUES ('Exec Prog for Adv Product Mgmt (EPAPM)_P1_Aug22\r\n', 'OTHERDCARD\r\n', 
//'DUK1956815\r\n', '2022-11-17', '53100', 'Completed Successfully\r\n', 'Sushmita Chougule\r\n',
// '2022-11-02', 'GEN', 'Aadhar Card', 'AYXPC8562A', 'Others', 'Mercedes-benz\r\n', '7387884787', 
//'sushmitachougule@gmail.com\r\n', 'IInd_installment\r\n', '53100', '2nd Installment\r\n');

if($examType=='ete'){
	
	$worksheet->getStyle('D')->getNumberFormat()->setFormatCode("YYYY-MM-DD");

 for ($row = 2; $row <= $highestRow; ++$row) {
 //  $sno =$worksheet->getCellByColumnAndRow(1,1)->getValue();
    $sysId =$worksheet->getCellByColumnAndRow(2, $row)->getValue();
    $name =$worksheet->getCellByColumnAndRow(3, $row)->getValue();
	$data_to_store1['prog_category']= $worksheet->getCellByColumnAndRow(1, $row)->getValue();
	$data_to_store1['payment_mode']= $worksheet->getCellByColumnAndRow(2, $row)->getValue();
	$data_to_store1['bank_ref_no']= $worksheet->getCellByColumnAndRow(3, $row)->getValue();
	//$data_to_store1['trans_date']= $worksheet->getCellByColumnAndRow(4, $row)->getValue();
	$tdate = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
	echo "Original date = ".$tdate;
	
	$unixDateTimestamp =Date('d-M-Y',\PhpOffice\PhpSpreadsheet\Shared\Date::excelToTimestamp($tdate));
	//$utdate = date('d-M-Y', $unixDateTimestamp);
	echo "<br>Transaction Date =".$tdate;
	echo "<br>Transaction UDate =".$unixDateTimestamp;
	$data_to_store1['trans_date']=$unixDateTimestamp;
	$data_to_store1['amount']= $worksheet->getCellByColumnAndRow(5, $row)->getValue();
	$data_to_store1['status']= $worksheet->getCellByColumnAndRow(6, $row)->getValue();
	$p_name= $worksheet->getCellByColumnAndRow(7, $row)->getValue();
	
	$data_to_store1['participant_name']=$p_name;
	echo "<br> name = ".$p_name;
	$cell= $worksheet->getCellByColumnAndRow(8, $row)->getValue();
    
	
	//$val=Date('M-d-Y',\PhpOffice\PhpSpreadsheet\Shared\Date::excelToTimestamp($cell));
	$newDate = date("d-M-Y", ($cell));
	$field2= Date("d-M-Y", $cell);

	echo "<br> Bdate = ".$cell;
	echo "<br> uBdate = ".$field2;
	echo "<br>date format = ".date("Y-m-d h:i", ($cell-25569)*86400);
  
	$data_to_store1['birth_date']=$field2;//$worksheet->getCellByColumnAndRow(8, $row)->getFormattedValue();
	$data_to_store1['parti_category']= $worksheet->getCellByColumnAndRow(9, $row)->getValue();
	$data_to_store1['id_proof']= $worksheet->getCellByColumnAndRow(10, $row)->getValue();
	$data_to_store1['id_no']= $worksheet->getCellByColumnAndRow(11, $row)->getValue();
	$data_to_store1['prof_occu']= $worksheet->getCellByColumnAndRow(12, $row)->getValue();
	$data_to_store1['organization']= $worksheet->getCellByColumnAndRow(13, $row)->getValue();
	$data_to_store1['mobile_no']= $worksheet->getCellByColumnAndRow(14, $row)->getValue();
	$data_to_store1['email']= $worksheet->getCellByColumnAndRow(15, $row)->getValue();
	$data_to_store1['Installment']= $worksheet->getCellByColumnAndRow(16, $row)->getValue();
	$data_to_store1['fees']= $worksheet->getCellByColumnAndRow(17, $row)->getValue();
	$data_to_store1['remark']= $worksheet->getCellByColumnAndRow(18, $row)->getValue();
	
	
	
   // $courseId =$worksheet->getCellByColumnAndRow(5, $row)->getValue();
	//$courseName =$worksheet->getCellByColumnAndRow(6, $row)->getValue();
    //$quizno= $worksheet->getCellByColumnAndRow(5, $row)->getValue();
    
    // $copo= $worksheet->getCellByColumnAndRow(7, $row)->getValue();
    // $facultyId= $worksheet->getCellByColumnAndRow(8, $row)->getValue();
       
   // echo $marks;
    echo "</br>";
    	
	//$data_to_store1['roll_no'] = $sessionId;
	//$data_to_store1['name'] = $name;
	
    $db = getDbInstance();
    
	$last_id = $db->Insert('transactiondetail', $data_to_store1);
	// echo $db->getLastQuery();

}
//header('Location: ete_display.php?course_code='.$select2);
//echo "Entered data successfully\n";
}

//  ends copy data from xlsx to database
  }
	}
         echo "<br> Success";
         //$url="IterateExcel.php;
        
}

//We are using same form for adding and editing. This is a create form so declare $edit = false.
$edit = false;

require_once 'includes/header.php'; 
?>
<div id="page-wrapper" >
<div class="row">
     <div class="col-lg-12">
     
            <h2 class="page-header">End Term Exam</h2>
       
     
	 <div class="sturegleft  col-lg-4" >  
		 <b> Steps for Uploading ETE Marks for given course</b>
	<ol>
		
		<li> Select the course code for which we want to Upload MTE Marks </li>
		<li> Check the details of course</li>
		
		<li> Upload the file in attached format </li>
		<li> File Format <a href='download.php?file=./sample/sample_ete.xlsx' download>Sample file</a></li>
                         
	</ol>
     </div>	
	 
	 
	 <div class="sturegleft col-lg-8">  
	<form class="form" action="" method="post" name="frm" id="quiz_form" enctype="multipart/form-data">
		
       <?php  include_once('./forms/ete_form.php'); ?>
    </form>
     </div>	
	
	</div>
	
	
	</div>

	
</div>



<?php include_once 'includes/footer.php'; ?>