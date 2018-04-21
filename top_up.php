<?php
include "header.php";
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
	<input type="number" name="creditMonth" placeholder="MM">&nbsp;&nbsp;<b>/</b>&nbsp;&nbsp;
	<input type="number" name="creditYear" placeholder="YY"><br>
	<label >CVV Code</label>
	<input type="number" name="cvv" maxlength="3"><br>
	<input type="submit" name="topup" style="width: 10%">
	<input type="reset" name="reset" style="width: 10%">

</form>
