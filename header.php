<?php
   session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to Utas Online Order System!</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="JQuery/jquery-3.3.1.js"></script>
</head>

<body>
    <div id="banner">
        <img id="bannerimg" src="img/food.jpeg" alt="foodbanner">
        <div id="centredword">
            <h1>Spoil Your Taste Bud in UTAS!</h1>
            <h2>Try some DELICIOUS food here!</h2>
            <h3>Online Order Available!</h3>

        </div>
    </div>


    <div id="navbar">
        <ul>
            <li><a href="index.php">Home Page</a></li>
            <li><a href="Lazenby_Menu.php">Lazenbys Menu</a></li>
            <li><a href="Ref_Menu.php">The Ref Menu</a></li>
            <li><a href="tradetable_Menu.php">The Trade Table Menu</a></li>
            <li><a href="Master_List.php">Master List for Admin</a></li>

             <?php
            
            if (isset($_SESSION['uid'])) {
                echo '<li style="float: right"><a href="includes/logout_process.php?link=logout">Log Out</a></li><li style="float: right" id="loginbtn">
                      <a href="users_account_page.php">My Account Detail</a></li>
                      <li style="float: right"><a>Welcome, <b>'.$_SESSION['firstname'] . '<b></a></li>
                      <li></li></ul></div>                   
                     ';

            } else {
                echo '
                  <li style="float: right" id="loginbtn"><a>Login</a></li>
                  <li style="float: right"><a href="registration.php">Registration</a></li></ul>
                </div>
                <div id="loginbox">
                    <div id="loginput">
                         <form id="loginform" method="post" action="includes/login_process.php">
                            <label for="username">Username</label><br>
                <input type="text" id="username" name="username" placeholder="Your E-mail / UID"><br><br>
                            <label for="password">Password</label><br>
                            <input type="password" id="loginPassword" name="loginPassword"  placeholder="Your Password"><br><br>
                            <input type="submit" value="Login" name="loginSubmit"><br>
                            <span>New to Utas?</span>
                        </form>
                        <input type="button" onclick="location.href=\'registration.php\'" value="Creat a new account!"><br>
                    </div>
                </div>
                
                                ';
            }

            ?>


            
