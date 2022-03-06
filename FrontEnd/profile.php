//This file is a landing platform for the user to do user stuff on the site
<?php

include('webClient.php');
//include('errors.php');

session_start();

//Error Reporting
error_reporting(E_ALL);
ini_set('display_errors', 'On');
ini_set('log_errors', 'On');
ini_set('error_log', '/home/testserver/git/rabbitmqphp_example/FrontEnd/Logs/errLog.txt');
?>

//Profile Page
<!DOCTYPE html>
<html>
	<head>
		<title>League of Legends Fantasy League Profile</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<h2>Create Your User Profile</h2>
		<form>
			<div class="input-group">
  	        		<button type="submit" class="btn" name="profile_user">Submit</button>
  			</div>
  			<p><a href="index.php?logout='1'" style="color: red;">Logout</a></p>
		</form>
		<h3>Test API Connection</h3>
	</body>
</html>
