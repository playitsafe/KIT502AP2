<?php

session_start();

if (!isset($_SESSION['uid'])) {
	echo "<script>alert('You have to login to top up!!');parent.location.href='../login_page.php'</script>";
} else {
	if (isset($_POST['topup'])) {
		include 'db_conn.php';
		$topupAmount = $mysqli->real_escape_string($_POST['topupvalue']);
		$creditno = $mysqli->real_escape_string($_POST['creditno']);
		$creditMonth = $mysqli->real_escape_string($_POST['creditMonth']);
		$creditYear = $mysqli->real_escape_string($_POST['creditYear']);
		$cvv = $mysqli->real_escape_string($_POST['cvv']);

		if (empty($creditno) || empty($creditMonth) || empty($creditYear) || empty($cvv)) {
			echo "<script>alert('All fields must fill out!!');parent.location.href='login_page.php?login=empty'</script>";
		}



	}
}