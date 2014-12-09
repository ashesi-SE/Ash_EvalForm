<!DOCTYPE html>

<?php

$Newname="";
$Newpassword="";
$username="";
$password="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["username"])) {
    $Newname = "Name is required";
  } 
  else {
    $username=$_REQUEST['username'];
  }

  if (empty($_POST["password"])) {
    $Newpassword = "Password is required";
  } else {
    $password=$_REQUEST['password'];
  }

  if(register($username,$password)){
    header("location: login.php");
    exit();
  }

}
?>


<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Evaluation from admin</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css/styles.css" rel="stylesheet">
	</head>
	<body>
<nav class="navbar navbar-static">
    <div class="container">
      <a class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">
        <span class="glyphicon glyphicon-chevron-down"></span>
      </a>
      <div class="nav-collapse collase">
          <ul class="nav navbar-right navbar-nav">

          <li class="dropdown">
          
            <ul class="dropdown-menu" style="padding:12px;">

                <form class="form-inline">
     				<button type="submit" class="btn btn-default pull-right"><i class="glyphicon glyphicon-search"></i></button><input type="text" class="form-control pull-left" placeholder="Search">
                </form>

              </ul>
          </li>
         
        </ul>
      </div>		
    </div>
</nav><!-- /.navbar -->

<header class="masthead">
  <div class="container">
    <div class="row">
      <div class="col col-sm-6">
        <h1><a href="#" title="scroll down for your viewing pleasure">Virtual Evaluation Form</a>
          <p class="lead">Admin control Panel  </p></h1>
      </div>
      <div class="col col-sm-6">
        <div class="well pull-right">
          <img src="piru.jpg">        
        </div>
      </div>
    </div>
  </div>
  
  <div class="container">
	<div class="row">
      <div class="col col-sm-12">
        
        <div class="panel">
        <div class="panel-body">
          Might Advertise upcoming College Events here 
        </div>
        
      </div>
  	</div>
  </div>
</header>

<!-- Begin Body -->
<div class="container">
	<div class="row">
  			<div class="col col-sm-3">
              	<div id="sidebar">
      			       <div align = "center">
      <img src = "ashesi_logo.png" alt = "Ashesi Logo" align = "center"></img>
    </div>

                <div class="accordion" id="accordion2">
                   
                    <div class="accordion-group">
                            
                      
                        </div>
               	</div>
               </div>
      		</div>  
      		<div class="col col-sm-9">
              <div class="panel">

              <form id="signUp.php"  method="post">  
    
    
                <div align = "center">
                   <h1 class="label">Registration  Form</h1>
              </div>
        
              <div align = "center">        
          <label for="name"><b>Enter a username:</b></label>        
          <input type="text" name="username" id="username" placeholder="username" maxlength="20" onkeyup="checkUsername(this);" />          
          <span class="error">* <?php echo $Newname;?></span>
          <br><br></p>
          </div>
          <p cellpadding="10" cellspacing="1" width="500" align="center">         
            <label for="email"><b>Enter a password:</b></label>       
            <input type="password" name="password" id="password" placeholder="password" maxlength="10" />       
            <span class="error">* <?php echo $Newpassword;?></span>
            <br><br></p>
            <p class="submit" cellpadding="10" cellspacing="1" width="500" align="center">
              <button type="submit">Sign Up</button></p> 

                        
          </form>
              
              
              	
             	</div>
      	</div> 
  	</div>
</div>



	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/scripts.js"></script>
	</body>
</html>

      <?php
        function register($username, $userPass){

  $database="virtual-form";  //this database has to exist. 
  $user="root";   //the main admin user of mysql
  $password="";     //use root password of mysql
  $server="localhost";  //name of the server
  
  $link=mysql_connect($server,$user,$password);
  //if result is false, the connection did not open
  if(!$link){ 
    echo "Failed to connect to mysql.";
    //display error message from mysql
    echo mysql_error(); 
    exit();   //end script
    echo "failed";
  }
  //select the database to work with using the open connection 
  if(!mysql_select_db($database,$link)){
    echo "Failed to select database.";
    //display error message from mysql
    echo mysql_error(); 
    exit(); 
    return false;
  }

  if($username && $userPass){
    $dataset = mysql_query("insert into login(username,password) values ('$username','$userPass')", $link);

    


    if($dataset)
      return true;
  }

  else
    return false;
  
}
?>