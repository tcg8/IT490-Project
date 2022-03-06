//This file is used for user registration
<?php

include('webClient.php');
//include('errors.php');

//Error Reporting
error_reporting(E_ALL);
ini_set('display_errors', 'On');
ini_set('log_errors', 'On');
ini_set('error_log', '/home/testserver/git/rabbitmqphp_example/FrontEnd/Logs/errLog.txt');
?>

//Registration Page
<!DOCTYPE html>
<html>
	<head>
  		<title>League of Legends Registration</title>
  		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<div class="header">
			<h2>Register</h2>
		</div>
		<form method="post" action="register.php">
  			//<?php include('errors.php'); ?>
			<div class="input-group">
  	  			<label>Username</label>
  	  			<input type="text" name="username" placeholder="Enter username" required autofocus   autocomplete=off>
  			</div>
  			<div class="input-group">
  	  			<label>Email</label>
  	  			<input type="email" name="email" placeholder="Enter email" required autofocus   autocomplete=off>
  			</div>
  			<div class="input-group">
  	  			<label>Password</label>
  	  			<input type="password" name="password_1" placeholder="Password" required autofocus   autocomplete=off>
  			</div>
  			<div class="input-group">
  	  			<label>Confirm password</label>
  	  			<input type="password" name="password_2" placeholder="Re-type password" required autofocus   autocomplete=off>
  			</div>
			<div class="input-group">
  	  			<button type="submit" class="btn" name="reg_user">Register</button>
  			</div>
			<p>Already a member? <a href="login.php">Login</a></p>
		</form>
	</body>
</html>
