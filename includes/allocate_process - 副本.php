<?php

include 'db_conn.php';



if (isset($_POST['submitAllocate'])) {
	
    $allocateUid = $mysqli->real_escape_string($_POST['allocateUid']);

	if (empty($allocateUid)) {
		echo "<script>alert('Please input an uid!!');parent.location.href='../staff_manage.php'</script>";
	} else {
		$shopname = $_POST['shopList'];
		$checkShopTeam = $mysqli->query("SELECT id FROM $shopname");
		if (empty($checkShopTeam)) {
			$queryCreate = "CREATE TABLE `$shopname` (
	             `id` int(5) NOT NULL AUTO_INCREMENT,
	             `uid` varchar(10) NOT NULL,
	             `Name` varchar(30) NOT NULL,	             
	             `Role` varchar(30) NOT NULL,	             
	             PRIMARY KEY (`id`)
	             )" ;
	        $createResult = $mysqli->query($queryCreate);

// Check if the input uid even existed or not
	        $query1 = "SELECT * FROM users WHERE uid='$allocateUid'";
	        $result1 = $mysqli->query($query1);
	        $resultCheck1 = $result1->num_rows;
	        $row1 = $result1->fetch_assoc();

	        if ($resultCheck1 < 1) { //user not even existed
	        	echo "<script>alert('UID doesnt existed! Try another one!');parent.location.href='../staff_manage.php'</script>";
	        } else { //users existed in shop database
	        	$query2 = "SELECT * FROM $shopname WHERE uid='$allocateUid'";
	        	$result2 = $mysqli->query($query2);
                $resultCheck2 = $result2->num_rows;
		        $row2 = $result2->fetch_assoc();
	        	//$queryConcatName = "SELECT CONCAT(FirstName, ' ', LastName FROM users WHERE )";
	        	if ($resultCheck2>=1) {//if user already in shop
	        		if ($row2['Role'] == 'Manager') {//user already is manager
	        			echo "<script>alert('The User has alread been the manager of this shop!);parent.location.href='../staff_manage.php'</script>";
	        		} else {// it's not the M,check if its even got a M or not
	        			$query3 = "SELECT * FROM $shopname WHERE Role='Manager'";
	        			$result3 = $mysqli->query($query);
                        $resultCheck3 = $result3->num_rows;
		                $row3 = $result3->fetch_assoc();
		                if ($resultCheck3>=1) { //if shop has a manager,change!
		                	$oldManagerId = $row3['uid'];
		                	$mysqli->query("UPDATE $shopname SET Role = 'Staff' WHERE uid = '$oldManagerId'");		                	
		                	$mysqli->query("UPDATE $shopname SET Role = 'Manager' WHERE uid = '$allocateUid'");
		                	echo "<script>alert('Manager has been switched to our allocated one!');parent.location.href='../staff_manage.php'</script>";
		                		exit();
		                	

		                } else {//if shop has no manager
		                	$mysqli->query("UPDATE $shopname SET Role = 'Manager' WHERE uid = '$allocateUid'");
		                	echo "<script>alert('Manager has been allocated successfully!');parent.location.href='../staff_manage.php'</script>";
		                		exit();
		                }

	        		}
	        	} else { //user not in shop yet
	        		$query4 = "SELECT * FROM $shopname WHERE Role='Manager'";
	        		$result4 = $mysqli->query($query4);
                    $resultCheck4 = $result4->num_rows;
		            $row4 = $result4->fetch_assoc();
		            $query5 = "SELECT CONCAT(FirstName, ' ', LastName) AS FullName FROM users WHERE uid='$allocateUid'";
		            $mysqli->query($query5);
		            $result5 = $mysqli->query($query5);                        
		            $row5 = $result5->fetch_assoc();
		            $fullname = $row5['FullName'];
		            if ($resultCheck4>=1) { //shop has a manager
		            	$oldManagerId = $row4['uid'];
		            	
		                $mysqli->query("UPDATE $shopname SET Role = 'Staff' WHERE uid = '$oldManagerId'");
		                $mysqli->query("INSERT INTO $shopname (uid, Name, Role) VALUES ('$allocateUid', '$fullname', 'Manager')");
		                echo "<script>alert('Manager has been allocated successfully!');parent.location.href='../staff_manage.php'</script>";
		            } else { //shop has NO manager
		            	$mysqli->query("INSERT INTO $shopname (uid, Name, Role) VALUES ('$allocateUid', '$fullname', 'Manager')");
		            	echo "<script>alert('Manager has been allocated successfully!');parent.location.href='../staff_manage.php'</script>";
		            }
	        	}
	        }
	}

 }
} //end of isset POST