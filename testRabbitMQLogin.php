#!/usr/bin/php
<?php
session_start();
require_once('/home/it490/HoopSquad/Project-490/path.inc');
require_once('/home/it490/HoopSquad/Project-490/get_host_info.inc');
require_once('/home/it490/HoopSquad/Project-490/rabbitMQLib.inc');

$client = new rabbitMQClient("testRabbitMQ.ini","testServer");


if (isset($argv[1]))
{
  $msg = $argv[1];
}
else
{
  $msg = "Login Request";
}


$userName = $_POST["input_username"];
$userPass = $_POST["input_password"];

$request = array();
$request['type'] = "login";
$request['username'] = $userName;
$request['password'] = $userPass;
$request['message'] = $msg;
$response = $client->send_request($request);
//$response = $client->publish($request);

echo "Client received respone  ".PHP_EOL;
print_r($response);
echo "\n\n";

echo $argv[0]." END".PHP_EOL;


if($response == 1){
	$_SESSION["username"] = $_POST["input_username"];
	header("Location:index.php");
}else{
	header("Location:index.html");
}

?>
