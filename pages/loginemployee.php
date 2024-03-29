<?php
   session_start();
   include_once "../includes/databasehandler-include.php"
?>
<!DOCTYPE html>
<html>
<head>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<title>Login Page</title>
	<!--Made with love by Mutiullah Samim -->

	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	
	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href= "../css/login.css">
	<link rel="stylesheet" type="text/css" href= "../css/reset.css">
	<link rel="icon" type="image/png" href="../../images/favicon.png">
</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Sign In</h3>
				<div class="d-flex justify-content-end social_icon">
					<span><i class="fab fa-facebook-square"></i></span>
					<span><i class="fab fa-google-plus-square"></i></span>
					<span><i class="fab fa-twitter-square"></i></span>
				</div>
			</div>
			<div class="card-body">
				<!-- form -->
				<form action="../includes/login-include.php" method="Post">
					<!-- login input --> 
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
							<input type="text" class="form-control" placeholder="Email" name="Employee_Email">
					</div>
					<!-- password -->
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
							<input type="password" class="form-control" placeholder="Password" name="Employee_Password">
					</div>
					<div style="margin: 15px;" class="row align-items-center remember">
						<!-- <input type="checkbox">&nbsp Remember Me -->
					</div>
					<div class="form-group">
						<input name="submitemployee" type="submit" value="submit" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			<div style='margin-bottom: 25px;' class="d-flex justify-content-center links">
					Just want to visit the website?<a href="../index.php">&nbsp Click here</a>
				</div>
		</div>
	</div>
</div>
</body>
</html>