<?php

include 'db_conn.php';

$checkExistLazenby = $mysqli->query("SELECT id FROM LazenbyTeam");
$checkExistRef = $mysqli->query("SELECT id FROM RefTeam");
$checkExistTrade = $mysqli->query("SELECT id FROM TradeTableTeam");

if (empty($checkExistLazenby)) {
	$queryCreate = "CREATE TABLE `LazenbyTeam` (
	             `id` int(5) NOT NULL AUTO_INCREMENT,
	             `uid` varchar(10) NOT NULL,
	             `Name` varchar(30) NOT NULL,	             
	             `Role` varchar(30) NOT NULL,	             
	             PRIMARY KEY (`id`)
	             )" ;
	$mysqli->query($queryCreate);
}

if (empty($checkExistRef)) {
	$queryCreate = "CREATE TABLE `RefTeam` (
	             `id` int(5) NOT NULL AUTO_INCREMENT,
	             `uid` varchar(10) NOT NULL,
	             `Name` varchar(30) NOT NULL,	             
	             `Role` varchar(30) NOT NULL,	             
	             PRIMARY KEY (`id`)
	             )" ;
	$mysqli->query($queryCreate);
}

if (empty($checkExistTrade)) {
	$queryCreate = "CREATE TABLE `TradeTableTeam` (
	             `id` int(5) NOT NULL AUTO_INCREMENT,
	             `uid` varchar(10) NOT NULL,
	             `Name` varchar(30) NOT NULL,	             
	             `Role` varchar(30) NOT NULL,	             
	             PRIMARY KEY (`id`)
	             )" ;
	$mysqli->query($queryCreate);
}

if (isset($_POST['submitAllocate'])) {
	$shopname = $_POST['shopList'];
	$allocateUid = $mysqli->real_escape_string($_POST['allocateUid']);
	$idprefix = substr($allocateUid, 0, 2);
	$queryFullname = "SELECT CONCAT(FirstName, ' ', LastName) AS FullName FROM users WHERE uid='$allocateUid'";
	$resultFullname = $mysqli->query($queryFullname);                        
    $fullname = $resultFullname->fetch_assoc()['FullName'];
    
	if (empty($allocateUid)) {
		echo "<script>alert('Please input an uid!!');parent.location.href='../staff_manage.php'</script>";
	} elseif ($idprefix!=="CM") { //}end of if empty input
		echo "<script>alert('This is not a Staff UID!');parent.location.href='../staff_manage.php'</script>";
	} else {//}end of if input is CM
	    //start to check if user even existed
        $query1 = "SELECT * FROM users WHERE uid='$allocateUid'";
	    $result1 = $mysqli->query($query1);
	    $resultCheck1 = $result1->num_rows;

	    if ($resultCheck1 < 1) {
	    	echo "<script>alert('UID doesnt existed! Try another one!');parent.location.href='../staff_manage.php'</script>";
	    } else {//{end of user not existed
            //start do user existed in users DB
            //check if user in any of cafe rosetr
            $query_a = "SELECT * FROM LazenbyTeam WHERE uid='$allocateUid'";
	        $result_a = $mysqli->query($query_a);
	        $resultCheck_a = $result_a->num_rows;

	        $query_b = "SELECT * FROM RefTeam WHERE uid='$allocateUid'";
	        $result_b = $mysqli->query($query_b);
	        $resultCheck_b = $result_b->num_rows;

	        $query_c = "SELECT * FROM TradeTableTeam WHERE uid='$allocateUid'";
	        $result_c = $mysqli->query($query_c);
	        $resultCheck_c = $result_c->num_rows;

            if ($resultCheck_a >= 1) { //Clear if existed
            	$mysqli->query("DELETE FROM LazenbyTeam WHERE uid='$allocateUid'");
            } elseif ($resultCheck_b >= 1) {
            	$mysqli->query("DELETE FROM RefTeam WHERE uid='$allocateUid'");
            } elseif ($resultCheck_c >= 1) {
            	$mysqli->query("DELETE FROM TradeTableTeam WHERE uid='$allocateUid'");
            }//end of clear existed staff in shop

            if ($_POST['roleList']=='Manager') { //if select to allocate manager
            	
            	$query2 = "SELECT * FROM $shopname WHERE Role='Manager'";
	            $result2 = $mysqli->query($query);
                $resultCheck2 = $result2->num_rows;
		        $row2 = $result2->fetch_assoc();

		        if ($resultCheck2>=1) {//if shop has a manager already
		        	$oldManagerId = $row2['uid'];
		    	    $mysqli->query("UPDATE $shopname SET Role = 'Staff' WHERE uid = '$oldManagerId'");
		    	    $mysqli->query("INSERT INTO $shopname (uid, Name, Role) VALUES ('$allocateUid', '$fullname', 'Manager')");
		    	    echo "<script>alert('Manager has been switched to your allocated one!');parent.location.href='../staff_manage.php'</script>";
		        } else { //if shop has no manager
		        	$mysqli->query("INSERT INTO $shopname (uid, Name, Role) VALUES ('$allocateUid', '$fullname', 'Manager')");
		        	echo "<script>alert('Manager has been allocated successfully!');parent.location.href='../staff_manage.php'</script>";
		        }
		        
            } elseif ($_POST['roleList']=='Staff') {//}end of select manager   
            	//if select allocate staff
                $mysqli->query("INSERT INTO $shopname (uid, Name, Role) VALUES ('$allocateUid', '$fullname', 'Staff')");
                echo "<script>alert('Staff has been allocated successfully!');parent.location.href='../staff_manage.php'</script>";
            }     

	    }//end of user existed in users condition
	}//end of if empty input
} //end of if POST button