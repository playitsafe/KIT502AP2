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
	$uid = "CM" . $userid;
	$identity = 'CafeStaff';
	$roleset = 'Unallocated';

	if (empty($firstname) || empty($lastname) || empty($userid) || empty($md5password) ) {
		echo "<script>alert('Please fill out fields with *');parent.location.href='../staff_manage.php'</script>";
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

	    if (
	    	!is_numeric($userid) || preg_match('/\./', $userid) || 
	    	(!empty($mobile) && (!is_numeric($mobile) || preg_match('/\./', $mobile)))     	
	    ) {
	    	echo "<script>alert('ID Mobile must be Numbers!');parent.location.href='../staff_manage.php'</script>";
	    } elseif (
	               !empty($email) &&
	               !filter_var($email, FILTER_VALIDATE_EMAIL)
	               ) { //end of check number
	    	echo "<script>alert('Invalid Email!');parent.location.href='../staff_manage.php'</script>";
	    } elseif (strlen($password)<6 || strlen($password)>12) {
	    	echo "<script>alert('Password must be 6 to 12 characters in length');parent.location.href='../staff_manage.php'</script>";
	    } elseif ($password !== $_POST['repassword']) {
	    	echo "<script>alert('Passwords don\'t match');parent.location.href='../staff_manage.php'</script>";
	    } elseif (!(($c1 && $c2 && $c3) && ($c4 || $c5 || $c6 || $c7))) {
	    	echo "<script>alert('Invalid Password Format');parent.location.href='../staff_manage.php'</script>";
	    } else {
	    	$query = "SELECT * FROM users WHERE uid='$uid' OR Email='$email'";
		    $result = $mysqli->query($query);
            $resultCheck = $result->num_rows;
		    $row = $result->fetch_assoc();

		    if (empty($email)) {
		    	$query1 = "SELECT * FROM users WHERE uid='$uid'";
		        $result1 = $mysqli->query($query1);
                $resultCheck1 = $result1->num_rows;
		        $row1 = $result1->fetch_assoc();

		        if ($resultCheck1>=1) {

            	     echo "<script>alert('UID existed! Try another one!');parent.location.href='../staff_manage.php'</script>";
                } else {
            	//insert data to DB
                    $query = "INSERT INTO users (uid, FirstName, LastName, Email, Mobile, Password, Identity, RoleTag) VALUES ('$uid', '$firstname', '$lastname', '$email', '$mobile', '$md5password', '$identity', '$roleset')";
	    	        $result = $mysqli->query($query);
	    	        echo "<script>alert('Staff Created Successfully!');parent.location.href='../staff_manage.php'</script>";
                }


		    } else {//end of if empty email

		    	if ($resultCheck>=1) {

            	echo "<script>alert('UID or email existed! Try another one!');parent.location.href='../staff_manage.php'</script>";
            } else {
            	//insert data to DB
               $query = "INSERT INTO users (uid, FirstName, LastName, Email, Mobile, Password, Identity, RoleTag) VALUES ('$uid', '$firstname', '$lastname', '$email', '$mobile', '$md5password', '$identity', '$roleset')";
	    	   $result = $mysqli->query($query);
	    	   echo "<script>alert('Staff Created Successfully!');parent.location.href='../staff_manage.php'</script>";
             }

		    }//end of if else empty email

	    }

	}
}//This is end of if issetpost
