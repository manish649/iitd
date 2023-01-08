<?php
session_start();
require_once './config/config.php';
//If User has already logged in, redirect to dashboard page.
if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === TRUE) {
    header('Location:index.php');
}
$db = getDbInstance();
//If user has previously selected "remember me option", his credentials are stored in cookies.
if(isset($_REQUEST['username']) && isset($_REQUEST['password']))
{
	//Get user credentials from cookies.
	$username = filter_var($_REQUEST['username']);
	$passwd = filter_var($_REQUEST['password']);
	$db->where ("user_name", $username);
	$db->where ("passwd", $passwd);
    $row = $db->get('admin_accounts');

    if ($db->count >= 1) 
    {
    	//Allow user to login.
        $_SESSION['user_logged_in'] = TRUE;
        $_SESSION['user']=$username;
        $_SESSION['admin_type'] = $row[0]['admin_type'];
        header('Location:index.php');
        exit;
    }
    else //Username Or password might be changed. Unset cookie
    {
    
    header('Location:login.php');
    exit;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Administrator</title>

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
  background:rgba(255,255,205,0.5);
}
</style>
    </head>

    <body  >

<div id="page-" class="col-md-4 col-md-offset-4 ">
	<form class="form loginform " method="POST" action="authenticate.php">
		<div class="login-panel panel transparent panel-default">
			<div class="panel-heading">Please Sign in</div>
			<div class="panel-body">
				<div class="form-group">
					<label class="control-label">username</label>
					<input type="text" name="username" class="form-control" required="required">
				</div>
				<div class="form-group">
					<label class="control-label">password</label>
					<input type="password" name="passwd" class="form-control" required="required">
				</div>
				<div class="checkbox">
					<label>
						<input name="remember" type="checkbox" value="1">Remember Me
					</label>
				</div>
				<?php
				if(isset($_SESSION['login_failure'])){ ?>
				<div class="alert alert-danger alert-dismissable fade in">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<?php echo $_SESSION['login_failure']; unset($_SESSION['login_failure']);?>
				</div>
				<?php } ?>
				<button type="submit" class="btn btn-success loginField" >Login</button>
			</div>
		</div>
	</form>
</div>
<?php include_once 'includes/footer.php'; ?>