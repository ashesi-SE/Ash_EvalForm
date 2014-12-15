<?php 
	echo "hey what's up";
	/*include_once './dbconnect.php';
	echo "I was here";

	if(isset($_REQUEST["register"])){
		register_admin();
	}
	else if(isset($_REQUEST["login"])) {
		echo "I am here";
		login();
	}

	function register_admin(){
		$fullname  = $_REQUEST["fullname"];
		$username = $_REQUEST["username"];
		$email = $_REQUEST["email"];
		$password = $_REQUEST["password"];
		//$e_password = md5($password);
		//console.log($e_password);

		$db = new DbConnect();

		$query = "INSERT INTO administrators(fullname, username, email, password) VALUES('$fullname', '$username', '$email', '$password')";
		$result = mysql_query($query) or die(mysql_error());
		
		if($result == 1){
			?>
			<script> alert("Sign Up Successful"); </script>
			<?php
			header("location:./index.php");
		}
	}

	function login(){
		$username = $_REQUEST["username"];
		$password = $_REQUEST["password"];
		echo $username;
		echo $password;
		//$e_password = md5($password);
		echo "Got password and username";

		$query = "SELECT id, fullname, username, email, password FROM administrators WHERE username='$username' AND password='$password'";
		$result = mysql_query($query) or die(mysql_error());
		$num_rows = mysql_num_rows($result);
		$info = mysql_fetch_assoc($result);

		echo "Got result";
		if($result == 1){
			if($num_rows > 0){
				session_start();
				$_SESSION['id'] = $info["id"];
				$_SESSION['fullname'] = $info["fullname"];
				$_SESSION['username'] = $info["username"];
				$_SESSION['email'] = $info["email"];

				header("Location: home.html");
			}
			else{
				?>
					<script> alert("Account Details Inaccurate. Please try again or sign up"); </script>
				<?php
			}
		}

	}*/

 ?>