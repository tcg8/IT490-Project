<?php

session_start();

error_reporting(E_ALL);
ini_set('display_errors', 'On');
ini_set('log_errors', 'On');
ini_set('error_log', '/home/testserver/git/rabbitmqphp_example/FrontEnd/Logs/errLog.txt');

ob_start();
//Check if user is already logged in
if (!isset($_SESSION['username']))
{
  	$_SESSION['msg'] = "You must log in first!";
  	header('location: login.php');
	//exit();
}

//Logout user
if (isset($_GET['logout'])) 
{
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
	//exit();
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>


<div class="header">
	<h2>League of Legends Fantasy League</h2>
</div>
<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php
          	echo $_SESSION['success'];
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
	    <?php $username = $_SESSION['username']; ?>
	    <?php $user = $_SESSION['json']; ?>

		<p><br>Hello, <?php echo $user->{'username'}; ?></p><br>

		<p> <a href="index.php?logout='1'" style="color: red;">Logout</a> </p>

    <?php endif ?>
</div>

</body>
</html>
