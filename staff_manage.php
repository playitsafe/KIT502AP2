<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="css/style.css">
    <script src="JQuery/jquery-3.3.1.js"></script>  
</head>
<body>
<?php
include 'header.php';

?>

<h3>Here's the current arrangement of three Cafés </h3>
<table  class="staff">
	<tr>
		<th></th>
		<th>Lazenbys</th>
		<th>The Ref</th>
		<th>The Trade Table</th>
	</tr>
	<tr>
		<th>Cafe Manager</th>
		<td><?php
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
           
<div class="masterinfo">You must allocate a Manager for EACH Cafe!</div>
<div class="masterinfo"></div>
<div>
    All your employees are shown as below:
</div>
<div id="showStaff">
	<table class="staff">
	<tr>
		<th>UID</th>
		<th>Name</th>		
	</tr>
    <?php
      include 'includes/db_conn.php';
      $result = $mysqli->query(SELECT * FROM)
	<tr>
		<th>Cafe Manager</th>
		<td>Xxxx(CM1111)</td>
		<td>Yyyyy(CM2222)</td>
		<td>Zzzzz(CM3333)</td>
	</tr>
	</table>	
</div>

<div>
	You can allocate your staff to your Cafes:<br>
    Note: Your NEW allocated Manager will replace the existed Manager.<br>
    The Previous manager will still work as Staff in the shop.<br>
	<form method="post" action="includes/allocate_process.php">
		<table>
			<tr>
				<th>Choose Cafe:</th>
			</tr>
			<tr>
				<td>
					<select id="shopList" name="shopList">
                        <option value="LazenbyTeam">Lazenby</option>
                        <option value="RefTeam">Ref</option>
                        <option value="TradeTableTeam">TradeTable Manager</option>
                    </select>
                    <select id="roleList" name="roleList">
                    	<option value="Manager">Manager</option>
                    	<option value="Staff">Staff</option>
                    </select>
				</td>
				<td><input type="text" name="allocateUid" placeholder="uid" onkeyup="this.value = this.value.toUpperCase();" maxlength="6"></td>
				<td><input type="submit" name="submitAllocate" value="Allocate"></td>
		</form>
	    <form method="post" action="includes/allocate_process.php">
			</tr>
			<tr>
				<td></td>
				<td><input type="text" name="deleteUser" placeholder="uid" onkeyup="this.value = this.value.toUpperCase();" maxlength="6"></td>
				<td><input type="submit" name="submitDelete" value="Delete"></td>
			</tr>
		</table>
	    </form>
</div>

<div id="regibox">
        <div id="reginput">
        	<h3>Create New Staff Account:</h3>
            <form id="regiform" method="post" action="includes/create_staff_process.php">
                <table id="regitable">
                    <tr>
                        <th><label for="firstname">Firstname:</label></th>
                        <th><label for="lastname">Lastname:</label><br></th>
                    </tr>
                    <tr>
                        <td><input type="text" class="name" name="firstname">*</td>
                        <td><input type="text" class="name" name="lastname">*</td>
                    </tr>
                    <tr>
                        <th>Identity</th>
                        <th>Cafe Staff ID:</th>
                    </tr>
                    <tr>
                        <td><select id="idselect" style="width: 55%" name="idtype" onchange="idPrefix()" disabled><option id="student" value="CM">Cafe Staff</option>
                        
                        </select></td>
                        <td><span id="idprefix">CM</span><input type="text" name="userid" style="width: 34%" id="userid" maxlength="4">*</td>
                    </tr>
                    <tr>
                        <th><label for="email">E-mail address:</label></th>
                        <th><label for="mobile">Staff's Mobile Number:</label></th>
                    </tr>
                    <tr>
                        <td><input type="text" id="email" name="email"></td>
                        <td><input type="text" id="mobile" name="mobile"></td>
                    </tr>
                    <tr>
                        <th></th>
                        <td rowspan="9">
                           <div id="alertbox">
                               <h4>Password must contain the following:</h4>
                               <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                               <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                               <p id="number" class="invalid">A <b>number</b></p>
                               <p id="special" class="invalid">A <b>special character(~!#$)</b></p>
                               <p id="length" class="invalid">Minimum <b>6 characters</b></p>
                          </div> 
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <th><label for="password">Set Password for this account:</label></th>
                        
                    </tr>
                    <tr>
                        <td><input type="password" id="password" name="password">*</td>
                        
                    </tr>
                    <tr><th><div class="checkpwd" id="checkmatch"></div></th></tr>
                    <tr>
                        <th><label for="password2">Confirm Password:</label></th>
                    </tr>
                    <tr>
                        <td><input type="password" id="repassword" name="repassword">*</td>
                    </tr>
                    

                </table>

            
            <input type="submit" style="width: 20%" id="send" name="create" value="+ New Staff">
            <input type="reset" style="width: 20%" id="reset" value="Reset">
          </form>
          
        </div>

</div>

<script>
        var myInput = document.getElementById("password");
        var letter = document.getElementById("letter");
        var capital = document.getElementById("capital");
        var number = document.getElementById("number");
        var length = document.getElementById("length");
        var special = document.getElementById("special");

        myInput.onfocus = function() {
            document.getElementById("alertbox").style.display = "block";
        }

        //myInput.onblur = function() {
        //    document.getElementById("alertbox").style.display = "none";

        //}

        myInput.onkeyup = function() {
            var lowerCaseLetter = /[a-z]/g;
            if (myInput.value.match(lowerCaseLetter)) {
                letter.classList.remove("invalid");
                letter.classList.add("valid");

            } else {
                letter.classList.remove("valid");
                letter.classList.add("invalid");
            }

            var uppercaseLetter = /[A-Z]/g;
            if (myInput.value.match(uppercaseLetter)) {
                capital.classList.remove("invalid");
                capital.classList.add("valid");
            } else {
                capital.classList.remove("valid");
                capital.classList.add("invalid");
            }

            var numbers = /[0-9]/g;
            if (myInput.value.match(numbers)) {
                number.classList.remove("invalid");
                number.classList.add("valid");
            } else {
                number.classList.remove("valid");
                number.classList.add("invalid");
            }

            if (myInput.value.length >= 6) {
                length.classList.remove("invalid");
                length.classList.add("valid");
            } else {
                length.classList.remove("valid");
                length.classList.add("invalid");
            }

            
            var c1 = myInput.value.indexOf("~");
            var c2 = myInput.value.indexOf("#");
            var c3 = myInput.value.indexOf("$");
            var c4 = myInput.value.indexOf("!");
            if (c1>=0||c2>=0||c3>=0||c4>=0) {
                special.classList.remove("invalid");
                special.classList.add("valid");
            } else {
                special.classList.remove("valid");
                special.classList.add("invalid");
            }
        }
        
        function checkPasswordMatch() {
            var pswd = $("#password").val();
            var confirm = $("#repassword").val();
            
            if (pswd != confirm)
                $("#checkmatch").html("Passwords do not match!");
            else
                $("#checkmatch").html("Passwords match!");
        }
        
        $(document).ready(function(){
            $("#repassword").keyup(checkPasswordMatch);
        });

        $("#loginbox").hide();
        window.onclick = function(event) {
            if ($(event.target).closest("#loginbtn").length) {
                $("#loginbox").show();
            } else if ($(event.target).closest("#loginbox").length) {
                $("#loginbox").show();
            } else {
                $("#loginbox").hide();
            };
        };

        function idPrefix() {
            var x = $("#idselect").val();
            //Vanilla JS way as: 
            //var x = document.getElementById("userid").value;
            //$("#userid").attr("value",x);
            $("#idprefix").text(x);
        }

    </script>
</body>

</html>

