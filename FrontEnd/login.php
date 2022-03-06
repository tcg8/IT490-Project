//This file is used for user login
<?php

include('webClient.php');
//include('errors.php');

//Error Reporting
error_reporting(E_ALL);
ini_set('display_errors', 'On');
ini_set('log_errors', 'On');
ini_set('error_log', '/home/testserver/git/rabbitmqphp_example/FrontEnd/Logs/errLog.txt');
?>

//Login Page
<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<div class="header">
			<h2>League Login</h2>
		</div>

		<form method="post" action="login.php">
			<div class="input-group">
  				<label>Username</label>
  				<input type="text" name="username">
  			</div>
    			<div class="input-group">
  				<label>Password</label>
  				<input type="password" name="password">
  			</div>
			<div class="input-group">
  				<button type="submit" class="btn" name="login_user">Login</button>
  			</div>
			<p>Register new user <a href="register.php">Register</a></p>
		</form>
	</body>
</html>
