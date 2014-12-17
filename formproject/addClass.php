<?php

	
$con=mysql_connect('localhost','root','');
mysql_select_db("virtual-form",$con);

 $class = $_REQUEST["class"];
 $team    = $_REQUEST["team"];


  mysql_query( "INSERT INTO classes (class,team)
VALUES ( '{$class}','{$team}' ) " );

header("Location: view_classes.php");


?>