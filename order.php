<!DOCTYPE html>
<html>
	<head>
	<meta name="description" content="Test for learing">
	<meta content="width=device-width">
	<title>Order</title>
	<link rel="stylesheet" href="style-order.css">
	<script>
	function validateForm() {
	var smt, cmt, mmt, mt, bsfm, total;
	smt = document.getElementById("SMT").value;
	cmt = document.getElementById("CMT").value;
	mmt = document.getElementById("MMT").value;
	mt = document.getElementById("MT").value;
	bsfm = document.getElementById("BSFM").value;
	total = smt + cmt + mmt + mt + bsfm;
	
	if (isNaN(smt) || smt < 1 || isNaN(cmt) || cmt < 1 || isNaN(mmt) || mmt < 1 || isNaN(mt) || mt < 1 || isNaN(bsfm) || bsfm < 1 ) {
    text = "Quantity must be between 1 and 100";
	} else document.getElementById('order').submit();
	document.getElementById("error").innerHTML = text;
	}
	</script>
	</head>

	<form id="order" name="order" class="order" action="/check.php" method="post">
	<h1>Enter your details</h1>
	<?php
		if (isset($_GET['error'])){
			if ($_GET['error'] == "empty") {
				echo '<p class="ordererror">Missing fields!</p>';
				$email = $_GET['mail'];
				$name = $_GET['uid'];
			}
			else if ($_GET['error'] == "invaliduid") {
				echo '<p class="ordererror">Invalid Name!</p>';
				$email = $_GET['mail'];
			}
		}
			session_start();
			$email = $_COOKIE['email'];
			$name = $_COOKIE['name'];
	?>
	<input type="text" name="uid" placeholder="Name" value=<?php echo $name ?>>
	<input type="email" name="email" placeholder="Email" value=<?php echo $email ?>>
	<h1>Choose your order</h1>
	<table>
	<tr>
	<th>Order</th>
	<th>Quantity</th>
	</tr>
	<tr>
	<td>Strawberry Milk Tea</td>
	<td><input id="SMT" type="text" name="SMT" value="0" placeholder="Quantity" style="width: 100px; margin:0px;"></td>
	</tr>
	<tr>
	<td>Coffee Milk Tea</td>
	<td><input id="CMT" type="text" name="CMT" value="0" placeholder="Quantity" style="width: 100px; margin:0px;"></td>
	</tr>
	<tr>
	<td>Melon Milk Tea</td>
	<td><input id="MMT" type="text" name="MMT" value="0" placeholder="Quantity" style="width: 100px; margin:0px;"></td>
	</tr>
	<tr>
	<td>Classic Milk Tea</td>
	<td><input id="MT" type="text" name="MT" value="0" placeholder="Quantity" style="width: 100px; margin:0px;"></td>
	</tr>
	<tr>
	<td>Brown Sugar Fresh Milk</td>
	<td><input id="BSFM" type="text" name="BSFM" value="0" placeholder="Quantity" style="width: 100px; margin:0px;"></td>
	</tr>
	</table>
	<p id="error"></p>
	<input type="button" name="button" onclick="validateForm()" class="btn btn-primary" value="order">
	</form>