<!DOCTYPE html>
<html>
	<head>
	<meta name="description" content="Test for learing">
	<meta name=viewport content="width=device-width">
	<title>Login ?</title>
	<link rel="stylesheet" href="style-login.css">
	</head>

	<form class="Logging-in" action="/Logincheck.php" method="post">
	<h1>Login!</h1>
	<?php
		$name = NULL;
		
		if (isset($_GET['error'])){
			$name = $_GET['uid'];
			if ($_GET['error'] == "empty") {
				echo '<p class="loginerror">Missing fields!</p>';
			}
			else if ($_GET['error'] == "invaliduid") {
				echo '<p class="loginerror">Invalid Username!</p>';
			}
			else if ($_GET['error'] == "wrong") {
				echo '<p class="loginerror">Username or Password is wrong!</p>';
			}
			else if ($_GET['error'] == "sqlerror" || $_GET['error'] == "sqlerror2") {
				echo '<p class="loginerror">Club penguin is kil!</p>';
			}
		}
	?>
	<input type="text" name="uid" placeholder="Username" value=<?php echo $name ?>>
	<input type="password" name="pwd" placeholder="Password" >
	<input type="submit" name="login" value="Login">
	</form>
	<form class="signup" action="/signup.php" method="post">
	<input type="submit" value="Signup">
	</form>
