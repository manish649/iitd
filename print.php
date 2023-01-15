
<?php
session_start();
require_once './config/config.php';
require_once 'includes/auth_validate.php';

$db1 = getDbInstance();
$sessionId= $_SESSION['username'];

$corsq="";
$corsdq="";
$copoq="";
$copos="";
$corsr="";
$corsdr="";
global $select2;

$corsq = "SELECT DISTINCT course_code FROM course WHERE user='$sessionId'";
//echo $corsq;
//$cors = $db1->rawQueryValue('SELECT DISTINCT course_code FROM course WHERE user=?',Array($sessionId));
$db1->where('user',$sessionId);
$cors = $db1->getValue('course','course_code',null);

if (isset($_POST['course_code'])) {
   $select2 = $_POST['course_code'];
}



	
	
	$corsdq = "SELECT prog, sem, course_code,course_name,co1,co2,co3,co4,co5,co6 FROM course WHERE user='$sessionId' and course_code='$select2'";
    $copoq = "SELECT * FROM copo_details WHERE faculty_id='$sessionId' and course_code='$select2'";
	
	
	
if($db1->query( $corsdq)){
		$corsdr = $db1->query( $corsdq);
	
	} else{
		//echo "ERROR: Could not able to execute $co1q6. " . mysqli_error($db1);
	}
	if($db1->query($copoq)){
		$corsdr = $db1->query( $copoq);
	$copor = $db1->query($copoq);
	} else{
		//echo "ERROR: Could not able to execute $co1q6. " . mysqli_error($db1);
	}
	

/////////////////////////////////// UPdate  //////////////////////////////////////////////////////
if(isset($_POST['search'])){



//echo "select =".$select2;
if ($select2 !='') {  // if course is not empty
  
	$corsdq = "SELECT prog, sem, course_code,course_name,co1,co2,co3,co4,co5,co6 FROM course WHERE user='$sessionId' and course_code='$select2'";
    $copoq = "SELECT * FROM copo_details WHERE faculty_id='$sessionId' and course_code='$select2'";
	error_log(print_r($corsq, TRUE)); 
	}
	
	
	$corsdr = $db1->query( $corsdq);
	
	$copor = $db1->query( $copoq);
	
	
         //$courses = mysqli_query($db1, $sql);
                                                                                                                       }	 
	

	//echo $copoq;



//Get DB instance. i.e instance of MYSQLiDB Library

///$select23 = 'select prog, sem, course_code,course_name,co1,co2,co3,co4,co5,co6,user '

//$query = mysqli_query($db1,"SELECT distinct course_code FROM course WHERE user=". $sessionId);


include_once 'includes/header.php';
?>
<script>
function search(){
	
	
}


</script>
<!--Main container start-->
<div id="page-wrapper">
    <div class="row">
    <div class ="col-md-12 col-lg-12">
        <div class="col-lg-6">
            <h3 >Print Course File</h3> 
        </div>
        <div class="col-lg-6" style="">
          <!---  <div class="page-action-links text-right">
	            <a href="add_customer.php?operation=create">
	            	<button class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Add new </button>
	            </a>
            </div>  -->
			
        </div>
    </div>
	</div>
        <?php include('./includes/flash_messages.php') ?>
    <!--    Begin filter section-->
	
    <div class="well text-center filter-form">
        <form class="form form-inline" method="post" action="">
            <label for="input_search">Select Course</label>
			 
			<select name="course_code" class="form-control" onchange="search()">
				<option value="">Select</option>
				
							
                <?php
				 foreach ($cors as $row) {
				 
    				  ($row===$select2) ? $selected = "selected" : $selected = "";
                
                    echo ' <option value="' . $row . '" ' . $selected . '>' . $row . '</option>';
                }
                ?>

            </select>
           
          

            <input type="submit" name="search" value="search" class="btn btn-primary">

        
    </div>
<!--   Filter section end-->


    <hr>
 <?php  $i=0;
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
 }
 else{    
	$corsdq = "SELECT prog, sem, course_code,course_name,co1,co2,co3,co4,co5,co6 FROM course WHERE user='$sessionId' and course_code='$select2'";
	        $corsdr=  $db1->query($corsdq);
	 foreach ($corsdr as $row2) {
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
			
			
  }
			
 }	
			
			?>
			<div class="col-sm-12 table" style=" border-radius: 5px; background: #73AD21; padding: 20px;">
      
	  <div class="col-sm-3">              
                <b>Prog: <?php echo $prog ?></b>
				</div>
				<div class="col-sm-3"> 
                <b>sem: <?php echo $sem ?></b>
               </div>
				<div class="col-sm-3"> 
				<b>course code: <?php echo $course_code ?></b>
				</div>
				<div class="col-sm-3"> 
				<b>Course Name: <?php echo $course_name ?></b>
				</div>
			</div>
    <table class="table table-striped table-bordered table-condensed">
        <thead>            
			<tr>
				<th>Print Course Details</th>
                
                
            </tr>
        </thead>
        <tbody>
<tr> <td>  <div class="col-sm-12 center">


 
 <button type="submit" formtarget="_blank" formaction="./print_report.php">Print Report</button>
 </div>   
 </td></tr>	   
    </tbody>
  </table>
 
  </form>
</div>
</div>
</div>
</div>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>
 <!-- Custom CSS 
        <link href="css/css3.css" rel="stylesheet" type="text/css"-->

</body>
</html>	

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