<!DOCTYPE html>


<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sign Up</title>
	<!-- Bootstrap Core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="assets/css/custom.css" rel="stylesheet">
     <!-- Custom Fonts -->
    <link href="assets/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>
		<div class="container">
	    <div class="row vertical-offset-100">
	    	<div class="col-md-4 col-md-offset-4">
	    		<!-- <img src = "assets/img/Ashesi_Logo_Black_1.png" alt = "Ashesi Logo" align = "center"></img> -->
	    		<div class="panel panel-default">
				  	<div class="panel-heading">
				    	<h3 class="panel-title" align="center">Virtual Evaluation Form</h3>
				 	</div>
				  	<div class="panel-body">
				    	<form action="action_page.php?register" method="POST" id="signupForm">
	                    <fieldset>
							<div class="form-group">
				    		    <input id = "fullname" class="form-control" placeholder="Full Name" name="fullname" type="text" required/>
				    		</div>
				    	  	<div class="form-group">
				    		    <input id = "email" class="form-control" placeholder="Email" name="email" type="email" required/>
				    		</div>
				    	  	<div class="form-group">
				    		    <input id = "username" class="form-control" placeholder="Username" name="username" type="text" required/>
				    		</div>
				    		<div class="form-group">
				    			<input id= "password" class="form-control" placeholder="Password" name="password" type="password"  required/>
				    		</div>
				    		<div class="form-group">
				    			<input id = "confirm_password" class="form-control" placeholder="Confirm Password" name="confirm_password" type="password" required/>
				    		</div>
				    		<input class="btn btn-lg btn-success btn-block" type="submit" name = "submit" value="Register">
				    		
				    	</fieldset>
				      	</form>
				    </div>
				</div>
			</div>
		</div>
	</div>

	<script src="bower_components/jquery/dist/jquery.min.js"></script> 

	<script src="bower_components/jquery-validation/dist/jquery.validate.js"></script> 

	<script src="assets/scripts/script.js"></script> 

	<script>
		addEventListener('load', prettyPrint, false);
			$(document).ready(function(){
			$('pre').addClass('prettyprint linenums');
		});
	</script>
</body>
</html>
