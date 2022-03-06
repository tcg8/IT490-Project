#!/usr/bin/php
<?php

session_start();

require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
require_once('DBConnect.php');
require_once('DBFunctions.php');

//include('errors.php');

//Error Reporting
error_reporting(E_ALL);
ini_set('display_errors', 'Off');
ini_set('log_errors', 'On');
ini_set('error_log', '/home/db/git/rabbitmqphp_example/DB/Logs/errLog.txt');

function requestProcessor($request)
{
	echo "\n\n\nreceived request".PHP_EOL;
	echo $request['type'].PHP_EOL;
	var_dump($request);

	if(!isset($request['type']))
  	{
    		return array('message'=>"ERROR: unsupported message type");
  	}

	//What kind of message is needs to be processed?
	switch ($request['type'])
	{
    		//Login User
    		case "Login":
      			echo "\n*Type: Login\n";
      			$response_msg = doLogin($request['username'],$request['password']);
      			break;

    		//Register User
    		case "Register":
      			echo "\n*Type: Registration\n";
      			$response_msg = doRegister($request['username'],$request['email'],$request['password_1'],$request['password_2']);
      			break;

    		//Validate Session
    		case "validate_session":
      			$response_msg = doValidate($request['sessionId']);
      			break;
	}
	echo $response_msg;
	return $response_msg;
}

//Create new RabbitMQ Server
$server = new rabbitMQServer("DBRabbitMQ.ini","testServer");

echo "DBServer BEGIN".PHP_EOL;
$server->process_requests('requestProcessor');
echo "DBServer END".PHP_EOL;
exit();
?>
