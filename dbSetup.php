<?php

/**
 * Created by PhpStorm.
 * User: hrtejada
 * Date: 5/25/2016
 * Time: 2:18 PM
 */

$servername = "127.0.0.1";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE mobile_survey";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

$conn->select_db("mobile_survey");

$userTableQuery="CREATE TABLE `user` (
	`UserID` INT(11) NOT NULL AUTO_INCREMENT,
	`UserName` VARCHAR(100) NOT NULL,
	`UserEmail` VARCHAR(100) NOT NULL,
	PRIMARY KEY (`UserID`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=4
;";

$result = $conn->query($userTableQuery);

if(!$result) die($connection->error);
else
    echo "Creation of DB and User Table successful.";



$conn->close();
?>