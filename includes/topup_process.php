<?php

session_start();

if (!isset($_SESSION['uid'])) {
	echo "<script>alert('You have to login to top up!!');parent.location.href='../login_page.php'</script>";
} else {
	if (isset($_POST['topup'])) {
		include 'db_conn.php';
		$uid = $_SESSION['uid'];
		$topupAmount = $mysqli->real_escape_string($_POST['topupvalue']);
		$creditno = $mysqli->real_escape_string($_POST['creditno']);
		$creditMonth = $mysqli->real_escape_string($_POST['creditMonth']);
		$creditYear = $mysqli->real_escape_string($_POST['creditYear']);
		$cvv = $mysqli->real_escape_string($_POST['cvv']);

		if (empty($creditno) || empty($creditMonth) || empty($creditYear) || empty($cvv)) {
			echo "<script>alert('All fields must fill out!!');parent.location.href='../top_up.php?creditno=error'</script>";
		} elseif (!is_numeric($creditno) || preg_match('/\./', $creditno) || 
			      !is_numeric($creditMonth) || preg_match('/\./', $creditMonth) ||
			      !is_numeric($creditYear) || preg_match('/\./', $creditYear) ||
			      !is_numeric($cvv) || preg_match('/\./', $cvv) || 
			      !(
			      	($creditMonth>="1") && ($creditYear>="1") && ($cvv>="0") && (strlen($cvv) == 3)
			      )
			  ) {
			echo "<script>alert('Wrong Credit Card Details');parent.location.href='../top_up.php'</script>";
		} else {
			$queryOriginBalance = "SELECT Balance FROM users WHERE uid = '$uid'";
            $getOriginBalance = $mysqli->query($queryOriginBalance);
            $originBalance = $getOriginBalance->fetch_assoc()['Balance'];
            $totalAmount = $originBalance + $topupAmount;

			$query = "UPDATE users SET Balance = '$totalAmount' WHERE uid = '$uid'";
            $mysqli->query($query);
            /*
            $queryNewBalance = "SELECT Balance FROM users WHERE uid = '$uid'";
            $getNewBalance = $mysqli->query($queryNewBalance);
            $NewBalance = $getNewBalance->fetch_assoc()['Balance'];
            $_SESSION['balance'] = $NewBalance;
            */
            echo "<script>alert('Top up Successfully!!');parent.location.href='../users_account_page.php'</script>";

		} //end of insert SQL clause



	}
}