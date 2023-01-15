<?php
session_start();
require_once './config/config.php';
//If User has already logged in, redirect to dashboard page.
if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === TRUE) {
//    header('Location:index.php');

}
$empid="";
$db1 = getDbInstance();
if (isset($_POST['empid'])) {
   $empid = $_POST['empid'];
}

$db1->where('user_name',$empid);
$cors = $db1->getValue('admin_accounts','user_name',1);
// if user is already registered
	if($cors !=""){
		
		echo "<script type='text/javascript'>
                alert('You are already Registered );
            </script>";
		header("Location: index.php");
		
	}
	// for new user
	else{
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
	{
	$data_to_store = filter_input_array(INPUT_POST);
	$name = $data_to_store['name'];
	$program = $data_to_store['program'];
	$email = $data_to_store['email'];
	$mobile = $data_to_store['mobile'];
	$transacton_date = $data_to_store['transacton_date'];
	$transaction_id = $data_to_store['transaction_id'];
	$amount = $data_to_store['amount'];
	$receipt = $data_to_store['receipt'];
	
	if(empty($errors)==true){ 
	//$db1 = getDbInstance();
    $last_id = $db1->insert ('registration', $data_to_store);
	echo $db1->getlastquery();
	echo("Registered");
	header('Location:register_display_student.php');
	
	}  //if 
	}  // if
	}  //else	

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Registration Details</title>

        <!-- Bootstrap Core CSS -->
        <link  rel="stylesheet" href="css/bootstrap.min.css"/>

        <!-- MetisMenu CSS -->
        <link href="js/metisMenu/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/sb-admin-2.css" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script src="js/jquery.min.js" type="text/javascript"></script> 
		
<style>
body {
	
  background-image: url("images/sharda2.jpg");
   /* Full height */
  height: 100%; 

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
 
}
.transparent {
  background:#7f7f7f;
  background:rgba(185,255,205,0.5);
}

</style>
    </head>

    <body  >

<div id="page-" class="col-md-4 col-md-offset-4 ">
	<form class="form loginform " method="POST" action="">
		<div class="login-panel panel transparent panel-default">
			<div class="panel-heading"> Upload Registration Details</div>
			<div class="panel-body">
				<div class="form-group">
					<label class="control-label">Name</label>
					<input type="text"  name="name" class="form-control" required="required">
				</div>
				<div class="form-group">
					<label class="control-label">Program</label> 
					<input type="text"  name="program" class="form-control" required="required">
				</div>
				<div class="form-group">
					<label class="control-label">Email</label> 
					<input type="email"  name="email" class="form-control" required="required">
				</div>
				<div class="form-group">
					<label class="control-label">Mobile Number</label> 
					<input type="number"  name="mobile" class="form-control" required="required">
				</div>
				<div class="form-group">
					<label class="control-label">Date of Transaction</label>
					<input type="date" name="transacton_date" class="form-control" required="required">
				</div>
				<div class="form-group">
					<label class="control-label">Transaction Id</label> 
					<input type="text"  name="transaction_id" class="form-control" required="required">
				</div>
				<div class="form-group">
					<label class="control-label">Amount</label> 
					<input type="text"  name="amount" class="form-control" required="required">
				</div>
				<div class="form-group">
					<label class="control-label">Upload Receipt</label> 
					<input type="file"  name="receipt" class="form-control" required="required">
				</div>
			<?php
				if(isset($_SESSION['login_failure'])){ ?>
				<div class="alert alert-danger alert-dismissable fade in">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<?php echo $_SESSION['login_failure']; unset($_SESSION['login_failure']);?>
				</div>
				<?php } ?>
				<button type="submit" class="btn btn-success loginField"  >Register</button>
			</div>
		</div>
	</form>
</div>
<?php include_once 'includes/footer.php'; ?>