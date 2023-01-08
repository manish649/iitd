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

    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <?php if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] == true ) : ?>
                <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href=""><b>Outcome Based Education</b></a>
                    </div>
                    <!-- /.navbar-header -->

                    <ul class="nav navbar-top-links navbar-right">
                        <!'-- /.dropdown -->

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
			</div>