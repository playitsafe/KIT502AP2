<?php


include('db_conn.php'); 


$query = "SELECT * FROM LazenbyTeam WHERE Role='Manager'";
$result = $mysqli->query($query);
$row = $result->fetch_array(MYSQLI_ASSOC);
$row1 = $result->fetch_assoc();
$str = $row['uid'];
//$str1 = $row1['uid'];
var_dump($row);echo "<br>";
//var_dump($row1);echo "<br>";
var_dump($str);echo "<br>";
//var_dump($str1);echo "<br>";




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