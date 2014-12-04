<?php
	
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
	

	$dataset = mysql_query(" Insert  INTO Points (QID, TID, Value) VALUES ('{$username}','{$password1}') ", $link);

	//$sql = "INSERT INTO MyGuests (firstname, lastname, email)
    //VALUES ('John', 'Doe', 'john@example.com')";


	$result = mysql_fetch_assoc($dataset);
	echo "alert($result)";
	   

	
?>