#!/usr/bin/php
<?php


require_once('rabbit/path.inc');
require_once('rabbit/get_host_info.inc');
require_once('rabbit/rabbitMQLib.inc');

//send error with rabbit
function send_error($error)
{
	$client = new rabbitMQClient("errorReporting.ini", "errorReporting");
	$request = array();
	$request['type'] = "Error";
	$request['page'] = "backend";
	$request['message'] = $error;
	$response = $client->publish($request);
	exit("sent error");
}

function send_sql_query_to_databse($has_params, $query, $query_args)
{
	try {
		require("config.php");
		$connection_string = "mysql:host=$dbhost;dbname=$dbdatabase;charset=utf8mb4";
		$db = new PDO($connection_string, $dbuser, $dbpass);
		if ($has_params) {

			$stmt = $db->prepare($query);
			$stmt->execute($query_args);
			//throw exception with the shit
			if ($stmt->errorCode() != "00000") {
				$error = $stmt->errorInfo();
				throw new Exception($error[2]);
			}
		} else {
			$stmt = $db->prepare($query);
			$stmt->execute();
			//throw exception with the shit
			if ($stmt->errorCode() != "00000") {
				$error = $stmt->errorInfo();
				throw new Exception($error[2]);
			}
		}
		$result = $stmt->fetchAll();
		//if result is empty, return false
		if (empty($result)) {
			return false;
		} else {
			return $result;
		}
	} catch (Exception $e) {
		//echo the error out to stdout
		echo $e->getMessage();
		//send the error
		send_error(strval($e->getMessage()));
		exit("send error\n");
	}
}


// showing all friends 

function show_team($cookie)
{
	$response = array();
	try {
		$stmt = "SELECT t1.fname, t1.lname, t1.id, t1.email FROM users t1 LEFT JOIN team t2 ON t2.team_id = t1.id WHERE t2.team_id = t1.id AND t2.user_id = :cookie";
		$params = array(":cookie" => $cookie);
		$result = send_sql_query_to_databse(true, $stmt, $params);
		if (!empty($result)) {
			$response["success"] = true;

			$response["friends"] = $result;
			return $response;
		} else {
			$response["success"] = false;
			return $response;
		}
	} catch (Exception $e) {
		//echo the error out to stdout
		echo $e->getMessage();
		//send the error
		send_error(strval($e->getMessage()));
		$response["success"] = false;
		return $response;
		exit("send error\n");
	}
}

// showind data that is not in friend list 

function no_team($cookie)
{
	$response = array();
	try {
		$stmt = "SELECT  e.id, e.fname, e.lname FROM    users e WHERE   NOT EXISTS( SELECT  *  FROM    team d WHERE   d.team_id = e.id AND d.user_id = :cookie )";
		$params = array(":cookie" => $cookie);
		$result = send_sql_query_to_databse(true, $stmt, $params);
		if (!empty($result)) {
			$response["success"] = true;

			$response["friends"] = $result;
			return $response;
		} else {
			$response["success"] = false;
			return $response;
		}
	} catch (Exception $e) {
		//echo the error out to stdout
		echo $e->getMessage();
		//send the error
		send_error(strval($e->getMessage()));
		$response["success"] = false;
		return $response;
		exit("send error\n");
	}
}


// creating friends 

function create_team($user_id, $friend_id)
{
	$response = array();
	try {
		//this is a 13 character thing; alphanumeric
		$response["cookie"] = uniqid();
		//create some cool id
		$id = md5(uniqid(rand(), true));
		//prepare database variables
		$stmt = "INSERT INTO friends ( user_id, friend_id ) VALUES ( :user_id, :friend_id )";
		$params = array(
			":user_id" => $user_id,
			":friend_id" => $friend_id

		);
		//send to database
		send_sql_query_to_databse(true, $stmt, $params);
		//make the response true and send to frontend
		$response["success"] = true;
		//return the response to the server
		return $response;
	} catch (Exception $e) {
		//echo the error out to stdout
		echo $e->getMessage();
		//send the error
		send_error(strval($e->getMessage()));
		$response["success"] = false;
		return $response;
		exit("send error\n");
	}
}

// 
function request_processor($req)
{
	// echo var_dump($req);
	try {
		//Handle message type
		$type = $req['type'];
		switch ($type) {
				//showing all team 
			case "show_team":
				return show_team($req['session_id']);
				// creating new team 
			case "create_friends":
				return create_friends($req['session_id'], $req['friend_id']);
				// all other peoples that are not our team member 
			case "no_team":
				return no_team($req['session_id']);
		}
	} catch (Exception $e) {
		//echo the error out to stdout
		echo $e->getMessage();
		//send the error
		send_error(strval($e->getMessage()));
		exit("send error\n");
	}
}

$server = new rabbitMQServer("testRabbitMQ.ini", "frontbackcomms");

echo "Rabbit MQ Server Start" . PHP_EOL;
$server->process_requests('request_processor');
echo "Rabbit MQ Server Stop" . PHP_EOL;
exit();
?>