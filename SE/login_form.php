<?php

$msg="Enter Login Details";
if(isset($_REQUEST['username'])){
		//the login form has been submitted
	$username=$_REQUEST['username'];
	$password=$_REQUEST['password'];
    

		//call login to check username and password
  // echo "alert(login($username,$password))";
	if(login($username,$password)){
			session_start();	//initiate session for the current login
			loadUserProfile($username);	//load user information into the session
			header("location: editeval.html");	//redirect to home page
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

	<html>
	<head>
		<title>User Login</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>

		
		
		<form action="login_form.php" method="POST">
			
			<table border="0" cellpadding="10" cellspacing="1" width="500" align="center">

				<tr class="tablerow">
					<td align="right">Username</td>
					<td><input type="text" name="username"></td>
				</tr>
				<tr class="tablerow">
					<td align="right">Password</td>
					<td><input type="password" name="password"></td>
				</tr>
				<tr class="tableheader">
					<td align="center" colspan="2">
						<input type="submit" name="submit" value="Login">
						
					</tr>

				</br></br>
				<tr class="tableheader">
					<td align="center" colspan="2">
						<div class="message" id="error"><?php if($msg!="") { echo $msg; } ?></div></td>
					</tr>
				</table>
			</form>
		</body>
		</html>

		<?php
		function login($username, $password1){

	$database="SE";	//this database has to exist. 
	$user="root";		//the main admin user of mysql
	$password="";			//use root password of mysql
	$server="localhost";	//name of the server
	
	$link=mysql_connect($server,$user,$password);
	//if result is false, the connection did not open
	if(!$link){	
		echo "Failed to connect to mysql.";
		//display error message from mysql
		echo mysql_error();	
		exit();		//end script
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
	//echo $username;
	

	$dataset = mysql_query("select * from ADMIN where email= '$username' and password = '$password1' ", $link);


	$result = mysql_fetch_assoc($dataset);
	//echo "alert($result)";
	   
	if($result){
		return true;
	}
		
	else{
		return false;
		echo mysql_error();
		exit();
	}
	
}

function loadUserProfile($username){
		//load username and other informaiton into the session 
		//the user informaiton comes from the database
	$_SESSION["user"]=$username;
}
?>
