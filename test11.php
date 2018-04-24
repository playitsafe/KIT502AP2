<!DOCTYPE html>
<html>
<head>
   <link rel="stylesheet" href="css/style.css">
   <script src="JQuery/jquery-3.3.1.js"></script>  
  <title></title>
</head>
<body>
  <table  class="staff">
  <tr>
    <th></th>
    <th>Lazenbys</th>
    <th>The Ref</th>
    <th>The Trade Table</th>
  </tr>
  <tr>
    <th>Cafe Manager</th>
    <td>
<?php

            include 'includes/db_conn.php';
            $managerL=$mysqli->query("SELECT CONCAT(Name, '(',uid, ')') AS NameUid FROM LazenbyTeam WHERE Role='Manager'")->fetch_assoc()['NameUid'];
            $managerR=$mysqli->query("SELECT CONCAT(Name, '(',uid, ')') AS NameUid FROM RefTeam WHERE Role='Manager'")->fetch_assoc()['NameUid']; 
            $managerT=$mysqli->query("SELECT CONCAT(Name, '(',uid, ')') AS NameUid FROM TradeTableTeam WHERE Role='Manager'")->fetch_assoc()['NameUid'];             
            echo $managerL . "</td><td>" . $managerR . "</td><td>" . $managerT . "</td></tr>" ;
         ?>
  <?php
       include 'includes/db_conn.php';error_reporting(0);
       $query1 = "SELECT CONCAT(Name, '(',uid, ')') AS NameUid FROM lazenbyteam WHERE Role='Staff'";
       $result1 = $mysqli->query($query1);
       $query2 = "SELECT CONCAT(Name, '(',uid, ')') AS NameUid FROM refteam WHERE Role='Staff'";
       $result2 = $mysqli->query($query2);
       $query3 = "SELECT CONCAT(Name, '(',uid, ')') AS NameUid FROM tradetableteam WHERE Role='Staff'";
       $result3 = $mysqli->query($query3);
       $staffNameL = array();
       $staffNameR = array();
       $staffNameT = array();
       $longestArray = array();

       while ($row1 = $result1->fetch_assoc()) {
          array_push($staffNameL, $row1['NameUid']);
       }

       while ($row2 = $result2->fetch_assoc()) {
          array_push($staffNameR, $row2['NameUid']);
       }

       while ($row3 = $result3->fetch_assoc()) {
          array_push($staffNameT, $row3['NameUid']);
       }

       for ($index=0; isset($staffNameL[$index])||isset($staffNameR[$index])||isset($staffNameT[$index]) ; $index++) { 
           echo "<tr>
                    <th>Cafe Staff</th>
                    <td>".$staffNameL[$index]."</td>
                    <td>".$staffNameR[$index]."</td>
                    <td>".$staffNameT[$index]."</td>
                 </tr>";
       }
    ?>
</table>

</body>
</html>