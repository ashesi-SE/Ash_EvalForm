<!DOCTYPE html>
<?php

$con=mysql_connect('localhost','root','');
mysql_select_db("virtual-form",$con);

 if(isset($_REQUEST["class"])){
 $team    = $_REQUEST["team"];
 $class = $_REQUEST["class"];

  mysql_query( "INSERT INTO classes (class,team)
VALUES ( '{$class}','{$team}' ) " );
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
        <div class="well pull-right" align ="right ">
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

              <form action="view_classes.php" method="post" class="form-horizontal tpad" role="form">
                    <div class="form-group">
                        
                        Class
                  <input type="text" name="class"><br>
                        
                        Team
                        <input type="text" name="team"> 

                        <input type="submit" name="add" value="Add">

                  <br/> 
           
                   <tr class="tablerow">
          <td align="right">________________</td>
          <td>________________________</td>
        </tr>
  
               
      
        
        
        
     
        </br></br>
        <tr class="tableheader">
          <td align="center" colspan="2">
            <!--div class="message" id="error"><?php if($msg!="") { echo $msg; } ?></div></td>
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
