<!DOCTYPE html>
<html>
	<head>
	<meta name="description" content="Test for learing">
	<meta name=viewport content="width=device-width">
	<title>Signup ?</title>
	<link rel="stylesheet" href="style-signup.css">
	</head>

	<form class="signup" action="/signeduped.php" method="post">
	<h1>Sign up!</h1>
	<?php
		if (isset($_GET['error'])){
			if ($_GET['error'] == "empty") {
				echo '<p class="signuperror">Missing fields!</p>';
			}
			else if ($_GET['error'] == "invaliduid") {
				echo '<p class="signuperror">Invalid Username!</p>';
			}
			else if ($_GET['error'] == "passwordcheck") {
				echo '<p class="signuperror">Password and Repeat Password is different!</p>';
			}
			else if ($_GET['error'] == "usertaken") {
				echo '<p class="signuperror">Username is taken!</p>';
			}
			else if ($_GET['error'] == "sqlerror" || $_GET['error'] == "sqlerror2") {
				echo '<p class="signuperror">Club penguin is kil!</p>';
			}
		}
	?>
	<input type="text" name="uid" placeholder="Username">
	<input type="password" name="pwd" placeholder="Password">
	<input type="password" name="rpwd" placeholder="Repeat Password">
	<input type="email" name="email" placeholder="Email">
	<input type="submit" name="signup" value="Signup">
	</form>
