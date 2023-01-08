<?php
   //  $courseId = $_POST['course_code'];
   //  $examType= $_POST['exam'];
     //$file_nam= $_POST['image'];
     date_default_timezone_set('Asia/Kolkata');
     
    // $date = date('m/d/Y h:i:s a', time());
     //echo $date;
     
   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_ext=$_FILES['image']['type'];
      //echo $file_ext;
     
        $file_typ=  (explode('.',$_FILES['image']['name']));
        $file_ext=strtolower(end($file_typ));
      //echo $file_ext;
      $expensions= array("xlsx","csv");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         $fileName=$courseId.$examType.date('Y-m-d H-i-s', time());
         echo $fileName;
         move_uploaded_file("excel/".$fileName);
         echo "Success";
         //$url="IterateExcel.php?fname=$fileName&ccode=$courseId";
        
             ob_start();
             header('Location: customer.php');
             ob_end_flush();
             die();
         
      }else{
         print_r($errors);
      }
   }
?>
