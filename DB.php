<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "et0715";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: ".mysql_connect_error());
}

