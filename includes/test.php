<?php

include 'db_conn.php';

$queryNewBalance = "SELECT Balance FROM users WHERE uid = 'US1111'";
$result=$mysqli->query($queryNewBalance);
$row = $result->fetch_assoc()['Balance'];
var_dump($row);

/*
include 'db_conn.php';

$queryNewBalance = "SELECT Balance FROM users WHERE uid = 'US1111'";
$getNewBalance = $mysqli->query($queryNewBalance);
$NewBalance = $mysqli->fetch_assoc()['Balance'];
var_dump($row);
*/