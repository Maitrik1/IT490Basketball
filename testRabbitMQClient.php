#!/usr/bin/php
<?php
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
  $msg = "test message";
}

$userName = $_POST["input_user"];
$userPass = $_POST["input_pass"];

$request = array();
$request['type'] = "register";
$request['username'] = $userName;
$request['password'] = $userPass;
$request['message'] = $msg;
$response = $client->send_request($request);
//$response = $client->publish($request);

echo "client received response: ".PHP_EOL;
print_r($response);
echo "\n\n";

echo $argv[0]." END".PHP_EOL;



if($response == true){
	
	header("Location:index.html");

}else{
	header("Location:register.html");
}

?>





