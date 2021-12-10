#!/usr/bin/php
<?php
$ip = "192.168.56.101";
$name = "newuser";
$password = "password";
$dbname = "490DB";
#$mydb =  new mysqli($ip,$name,$password,$dbname);
$mydb = new mysqli("192.168.56.101","newuser","password","490DB");

if ($mydb->errno != 0){
	echo "Failed to connect to database: ".$mydb->error.PHP_EOL;
	exit(0);
}
echo "<br><br>Successfully connected to database".PHP_EOL;
$query = mysqli_query($mydb,"INSERT INTO Users VALUES (NULL,'test1','password')");

?>
