<?php
	//set up the connection variables
	$db_name = 'iLogdb';
	$hostname = '127.0.0.1';
	$username = 'root';
	$password = '';
	
	//connect to the database
	$dbh = new PDO("mysql:host=$hostname; dbname=$db_name", $username, $password);
	
	//a query to get all the records from the user table
	$sql = 'SELECT Issue, location, description, email FROM ilog_table';
	
	//use prepared statements, even if not strictly required is good practice
	$stmt = $dbh->prepare( $sql );
	
	//execute the query
	$stmt->execute();
	
	//fetch the results into an array
	$result = $stmt->fetchALL( PDO::FETCH_ASSOC );
	
	//convert to json
	$json = json_encode( $result );
	
	//echo the json stringe
	echo $json
	
	?>
	
