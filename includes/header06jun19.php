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
                                    <a href="quiz.php"><i class="fa fa-book fa-fw"></i> course<span class="fa arrow"></span></a>
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
                                    <a href="syllabus.php"><i class="fa fa-book fa-fw"></i> Syllabus</a>
                                </li>
								
								<li <?php echo (CURRENT_PAGE =="register_student.php" ) ? 'class="active"' : '' ; ?>>
                                    <a href="register_student.php"><i class="fa fa-users"></i> Students<span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        <li>
                                            <a href="register_student.php"><i class="fa fa-list fa-fw"></i>Register Students</a>
                                        </li>
										 
										<li>
                                            <a href="register_display.php"><i class="fa fa-list fa-fw"></i>Registered Student list</a>
                                        </li>
										
                                    </ul>
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
								
								<li <?php echo (CURRENT_PAGE =="course.php" ) ? 'class="active"' : '' ; ?>>
                                    <a href="mte.php"><i class="fa fa-user-circle fa-fw"></i> Mid Term Exam<span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        <li>
                                            <a href="mte.php"><i class="fa fa-list fa-fw"></i>MTE Marks Upload</a>
                                        </li>
										 
										<li>
                                            <a href="mte_display.php"><i class="fa fa-list fa-fw"></i>MTE Marks Display</a>
                                        </li>
										
                                    </ul>
								</li>
								
								<li <?php echo (CURRENT_PAGE =="course.php" ) ? 'class="active"' : '' ; ?>>
                                    <a href="ete.php"><i class="fa fa-user-circle fa-fw"></i>  End Term Exam<span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        <li>
                                            <a href="ete.php"><i class="fa fa-list fa-fw"></i>ETE Marks Upload</a>
                                        </li>
										 
										<li>
                                            <a href="ete_display.php"><i class="fa fa-list fa-fw"></i>ETE Marks Display</a>
                                        </li>
										
                                    </ul>
								</li>
								<li <?php echo (CURRENT_PAGE =="course.php" ) ? 'class="active"' : '' ; ?>>
                                    <a href="co_comp.php"><i class="fa fa-user "></i>  CO Attainment<span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        <li>
                                            <a href="conw_comp.php"><i class="fa fa-list fa-fw"></i>CO Weights</a>
                                        </li>
										<li>
                                            <a href="cowise_w.php"><i class="fa fa-list fa-fw"></i>CO Weight Display</a>
                                        </li> 
										<li>
                                            <a href="quiz_co_display.php"><i class="fa fa-list fa-fw"></i>Weighted Quiz Assign & CA </a>
                                        </li> 
										<li>
                                            <a href="mte_co_display.php"><i class="fa fa-list fa-fw"></i>Weighted MTE marks </a>
                                        </li> 
										<li>
                                            <a href="ete_co_display.php"><i class="fa fa-list fa-fw"></i>Weighted ETE marks </a>
                                        </li> 
										<li>
                                            <a href="cowise_display.php"><i class="fa fa-list fa-fw"></i>CO WIse Display </a>
                                        </li> 
										
                                    </ul>
								</li>
                                <li>
                                    <a href="print.php"><i class="fa fa-file-pdf-o"></i> Create PDF</a>
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