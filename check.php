<?php
 
if (isset($_POST['uid'])){

  require'DB.php';
  $name = $_POST['uid'];
  $email = $_POST['email'];
  $smt = $_POST['SMT'];
  $cmt = $_POST['CMT'];
  $mmt = $_POST['MMT'];
  $mt = $_POST['MT'];
  $bsfm = $_POST['BSFM'];
  $date = date("yy/m/d");
  $totalprice = 10 * ($smt + $cmt + $mmt + $mt + $bsfm);
  $total = $totalprice;
  $cookie_value = intval($smt).intval($cmt).intval($mmt).intval($mt).intval($bsfm);
  
  if(isset($_COOKIE["Items"])&& $cookie_value == $_COOKIE["Items"] ) {
	  if ($totalprice > 100){
	  $total = ($totalprice * 0.85);
	  }
	  else {
		  $total = ($totalprice * 0.95);
	  }
  } 
  
  else if ($totalprice > 100){
	  $total = ($totalprice * 0.9);
  }
  
   if (empty($name) || empty($email)){
     header("Location:/order.php?error=empty&uid=".$name."&mail=".$email);
     exit();
}
   else if (!preg_match("/^[a-zA-Z0-9 ]*$/", $name)) {
     header("Location:/order.php?error=invaliduid&mail=".$email);
     exit();
  }
  		$sql = "INSERT INTO orders (name, email, smt, cmt, mmt, mt, bsfm, date) VALUES (?, ?, ?, ?, ?, ?, ?, '".$date."')";
		$stmt = mysqli_stmt_init($conn);
		
    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("Location:/order.php?error=sqlerror1");
        exit(); 
     }  else {
		mysqli_stmt_bind_param($stmt, "sssssss", $name, $email, $smt, $cmt, $mmt, $mt, $bsfm);
		mysqli_stmt_execute($stmt);
	 }
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
	setcookie("Items", $cookie_value, time() + (86400 * 10));
} 
	else {
		header("Location:/order.php?");
	}
?>

<!DOCTYPE html>
<html>
	<head>
	<meta name="description" content="et0715">
	<meta content="width=device-width">
	<link rel="stylesheet" href="style.css">
	<title>Order Successful!</title>
	</head>


	<h1>Your order is</h1>
	<table>
	<div id=table>
	<tr>
	<th>Order</th>
	<th>Quantity</th>
	</tr>
	<tr>
	<td id="SMT">Strawberry Milk Tea</td>
	<td><?php echo intval($smt) ?></td>
	</tr>
	<tr>
	<td id="CMT">Coffee Milk Tea</td>
	<td><?php echo intval($cmt) ?></td>
	</tr>
	<tr>
	<td id="MMT">Melon Milk Tea</td>
	<td><?php echo intval($mmt) ?></td>
	</tr>
	<tr>
	<td id="MT">Classic Milk Tea</td>
	<td><?php echo intval($mt) ?></td>
	</tr>
	<tr>
	<td id="BSFM">Brown Sugar Fresh Milk</td>
	<td><?php echo intval($bsfm) ?></td>
	</tr>
	</div>
	</table>
	<p style="display: inline-block";>Your total cost is $ <?php echo floatval($total);?></p>
	<a href="HOME.php">Click here to Return!</a>
