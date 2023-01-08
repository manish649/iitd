<?php

require 'vendor/autoload.php';
session_start();
require_once './config/config.php';
require_once './includes/auth_validate.php';
$unser=null;
$dirname2=null;
$file_extn=null;
$examType='register';
//serve POST method, After successful insert, redirect to customers.php page.
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    //Mass Insert Data. Keep "name" attribute in html form same as column name in mysql table.
    $data_to_store = filter_input_array(INPUT_POST);
	$dirname2 = "filesUploaded"."/".$data_to_store['school']."/".$data_to_store['prog']."/".$data_to_store['sem']."/".$examType;
	
	
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
    $filename = $data_to_store['course_code']."_".$_SESSION['username']."_".$time2."."."xlsx";
	$data_to_store['filename']=$filename;
	$data_to_store['oldfilename']=$file_name;

	$data_to_store['user'] = $_SESSION['username'];
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
			
			// copy data from xlsx to database
			
$inputFileType = 'Xlsx';
$inputFileName = $uploadPath;
$courseId2=$data_to_store['course_code'];
$examType=$examType;
$facultyId= $_SESSION['username'];
//$inputFileName="excel/".$inputFileName;

/**  Create a new Reader of the type defined in $inputFileType  **/

$reader=\PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
/**  Advise the Reader that we only want to load cell data  **/
$reader->setReadDataOnly(true);
/**  Load $inputFileName to a Spreadsheet Object  **/
$spreadsheet = $reader->load($inputFileName);

/* ?$reader = PhpOffice/PhpSpreadsheet/IOFactory::createReader('Xlsx');
//$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
$reader->setReadDataOnly(TRUE);
$spreadsheet = $reader->load("helloworld.xlsx");
 */
$worksheet = $spreadsheet->getActiveSheet();
// Get the highest row number and column letter referenced in the worksheet
$highestRow = $worksheet->getHighestRow(); // e.g. 10
$highestColumn = $worksheet->getHighestColumn(); // e.g 'F'
// Increment the highest column letter
$highestColumn++;

echo '<table border="1">' . "\n";


/* $sql = 'INSERT INTO employee '.
    '(emp_name,emp_address, emp_salary, join_date) '.
    'VALUES ( "guest", "XYZ", 2000, NOW() )';
 */
//mysql_select_db('su_obe');
if($examType=='register')
{
for ($row = 2; $row <= $highestRow; ++$row) {
 //  $sno =$worksheet->getCellByColumnAndRow(1,1)->getValue();
    $sysId =$worksheet->getCellByColumnAndRow(2, $row)->getValue();
    $name =$worksheet->getCellByColumnAndRow(3, $row)->getValue();
    $courseId =$worksheet->getCellByColumnAndRow(4, $row)->getValue();
	$courseName =$worksheet->getCellByColumnAndRow(5, $row)->getValue();
    //$quizno= $worksheet->getCellByColumnAndRow(5, $row)->getValue();
    $marks= $worksheet->getCellByColumnAndRow(6, $row)->getValue();
    // $copo= $worksheet->getCellByColumnAndRow(7, $row)->getValue();
    // $facultyId= $worksheet->getCellByColumnAndRow(8, $row)->getValue();
    try{
    if($courseId2!=$courseId)
        throw new Exception("Course id in file is different from course id entered");
	
    }
    catch(Exception $e){
		echo 'Message: ' .$e->getMessage();
		//header('Location: register_student.php');
       // echo 'Message: ' .$e->getMessage();
    }
    
    echo $marks;
    echo "</br>";
    
	$data_to_store1['roll_no'] = $sysId;
	$data_to_store1['name'] = $name;
	$data_to_store1['course_code'] = $courseId;
	$data_to_store1['facultyId'] = $facultyId;
    $db = getDbInstance();
    $last_id = $db->insert ('quiz', $data_to_store1);
	
	
	
}
header('Location: register_display.php');
echo "Entered data successfully\n";
}



			 
			//  ends copy data from xlsx to database
		 }
		
		
         echo "<br> Success";
         //$url="IterateExcel.php;
        
             ob_start();
           // header('Location: register_display.php?course_code='+$courseId2);
             ob_end_flush();
             die();
         
      }else{
		  echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
         print_r($errors);
      }   

   
	
	
	
    
    
    
}

//We are using same form for adding and editing. This is a create form so declare $edit = false.
$edit = false;

require_once 'includes/header.php'; 
?>
<div id="page-wrapper">
<div class="row">
     <div class="col-lg-12">
     
            <h2 class="page-header">Register Students</h2>
       
     
	 
	 <div class="sturegleft  col-lg-4">  
		 <b> Steps for Register students for given course</b>
	<ol>
		
		<li> fill the details of course for which we want to register students </li>
		<li> Upload the file in attached format </li>
		<li> File Format <a href='download.php?file=./sample/RegisterSample.xlsx' download>Sample file</a></li>
                         
		 </ol>
     </div>	
	 
	 
	 <div class="sturegleft col-lg-8">  
	<form class="form" action="" method="post"  id="quiz_form" enctype="multipart/form-data">
		
       <?php  include_once('./forms/register_form.php'); ?>
    </form>
     </div>	
	
	</div>
	
	
	</div>

	
</div>


<script type="text/javascript">
$(document).ready(function(){
   $("#customer_form").validate({
       rules: {
            f_name: {
                required: true,
                minlength: 3
            },
            l_name: {
                required: true,
                minlength: 3
            },   
        }
    });
});
</script>

<?php include_once 'includes/footer.php'; ?>