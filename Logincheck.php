<?php
  require'DB.php';

  $name = $_POST['uid'];
  $password = $_POST['pwd'];

     if(empty($name) || empty($password)){
     header("Location:/login.php?error=empty&uid=".$name);
     exit();
}
     else if (!preg_match("/^[a-zA-Z0-9]*$/", $name)){
     header("Location:/login.php?error=invaliduid"); 
     exit();
}
  else {
     $sql = "SELECT * FROM users WHERE name=?";
     $stmt = mysqli_stmt_init($conn);
     if (!mysqli_stmt_prepare($stmt, $sql)){
        header("Location:/login.php?error=sqlerror1");
        exit(); 
      }else {
	mysqli_stmt_bind_param($stmt, "s", $name);
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);
	if ($row = mysqli_fetch_assoc($result)) {
		$pwdCheck = password_verify($password, $row['password']);
		if ($pwdCheck == false) {
		header("Location:/login.php?error=wrong&uid=".$name);
		exit();
		} else if($pwdCheck = true) {
			session_start();
			$_SESSION['email'] = $row['email'];
			$_SESSION['user'] = $row['name'];
			header("Location:/home.php?login=success");
			setcookie("name", $name , time() + (86400 * 10));
			setcookie("email", $row['email'] , time() + (86400 * 10));
			exit();
		} else {
			header("Location:/login.php?error=wrong&uid=".$name);
			exit();
			}
 
	}	else {
				header("Location:/login.php?error=wrong&uid=".$name);
				exit();
					}
	  }
  }
		
?>