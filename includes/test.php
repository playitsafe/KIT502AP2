<?php


$str = "abcd1111";
$str1 = substr($str, 0, 2);

echo "$str1";

/*
include 'db_conn.php';



$checkShopTeam = $mysqli->query("SELECT id FROM lazenby");
if (empty($checkShopTeam)) {
	echo "empty";

} else {
	echo "nono";
}
*/

/*
include 'db_conn.php';

$queryNewBalance = "SELECT Balance FROM users WHERE uid = 'US1111'";
$getNewBalance = $mysqli->query($queryNewBalance);
$NewBalance = $mysqli->fetch_assoc()['Balance'];
var_dump($row);
*/