//This file is the client request processor for our webserver
#!/usr/bin/php
<?php
session_start();

//include('errors.php');

require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

error_reporting(E_ALL);
ini_set('display_errors', 'On');
ini_set('log_errors', 'On');
ini_set('error_log', '/home/testserver/git/rabbitmqphp_example/FrontEnd/Logs/leagueLog.txt');

$username = "";
$errors = array();

//Create RabbitMQ Client
$client = new rabbitMQClient("webRabbitMQ.ini","testServer");

if (isset($argv[1]))
{
	$msg = $argv[1];
}
else
{
	$msg = "test message";
}

//Login User
if (isset($_POST['login_user']))
{
	$request = array();
	$request['type']     = "Login";
	$request['username'] = $_POST["username"];
	$request['password'] = $_POST["password"];
	$request['message']  = $msg;

	$response = $client->send_request($request);
	//Check if username and password match
	if ($response==0)
	{
		array_push($errors, "Wrong username/password combination");
	}
	if ($response != null)
	{
		$_SESSION['username'] = $request['username'];
      		$_SESSION['success'] = "You are now logged in";
		$_SESSION['json'] = json_decode($response);
		//If successful redirect to profile page
		header('Location: profile.php');
		exit();
	}
}

//Register New User
if (isset($_POST['reg_user']))
{
	$request = array();
	$request['type']       = "Register";
	$request['username']   = $_POST["username"];
        $request['email']      = $_POST["email"];
	$request['password_1'] = $_POST["password_1"];
	$request['password_2'] = $_POST["password_2"];
	if ($request['password_1'] != $request['password_2'])
	{
		array_push($errors, "Passwords don't match");
	}
	else
	{
		$response = $client->send_request($request);
	}

	if ($response==1)
	{
		$_SESSION['username'] = $request['username'];
      		$_SESSION['success'] = "You are now logged in";
		//If successful redirect user to profile page
		header('Location: profile.php');
		exit();
	}
	else{ array_push($errors, "User already exists"); }
}
?>
