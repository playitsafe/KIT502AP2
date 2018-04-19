<?php
session_start();

if (isset($_POST['loginSubmit'])) {
	
	include 'db_conn.php';
    $loginId = $mysqli->real_escape_string($_POST['username']);
    //$loginpassword = $mysqli->real_escape_string($_POST['loginPassword']);
    //$md5loginpassword = md5($loginpassword);
    $md5loginpassword = md5($_POST['loginPassword']);

	if (empty($loginId) || empty($_POST['loginPassword'])) {
		echo "<script>alert('All fields must fill out!!');parent.location.href='index.php?login=empty'</script>";
	} else {
		$query = "SELECT * FROM users WHERE uid='$loginId' OR Email='$loginId'";
		$result = $mysqli->query($query);
		$resultCheck = $result->num_rows;
		$row = $result->fetch_assoc();
		//$p = $row['Password'];

		if ($resultCheck < 1) {
			echo "<script>alert('The user doesn\'t exist!');parent.location.href='index.php?login=error'</script>";
		} elseif ($md5loginpassword !== $row['Password']) {
			   echo "<script>alert('Wrong Password!');parent.location.href='index.php?login=error'</script>";			   
			} else {
				    $_SESSION['uid'] = $row['uid'];
                    $_SESSION['firstname'] = $row['FirstName'];
                    $_SESSION['lastname'] = $row['LastName'];
                    $_SESSION['email'] = $row['Email'];
                    $_SESSION['mobile'] = $row['Mobile'];
                    $_SESSION['creditcard'] = $row['CreditCard'];
                    $_SESSION['identity'] = $row['Identity'];
                    //echo $_SESSION['uid'];
                    header("Location: index.php?login=success");
                    //exit(); 
			}
		}

	}// end of isset