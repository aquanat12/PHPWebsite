<?php
require "db.php";
session_start();
?>
<!DOCTYPE html>
	<head>
	<meta name="description" content="et0715">
	<meta content="width=device-width">
	<link rel="stylesheet" href="style.css">
	</head>
	<body>
	<header><h1>Welcome to P1718108's Shop</h1></header>
	<?php
	if (isset($_SESSION['user'])) {
	echo '<a href="Logout.php" style="right: 0px; margin: 10px; position: absolute;">Click here to Logout!</a>';
	echo '<a href="orders.php" style="right: 50px; margin: 10px; position: absolute; width: auto; margin-top: 120px;">Click here to check your orders!</a>';
	}
		    if (isset($_SESSION['user'])) {
	         echo '<p class="login-status">You are logged in as</p>'.' '.$_SESSION['user'];
		} else {
			echo '<p class="login-status">You are logged out</p>';
			}
	 ?>
		<div class="container">
		<tr>
			<td><img src="strawberry.jpg" height=200px width=200px style="margin: 20px;"></td>
			<td><img src="coffee.jpg" height=200px width=200px style="margin: 20px;"></td>
			<td><img src="melon.jpg" height=200px width=200px style="margin: 20px;"></td>
			<td><img src="milk.jpg" height=200px width=200px style="margin: 20px;"></td>
			<td><img src="BS.jpg" height=200px width=200px style="margin: 20px;"></td>
			<br>
			<td><span>Strawberry Milk Tea</span></td>
			<td><span>Coffee Milk Tea</span></td>
			<td><span>Melon Milk Tea</span></td>
			<td><span>Classic Milk Tea</span></td>
			<td><span>Brown Sugar Fresh Milk</span></td>
		</tr>
		<br>
		<?php
			if (!isset($_SESSION['user'])) {
			echo '<a href="Login.php">Click here to Login!</a>';
			}
			if (isset($_SESSION['user'])) {
	         echo '<a href="Order.php">Click here to Order!</a>';
			}
		?>
		</div>
	 </body>

	
	
<?php
require "footer.php";
?>
