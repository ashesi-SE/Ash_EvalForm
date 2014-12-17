<!DOCTYPE html>
<?php

$msg="Enter Login Details";
if(isset($_REQUEST['username'])){
    //the login form has been submitted
  $username=$_REQUEST['username'];
  $password=$_REQUEST['password'];
    //call login to check username and password
  if(login($username,$password)){
      session_start();  //initiate session for the current login
      loadUserProfile($username); //load user information into the session
      header("location: index.php");  //redirect to home page
      exit();
    }elseif(!login($username,$password)){
      //if login returns false, then something is worng
      $msg="Your Login Name or Password is invalid";
      
    }
    else{
      $msg="Enter Login Details";
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

            <li><a href="ind.html">Home</a></li>
            
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
        <div class="well pull-right" align ="right">
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
</div>
</header>

<!-- Begin Body -->
<div class="container">
  <div class="row">
        <div class="col col-sm-2">
              
      <img src = "ashesi_logo.png" alt = "Ashesi Logo" align = "center"></img>
                
          </div>  
          <div class="col col-sm-10">
              

              <form action="login_form.php" method="POST" class="control-group"->
      
      <table border="0" cellpadding="10" cellspacing="1" width="500" align="center">

       <tr class="tablerow ">
          <td align="right">URL :</td>
          <td><input type="text" name="username" class="form-control"></td>
        </tr>

         <tr class="tablerow">
           <td align="right">__________________</td>
         <td>_______________________________________________</td>
        </tr>

        <tr class="tablerow">
          <td align="right">Email to :</td>
          <td><input type="password" name="password" class="form-control"></td>
        </tr>

         <tr class="tablerow">
          <td align="right">__________________</td>
         <td>_______________________________________________</td>
        </tr>

        <tr class="tablerow">
          <td align="right">Note :</td>
          <td>
            <textarea class="form-control"></textarea></td>
        </tr>

             <tr class="tablerow">
          <td align="right">__________________</td>
         <td>_______________________________________________</td>
          </tr>

        <tr class="tableheader list-inline">
          <td align="center" colspan="2">
           <!--  <input type="submit" name="submit" value="Send" class="btn btn-primary"> -->
            <input type="submit" name="submit" value="Email" class="btn btn-primary">
            
          </tr>

        </br></br>
       

        </br></br>
        <tr class="tableheader">
          <td align="center" colspan="2">
           <!-- <div class="message" id="error"><?php if($msg!="") { echo $msg; } ?></div></td> -->
          </tr>
        </table>
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

  