<?php


include('db_conn.php'); 
//error_reporting(0);

$query1 = "SELECT * FROM lazenbyteam WHERE Role='Staff'";
$result1 = $mysqli->query($query1);
$query2 = "SELECT * FROM refteam WHERE Role='Staff'";
$result2 = $mysqli->query($query2);
$query3 = "SELECT * FROM tradetableteam WHERE Role='Staff'";
$result3 = $mysqli->query($query3);
$array1 = array();
$array2 = array();
$array3 = array();
	//$row1 = $result1->fetch_assoc();
	//$row2 = $result2->fetch_assoc();
	//$row3 = $result3->fetch_assoc();

while ($row1 = $result1->fetch_assoc()) {
	array_push($array1, $row1['Name']);
}

while ($row2 = $result2->fetch_assoc()) {
	array_push($array2, $row2['Name']);
}

while ($row3 = $result3->fetch_assoc()) {
	array_push($array3, $row3['Name']);
}
for ($index=0; isset($array1[$index])||isset($array2[$index])||isset($array3[$index]) ; $index++) { 
	echo $array1[$index]."+".$array2[$index]."+".$array3[$index]."<br>";
}
/*
foreach ($row1 as $key => $value) {
	echo $row1['Name']."+".$row2['Name']."+".$row3['Name']."<br>";
}

$result = $mysqli->query($query);
//$row = $result->fetch_array(MYSQLI_ASSOC);
$row1 = $result->fetch_assoc();
//$str = $row['uid'];
$str1 = $row1['uid'];
echo "$str1";
//var_dump($row);echo "<br>";
//var_dump($row1);echo "<br>";
//var_dump($str);echo "<br>";
//var_dump($str1);echo "<br>";



$row1 = $mysqli->query("SELECT * FROM lazenbyTeam WHERE Role='Staff'")->fetch_assoc();
$row2 = $mysqli->query("SELECT * FROM refTeam WHERE Role='Staff'")->fetch_assoc();
$row3 = $mysqli->query("SELECT * FROM tradetableteam WHERE Role='Staff'")->fetch_assoc();

while ( $row1 = $mysqli->query("SELECT * FROM lazenbyTeam WHERE Role='Staff'")->fetch_assoc()) {
	echo $row1['Name']."<br>";
}
*/
/*
while (
	($row1 = $mysqli->query("SELECT * FROM lazenbyTeam WHERE Role='Staff'")->fetch_assoc())&&
	($row2 = $mysqli->query("SELECT * FROM refTeam WHERE Role='Staff'")->fetch_assoc())&&
	($row3 = $mysqli->query("SELECT * FROM tradetableteam WHERE Role='Staff'")->fetch_assoc())

) {
	echo $row1['Name']."+".$row2['Name']."+".$row3['Name']."<br>";
    
}

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