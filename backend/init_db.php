<?php
require "config.php";

$dsn = "mysql:host=localhost;dbname=Hoop Squad;charset=UTF8";

try {
    $pdo = new PDO($dsn,$user,$pass);

    if($pdo){
        echo "Connected to the database successfully";
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}

?>