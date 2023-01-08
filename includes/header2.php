<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Outcome Based Learning</title>
		<!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>

		<!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
		<script> function outputUpdate(vol) {
			document.querySelector('#volume').value = vol;
		}
		</script>
        <!-- Bootstrap Core CSS -->
        <link  rel="stylesheet" href="css/bootstrap.min.css" type="text/css"/>

        <!-- MetisMenu CSS -->
        <link href="js/metisMenu/metisMenu.min.css" rel="stylesheet" type="text/css">

        <!-- Custom CSS -->
        <link href="css/sb-admin-2.css" rel="stylesheet" type="text/css">
        <!-- Custom Fonts -->
        <link href="fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script src="js/jquery.min.js" type="text/javascript"></script> 
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
 
		<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>

		<style>
		
		
			
body {
  
background-color: #76b852;
}
#wrapper {
  width: 100%;
}
#page-wrapper {
  padding: 0 15px;
  min-height: 568px;
  background-color: white;
}
@media (min-width: 768px) {
  #page-wrapper {
    position: inherit;
    margin: 0 0 0 250px;
	
    padding: 0 30px;
    border-left: 1px solid #e7e7e7;
  }
}
.navbar-top-links {
  margin-right: 0;
}
.navbar-top-links li {
  display: inline-block;
}
.navbar-top-links li:last-child {
  margin-right: 15px;
}
.navbar-top-links li a {
  padding: 15px;
  min-height: 50px;
}
.navbar-top-links .dropdown-menu li {
  display: block;
}
.navbar-top-links .dropdown-menu li:last-child {
  margin-right: 0;
}
.navbar-top-links .dropdown-menu li a {
  padding: 3px 20px;
  min-height: 0;
}
.navbar-top-links .dropdown-menu li a div {
  white-space: normal;
}
.navbar-top-links .dropdown-messages,
.navbar-top-links .dropdown-tasks,
.navbar-top-links .dropdown-alerts {
  width: 310px;
  min-width: 0;
}
.navbar-top-links .dropdown-messages {
  margin-left: 5px;
}
.navbar-top-links .dropdown-tasks {
  margin-left: -59px;
}
.navbar-top-links .dropdown-alerts {
  margin-left: -123px;
}
.navbar-top-links .dropdown-user {
  right: 0;
  left: auto;
}

.page-action-links{
  margin:40px 0px 20px 0px;
}


.sidebar .sidebar-nav.navbar-collapse {
  padding-left: 0;
  padding-right: 0;
}
.sidebar ul li {
  border-bottom: 1px solid #e7e7e7;
}
.sidebar ul li a.active {
  background-color: #008000;
}
.sidebar .arrow {
  float: right;
}
.sidebar .fa.arrow:before {
  content: "\f104";
}
.sidebar .active > a > .fa.arrow:before {
  content: "\f107";
}
.sidebar .nav-second-level li,
.sidebar .nav-third-level li {
  border-bottom: none !important;
}
.sidebar .nav-second-level li a {
  padding-left: 37px;
}
.sidebar .nav-third-level li a {
  padding-left: 52px;
}
@media (min-width: 768px) {
  .sidebar {
    z-index: 1;
    position: absolute;
    width: 250px;
    margin-top: 51px;
  }
  .navbar-top-links .dropdown-messages,
  .navbar-top-links .dropdown-tasks,
  .navbar-top-links .dropdown-alerts {
    margin-left: auto;
  }
}

.panel .slidedown .glyphicon,
.chat .glyphicon {
  margin-right: 5px;
}

.login-panel {
  margin-top: 25%;
}

.btn-circle {
  width: 30px;
  height: 30px;
  padding: 6px 0;
  border-radius: 15px;
  text-align: center;
  font-size: 12px;
  line-height: 1.428571429;
}
.btn-circle.btn-lg {
  width: 50px;
  height: 50px;
  padding: 10px 16px;
  border-radius: 25px;
  font-size: 18px;
  line-height: 1.33;
}
.btn-circle.btn-xl {
  width: 70px;
  height: 70px;
  padding: 10px 16px;
  border-radius: 35px;
  font-size: 24px;
  line-height: 1.33;
}
.show-grid [class^="col-"] {
  padding-top: 10px;
  padding-bottom: 10px;
  border: 1px solid #ddd;
  background-color: #eee !important;
}
.show-grid {
  margin: 15px 0;
}
.huge {
  font-size: 40px;
}

.panel-green > .panel-heading {
  border-color: #5cb85c;
  color: white;
  background-color: #5cb85c;
}
.panel-green {
  border-color: #5cb85c;
}
.panel-green > a {
  color: #5cb85c;
}
.panel-green > a:hover {
  color: #3d8b3d;
}
.panel-red {
  border-color: #d9534f;
}
.panel-red > .panel-heading {
  border-color: #d9534f;
  color: white;
  background-color: #d9534f;
}
.panel-red > a {
  color: #d9534f;
}
.panel-red > a:hover {
  color: #b52b27;
}
.panel-yellow {
  border-color: #f0ad4e;
}
.panel-yellow > .panel-heading {
  border-color: #f0ad4e;
  color: white;
  background-color: #f0ad4e;
}
.panel-yellow > a {
  color: #f0ad4e;
}
.panel-yellow > a:hover {
  color: #df8a13;
}

label.error{
  color: red;
}


.sturegleft 
{
    border-radius: 25px;
    background: #5cb85c;
    padding: 10px; 
    margin:5px;
	max-width:60%;
}


		</style>

    </head>

    <body>
<div class="container-fluid">
        <div id="wrapper">

            <!-- Navigation -->
            <?php if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] == true ) : ?>
                <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        
						
                        <a class="navbar-brand" href="">Outccome Based Learning</a>
                    </div>
                    <!-- /.navbar-header -->
					<ul class="nav navbar-top-links navbar-right">
                        <!-- /.dropdown -->

                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#"><i class="fa fa-user fa-fw"></i> <b> <?php echo "Welcome ". $_SESSION['username'] ?> </b></a>
                                </li>
                                <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                                </li>
                            </ul>
                            <!-- /.dropdown-user -->
                        </li>
                        <!-- /.dropdown -->
                    </ul>
                 
                    <!-- /.navbar-top-links -->
           <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <div class="navbar-default sidebar" role="navigation">
                      <!--  <div class="sidebar-nav navbar-collapse">
					  -->
                            <ul class="nav" id="side-menu">
                                <li>
                                    <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Home</a>
                                </li>

                                
								<li <?php echo (CURRENT_PAGE =="course.php" ) ? 'class="active"' : '' ; ?>>
                                    <a href="quiz.php"><i class="fa fa-user-circle fa-fw"></i> course<span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        <li>
                                            <a href="course.php"><i class="fa fa-list fa-fw"></i>course update</a>
                                        </li>
										 
										<li>
                                            <a href="copo.php"><i class="fa fa-list fa-fw"></i>co po mapping</a>
                                        </li>
										
                                    </ul>
								</li>
								
								<li <?php echo (CURRENT_PAGE =="register_student.php" ) ? 'class="active"' : '' ; ?>>
                                    <a href="register_student.php"><i class="fa fa-user-circle fa-fw"></i> Register Students<span class="fa arrow"></span></a>
                                   
                                </li>
								
								 <li <?php echo (CURRENT_PAGE =="quiz.php" ) ? 'class="active"' : '' ; ?>>
                                    <a href="quiz.php"><i class="fa fa-user-circle fa-fw"></i> Quiz<span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        <li>
                                            <a href="quiz2.php"><i class="fa fa-list fa-fw"></i>Quiz Upload</a>
                                        </li>
										 
										<li>
                                            <a href="quiz_display1.php"><i class="fa fa-list fa-fw"></i>Display Quiz</a>
                                        </li>
										
                                    </ul>
								 </li>
                                <li>
                                    <a href="admin_users.php"><i class="fa fa-users"></i> Users</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.sidebar-collapse -->
                    </div>
                    <!-- /.navbar-static-side -->
                </nav>
            <?php endif; ?>
            <!-- The End of the Header -->
			