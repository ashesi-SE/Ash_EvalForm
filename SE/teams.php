<?php 
    
    include_once './dbconnect.php';

    session_start();
    if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {
        header ("Location: index.php");
    }
    if(isset($_REQUEST["courseid"])){
        $course_id = $_REQUEST["courseid"];
        $num_teams = intval($_REQUEST["num_teams"]);

        $db = new DbConnect();
        $query = "SELECT name FROM courses WHERE id = $course_id";
        $result = mysql_query($query) or die(mysql_error());
        $temp = mysql_fetch_assoc($result);
        $course_name = $temp["name"];

    }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home-Admin</title>
	<!-- Bootstrap Core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="assets/css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="assets/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body ng-app="">
	 <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php">Virtual Evaluation Form </a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> 
                    <?php  
                        echo $_SESSION['fullname'];
                    ?>
                    <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="home.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="new_course.php"><i class="fa fa-fw fa-table"></i> Add New Course</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-edit"></i> Forms</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <?php 
                                echo $course_name;
                            ?> 
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-edit"></i> Teams</a>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                
                <div class="row">
                    <div class="col-lg-2">
                        
                    </div>
                    <div class="col-lg-8">

                        <form role="form" name="createTeams" action="action_page.php?team_cour=<?php echo $course_id ?>&saveteams=<?php echo $num_teams ?>" method="post">
                            <fieldset>
                            <?php 
                                for($x = 1; $x <= $num_teams; $x++){
                                    echo "<h2>Team $x </h2><br>";
                             ?>
                             <div class="form-group">
                                 <label>Team Name</label> 
                                 <input class="form-control" type="text" name="team_name<?php echo $x;?>">
                            </div>
                            <div class="form-group">
                                <label>Team Project Description</label>
                                <input class="form-control" type="text" name="description<?php echo $x;?>">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" placeholder="Team Members" rows="10" name="members<?php echo $x;?>"></textarea>
                            </div>

                        <?php
                            }
                        ?>
                            
                            </fieldset>

                                <button class="btn btn-primary" type= "submit">Save Teams</button>
                            </form>
        	                    <h2>
                                    
                                </h2>
                            
                        </div>
                    </div>
                </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


    <!-- jQuery -->
    <script src="assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="assets/js/bootstrap.min.js"></script>

     <!-- AngularJS Script -->
    <script src="assets/scripts/angular.min.js"></script>

</body>
</html>