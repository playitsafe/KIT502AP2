<?php

session_start();
if (!isset($_SESSION['uid'])) {
	echo "<script>alert('You haven\'t Logged In!You have to login to proceed!');parent.location.href='../login_page.php?login=error'</script>";
	    
} else {

	include 'db_conn.php';
	

	if (isset($_POST['update'])) {
		$firstname = $mysqli->real_escape_string($_POST['firstname']);
	    $lastname = $mysqli->real_escape_string($_POST['lastname']);
	    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
	    $mobile = $mysqli->real_escape_string($_POST['mobile']);
	    $creditcrad = $mysqli->real_escape_string($_POST['creditcrad']);
	    $password = $mysqli->real_escape_string($_POST['password']);
	    $md5password = md5($password);


		if (empty($firstname) || empty($lastname) || empty($email) || empty($mobile) || empty($creditcrad) || empty($md5password)) {
			echo "<script>alert('All Fields need to be filled out!!');parent.location.href='account_update_process.php'</script>";
		} else {
			$c1 = preg_match('/[0-9]/', $password);
            $c2 = preg_match('/[a-z]/', $password);
            $c3 = preg_match('/[A-Z]/', $password);
            $c4 = preg_match('/@/', $password);
            $c5 = preg_match('/~/', $password);
            $c6 = preg_match('/\$/', $password);
            $c7 = preg_match('/!/', $password);

            if (!is_numeric($mobile) || preg_match('/\./', $mobile) ||!is_numeric($creditcrad) || preg_match('/\./', $creditcrad)) {
	    	echo "<script>alert('Invalid Mobile or CreditCard Number!');parent.location.href='../users_account_page.php'</script>";
	           } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) { //end of check number
	    	      echo "<script>alert('Invalid Email!');parent.location.href='../users_account_page.php'</script>";
	           } elseif (strlen($password)<6 || strlen($password)>12) {
	    	      echo "<script>alert('Password must be 6 to 12 characters in length');parent.location.href='../users_account_page.php'</script>";
	           } elseif ($password !== $_POST['repassword']) {
	    	      echo "<script>alert('Passwords don\'t match');parent.location.href='../users_account_page.php'</script>";
	           } elseif (!(($c1 && $c2 && $c3) && ($c4 || $c5 || $c6 || $c7))) {
	    	      echo "<script>alert('Invalid Password Format');parent.location.href='../users_account_page.php'</script>";
	           } else {
	           	//update DB
	           	$uid = $_SESSION['uid'];
	           	$query = "UPDATE users SET FirstName = '$firstname', 
                                           LastName = '$lastname', 
                                           Email = '$email', 
                                           Mobile = '$mobile', 
                                           CreditCard = '$creditcrad', 
                                           Password = '$md5password' 
                                           WHERE uid = '$uid';" ;
                $result = $mysqli->query($query);

                /*
                $queryNewInfo = "SELECT * FROM users WHERE uid = '$uid'";
                $getNewInfo = $mysqli->query($queryNewInfo);
                $newInfo = $getNewInfo->fetch_assoc();
                
                $_SESSION['firstname'] = $newInfo['FirstName'];
                $_SESSION['lastname'] = $newInfo['LastName'];
                $_SESSION['email'] = $newInfo['Email'];
                $_SESSION['mobile'] = $newInfo['Mobile'];
                */

                echo "<script>alert('Update Successfully!');parent.location.href='../users_account_page.php'</script>";


	           }
			


		}
	} //end of isset POST



} //end of if isset session