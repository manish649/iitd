<?php
session_start();
require_once './config/config.php';
require_once 'includes/auth_validate.php';

$program="";
$email="";
$mobile="";
$transacton_date="";
$amount="";
$receipt="";

$db = getDbInstance();

$corsdq = "SELECT name, program, email ,mobile, transacton_date,amount,receipt FROM registration WHERE transaction_id='33334333'";
echo $corsdq;
	        $corsdr=  $db->query($corsdq);

	 foreach ($corsdr as $row) {
		    // echo "querry =".$corsdq;
			//echo "row222=".$row2;
		
			$program=$row['program'];
			$email=$row['email'];
			$mobile=$row['mobile'];
			$transacton_date=$row['transacton_date'];
			$amount=$row['amount'];
			$receipt=$row['receipt'];

			
  }
include_once 'includes/header.php';
?>

<!--Main container start-->
<div id="page-wrapper">
    <div class="row">

        <div class="col-lg-6">
            <h1 class="page-header">Registration Details</h1>
        </div>
     
    </div>
        <?php include('./includes/flash_messages.php') ?>

<!-- end filter -->

    <hr>

	                
    <table class="table table-striped table-bordered table-condensed">
        <thead>
           
        </thead>
        <tbody>
            <?php  $i=0;
			
	
				 
                 
				 ?>
                <tr>
	                <td><?php echo "program" ?></td>	
	                <td><?php echo $program ?></td>
	            </tr>
                <tr>
	                <td><?php echo "email" ?></td>	
	                <td><?php echo htmlspecialchars($row['email']) ?></td>
	            </tr>
                <tr>
	                <td><?php echo "mobile" ?></td>	
	                <td><?php echo htmlspecialchars($row['mobile']) ?></td>
	            </tr>
                <tr>
	                <td><?php echo "transacton_Id" ?></td>	
	                <td><?php echo htmlspecialchars($row['program']) ?></td>
	            </tr>
                <tr>
	                <td><?php echo "transacton_date" ?></td>	
	                <td><?php echo htmlspecialchars($row['transacton_date']) ?></td>
	            </tr>
                <tr>
	                <td><?php echo "amount" ?></td>	
	                <td><?php echo htmlspecialchars($row['amount']) ?></td>
	            </tr>
                <tr>
	                <td><?php echo "receipt" ?></td>	
	                <td><?php echo htmlspecialchars($row['receipt']) ?></td>
	            </tr>
			  
        </tbody>
    </table>

</div>
<!--Main container end-->


<?php include_once './includes/footer.php'; ?>

