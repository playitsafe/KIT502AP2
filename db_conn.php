<?php
/*
$conn = mysqli_connect('localhost', 'root', '', 'szhang21');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
*/
$mysqli = new mysqli('localhost', 'root', '', 'szhang21');

if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_errno());
	exit();
}
