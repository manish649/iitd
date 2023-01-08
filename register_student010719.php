<?php

require 'vendor/autoload.php';
session_start();
require_once './config/config.php';
require_once './includes/auth_validate.php';
$unser=null;
$dirname2=null;
$file_extn=null;
$school="School of Engineering and Technology";
$examType='register';
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
$corsq = "SELECT DISTINCT course_code FROM course WHERE user='$sessionId'";
//echo $corsq;
//$cors = $db1->rawQueryValue('SELECT DISTINCT course_code FROM course WHERE user=?',Array($sessionId));
$db1->where('user',$sessionId);
$cors = $db1->getValue('course','course_code',null);

if (isset($_POST['course_code'])) {
   $select2 = $_POST['course_code'];
}

if (isset($_POST['batch'])) {
   $section = $_POST['batch'];
}
//if(isset($_POST['search'])){

$corsdq = "SELECT school,prog, sem, course_code,course_name,co1,co2,co3,co4,co5,co6 FROM course WHERE user='$sessionId' and course_code='$select2'";
//echo "corsdq=".$corsdq;

	  $i=0;
 if ($select2 =='') {
			$i=''; 
			$school='';
			$prog='';
			$sem='';
			$section='';
			$course_code='';
			$course_name='';
		/*	$co1='';
			$co2='';
			$co3='';
			$co4='';
			$co5='';
			$co6='';
			*/
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
			//$section=$row2['section'];
			$course_code=$row2['course_code'];
			$course_name=$row2['course_name'];
		/*	$co1=$row2['co1'];
			$co2=$row2['co2'];
			$co3=$row2['co3'];
			$co4=$row2['co4'];
			$co5=$row2['co5'];
			$co6=$row2['co6'];
			*/
			
  }
			
 }	
//  }	
//echo "upload =".$_POST['upload'];
if(isset($_POST['upload'])){
			
	
	$dirname2 = "filesUploaded/".$school."/".$prog."/".$sem."/".$section."/".$examType;
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
	  $file_extn=$path_info['extension'];
    }else{
         print_r($errors);
      }
	  
    //Insert timestamp
	$data_to_store['dirname']=$dirname2;
	date_default_timezone_set("Asia/Kolkata");
    $data_to_store['time'] = date('d-m-y h:i:s');
	date_default_timezone_set("Asia/Kolkata");
	$time2= date('d-m-y_h-i-s');
    $filename = $course_code."_".$_SESSION['username']."_".$time2."."."xlsx";
	
	echo "   filename= ".$filename;
	$data_to_store['filename']=$filename;
	$data_to_store['school']=$school;
	$data_to_store['prog']=$prog;
	$data_to_store['sem']=$sem;
	$data_to_store['batch']=$_POST['batch'];
	$data_to_store['course_code']=$select2;
	$data_to_store['oldfilename']=$file_name;
	$data_to_store['quiz_no']='register';
	
	

	$data_to_store['user'] = $_SESSION['username'];
	
	//$data_for_attain['course_code']=$select2;   //co_component table
	//$data_for_attain['faculty_id'] = $_SESSION['username'];
   // $user=$_SESSION['username'];
    $file_name = null;
    $uploadPath = $dirname2.'/'.$filename;  
	$dirname=$dirname2."/".$uploadPath;
	
	if(empty($errors)==true){ 
        
       // $file_ext = strtolower(end(explode('.',$_FILES['image']['name'])));
         if(move_uploaded_file($file_tmp,$uploadPath)){
			$db = getDbInstance();
			// creating log
			
			$last_id = $db->insert ('quiz_detail', $data_to_store); 
			//$last_id = $db->insert ('co_component', $data_for_attain); 
			echo "laast_id ==".$last_id;
			
			// copy data from xlsx to database
			
$inputFileType = 'Xlsx';
$inputFileName = $uploadPath;
$courseId2=$course_code;
//$examType=$examType;
$facultyId= $_SESSION['username'];
//$inputFileName="excel/".$inputFileName;

/**  Create a new Reader of the type defined in $inputFileType  **/

$reader=\PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
/**  Advise the Reader that we only want to load cell data  **/
$reader->setReadDataOnly(true);
/**  Load $inputFileName to a Spreadsheet Object  **/
$spreadsheet = $reader->load($inputFileName);

$worksheet = $spreadsheet->getActiveSheet();
// Get the highest row number and column letter referenced in the worksheet
$highestRow = $worksheet->getHighestRow(); // e.g. 10
$highestColumn = $worksheet->getHighestColumn(); // e.g 'F'
// Increment the highest column letter
$highestColumn++;

if($examType=='register'){
	
for ($row = 2; $row <= $highestRow; ++$row) {
 //  $sno =$worksheet->getCellByColumnAndRow(1,1)->getValue();
    $sysId =$worksheet->getCellByColumnAndRow(2, $row)->getValue();
    $name =$worksheet->getCellByColumnAndRow(3, $row)->getValue();
   // $courseId =$worksheet->getCellByColumnAndRow(4, $row)->getValue();
	//$courseName =$worksheet->getCellByColumnAndRow(5, $row)->getValue();
    //$quizno= $worksheet->getCellByColumnAndRow(5, $row)->getValue();
   // $marks= $worksheet->getCellByColumnAndRow(6, $row)->getValue();
    // $copo= $worksheet->getCellByColumnAndRow(7, $row)->getValue();
    // $facultyId= $worksheet->getCellByColumnAndRow(8, $row)->getValue();
       
    //echo $marks;
  //  echo "</br>";
	if (isset($_POST['batch'])) {
   $section = $_POST['batch'];
   
}
    
	$data_to_store1['roll_no'] = $sysId;
	$data_to_store1['name'] = $name;
	$data_to_store1['course_code'] = $select2;
	$data_to_store1['batch'] = $section;
	//$data_to_store1['course_code'] = $courseId;
	$data_to_store1['facultyId'] = $facultyId;
    $db = getDbInstance();
	//echo "batch =".$section;
    $last_id_quiz = $db->insert ('quiz', $data_to_store1);
	$last_id_mte = $db->insert ('mte', $data_to_store1);
	$last_id_ete = $db->insert ('ete', $data_to_store1);
	$last_id_proj = $db->insert ('project', $data_to_store1);
	$last_id_ete = $db->insert ('student_cos', $data_to_store1);
	
	
	
}
header('Location: register_display.php?course_code='.$select2);
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
     
            <h2 class="page-header">Register Students</h2>
       
     
	 
	 <div class="sturegleft  col-lg-4" >  
		 <b> Steps for Register students for given course</b>
	<ol>
		
		<li> Select the course code for which we want to register students </li>
		<li> click the search button to check course detail</li>
		<li> Upload the file in attached format </li>
		<li> File Format <a href='download.php?file=./sample/RegisterSample.xlsx' download>Sample file</a></li>
                         
		 </ol>
     </div>	
	 
	 
	 <div class="sturegleft col-lg-8">  
	<form class="form" action="" method="post" name="frm" id="quiz_form" enctype="multipart/form-data">
		
       <?php  include_once('./forms/register_form.php'); ?>
    </form>
     </div>	
	
	</div>
	
	
	</div>

	
</div>



<?php include_once 'includes/footer.php'; ?>