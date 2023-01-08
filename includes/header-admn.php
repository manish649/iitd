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

    </head>

    <body  >
	
	
	<!--div class="col-md-12 topheader">
	
	
	<div class="col-md-3 leftlogo">
	left
	</div>
	
	<div class="col-md-9 rightlogo">
	right
	</div>
	
	</div-->
	

        <div id="wrapper">

            <!-- Navigation -->
            <?php if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] == true ) : ?>
                <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header col-md-12">
                       

					  
                        <a href="">
						<img  class="img-responsive" src="images/headerimg.jpg" style="height:80px;padding-top:2px;" alt="logo"/>

						</a>
					
						
						
						
												<!--b>Outcome Based Education</b></a-->
                    
                    <!-- .navbar-header -->

                    <ul class=" navbar-right" >
                        
                          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                       
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

</div>
                    <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <div class="navbar-default sidebar" style="margin-top:100px" role="navigation">
                      <!--  <div class="sidebar-nav navbar-collapse">
					  -->
                            <ul class="nav" id="side-menu" style="margin-top:0px">
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
								
								<li <?php echo (CURRENT_PAGE =="quiz2.php" ) ? 'class="active"' : '' ; ?>>
                                    <a href="quiz.php"><i class="fa fa-user-circle fa-fw"></i> Quiz & CA<span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        <li>
                                            <a href="quiz2.php"><i class="fa fa-list fa-fw"></i>Quiz Upload</a>
                                        </li>
										 
										<li>
                                            <a href="quiz_display1.php"><i class="fa fa-list fa-fw"></i>Display Quiz</a>
                                        </li>
										
                                    </ul>
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
			</div>