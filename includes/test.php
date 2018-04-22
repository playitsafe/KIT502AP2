<?php

include 'db_conn.php';

$query = "SELECT * FROM users1 WHERE uid = '11'";
$result=$mysqli->query($query);
$row = $result->fetch_assoc()['CreditCard'];
var_dump($row);

/*
include 'db_conn.php';

$queryNewBalance = "SELECT Balance FROM users WHERE uid = 'US1111'";
$getNewBalance = $mysqli->query($queryNewBalance);
$NewBalance = $mysqli->fetch_assoc()['Balance'];
var_dump($row);
*/