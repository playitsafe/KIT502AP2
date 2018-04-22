<?php

include 'db_conn.php';

$checkExist = $mysqli->query("SELECT id FROM users");

if (empty($checkExist)) {
	$query = "CREATE TABLE `users` (
	             `id` int(6) NOT NULL AUTO_INCREMENT,
	             `uid` varchar(10) NOT NULL,
	             `FirstName` varchar(11) NOT NULL,
	             `LastName` varchar(11) NOT NULL,
	             `Email` varchar(50) NOT NULL,
	             `Mobile` varchar(10) NOT NULL DEFAULT '',
	             `CreditCard` varchar(16) NOT NULL DEFAULT '',
	             `Password` varchar(50) NOT NULL,
	             `Identity` varchar(11) NOT NULL,
	             `RoleTag` varchar(11) NOT NULL DEFAULT 'Customer',
	             `Balance` DECIMAL(8,2) NOT NULL DEFAULT '0.00',
	             PRIMARY KEY (`id`)
	             )" ;
	$result = $mysqli->query($query);
}


if (isset($_POST['create'])) {
	$firstname = $mysqli->real_escape_string($_POST['firstname']);
	$lastname = $mysqli->real_escape_string($_POST['lastname']);	
	$userid = $mysqli->real_escape_string($_POST['userid']);
	$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);	
	$mobile = $mysqli->real_escape_string($_POST['mobile']);
	
	$password = $mysqli->real_escape_string($_POST['password']);
	$md5password = md5($password);
	$uid = $_POST['idtype'] . $userid;

	if (empty($firstname) || empty($lastname) || empty($userid) || empty($email) || empty($mobile) || empty($creditcrad) || empty($md5password) ) {
		echo "<script>alert('All Fields need to be filled out!!');parent.location.href='../registration.php'</script>";
    	exit();
	} else { //end of empty clause
		//define RegExp for password validation
		$c1 = preg_match('/[0-9]/', $password);
        $c2 = preg_match('/[a-z]/', $password);
        $c3 = preg_match('/[A-Z]/', $password);
        $c4 = preg_match('/@/', $password);
        $c5 = preg_match('/~/', $password);
        $c6 = preg_match('/\$/', $password);
        $c7 = preg_match('/!/', $password);

	    if (!is_numeric($userid) || preg_match('/\./', $userid) || !is_numeric($mobile) || preg_match('/\./', $mobile) ||!is_numeric($creditcrad) || preg_match('/\./', $creditcrad)) {
	    	echo "<script>alert('Invalid ID, Mobile or CreditCard Number!');parent.location.href='../registration.php'</script>";
	    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) { //end of check number
	    	echo "<script>alert('Invalid Email!');parent.location.href='../registration.php'</script>";
	    } elseif (strlen($password)<6 || strlen($password)>12) {
	    	echo "<script>alert('Password must be 6 to 12 characters in length');parent.location.href='../registration.php'</script>";
	    } elseif ($password !== $_POST['repassword']) {
	    	echo "<script>alert('Passwords don\'t match');parent.location.href='../registration.php'</script>";
	    } elseif (!(($c1 && $c2 && $c3) && ($c4 || $c5 || $c6 || $c7))) {
	    	echo "<script>alert('Invalid Password Format');parent.location.href='../registration.php'</script>";
	    } else {
	    	$query = "SELECT * FROM users WHERE uid='$uid' OR Email='$email'";
		    $result = $mysqli->query($query);
            $resultCheck = $result->num_rows;
		    $row = $result->fetch_assoc();
            
            if ($resultCheck>=1) {
            	echo "<script>alert('UID or email existed! Try another one!');parent.location.href='../registration.php'</script>";
            } else {
            	//insert data to DB
            	if ($_POST['idtype'] == 'US') {
	    		$identity = 'Student';
	    	   } elseif ($_POST['idtype'] == 'UE') {
                $identity = 'Employee';
	    	   }

	    	   $query = "INSERT INTO users (uid, FirstName, LastName, Email, Mobile, CreditCard, Password, Identity) VALUES ('$uid', '$firstname', '$lastname', '$email', '$mobile', '$creditcrad', '$md5password', '$identity')";
	    	   $result = $mysqli->query($query);
	    	   echo "<script>alert('Sign Up Successful! Please login!');parent.location.href='../login_page.php'</script>";
             }
	    	
	    }

	}
}//This is end of if issetpost
