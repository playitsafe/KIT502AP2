<?php
include "header.php";

if (!isset($_SESSION['uid'])) {
        echo "<script>alert('You haven\'t logged in! Plz login first!!');parent.location.href='login_page.php'</script>";
    }

 ?>

<h3>Please put through your Credit Card Details to Top-Up your Account:</h3>

<form method="POST" action="includes/topup_process.php">
	<label>The Amount You Want to Top-up:</label><br>
	<input type="radio" name="topupvalue" value="20" checked>$20.00<br> 
    <input type="radio" name="topupvalue" value="50">$50.00<br>
    <input type="radio" name="topupvalue" value="100">$100.00<br>
	<label>Your Credit Card Details:</label><br>
	<input type="input" name="creditno"><br>
	<label>Valid Till</label>
	<input type="input" name="creditMonth" placeholder="MM">&nbsp;&nbsp;<b>/</b>&nbsp;&nbsp;
	<input type="input" name="creditYear" placeholder="YY">&nbsp;&nbsp;( * Format Example: 06 / 18 as June 2018)</span><br>
	<label >CVV Code</label>
	<input type="input" name="cvv" maxlength="3"><span>&nbsp;&nbsp;( * Input 3 digits)</span><br>
	<input type="submit" name="topup" style="width: 10%">
	<input type="reset" name="reset" style="width: 10%">

</form>
