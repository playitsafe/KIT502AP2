<?php

include('includes/db_conn.php');

$checkExist = $mysqli->query("SELECT id FROM users");

if (empty($checkExist)) {
	$query = "CREATE TABLE `users` (
	             `id` int(6) NOT NULL AUTO_INCREMENT,
	             `uid` varchar(10) NOT NULL,
	             `FirstName` varchar(11) NOT NULL,
	             `LastName` varchar(11) NOT NULL,
	             `Email` varchar(50) NOT NULL,
	             `Mobile` int(10) NOT NULL,
	             `CreditCard` int(16) NOT NULL,
	             `Password` varchar(11) NOT NULL,
	             `Identity` varchar(11) NOT NULL,
	             PRIMARY KEY (`id`)
	             )" ;
	$result = $mysqli->query($query);
}


if (isset($_POST['Join in!'])) {
	$query = "INSERT INTO users VALUES ('1', '1', 'sw', 'sws', 'email', '3232', '34324432432', 'cdscdfdsf', 'ident')";
    $result = $mysqli->query($query);
}