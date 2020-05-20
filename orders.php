<?php
  require'DB.php';
   $name = $_COOKIE['name'];
   $sql = "SELECT * FROM orders WHERE name=?";
   $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("Location:/orders.php?error=sqlerror1");
        exit(); 
	} else {
	mysqli_stmt_bind_param($stmt, "s", $name);	
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);
	 }
?>

<!DOCTYPE html>
<html>
	<head>
	<meta name="description" content="Test for learing">
	<meta name=viewport content="width=device-width">
	<title>Orders</title>
	<link rel="stylesheet" href="style-orders.css">
	<table>
	<?php
		if ($row = mysqli_fetch_assoc($result)){
		echo "<th>Strawberry Milk Tea</th>";
		echo "<th>Coffee Milk Tea</th>";
		echo "<th>Melon Milk Tea</th>";
		echo "<th>Classic Milk Tea</th>";
		echo "<th>Brown Sugar fresh milk</th>";
		echo "<th>Date</th>";
			while($row = mysqli_fetch_assoc($result)){
		echo "<tr><td>Quantity</td><td>".$row['smt']."</td><td>".$row['cmt']."</td><td>".$row['mmt']."</td><td>".$row['mt']."</td><td>".$row['bsfm']."</td><td>".$row['date']."</td><td>";
			}
		echo "</table>";
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
	}
	else {
		echo "<p>No Orders</p>";
	}
	?>
	</tr>
	</table>
</html>