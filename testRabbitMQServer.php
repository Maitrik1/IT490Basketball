#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

function doLogin($userName,$userPass)
{

 
	$mydb = new mysqli('192.168.56.101','newuser','password','490DB');
	
	if ($mydb->errno != 0){
		echo "Failed to connect to database: ".$mydb->error.PHP_EOL;
		exit(0);
	}
	echo "<br><br>Successfully connected to database".PHP_EOL;
	// check password
	//
	$query = mysqli_query($mydb,"SELECT * FROM Users WHERE username = '$userName'");
	$count = mysqli_num_rows($query);
	//Check if credentials match the database
	if ($count == 1){
		$row = mysqli_fetch_array($query,MYSQLI_ASSOC);
		if (password_verify($userPass, $row['password'])){
		//Match	
		echo "<br><br>USERS CREDENTIALS VERIFIED";
		return true;
		}else{
		//No Match
		echo "<br><br>WHO THE FUCK ARE YOU";
		return false;
		}
	}else{
		echo "<br><br> Username or Password not found";
	}
   
    //return false if not valid
}

function requestProcessor($request)
{
  echo "received request".PHP_EOL;
  var_dump($request);
  if(!isset($request['type']))
  {
    return "ERROR: unsupported message type";
  }
  switch ($request['type'])
  {
    case "login":
      return doLogin($request['username'],$request['password']);
    case "validate_session":
      return doValidate($request['sessionId']);
      case "register":
	      return doRegister($request['username'],$request['password']);
  }

  return array("returnCode" => '0', 'message'=>"Server received request and processed");
}

function doRegister($userName,$userPass)
{
        //lookup username in database
	//Connect to DB
        $mydb = new mysqli('192.168.56.101','newuser','password','490DB');
        if ($mydb->errno != 0){
                echo "<br><br>Failed to connect to database: ".$mydb->error.PHP_EOL;
                exit(0);
        }
        echo "<br><br>Successfully connected to database".PHP_EOL;
	//Check is user already exists
        $query = mysqli_query($mydb,"SELECT * FROM Users WHERE username = '$userName' ");
        $count = mysqli_num_rows($query);
	//Check if credentials match the database....if there is a match then the user already has an account 
        if ($count == 1){
		//Credentials match existing database records
                echo "<br><br>YOU ALREADY HAVE AN ACCOUNT";
                return false;
        }else{
		//Create new user account if its unique
		$hashpass = password_hash($userPass, PASSWORD_DEFAULT); 
	        $query2 = mysqli_query($mydb,"INSERT INTO Users VALUES (NULL,'$userName', '$hashpass')");
                echo "<br><br>ACCOUNT HAS BEEN MADE";
                return true;
        }
        if ($mydb->errno !=0){
                echo "<br><br>Failed to execute query: ".PHP_EOL;
                echo __FILE__.':'.__LINE__.":error: ".$mydb->error.PHP_EOL;
                exit(0);
        }
}

$server = new rabbitMQServer("testRabbitMQ.ini","testServer");

echo "testRabbitMQServer BEGIN".PHP_EOL;
$server->process_requests('requestProcessor');
echo "testRabbitMQServer END".PHP_EOL;
exit();
?>

