// This file is used to establish a connection with the database

<?php

//include('errors.php');

//Error Reporting
error_reporting(E_ALL);
ini_set('display_errors', 'On');
ini_set('log_errors', 'On');
ini_set('error_log', '/home/testserver/git/rabbitmqphp_example/FrontEnd/Logs/errLog.txt');

//Connect to MySQL
function dbConnect()
{
	//Enter local database information
	$hostname  = "127.0.0.1";
	$username  = "peter";
	$password  = "Password12345$";
	$dbname    = "pktestdb";

	$conn = mysqli_connect($hostname, $username, $password, $dbname);

	if (!$conn)
	{
		echo "***Error connecting to database!!*** ".$conn->connect_errno.PHP_EOL;
		exit(1);
	}
	return $conn;
}
?>
