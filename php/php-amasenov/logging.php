<?php
session_start();
include_once 'dbconnect.php';
$uname = $_POST["uname"];
//$uname = stripslashes($uname);
$uname = mysql_real_escape_string( $uname ); 
//$uname = md5( $uname);
$pass = $_POST['pass'];
$pass = stripslashes($pass);
$pass = mysql_real_escape_string( $pass ); 
//$pass = md5( $pass);
$sql = "SELECT FROM users(username, password) VALUES ('$uname','$pass');";
try {
	mysql_query($sql);
	$sqlselect = "SELECT user_id FROM users WHERE username = '$uname'  and password = '$pass';";
	$res = mysql_query($sqlselect);
	$rows = mysql_num_rows($res);
  $userRow=mysql_fetch_array($res);
  $_SESSION['user'] = $userRow['user_id'];
      if (!isset($_SESSION['user'])) {
  	header("Location: index.html");
  }
  if (isset($_SESSION['user'])) {
  	header("Location: home.php");
  }
	
}
catch (PDOException $e) {
	echo $e->getMessage();
	echo "Something wrong with our sever. Try to login later.";
}
?>