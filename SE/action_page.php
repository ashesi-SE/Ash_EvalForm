<?php
 	session_start();

	include_once 'dbconnect.php';

	if(isset($_REQUEST["register"])){
		register_admin();
	}
	else if (isset($_REQUEST["login"])) {
		login();
	}
	else if (isset($_REQUEST["course"])){
		newCourse();
	}
	else if(isset($_REQUEST["getcour"])){
		getCourses();
	}
	else if(isset($_REQUEST["team_cour"])){
		saveTeams();
	}
	elseif(isset($_REQUEST["question_courid"])){
		saveQuestions();
	}
	elseif(isset($_REQUEST["cid"])){
		getQuestions();
	}
	elseif(isset($_REQUEST["delete_id"])){
		deleteCourse();
	}
	elseif(isset($_REQUEST["courseid"])){
		getTeams();
	}

	function register_admin(){
		$fullname  = $_REQUEST["fullname"];
		$username = $_REQUEST["username"];
		$email = $_REQUEST["email"];
		$password = $_REQUEST["password"];

		$db = new DbConnect();

		$query = "INSERT INTO administrators(fullname, username, email, password) VALUES('$fullname', '$username', '$email', '$password')";
		$result = mysql_query($query) or die(mysql_error());
		
		if($result == 1){
			header("location:./index.php");
		}
	}

	function login(){
		$username = $_REQUEST["username"];
		$password = $_REQUEST["password"];
		//$e_password = md5($password);
		//echo "Got password and username";

		$db = new DbConnect();

		$query = "SELECT id, fullname, username, email, password FROM administrators WHERE username='$username' AND password='$password'";
		$result = mysql_query($query) or die(mysql_error());
		$num_rows = mysql_num_rows($result);
		$info = mysql_fetch_assoc($result);

		//echo "Got result";
		if($result){
			if($num_rows > 0){
				//echo "session_stuuf";
				session_start();
				$_SESSION['login'] = "1";
				$_SESSION['id'] = $info["id"];
				$_SESSION['fullname'] = $info["fullname"];
				$_SESSION['username'] = $info["username"];
				$_SESSION['email'] = $info["email"];

				header("Location: home.php");
			}
			else{
				?>
				<script> alert("Account Details Inaccurate. Please try again or sign up"); </script>
				<?php
			}
		}

	}

	function newCourse(){
		$course_name = $_REQUEST["course_name"];
		$course_number = $_REQUEST["course_number"];
		$num_teams = $_REQUEST["num_teams"];
		$lecturer_id = $_SESSION['id'];
		$fi_email = $_REQUEST["fi_email"];
		$semester = $_REQUEST["semester"];
		$year = $_REQUEST["year"];
		$description = $_REQUEST["description"];
		$num_teams = $_REQUEST["num_teams"];
		

		$db = new DbConnect();
		$query = "INSERT INTO courses(name, course_number, num_of_teams, lecturer_id, fi_email, semester, year, description)  VALUES('$course_name', '$course_number', '$num_teams', '$lecturer_id', '$fi_email', '$semester', '$year', '$description')";
		$result = mysql_query($query) or die(mysql_error());

		if($result == 1){
			//echo "Course Added Successfully";
			header('Location: home.php');
		}
	}

	function getCourses(){
		$db = new Dbconnect();

		$response = array();
		$response["courses"] = array();
		$lec_id = $_SESSION['id'];
		$result = mysql_query("SELECT id, name, num_of_teams, semester, year, questionsset FROM courses WHERE lecturer_id = $lec_id");
		while($row = mysql_fetch_array($result)){
			$tmp = array();
			$tmp["id"] = $row["id"];
			$tmp["name"] = $row["name"];
			$tmp["num_of_teams"] = $row["num_of_teams"];
			$tmp["semester"] = $row["semester"];
			$tmp["year"] = $row["year"];
			$tmp["questionsset"] = $row["questionsset"];

			array_push($response["courses"], $tmp);
		}

		header('Content-Type: application/json');

		echo json_encode($response);
	}

	function getTeams(){
		$db = new Dbconnect();

		$response = array();
		$response["teams"] = array();
		$course_id = $_SESSION['courseid'];
		$result = mysql_query("SELECT id, name, project_description, team_members FROM teams WHERE course_id = $course_id");
		while($row = mysql_fetch_array($result)){
			$tmp = array();
			$tmp["id"] = $row["id"];
			$tmp["name"] = $row["name"];
			$tmp["project_description"] = $row["project_description"];
			$tmp["team_members"] = $row["team_members"];

			array_push($response["teams"], $tmp);
		}

		header('Content-Type: application/json');

		echo json_encode($response);
	}

	function saveTeams(){
		$db = new Dbconnect();

		$num_teams = $_REQUEST["saveteams"];
		$course_id = $_REQUEST["team_cour"];
		$count = 0;

		for($i = 1; $i <= $num_teams; $i++){
			$team_name = $_POST["team_name$i"];
			$description = $_POST["description$i"];
			$team_members = $_POST["members$i"];

			$query = "INSERT INTO teams(name, course_id, project_description, team_members) VALUES('$team_name', '$course_id', '$description', '$team_members')";
			$result = mysql_query($query) or die(mysql_error());
			$count = $count + $result;
		}

		if($count == $num_teams){
			//echo "Teams Added Successfully";
			header("Location: home.php");
		}
		else{
			//echo "Unable to save teams";
			header("Location: teams.php?courseid=$course_id&num_teams=$num_teams");
		}
	}

	function saveQuestions(){
		$db = new Dbconnect();

		$course_id = intval($_REQUEST["question_courid"]);
		$num_questions = $_REQUEST["numquestions"];

		$questionType = "questionType";
		$prompt = "prompt";

		$questions_array = array();
		$temp = array();

		for($i = 1; $i <= $num_questions; $i++){
			${$questionType.$i} = $_POST["questionType$i"];
			${$prompt.$i} = $_POST["prompt$i"];

			$json['type'] = ${$questionType.$i};
			$json['prompt'] = ${$prompt.$i};
			array_push($temp, $json);
		}

		$questions_array = json_encode($temp);

		$query = "UPDATE courses SET questions='$questions_array', questionsset = 1  WHERE id = $course_id";
		
		$result = mysql_query($query) or die(mysql_error());
		//echo $result;
		header("Location: home.php");
	}

	function deleteCourse(){
		$db = new Dbconnect();
		$course_id = intval($_REQUEST["delete_id"]);

		$query = "DELETE FROM courses WHERE id = $course_id";
		$result = mysql_query($query) or die(mysql_error());
		if($result == 1){
			header("Location: home.php");
		}
	}

	function getQuestions(){
		$db = new Dbconnect();
		$course_id = intval($_REQUEST["cid"]);

		$result = mysql_query("SELECT questions FROM courses WHERE id = $course_id");

		while($row = mysql_fetch_array($result)){
			$tmp = $row["questions"];
		}
		header('Content-Type: application/json');
		echo $tmp;
	}

 ?>