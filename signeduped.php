<?php
if (isset($_POST['signup'])){

  require'DB.php';

  $name = $_POST['uid'];
  $email = $_POST['email'];
  $password = $_POST['pwd'];
  $rpassword = $_POST['rpwd'];

   if (empty($name) || empty($email) || empty($password) || empty($rpassword)){
     header("Location:/signup.php?error=empty&uid=".$name."&mail=".$email);
     exit();
}
   else if (!preg_match("/^[a-zA-Z0-9 ]*$/", $name)) {
     header("Location:/signup.php?error=invaliduid&mail=".$email);
     exit();
  }

   else if ($password !== $rpassword){
     header("Location:/signup.php?error=passwordcheck&uid".$username."&mail=".$email);
     exit();
  }
   else {

   $sql = "SELECT name FROM users WHERE name=?";
   $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("Location:/signup.php?error=sqlerror1");
        exit(); 
     } else {
	mysqli_stmt_bind_param($stmt, "s", $name);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_store_result($stmt);
	$resultcheck = mysqli_stmt_num_rows($stmt);
	 }
	if ($resultcheck > 0) {
     	header("Location:/signup.php?error=usertaken&mail".$email);
    	exit();
	 } else {
		$sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
		$stmt = mysqli_stmt_init($conn);
		}
		if (!mysqli_stmt_prepare($stmt, $sql)){
      		  header("Location:/signup.php?error=sqlerror2");
       		  exit();
		}
            else {
				$hashedPwd = password_hash($password, PASSWORD_BCRYPT);

				mysqli_stmt_bind_param($stmt, "sss", $name, $email, $hashedPwd);
				mysqli_stmt_execute($stmt);
				}
	  }
	
   
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
	
}
else {
  header("Location:/signup.php");
  exit();
}
?>

<!DOCTYPE html>
<html>
	<head>
	<meta name="description" content="Test for learing">
	<meta name=viewport content="width=device-width">
	<link rel="stylesheet" href="style.css">
	<title>Signup Successful!</title>
	</head>

	<h1>You have successful signed up!</h1>
	<a href="/home.php">Click here to return to the Main Page</a>

</html>

