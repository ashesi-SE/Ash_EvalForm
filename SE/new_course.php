<?php 
    session_start();
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>New Course</title>
	<!-- Bootstrap Core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="assets/css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="assets/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>
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
                            Add New Course
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i> Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> New Course
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-2">
                        
                    </div>
                    <div class="col-lg-8">

                        <form role="form">
                        <fieldset>
                            <div class="form-group">
                                <label>Course Name</label>
                                <input class="form-control" id ="course_name" placeholder="Course Name" name="course_name" type="text" required/>
                            </div>
                            <div class="form-group">
                                <label>Course Number</label>
                                <input class="form-control" id ="course_number" placeholder="Course Name" name="course_number" type="text" required/>
                            </div>
                            <div class="form-group">
                                <label>FI's Email Address</label>
                                <input class="form-control" id ="fi_email" placeholder="Course Name" name="fi_email" type="text" required/>
                            </div>


                            <div class="form-group">
                                <label>Semester</label>
                                <select class="form-control" id = "semester">
                                    <option>Fall Semester</option>
                                    <option>Spring Semester</option>
                                    <option>Summer School</option>
                                </select>
                            </div>

                            <div class="form-group" >
                                <label>Year</label>
                                <input class="form-control" id = "year" required/>
                            </div>
                            <div class="form-group" >
                                <label>Short Course Description</label>
                                <input class="form-control" id = "description" required/>
                            </div>
                            <div class="form-group">
                                <label>Number of Teams</label>
                                <input class="form-control"  id = "number_of_teams" required/>
                            </div>                                                                                     
                            <div align="center">
                                <button type="submit" class="btn btn-success" onclick= "save()" >Save</button>
                                <!-- <button type="reset" class="btn btn-warning">Reset</button> -->
                            </div>
                        </fieldset>
                        </form>

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

    <script type="text/javascript">
        function save(){
            var course_name = encodeURI(document.getElementById("course_name").value);
            var course_number = encodeURI(document.getElementById("course_number").value);
            var num_teams = encodeURI(document.getElementById("number_of_teams").value);
            var fi_email = encodeURI(document.getElementById("fi_email").value);
            var semester = encodeURI(document.getElementById("semester").value);
            var year = encodeURI(document.getElementById("year").value);
            var description = encodeURI(document.getElementById("description").value);
            var num_teams = encodeURI(document.getElementById("number_of_teams").value);

            var url = "action_page.php?course&course_name="+course_name+"&course_number="+course_number+"&fi_email="+fi_email+"&semester="+semester+"&year="+year+"&description="+description+"&num_teams="+num_teams;
            //alert(url);
            syncAjax(url);
            window.location = "home.php";
        }

        function syncAjax(u){
            $.ajax({
                url: u,
                async: false,
                success: function (response) {
                    //alert(response);
                    window.location = "home.php";
                }

            });
        }
        
    </script>
</body>
</html>