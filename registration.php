<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="css/style.css">
    <script src="JQuery/jquery-3.3.1.js"></script>  
</head>
<body>
<h1>Welcome! You are about to Creat an Account</h1>
    <div id="regibox">
        <div id="reginput">
            <form id="regiform" method="post" action="includes/register_process.php">
                <div class="inputdiv">
                    <label for="firstname">Firstname:</label><br>
                    <input type="text" class="name" name="firstname" class="required" required>
                </div>
                <div class="inputdiv">
                    <label for="lastname">Lastname:</label><br>
                    <input type="text" class="name" name="lastname" class="required" required>
                </div>
                <div class="inputdiv">I am a
                    <select id="idselect" name="idtype" onchange="idPrefix()" class="required"><br>
                    <option id="student" value="US">Student</option>
                    <option id="staff" value="UE">Staff</option>
                    </select>
                </div><br>
                <!--<input type="radio" name="idtype" value="student">Student  
                <input type="radio" name="idtype" value="staff">Staff<br>-->
                <div class="inputdiv">

                    <label for="userid" value="userid">Student/Stuff ID:</label><br>
                    <span id="idprefix">US</span><input type="text" name="userid" id="userid" class="required" maxlength="4" required>
                </div>
                <div class="inputdiv">
                    <label for="email">E-mail address:</label><br>
                    <input type="text" id="email" name="email" class="required" required>
                </div>
                <div class="inputdiv">
                    <label for="mobile">Your Mobile Number:</label><br>
                    <input type="text" id="mobile" name="mobile" class="required" required>
                </div>
                <div class="inputdiv">
                    <label for="creditcrad">Your Credit Card Number:    </label><br>
                    <input type="text" id="creditcrad" name="creditcrad" class="required" required>
                </div>


                <div class="inputdiv" id="inputpwd">
                    <label for="password">Password:</label><br>
                    <input type="password" id="password" name="password" pattern="(?=.*[a-z])(?=.*[A-Z]).{6,}" class="required" minlength="6" maxlength="12" required>
                </div>


                <div class="inputdiv">
                    <label for="password2">Confirm Password:</label><br>
                    <input type="password" id="repassword" name="repassword" class="required" minlength="6" maxlength="12" required>
                </div>
                <div class="checkpwd" id="checkmatch"></div>
            
            <div id="alertbox">
                <h3>Password must contain the following:</h3>
                <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                <p id="number" class="invalid">A <b>number</b></p>
                <p id="special" class="invalid">A <b>special character(~!#$)</b></p>
                <p id="length" class="invalid">Minimum <b>6 characters</b></p>

            </div>
            <input type="submit" id="send" name="register" value="Join in!">
            <input type="reset" id="reset" value="Reset">
          </form>
          <input type="button" onclick="location.href='index.php'" value="Go to Home Page" id="gohome"><br>
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
