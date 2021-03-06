 <?php
    include 'header.php';

    if (!isset($_SESSION['uid'])) {
        echo "<script>alert('You haven\'t logged in! Plz login first!!');parent.location.href='login_page.php'</script>";
    } else {
       
        $uid = $_SESSION['uid'];
        $queryInfo = "SELECT * FROM users WHERE uid = '$uid'";
        $getInfo = $mysqli->query($queryInfo);
        $Info = $getInfo->fetch_assoc();
        $firstname = $Info['FirstName'];
        $lastname = $Info['LastName'];
        $email = $Info['Email'];
        $mobile = $Info['Mobile'];
        $creditcrad = $Info['CreditCard'];
        $identity = $Info['Identity'];
        $balance = $Info['Balance'];


    }

 ?>



<h2>Hi, <?php echo $firstname;?> | Here's your Information:</h2>
<div id="updatebox">
    <div id="innerupdatebox">
        <form id="regiform" method="post" action="includes/account_update_process.php">
                <table id="infotable">
                    <tr>
                        <th><label for="firstname">Firstname:</label></th>
                        <th><label for="lastname">Lastname:</label><br></th>
                        <th>Your Account Balance is:</th>
                    </tr>
                    <tr>
                        <td><input type="text" class="name" name="firstname" value="<?php echo $firstname; ?>"></td>
                        <td><input type="text" class="name" name="lastname"  value="<?php echo $lastname; ?>"></td>
                    </tr>
                    <tr>
                        <th>I am a</th>
                        <th>My Student/Staff ID:</th>
                        <th id=balance rowspan="3">$ <?php echo $balance; ?></th>
                    </tr>
                    <tr>
                        <td><select id="idselect" style="width: 34%" name="idtype" onchange="idPrefix()" disabled>
                        <option><?php echo $identity;?></option>
                        </select></td>
                        <td><input type="text" name="userid" style="width: 34%" id="userid" maxlength="4" disabled value="<?php echo $uid;?>"></td>
                    </tr>
                    <tr>
                        <th><label for="email">E-mail address:</label></th>
                        <th><label for="mobile">Your Mobile Number:</label></th>
                    </tr>
                    <tr>
                        <td><input type="text" id="email" name="email" style="width: 65%" value="<?php echo $email;?>"></td>
                        <td><input type="text" id="mobile" name="mobile"  value="<?php echo $mobile;?>"></td>
                    </tr>
                    <tr>
                        <th><label for="creditcrad">Your Credit Card Number:</label><br></th>
                        <td rowspan="7">
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
                        <td><input type="text" id="creditcrad" name="creditcrad" value="<?php echo $creditcrad;?>"></td>
                    </tr>
                    <tr>
                        <th><label for="password">Password:</label></th>
                        
                    </tr>
                    <tr>
                        <td><input type="password" id="password" name="password"></td>
                        
                    </tr>
                    <tr><th><div class="checkpwd" id="checkmatch"></div></th></tr>
                    <tr>
                        <th><label for="password2">Confirm Password:</label></th>
                    </tr>
                    <tr>
                        <td><input type="password" id="repassword" name="repassword"></td>
                    </tr>
                    <tr>
                        <td><input type="submit" id="update" name="update" value="Update Info" style="width: 70%"></td>
                        <td><a href="staff_manage.php"><input type="button" value="Staff Management"></a>&nbsp;&nbsp;<a href="menu_manage.php"><input type="button" value="Menu Management"></a></td>
                        <td><a href="top_up.php"><input type="button" id="topup" value="Top Up"></a></td>

                    </tr>
                </table>           
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